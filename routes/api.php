<?php

use App\Models\RemoteAsset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/remote/assets/set', function (Request $request) {

    $data = $request->all();

    // Convert arrays to JSON strings
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            $data[$key] = json_encode($value);
        }elseif ($key == 'LastInventory') {
            $data[$key] = Carbon::createFromFormat('m/d/Y H:i', $value)->format('Y-m-d H:i:s');
        }
    }

    RemoteAsset::create($data);

    return response(["message" => "OS data set!", "data"=>$data], 200);
});



Route::get('/remote/assets/set', function (Request $request) {

    $data = $request->all();
    RemoteAsset::create($data);

    return response(["message" => "OS data set!", "data"=>$data], 200);
});
