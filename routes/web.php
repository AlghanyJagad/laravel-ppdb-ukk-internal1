<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'RegistrasiController@index')->name('home');

Route::get('siswas/cetak_pdf', 'RegistrasiController@cetak_pdf');

Route::get('siswas/cetak_pdf_perorang/{id}', 'RegistrasiController@cetak_pdf_perorang')->name('cetak_pdf_perorang');

Route::resource('registrasi', 'RegistrasiController');

