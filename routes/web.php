<?php

use Illuminate\Support\Facades\Route;
use App\Jobs\ExampleJob;
use App\Jobs\HelloWorldJob;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('lksdiycc');
});

Route::get('/upload', 'App\Http\Controllers\UploadController@upload');
Route::post('/upload/proses', 'App\Http\Controllers\UploadController@proses_upload');
Route::get('/upload/hapus/{id}', 'App\Http\Controllers\UploadController@hapus');

Route::get('/cache/{nama_file}', 'App\Http\Controllers\UploadController@testCache');

Route::view('/navigation', 'navigation');

Route::get('/test-queue', function () {
    dispatch(new ExampleJob);
    dispatch(new HelloWorldJob("Hello world dari Serverless ID!"));

    return "ExampleJob dan HelloWorldJob sedang dijalankan!";
});