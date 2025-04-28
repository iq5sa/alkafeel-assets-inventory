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
    use InteractsWithQueue, Queueable, SerializesModels;

    protected NetworkScanner $networkScanner;
    protected $options;

    public function __construct(NetworkScanner $networkScanner, array $options = [])
    {
        $this->networkScanner = $networkScanner;
        $this->options = $options;
    }

    public function handle()
    {
        $this->networkScanner->update(['status' => 'scanning']);

        // Build Nmap command based on scan type
        $ip = $this->networkScanner->ip_address;


        $scanCommand = match ($this->options['scan_type']) {
            'quick' => "nmap -F $ip",
            'full' => "nmap -p- $ip",
            'os' => "nmap -O $ip",
            'ports' => isset($this->options['custom_ports']) && $this->options['custom_ports'] !== ''
                ? "nmap -p {$this->options['custom_ports']} $ip"
                : "nmap -p- $ip",
            default => "nmap -sn $ip",
        };


        // Execute scan
        $scanResult = shell_exec($scanCommand);

        // Save results
        $this->networkScanner->update([
            'status' => 'completed',
            "scan_type" => $this->options['scan_type'],
            'result' => $scanResult
        ]);
    }

}
