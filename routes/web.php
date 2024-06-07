<?php

use App\Http\Controllers\WebcamController;
use Illuminate\Support\Facades\Route;
use SalimMbise\TanzaniaRegions\TanzaniaRegions;
use App\Http\Controllers\RegionController;


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
    return view('welcome');
});

Route::get('webcam', [WebcamController::class, 'index']);
Route::post('webcam', [WebcamController::class, 'store'])->name('webcam.capture');


Route::get('/regions', [RegionController::class, 'getRegions']);

Route::get('/regionsDistricts', [RegionController::class, 'getRegionsDistricts']);

Route::get('/districtSingle', [RegionController::class, 'getDistrictsSingle']);

Route::get('/wards', [RegionController::class, 'getWards']);

Route::get('/all', [RegionController::class, 'getAllRegions']);




