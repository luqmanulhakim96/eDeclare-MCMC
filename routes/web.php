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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/menu-utama', 'UserController@index')->name('menu-utama');

Route::get('/permohonan/form/B', 'UserController@formB')->name('user.formB');

Route::get('/permohonan/form/C', 'UserController@formC')->name('user.formC');

Route::get('/permohonan/form/D', 'UserController@formD')->name('user.formD');

Route::get('/permohonan/form/G', 'UserController@formG')->name('user.formG');

Route::get('/permohonan/hadiah', 'GiftController@giftBaru')->name('user.hadiah.gift');

Route::get('/permohonan/senarai/harta', 'UserController@senaraiHarta')->name('user.senaraiharta');

Route::get('/permohonan/senarai/hadiah', 'UserController@senaraiHadiah')->name('user.hadiah.senaraihadiah');

Route::get('/permohonan/perakuan', 'PerakuanController@perakuanBaru')->name('user.perakuanharta.formA');

Route::post('/permohonan/hantar', 'UserController@submitForm')->name('permohonan-asset-hantar');

Route::get('/profil/edit', 'UserController@editProfile')->name('user.profile');


Route::post('/hadiah/submit', 'GiftController@submitForm')->name('gift.submit');

Route::post('/hadiah/update/{id}', 'GiftController@updateHadiah')->name('gift.update');

Route::get('/hadiah/edit/{id}', 'GiftController@editHadiah')->name('user.hadiah.editgift');

Route::get('/hadiah/delete/{id}','GiftController@deleteHadiah')->name('gift.delete');

Route::post('/perakuan-harta', 'PerakuanController@submitForm')->name('perakuan.submit');




Route::get('/admin/homepage', 'AdminController@adminDashboard')->name('user.admin.view');

Route::get('/admin/system/config', 'AdminController@systemConfig')->name('user.admin.systemconfig');

Route::get('/admin/system/notification', 'AdminController@notification')->name('user.admin.notification');

Route::get('/admin/list/harta', 'AdminController@listAsset')->name('user.admin.listAsset');

Route::get('/admin/list/hadiah', 'AdminController@listGift')->name('user.admin.listGift');


Route::get('/events', 'EventController@index')->name('fullcalendar');


Route::get('/hodiv/homepage', 'HodivController@hodivDashboard')->name('user.hodiv.view');

Route::get('/hodiv/list/harta', 'HodivController@listAsset')->name('user.hodiv.listAsset');

Route::get('/hodiv/list/hadiah', 'HodivController@listGift')->name('user.hodiv.listGift');




Route::get('/integrityHOD/homepage', 'IntegrityHodController@integrityDashboard')->name('user.integrityHOD.view');

Route::get('/integrityHOD/list/harta', 'IntegrityHodController@listAsset')->name('user.integrityHOD.listAsset');

Route::get('/integrityHOD/list/hadiah', 'IntegrityHodController@listGift')->name('user.integrityHOD.listGift');


Route::get('/itadmin/homepage', 'ItAdminController@itDashboard')->name('user.it.view');

Route::get('/itadmin/background/queues', 'ItAdminController@backgroundQueues')->name('user.it.backgroundqueues');

Route::get('/itadmin/system/notification', 'ItAdminController@errorLogging')->name('user.it.errorlog');

Route::get('/itadmin/backup', 'ItAdminController@backup')->name('user.it.backup');

Route::get('/itadmin/audit', 'ItAdminController@audit')->name('user.it.audit');

Route::get('/itadmin/users', 'ItAdminController@users')->name('user.it.users');
