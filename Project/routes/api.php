<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelregController;
use App\Http\Controllers\AddRoomController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\TransportRegistrationController;
use App\Http\Controllers\AddVehicleController;
use App\Http\Controllers\AdminRegistationController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\CustomerReviewController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/Hotelreg',[HotelregController::class, 'List'])->middleware('APIAuth');
Route::post('/addHotelreg',[HotelregController::class, 'addHotelreg']);
Route::post('/login',[HotelregController::class, 'login']);
Route::post('/logout',[HotelregController::class, 'logout']);
//Addroom
Route::get('/RoomList', [AddRoomController::class,'RoomList']);
Route::post('/RoomAdd',[AddRoomController::class,'RoomAdd']);

//Report
Route::get('/Report',[ReportController::class,'list']);
Route::post('/Report',[ReportController::class,'Reportadd']);


//Inquiry
Route::get('/Inquiry',[InquiryController::class,'Inquiry']);
Route::post('/Inquiryadd',[InquiryController::class,'Inquiryadd']);
Route::get('/Inquiryindex',[InquiryController::class,'Inquiryindex']);

//AddVehicle
Route::get('/AddVehicle',[AddVehicleController::class,'AddVehicles']);
Route::post('/AddVehicleSub',[AddVehicleController::class,'AddVehicleSubmits']);


Route::post('/Tlogins',[TransportRegistrationController::class,'Tlogin']);

//Transport
Route::get('/Regi',[TransportRegistrationController::class,'Registations']);
Route::post('/addRegi',[TransportRegistrationController::class,'Registationsubmits']);
Route::post('/Tlogout',[TransportRegistrationController::class, 'Tlogout']);




//admin
Route::get('/AdminRegistationApi',[AdminRegistationController::class,'AdminRegistationApi']);
Route::post('/AdminRegistationApi',[AdminRegistationController::class,'AdminRegistationApiPost']);
Route::get('/hotelApi',[HotelController::class,'hotelApi']);
Route::post('/Alogins',[AdminRegistationController::class,'Alogin']);
Route::get('/Buslistapi',[BusController::class,'Buslistapi']);
Route::post('/Buslistapi',[BusController::class,'Buslistapipost']);
Route::get('/CustomerReview',[CustomerReviewController::class,'CustomerReviewapi']);
Route::post('/CustomerReview',[CustomerReviewController::class,'CustomerReviewapipost']);
Route::post('/Alogout',[AdminRegistationController::class, 'Alogout']);