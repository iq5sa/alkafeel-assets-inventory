<?php

namespace App\Jobs;

use App\Models\NetworkScanner;
use Illuminate\Console\Concerns\InteractsWithIO;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ScanNetworkJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels; // Remove Dispatchable

    protected $networkScanner;

    public function __construct(NetworkScanner $networkScanner)
    {
        $this->networkScanner = $networkScanner;
    }

    public function handle()
    {
        $this->networkScanner->update(['status' => 'scanning']);

    //    $ping = exec("nmap -sP {$this->networkScanner->ip_address}", $output);
        $ping = exec("nmap -sP {$this->networkScanner->ip_address}");
        $scanResult = "nmap complete for {$this->networkScanner->ip_address} at " . now() . "\n Scan Result: \n {$ping}";

        $this->networkScanner->update([
            'status' => 'completed',
            'result' => $scanResult
        ]);
    }

}
