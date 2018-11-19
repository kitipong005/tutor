<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'IndexController@index')->name('index');

Route::get('/login', 'LoginController@showLoginForm')->name('login');
Route::post('/login', 'LoginController@login');

Route::get('/term-add', 'CourseController@Show_TermAddForm')->name('term.add');
Route::post('/term-add', 'CourseController@TermAdd');

//--------------- Delete Term ----------------------
Route::get('/term-del', 'CourseController@Show_TermDelForm')->name('term.del');
Route::delete('/term-destroy/{id}', 'CourseController@destroy_Term');

Route::get('/register', 'RegisterController@ShowRegisForm')->name('register');
Route::post('/register', 'RegisterController@register');

Route::get('/subj-name', 'StdController@ShowNameStdForm')->name('subj.name');
Route::post('/std-name', 'StdController@get_name_ajax')->name('get-name');
Route::get('/pay-conf', 'StdController@Payment_conf')->name('payconf');

Route::get('/subj-name-conf', 'StdController@ShowNameStdForm_Conf')->name('subj.name.conf');
Route::post('/std-name-conf', 'StdController@get_name_ajax_conf')->name('get-name-conf');

//---------------- Edit User-----------------------
Route::get('/edit-name-std', 'StdController@ShowEditNameStd')->name('edit.name');
Route::patch('/edit-name-std', 'StdController@update_data_std');

//----------------- Delete User --------------------
Route::get('/delete-name-std', 'StdController@dalete_data_std')->name('delete.name');

Route::get('/pdf', 'PDFController@generate_pdf')->name('reportbill');

//--------------- admin ------------------------------
Route::get('/admin-login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin-login', 'Admin\AdminLoginController@login');
Route::get('/admin-user', 'Admin\UserController@user')->name('admin.user');
Route::get('/admin-adduser', 'Admin\UserController@add_user')->name('admin.adduser');
Route::post('/admin-adduser', 'Admin\UserController@register');
//--------------- lsit course ------------------------
Route::get('/admin-listcourse', 'Admin\ReportController@ShowReportForm')->name('admin.listcourse');

Route::get('admin-map', 'Admin\MapController@location')->name('admin.map');

Route::get('/logout', 'LogoutController@logout');
