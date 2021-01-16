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

Route::get('/', 'Auth\Auth_Controller@login');

//Login Register
Route::get('/login', 'Auth\Auth_Controller@login');
Route::get('/admin', 'Auth\Auth_Controller@admin');
Route::get('/register', 'Auth\Auth_Controller@register');
Route::get('/logout', 'Auth\Auth_Controller@logout');
Route::get('/logout_admin', 'Auth\Auth_Controller@logout_admin');
Route::post('/register/execute', 'Auth\Auth_Controller@register_execute');
Route::post('/login/execute', 'Auth\Auth_Controller@login_execute');
Route::post('/login_admin/execute', 'Auth\Auth_Controller@login_admin_execute');

//Dashboard User
Route::get('/user/dashboard/{semester}', 'Dashboard\User_Controller@main');
Route::post('/bayar_semester', 'Dashboard\User_Controller@bayar_semester');
Route::post('/bayar_tunggak_semester', 'Dashboard\User_Controller@bayar_tunggak_semester');

//Dashboard Admin
Route::get('/admin/dashboard', 'Dashboard\Admin_Controller@main');
Route::get('/admin/addGeneration', 'Dashboard\Admin_Controller@formAddGeneration');
Route::get('/admin/addPayment/{generation_id}', 'Dashboard\Admin_Controller@formAddPayment');
Route::get('/admin/setPayment/{generation_id}', 'Dashboard\Admin_Controller@setPaymentForm');
Route::get('/admin/studentList/{generation_id}', 'Dashboard\Admin_Controller@studentList');
Route::get('/admin/paymentList/{generation_id}', 'Dashboard\Admin_Controller@paymentList');
Route::get('/generationEdit/{generation_id}', 'Dashboard\Admin_Controller@edit_generation');
Route::get('/userEdit/{nim}', 'Dashboard\Admin_Controller@edit_user');
Route::get('/deleteGeneration/{generation_id}', 'Dashboard\Admin_Controller@delete_generation');
Route::post('/tambah_angkatan', 'Dashboard\Admin_Controller@tambah_angkatan');
Route::post('/tambah_pembayaran', 'Dashboard\Admin_Controller@tambah_pembayaran');
Route::post('/tambah_pembayaran_semester', 'Dashboard\Admin_Controller@tambah_pembayaran_semester');
Route::post('/edit_angkatan/{generation_id}', 'Dashboard\Admin_Controller@edit_generation_execute');
Route::post('/editUser/execute', 'Dashboard\Admin_Controller@edit_user_execute');