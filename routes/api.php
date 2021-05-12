<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group([
    'middleware'=>'api',
    'namespace'=>'App\Http\Controllers',
    'prefix'=> 'auth'
],function($router){
    Route::post('login','AuthController@login');
    Route::post('register','AuthController@register');
    Route::post('logout','AuthController@logout');
    Route::get('profile','AuthController@profile');
    Route::post('refresh','AuthController@refresh');
});
Route::group([
    'middleware'=>'api',
    'namespace'=>'App\Http\Controllers',
],function($router){
    Route::resource('employee','EmployeeController');
    Route::resource('bank','BankInfoController');
    Route::post('salary','SalaryController@salary');
    Route::post('resalary','SalaryController@onSaveLast');
    Route::get('getBank','BankInfoController@get_bank');
    Route::get('salarySheet','SalaryController@salarySheet');
    Route::get('getBankSalary','BankInfoController@get_bank_salary');
});
