<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/admin');
});

Route::get("phpv", function () {
    $issues = array();

    if (!(PHP_VERSION_ID >= 80300)) {
        return 'Your Composer dependencies require a PHP version ">= 8.3.0". You are running ' . PHP_VERSION . '.';
    }

    return "Okay";
});

Route::get('/nmap', function () {
    //  return shell_exec('nmap -A 37.238.172.30');

    $output = shell_exec('nmap 192.168.88.16');
    dd( $output);


});
