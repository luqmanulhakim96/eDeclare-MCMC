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

Route::get('/permohonan/senaraiborang', 'UserController@senaraiborang')->name('user.form');

Route::get('/permohonan/senaraiboranghadiah', 'UserController@senaraiboranghadiah')->name('user.hadiah');

Route::get('/permohonan/senaraiharta', 'UserController@senaraisemuaharta')->name('user.senaraiharta');

Route::get('/permohonan/senaraihadiah', 'UserController@senaraisemuahadiah')->name('user.senaraihadiah');

Route::get('/permohonan/form/B', 'FormBController@formB')->name('user.harta.FormB.formB');

Route::get('/permohonan/form/C', 'FormCController@formC')->name('user.harta.FormC.formC');

Route::get('/permohonan/form/D', 'FormDController@formD')->name('user.harta.FormD.formD');

Route::get('/permohonan/form/G', 'FormGController@formG')->name('user.harta.FormG.formG');

Route::get('/permohonan/hadiah', 'GiftController@giftBaru')->name('user.hadiah.gift');

Route::get('/permohonanB/hadiah', 'GiftBController@giftBaru')->name('user.hadiah.giftB');

Route::get('/permohonan/senarai/harta', 'UserController@senaraiHarta')->name('user.harta.senaraiharta');

Route::get('/permohonan/senarai/hartaB', 'UserController@senaraiHartaB')->name('user.harta.FormB.senaraihartaB');

Route::get('/permohonan/senarai/hartaC', 'UserController@senaraiHartaC')->name('user.harta.FormC.senaraihartaC');

Route::get('/permohonan/senarai/hartaD', 'UserController@senaraiHartaD')->name('user.harta.FormD.senaraihartaD');

Route::get('/permohonan/senarai/hartaG', 'UserController@senaraiHartaG')->name('user.harta.FormG.senaraihartaG');

Route::get('/permohonan/senarai/hadiah', 'UserController@senaraiHadiah')->name('user.hadiah.senaraihadiah');

Route::get('/permohonan/senarai/hadiahB', 'UserController@senaraiHadiahB')->name('user.hadiah.senaraihadiahB');

Route::get('/permohonan/perakuan', 'PerakuanController@perakuanBaru')->name('user.perakuanharta.formA');

Route::post('/permohonan/hantar', 'UserController@submitForm')->name('permohonan-asset-hantar');

Route::get('/profil/edit', 'UserController@editProfile')->name('user.profile');


Route::post('/hadiah/submit', 'GiftController@submitForm')->name('gift.submit');

Route::post('/hadiah/update/{id}', 'GiftController@updateHadiah')->name('gift.update');

Route::get('/hadiah/edit/{id}', 'GiftController@editHadiah')->name('user.hadiah.editgift');

Route::get('/hadiah/delete/{id}','GiftController@deleteHadiah')->name('gift.delete');

Route::post('/hadiahB/submit', 'GiftBController@submitForm')->name('giftB.submit');

Route::post('/hadiahB/update/{id}', 'GiftBController@updateHadiah')->name('giftB.update');

Route::get('/hadiahB/edit/{id}', 'GiftBController@editHadiah')->name('user.hadiah.editgiftB');

Route::get('/hadiahB/delete/{id}','GiftBController@deleteHadiah')->name('giftB.delete');



Route::post('/perakuan-harta', 'PerakuanController@submitForm')->name('perakuan.submit');

Route::post('/formB/submit', 'FormBController@submitForm')->name('b.submit');

Route::get('/formB/edit/{id}', 'FormBController@editformB')->name('user.harta.FormB.editformB');

Route::post('/formB/update/{id}', 'FormBController@updateFormB')->name('b.update');

Route::post('/formC/submit', 'FormCController@submitForm')->name('c.submit');

Route::get('/formC/edit/{id}', 'FormCController@editformC')->name('user.harta.FormC.editformC');

Route::post('/formC/update/{id}', 'FormCController@updateformC')->name('c.update');

Route::post('/formD/submit', 'FormDController@submitForm')->name('d.submit');

Route::get('/formD/edit/{id}', 'FormDController@editformD')->name('user.harta.FormD.editformD');

Route::post('/formD/update/{id}', 'FormDController@updateformD')->name('d.update');

Route::post('/formG/submit', 'FormGController@submitForm')->name('g.submit');

Route::get('/formG/edit/{id}', 'FormGController@editformG')->name('user.harta.FormG.editformG');

Route::post('/formG/update/{id}', 'FormGController@updateFormG')->name('g.update');

Route::get('/form/viewB/{id}', 'UserController@viewB')->name('user.harta.FormB.viewformB');

Route::get('/form/viewC/{id}', 'UserController@viewC')->name('user.harta.FormC.viewformC');

Route::get('/form/viewD/{id}', 'UserController@viewD')->name('user.harta.FormD.viewformD');

Route::get('/form/viewG/{id}', 'UserController@viewG')->name('user.harta.FormG.viewformG');

// Route::get('/permohonan/giftB', 'UserController@FormB')->name('user.harta.viewformB');




Route::get('/admin/homepage', 'AdminController@adminDashboard')->name('user.admin.view');

Route::post('/formB/ulasan/admin/{id}', 'AdminController@updateStatusUlasanAdminB')->name('ulasanadminB.update');

Route::post('/formC/ulasan/admin/{id}', 'AdminController@updateStatusUlasanAdminC')->name('ulasanadminC.update');

Route::post('/formD/ulasan/admin/{id}', 'AdminController@updateStatusUlasanAdminD')->name('ulasanadminD.update');

Route::post('/formG/ulasan/admin/{id}', 'AdminController@updateStatusUlasanAdminG')->name('ulasanadminG.update');

Route::post('/Gift/ulasan/admin/{id}', 'AdminController@updateStatusUlasanAdminGift')->name('ulasanadminGift.update');

Route::post('/GiftB/ulasan/admin/{id}', 'AdminController@updateStatusUlasanAdminGiftB')->name('ulasanadminGiftB.update');

Route::get('/admin/system/config', 'AdminController@systemConfig')->name('user.admin.systemconfig');

Route::post('/Gift/nilai/admin/{id}', 'AdminController@updateNilaiHadiah')->name('nilaiGift.update');

Route::get('/admin/system/notification', 'AdminController@notification')->name('user.admin.notification');

Route::get('/admin/list/harta', 'AdminController@listAsset')->name('user.admin.listAsset');

Route::get('/admin/list/hadiah', 'AdminController@listGift')->name('user.admin.hadiah.listGift');

Route::get('/admin/list/hadiah/diterima', 'AdminController@listDiterima')->name('user.admin.hadiah.HadiahA.listDiterima');

Route::get('/admin/list/hadiah/tidak-diterima', 'AdminController@listTidakDiterima')->name('user.admin.hadiah.HadiahA.listTidakDiterima');

Route::get('/admin/list/hadiah/tidak-lengkap', 'AdminController@listTidakLengkap')->name('user.admin.hadiah.HadiahA.listTidakLengkap');

Route::get('/admin/list/hadiah/Proses-Ketua-Bahagian', 'AdminController@diprosesHODIV')->name('user.admin.hadiah.HadiahA.diprosesHODIV');

Route::get('/admin/list/HadiahB/tidak-lengkap', 'AdminController@listTidakLengkapB')->name('user.admin.hadiah.HadiahB.listTidakLengkap');

Route::get('/admin/list/HadiahB/tidak-diterima', 'AdminController@listTidakDiterimaB')->name('user.admin.hadiah.HadiahB.listTidakDiterima');

Route::get('/admin/list/HadiahB/diterima', 'AdminController@listDiterimaB')->name('user.admin.hadiah.HadiahB.listDiterima');

Route::get('/admin/list/hadiahB', 'AdminController@listGiftB')->name('user.admin.hadiah.listGiftB');

Route::get('/admin/senaraihadiah', 'AdminController@senaraihadiah')->name('user.admin.hadiah.senaraihadiah');

Route::get('/form/viewUlasanHadiah/{id}', 'AdminController@viewUlasanHadiah')->name('user.admin.hadiah.ulasanHadiah');

Route::get('/form/viewUlasanHadiahB/{id}', 'AdminController@viewUlasanHadiahB')->name('user.admin.hadiah.ulasanHadiahB');

Route::get('/form/viewUlasanHartaB/{id}', 'AdminController@viewUlasanHartaB')->name('user.admin.harta.ulasanHartaB');

Route::get('/form/viewUlasanHartaC/{id}', 'AdminController@viewUlasanHartaC')->name('user.admin.harta.ulasanHartaC');

Route::get('/form/viewUlasanHartaD/{id}', 'AdminController@viewUlasanHartaD')->name('user.admin.harta.ulasanHartaD');

Route::get('/form/viewUlasanHartaG/{id}', 'AdminController@viewUlasanHartaG')->name('user.admin.harta.ulasanHartaG');

Route::get('/admin/senaraiharta', 'AdminController@senaraiharta')->name('user.admin.harta.senaraiharta');

Route::get('/admin/list/harta/b/sedang-diproses', 'AdminController@listFormB')->name('user.admin.harta.listB.senaraiformB');

Route::get('/admin/list/harta/b/proses-tatatertib', 'AdminController@listformBupload')->name('user.admin.harta.listB.upload');

Route::get('/admin/list/harta/b/diterima', 'AdminController@listformBDiterima')->name('user.admin.harta.listB.Diterima');

Route::get('/admin/list/harta/b/tidak-lengkap', 'AdminController@listformBTidakLengkap')->name('user.admin.harta.listB.TidakLengkap');

Route::get('/admin/list/harta/b/tidak-diterima', 'AdminController@listformBTidakDiterima')->name('user.admin.harta.listB.TidakDiterima');

Route::get('/admin/list/harta/b/proses-ke-Ketua-Jabatan-Integriti', 'AdminController@listFormBProsesHOD')->name('user.admin.harta.listB.ProsesHOD');

Route::get('/admin/list/harta/c/sedang-diproses', 'AdminController@listFormC')->name('user.admin.harta.listC.senaraiformC');

Route::get('/admin/list/harta/c/proses-tatatertib', 'AdminController@listformCupload')->name('user.admin.harta.listC.upload');

Route::get('/admin/list/harta/c/diterima', 'AdminController@listformCDiterima')->name('user.admin.harta.listC.Diterima');

Route::get('/admin/list/harta/c/tidak-lengkap', 'AdminController@listformCTidakLengkap')->name('user.admin.harta.listC.TidakLengkap');

Route::get('/admin/list/harta/c/tidak-diterima', 'AdminController@listformCTidakDiterima')->name('user.admin.harta.listC.TidakDiterima');

Route::get('/admin/list/harta/c/proses-ke-Ketua-Jabatan-Integriti', 'AdminController@listFormCProsesHOD')->name('user.admin.harta.listC.ProsesHOD');

Route::get('/admin/list/harta/d/sedang-diproses', 'AdminController@listFormD')->name('user.admin.harta.listD.senaraiformD');

Route::get('/admin/list/harta/d/proses-tatatertib', 'AdminController@listformDupload')->name('user.admin.harta.listD.upload');

Route::get('/admin/list/harta/d/diterima', 'AdminController@listformDDiterima')->name('user.admin.harta.listD.Diterima');

Route::get('/admin/list/harta/d/tidak-lengkap', 'AdminController@listformDTidakLengkap')->name('user.admin.harta.listD.TidakLengkap');

Route::get('/admin/list/harta/d/tidak-diterima', 'AdminController@listformDTidakDiterima')->name('user.admin.harta.listD.TidakDiterima');

Route::get('/admin/list/harta/d/proses-ke-Ketua-Jabatan-Integriti', 'AdminController@listFormDProsesHOD')->name('user.admin.harta.listD.ProsesHOD');

Route::get('/admin/list/harta/g/sedang-diproses', 'AdminController@listFormG')->name('user.admin.harta.listG.senaraiformG');

Route::get('/admin/list/harta/g/proses-tatatertib', 'AdminController@listformGupload')->name('user.admin.harta.listG.upload');

Route::get('/admin/list/harta/g/diterima', 'AdminController@listformGDiterima')->name('user.admin.harta.listG.Diterima');

Route::get('/admin/list/harta/g/tidak-lengkap', 'AdminController@listformGTidakLengkap')->name('user.admin.harta.listG.TidakLengkap');

Route::get('/admin/list/harta/g/tidak-diterima', 'AdminController@listformGTidakDiterima')->name('user.admin.harta.listG.TidakDiterima');

Route::get('/admin/list/harta/g/proses-ke-Ketua-Jabatan-Integriti', 'AdminController@listFormGProsesHOD')->name('user.admin.harta.listG.ProsesHOD');

Route::post('/jenis-hadiah/submit', 'AdminController@submitJenisHadiah')->name('jenishadiah.submit');

Route::post('/jenis-harta/submit', 'AdminController@submitJenisHarta')->name('jenisharta.submit');

Route::post('/jenis-hadiah/delete','AdminController@deleteJenisHadiah')->name('jenishadiah.delete');

Route::post('/jenis-harta/delete','AdminController@deleteJenisHarta')->name('jenisharta.delete');





Route::get('/events', 'EventController@index')->name('fullcalendar');


Route::get('/hodiv/homepage', 'HodivController@hodivDashboard')->name('user.hodiv.view');

Route::get('/hodiv/list/harta', 'HodivController@listAsset')->name('user.hodiv.listAsset');

Route::get('/hodiv/list/hadiah', 'HodivController@listGift')->name('user.hodiv.hadiah.listGift');

Route::get('/hodiv/list/hadiah/diterima', 'HodivController@listDiterima')->name('user.hodiv.hadiah.HadiahA.listDiterima');

Route::get('/hodiv/list/hadiah/tidak-diterima', 'HodivController@listTidakDiterima')->name('user.hodiv.hadiah.HadiahA.listTidakDiterima');

Route::get('/hodiv/list/hadiah/tidak-lengkap', 'HodivController@listTidakLengkap')->name('user.hodiv.hadiah.HadiahA.listTidakLengkap');

Route::get('/hodiv/list/hadiah/Proses-Ketua-Bahagian', 'HodivController@diprosesHODIV')->name('user.hodiv.hadiah.HadiahA.diprosesHODIV');

Route::get('/hodiv/list/hadiahB', 'HodivController@listGiftB')->name('user.hodiv.hadiah.listGiftB');

Route::post('/formB/ulasan/hodiv/{id}', 'HodivController@updateStatusUlasanHODivB')->name('ulasanHODivB.update');

Route::post('/formC/ulasan/hodiv/{id}', 'HodivController@updateStatusUlasanHODivC')->name('ulasanHODivC.update');

Route::post('/formD/ulasan/hodiv/{id}', 'HodivController@updateStatusUlasanHODivD')->name('ulasanHODivD.update');

Route::post('/formG/ulasan/hodiv/{id}', 'HodivController@updateStatusUlasanHODivG')->name('ulasanHODivG.update');

Route::post('/Gift/ulasan/hodiv/{id}', 'HodivController@updateStatusUlasanHODivGift')->name('ulasanHODivGift.update');

Route::post('/GiftB/ulasan/hodiv/{id}', 'HodivController@updateStatusUlasanHODivGiftB')->name('ulasanHODivGiftB.update');

Route::get('/hodiv/senaraihadiah', 'HodivController@senaraihadiah')->name('user.hodiv.hadiah.senaraihadiah');

Route::get('/hodiv/viewUlasanHadiah/{id}', 'HodivController@viewUlasanHadiah')->name('user.hodiv.hadiah.ulasanHadiah');

Route::get('/hodiv/viewUlasanHadiahB/{id}', 'HodivController@viewUlasanHadiahB')->name('user.hodiv.hadiah.ulasanHadiahB');

Route::get('/hodiv/viewUlasanHartaB/{id}', 'HodivController@viewUlasanHartaB')->name('user.hodiv.harta.ulasanHartaB');

Route::get('/hodiv/viewUlasanHartaC/{id}', 'HodivController@viewUlasanHartaC')->name('user.hodiv.harta.ulasanHartaC');

Route::get('/hodiv/viewUlasanHartaD/{id}', 'HodivController@viewUlasanHartaD')->name('user.hodiv.harta.ulasanHartaD');

Route::get('/hodiv/viewUlasanHartaG/{id}', 'HodivController@viewUlasanHartaG')->name('user.hodiv.harta.ulasanHartaG');

Route::get('/hodiv/senaraiharta', 'HodivController@senaraiharta')->name('user.hodiv.harta.senaraiharta');

Route::get('/hodiv/list/harta/b', 'HodivController@listFormB')->name('user.hodiv.harta.senaraiformB');

Route::get('/hodiv/list/harta/c', 'HodivController@listFormC')->name('user.hodiv.harta.senaraiformC');

Route::get('/hodiv/list/harta/d', 'HodivController@listFormD')->name('user.hodiv.harta.senaraiformD');

Route::get('/hodiv/list/harta/g', 'HodivController@listFormG')->name('user.hodiv.harta.senaraiformG');




Route::get('/integrityHOD/homepage', 'IntegrityHodController@integrityDashboard')->name('user.integrityHOD.view');

Route::get('/integrityHOD/list/harta', 'IntegrityHodController@listAsset')->name('user.integrityHOD.listAsset');

Route::get('/integrityHOD/list/hadiah', 'IntegrityHodController@listGift')->name('user.integrityHOD.hadiah.listGift');

Route::get('/integrityHOD/list/hadiah/diterima', 'IntegrityHodController@listDiterima')->name('user.integrityHOD.hadiah.HadiahA.listDiterima');

Route::get('/integrityHOD/list/hadiah/tidak-diterima', 'IntegrityHodController@listTidakDiterima')->name('user.integrityHOD.hadiah.HadiahA.listTidakDiterima');

Route::get('/integrityHOD/list/hadiah/tidak-lengkap', 'IntegrityHodController@listTidakLengkap')->name('user.integrityHOD.hadiah.HadiahA.listTidakLengkap');

Route::get('/integrityHOD/list/hadiah/Proses-Ketua-Bahagian', 'IntegrityHodController@diprosesHODIV')->name('user.integrityHOD.hadiah.HadiahA.diprosesHODIV');

Route::get('/integrityHOD/list/hadiahB', 'IntegrityHodController@listGiftB')->name('user.integrityHOD.hadiah.listGiftB');

Route::post('/formB/ulasan/integrityHOD/{id}', 'IntegrityHodController@updateStatusUlasanHODB')->name('ulasanHODB.update');

Route::post('/formC/ulasan/integrityHOD/{id}', 'IntegrityHodController@updateStatusUlasanHODC')->name('ulasanHODC.update');

Route::post('/formD/ulasan/integrityHOD/{id}', 'IntegrityHodController@updateStatusUlasanHODD')->name('ulasanHODD.update');

Route::post('/formG/ulasan/integrityHOD/{id}', 'IntegrityHodController@updateStatusUlasanHODG')->name('ulasanHODG.update');

Route::post('/Gift/ulasan/integrityHOD/{id}', 'IntegrityHodController@updateStatusUlasanHODGift')->name('ulasanHODGift.update');

Route::post('/GiftB/ulasan/integrityHOD/{id}', 'IntegrityHodController@updateStatusUlasanHODGiftB')->name('ulasanHODGiftB.update');

Route::get('/integrityHOD/senaraihadiah', 'IntegrityHodController@senaraihadiah')->name('user.integrityHOD.hadiah.senaraihadiah');

Route::get('/integrityHOD/viewUlasanHadiah/{id}', 'IntegrityHodController@viewUlasanHadiah')->name('user.integrityHOD.hadiah.ulasanHadiah');

Route::get('/integrityHOD/viewUlasanHadiahB/{id}', 'IntegrityHodController@viewUlasanHadiahB')->name('user.integrityHOD.hadiah.ulasanHadiahB');

Route::get('/integrityHOD/viewUlasanHartaB/{id}', 'IntegrityHodController@viewUlasanHartaB')->name('user.integrityHOD.harta.ulasanHartaB');

Route::get('/integrityHOD/viewUlasanHartaC/{id}', 'IntegrityHodController@viewUlasanHartaC')->name('user.integrityHOD.harta.ulasanHartaC');

Route::get('/integrityHOD/viewUlasanHartaD/{id}', 'IntegrityHodController@viewUlasanHartaD')->name('user.integrityHOD.harta.ulasanHartaD');

Route::get('/integrityHOD/viewUlasanHartaG/{id}', 'IntegrityHodController@viewUlasanHartaG')->name('user.integrityHOD.harta.ulasanHartaG');

Route::get('/integrityHOD/senaraiharta', 'IntegrityHodController@senaraiharta')->name('user.integrityHOD.harta.senaraiharta');

Route::get('/integrityHOD/list/harta/b', 'IntegrityHodController@listFormB')->name('user.integrityHOD.harta.senaraiformB');

Route::get('/integrityHOD/list/harta/c', 'IntegrityHodController@listFormC')->name('user.integrityHOD.harta.senaraiformC');

Route::get('/integrityHOD/list/harta/d', 'IntegrityHodController@listFormD')->name('user.integrityHOD.harta.senaraiformD');

Route::get('/integrityHOD/list/harta/g', 'IntegrityHodController@listFormG')->name('user.integrityHOD.harta.senaraiformG');


// IT ADMIN ROUTES
Route::get('/itadmin/homepage', 'ItAdminController@itDashboard')->name('user.it.view');

Route::get('/itadmin/background/queues', 'ItAdminController@backgroundQueues')->name('user.it.backgroundqueues');

// Route::get('/itadmin/system/notification', 'ItAdminController@errorLogging')->name('user.it.errorlog');

Route::get('/itadmin/backup', 'ItAdminController@backup')->name('user.it.backup');

Route::get('/itadmin/audit', 'ItAdminController@audit')->name('user.it.audit');

Route::get('/itadmin/users', 'ItAdminController@users')->name('user.it.users');

Route::get('/itadmin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('user.it.errorlog');

Route::prefix('jobs')->group(function () {
    Route::queueMonitor();
});


Route::get('/formBs', 'AssetController@createStep1')->name('asset.create');

Route::post('/formB', 'AssetController@PostcreateStep1')->name('asset.post');

Route::get('/formCs', 'AssetController@createStep2')->name('asset.create2');

Route::post('/formC', 'AssetController@PostcreateStep2')->name('asset.post2');

Route::get('/formDs', 'AssetController@createStep3')->name('asset.create3');

Route::post('/formD', 'AssetController@PostcreateStep3')->name('asset.post3');

Route::get('/formGs', 'AssetController@createStep4')->name('asset.create4');

Route::post('/formG', 'AssetController@PostcreateStep4')->name('asset.post4');
