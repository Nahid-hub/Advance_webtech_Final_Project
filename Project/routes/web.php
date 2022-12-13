<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelregController;
use App\Http\Controllers\AddRoomController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\CustomerRegController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Hotelreg',[HotelregController::class, 'Hotelreg'])->name('Hotelreg');
Route::post('/Hotelreg',[HotelregController::class, 'Hotelregadd'])->name('Hotelreg');
Route::get('/login',[HotelregController::class,'login'])->name('login');
Route::post('/login',[HotelregController::class,'loginSubmit'])->name('login');
Route::get('/logout',[HotelregController::class,'logout'])->name('logout');


//Dashboard
Route::get('/Hotelreg/Dash', [HotelregController::class,'Dash'])->name('Dash')->middleware('Validhotelreg');

//Addroom
Route::get('/AddRoom', [AddRoomController::class,'AddRoom'])->name('AddRoom')->middleware('Validhotelreg');
Route::post('/AddRoom',[AddRoomController::class,'AddRoomdash'])->name('AddRoom')->middleware('Validhotelreg');
Route::get('/RoomList',[AddRoomController::class,'RoomList'])->name('RoomList')->middleware('Validhotelreg');
Route::get('/HotelList',[AddRoomController::class,'HotelList'])->name('HotelList');
Route::get('/AddRoomEdit/{id}',[AddRoomController::class,'AddRoomEdit'])->name('AddRoomEdit');
Route::post('/EditSubmitted',[AddRoomController::class,'AddRoomEditSubmitted'])->name('EditSubmitted');
Route::get('/AddRoomDelete/{id}',[AddRoomController::class,'AddRoomDelete'])->name('AddRoomDelete');


//Report
Route::get('/Report',[ReportController::class,'Report'])->name('Report')->middleware('Validhotelreg');
Route::post('/Report',[ReportController::class,'Reportadd'])->name('Report')->middleware('Validhotelreg');


//Inquiry
Route::get('/Inquiry',[InquiryController::class,'Inquiry'])->name('Inquiry')->middleware('Validhotelreg');
Route::post('/Inquiry',[InquiryController::class,'Inquiryadd'])->name('Inquiry')->middleware('Validhotelreg');
Route::get('/Inquiryindex',[InquiryController::class,'Inquiryindex'])->name('Inquiryindex')->middleware('Validhotelreg');

//Customer
Route::get('/Customer',[CustomerRegController::class,'Customer'])->name('Customer');
Route::post('/Customer',[CustomerRegController::class,'CustomerRegadd'])->name('Customer');
Route::get('/logout',[CustomerRegController::class,'logout'])->name('logout');

//customerdash
Route::get('/Customer/customerdash', [CustomerRegController::class,'customerdash'])->name('customerdash')->middleware('ValidCustomer');
