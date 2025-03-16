<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScannerController extends Controller
{
    protected function parseNmapOutput($nmapData): array
    {
        $hosts = [];
        $lines = explode("\n", $nmapData);
        $currentHost = null;

        foreach ($lines as $line) {
            $line = trim($line);

            // Match "Nmap scan report for" (Hostname + IP or just IP)
            if (preg_match('/^Nmap scan report for\s+(.+?)\s+\(([\d\.]+)\)/', $line, $matches)) {
                $currentHost = $matches[2];
                $hosts[$currentHost] = [
                    'hostname' => $matches[1],
                    'ip' => $matches[2],
                    'latency' => '',
                    'ports' => []
                ];
            } elseif (preg_match('/^Nmap scan report for\s+([\d\.]+)/', $line, $matches)) {
                $currentHost = $matches[1];
                $hosts[$currentHost] = [
                    'hostname' => null,
                    'ip' => $matches[1],
                    'latency' => '',
                    'ports' => []
                ];
            }

            // Match "Host is up (X.XXXs latency)"
            elseif (preg_match('/^Host is up \(([\d\.]+)s latency\)/', $line, $matches) && $currentHost) {
                $hosts[$currentHost]['latency'] = $matches[1];
            }

            // Match open ports (PORT STATE SERVICE)
            elseif (preg_match('/^(\d+)\/tcp\s+open\s+(\S+)/', $line, $matches) && $currentHost) {
                $hosts[$currentHost]['ports'][] = [
                    'port' => (int)$matches[1],
                    'service' => $matches[2]
                ];
            }
        }

        return $hosts;
    }


    public function scanHost($targetIp): false|string|null
    {
        $command = "nmap " . escapeshellarg($targetIp);
        $output = shell_exec($command);
        return $output;

    }

}
