<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/ping', fn () => (new class {
//     use \App\Traits\ApiResponses;

//     public function run()
//     {
//         return $this->ok('API is working');
//     }
// })->run());   

Route::get('products', function () {
    return Product::all();
});