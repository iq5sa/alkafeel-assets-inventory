<?php

use App\Models\SystemInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use function Illuminate\Log\log;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('/set/osdata', function (Request $request) {

    $data = $request->all();

    // Convert arrays to JSON strings
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            $data[$key] = json_encode($value);
        }elseif ($key == 'LastInventory') {
            $data[$key] = \Carbon\Carbon::createFromFormat('m/d/Y H:i', $value)->format('Y-m-d H:i:s');
        }
    }
    
    $systemInfo = SystemInfo::create($data);
   
    return response(["message" => "OS data set!", "data"=>$data], 200);
});

Route::get('/set/osdata', function (Request $request) {

    $data = $request->all();
    $systemInfo = SystemInfo::create($data);
   
    return response(["message" => "OS data set!", "data"=>$data], 200);
});