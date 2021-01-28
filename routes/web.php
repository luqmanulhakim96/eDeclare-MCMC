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
  // $userldap = Adldap::search()->users()->find('assetngift'); //active directory testing
  // dd($userldap);
  return view('auth/login');
});

Auth::routes();

Route::get('/notifikasi/baca/{id}', 'NotificationController@redirectNotification')->name('notification.mark-as-read');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/menu-utama', 'UserController@index')->name('menu-utama');

Route::get('/permohonan/senarai-borang-harta', 'UserController@senaraiborang')->name('user.form');

Route::get('/permohonan/senarai-borang-hadiah', 'UserController@senaraiboranghadiah')->name('user.hadiah');

Route::get('/permohonan/senarai-harta-peribadi', 'UserController@senaraisemuaharta')->name('user.senaraiharta');

Route::get('/permohonan/senarai-hadiah-peribadi', 'UserController@senaraisemuahadiah')->name('user.senaraihadiah');

Route::get('/permohonan/lampiran-B', 'FormBController@formB')->name('user.harta.FormB.formB');

Route::get('/permohonan/lampiran-C', 'FormCController@formC')->name('user.harta.FormC.formC');

Route::get('/permohonan/lampiran-D', 'FormDController@formD')->name('user.harta.FormD.formD');

Route::get('/permohonan/lampiran-G', 'FormGController@formG')->name('user.harta.FormG.formG');

Route::get('/permohonan/hadiah', 'GiftController@giftBaru')->name('user.hadiah.gift');

Route::get('/permohonanB/hadiah', 'GiftBController@giftBaru')->name('user.hadiah.giftB');

Route::get('/senarai-harta-B/kemaskini-status/id={id}', 'FormBController@kemaskini')->name('statuseditB.update');

Route::get('/senarai-harta-C/kemaskini-status/id={id}', 'FormCController@kemaskini')->name('statuseditC.update');

Route::get('/senarai-harta-D/kemaskini-status/id={id}', 'FormDController@kemaskini')->name('statuseditD.update');

Route::get('/senarai-harta-E/kemaskini-status/id={id}', 'FormGController@kemaskini')->name('statuseditG.update');

Route::get('/senarai-hadiah/kemaskini-status/id={id}', 'GiftController@kemaskini')->name('statuseditgift.update');

Route::get('/senarai-hadiah-B/kemaskini-status/id={id}', 'GiftBController@kemaskini')->name('statuseditgiftB.update');

Route::get('/hadiah/kemaskini-status/id={id}', 'AdminController@kemaskinigift')->name('statusadmineditgift.update');

Route::get('/hadiah/kemaskini-statusB/id={id}', 'AdminController@kemaskinigiftB')->name('statusadmineditgiftB.update');


Route::get('/permohonanA/pdf/{id}','UserController@createPDFA')->name('user.perakuanharta.formAprint');

Route::get('/form/printA/{id}', 'UserController@printA')->name('user.perakuanharta.print');

Route::get('/permohonan/pdf/{id}','UserController@createPDF')->name('user.harta.formBprint');

Route::get('/form/printB/{id}', 'UserController@printB')->name('user.harta.FormB.print');

Route::get('/permohonanC/pdf/{id}','UserController@createPDFC')->name('user.harta.formCprint');

Route::get('/form/printC/{id}', 'UserController@printC')->name('user.harta.FormC.print');

Route::get('/permohonanD/pdf/{id}','UserController@createPDFD')->name('user.harta.formDprint');

Route::get('/form/printD/{id}', 'UserController@printD')->name('user.harta.FormD.print');

Route::get('/permohonanG/pdf/{id}','UserController@createPDFG')->name('user.harta.formGprint');

Route::get('/form/printG/{id}', 'UserController@printG')->name('user.harta.FormG.print');

Route::get('/permohonan_hadiah/pdf/{id}','UserController@createPDFGift')->name('user.hadiah.Giftprint');

Route::get('/form/printGift/{id}', 'UserController@printGift')->name('user.hadiah.printGift');

Route::get('/permohonan_hadiah_b/pdf/{id}','UserController@createPDFGiftB')->name('user.hadiah.GiftBprint');

Route::get('/form/printGiftB/{id}', 'UserController@printGiftB')->name('user.hadiah.printGiftB');

Route::get('/senarai/permohonan/pengguna', 'AdminController@listAllUserDeclaration')->name('user.admin.senarai_user_declaration');


Route::get('/permohonan/senarai/harta', 'UserController@senaraiHarta')->name('user.harta.senaraiharta');

Route::get('/permohonan/senarai/harta-B', 'UserController@senaraiHartaB')->name('user.harta.FormB.senaraihartaB');

Route::get('/senarai/draf/harta', 'UserController@senaraiDraftHarta')->name('user.harta.senaraidraft');

Route::get('/permohonan/senarai/harta-C', 'UserController@senaraiHartaC')->name('user.harta.FormC.senaraihartaC');

Route::get('/permohonan/senarai/harta-D', 'UserController@senaraiHartaD')->name('user.harta.FormD.senaraihartaD');

Route::get('/permohonan/senarai/harta-G', 'UserController@senaraiHartaG')->name('user.harta.FormG.senaraihartaG');

Route::get('/permohonan/senarai/hadiah', 'UserController@senaraiHadiah')->name('user.hadiah.senaraihadiah');

Route::get('/senarai/draf/hadiah', 'UserController@senaraiDraftHadiah')->name('user.hadiah.senaraidraft');

Route::get('/permohonan/senarai/hadiahB', 'UserController@senaraiHadiahB')->name('user.hadiah.senaraihadiahB');

Route::get('/permohonan/lampiran-A', 'PerakuanController@perakuanBaru')->name('user.perakuanharta.formA');

Route::post('/permohonan/hantar', 'UserController@submitForm')->name('permohonan-asset-hantar');

Route::get('/profil/edit', 'UserController@editProfile')->name('user.profile');


Route::post('/hadiah-A/hantar', 'GiftController@submitForm')->name('gift.submit');

Route::post('/hadiah-A/kemaskini/id={id}', 'GiftController@updateHadiah')->name('gift.update');

Route::get('/hadiah-A/edit/id={id}', 'GiftController@editHadiah')->name('user.hadiah.editgift');

Route::get('/hadiah/lampiran-A/id={id}', 'GiftController@viewHadiah')->name('user.hadiah.viewA');

Route::get('/hadiah-A/padam/id={id}','GiftController@deleteHadiah')->name('gift.delete');

Route::post('/hadiah-B/hantar', 'GiftBController@submitForm')->name('giftB.submit');

Route::post('/hadiah-B/kemaskini/id={id}', 'GiftBController@updateHadiah')->name('giftB.update');

Route::get('/hadiah-B/edit/id={id}', 'GiftBController@editHadiah')->name('user.hadiah.editgiftB');

Route::get('/hadiah/lampiran-B/id={id}', 'GiftBController@viewHadiahB')->name('user.hadiah.viewB');

Route::get('/hadiah-B/padam/id={id}','GiftBController@deleteHadiah')->name('giftB.delete');



Route::post('/perakuan-harta', 'PerakuanController@submitForm')->name('perakuan.submit');

Route::post('/lampiran-B/hantar', 'FormBController@submitForm')->name('b.submit');

Route::get('/lampiran-B/edit/id={id}', 'FormBController@editformB')->name('user.harta.FormB.editformB');

Route::post('/lampiran-B/kemaskini/id={id}', 'FormBController@updateFormB')->name('b.update');

Route::post('/lampiran-C/hantar', 'FormCController@submitForm')->name('c.submit');

Route::get('/lampiran-C/edit/id={id}', 'FormCController@editformC')->name('user.harta.FormC.editformC');

Route::post('/lampiran-C/kemaskini/id={id}', 'FormCController@updateformC')->name('c.update');

Route::post('/lampiran-D/hantar', 'FormDController@submitForm')->name('d.submit');

Route::get('/lampiran-D/edit/id={id}', 'FormDController@editformD')->name('user.harta.FormD.editformD');

Route::post('/lampiran-D/kemaskini/id={id}', 'FormDController@updateformD')->name('d.update');

Route::post('/lampiran-G/hantar', 'FormGController@submitForm')->name('g.submit');

Route::get('/lampiran-G/edit/id={id}', 'FormGController@editformG')->name('user.harta.FormG.editformG');

Route::post('/lampiran-G/kemaskini/id={id}', 'FormGController@updateFormG')->name('g.update');

Route::get('/lampiran/A/id={id}', 'UserController@viewA')->name('user.perakuanharta.viewformA');

Route::get('/lampiran/B/id={id}', 'UserController@viewB')->name('user.harta.FormB.viewformB');

Route::get('/lampiran/C/id={id}', 'UserController@viewC')->name('user.harta.FormC.viewformC');

Route::get('/lampiran/D/id={id}', 'UserController@viewD')->name('user.harta.FormD.viewformD');

Route::get('/lampiran/G/id={id}', 'UserController@viewG')->name('user.harta.FormG.viewformG');

// Route::get('/permohonan/giftB', 'UserController@FormB')->name('user.harta.viewformB');




Route::get('/dashboard', 'AdminController@adminDashboard')->name('user.admin.view');

Route::get('/admin/emel/tambah/templat', 'AdminController@EmelTemplate')->name('user.admin.template_email');

Route::post('/admin/emel/templat/hantar', 'AdminController@submitemel')->name('email.submit');

Route::get('/emel/padam/id={id}','AdminController@deleteemel')->name('emel.delete');

Route::get('/emel/edit/id={id}','AdminController@editemel')->name('emel.edit');

Route::post('/emel/kemaskini/id={id}','AdminController@updateemel')->name('emel.update');

Route::post('/emel/tempoh/id={id}','AdminController@updateTempohNotifikasi')->name('tempoh_notifikasi.update');

Route::post('/Lampiran-B/dokumen/id={id}', 'AdminController@submitDokumenB')->name('dokumenB.submit');

Route::post('/Lampiran-C/dokumen/id={id}', 'AdminController@submitDokumenC')->name('dokumenC.submit');

Route::post('/Lampiran-D/dokumen/id={id}', 'AdminController@submitDokumenD')->name('dokumenD.submit');

Route::post('/Lampiran-G/dokumen/id={id}', 'AdminController@submitDokumenG')->name('dokumenG.submit');

Route::get('/senarai-laporan-harta', 'AdminController@senarailaporanharta')->name('user.admin.harta.senarailaporanharta');

Route::post('/form-B/ulasan/admin/id={id}', 'AdminController@updateStatusUlasanAdminB')->name('ulasanadminB.update');

Route::post('/form-C/ulasan/admin/id={id}', 'AdminController@updateStatusUlasanAdminC')->name('ulasanadminC.update');

Route::post('/form-D/ulasan/admin/id={id}', 'AdminController@updateStatusUlasanAdminD')->name('ulasanadminD.update');

Route::post('/form-G/ulasan/admin/id={id}', 'AdminController@updateStatusUlasanAdminG')->name('ulasanadminG.update');

Route::post('/Hadiah-A/ulasan/admin/id={id}', 'AdminController@updateStatusUlasanAdminGift')->name('ulasanadminGift.update');

Route::post('/Hadiah-B/ulasan/admin/id={id}', 'AdminController@updateStatusUlasanAdminGiftB')->name('ulasanadminGiftB.update');

Route::get('/admin/tetapan-sistem', 'AdminController@systemConfig')->name('user.admin.systemconfig');

Route::post('/Hadiah/nilai/admin/id={id}', 'AdminController@updateNilaiHadiah')->name('nilaiGift.update');

Route::get('/admin/sistem-notifikasi', 'AdminController@notification')->name('user.admin.notification');

Route::get('/admin/laporan-B', 'AdminController@reportB')->name('user.admin.harta.reportB');

Route::get('/admin/laporan-hadiah', 'AdminController@reportHadiah')->name('user.admin.hadiah.report');

Route::get('/admin/laporan-C', 'AdminController@reportC')->name('user.admin.harta.reportC');

Route::get('/admin/laporan-D', 'AdminController@reportD')->name('user.admin.harta.reportD');

Route::get('/admin/laporan-G', 'AdminController@reportG')->name('user.admin.harta.reportG');

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

Route::get('/lampiran/Ulasan-Hadiah-A/id={id}', 'AdminController@viewUlasanHadiah')->name('user.admin.hadiah.ulasanHadiah');

Route::get('/lampiran/Ulasan-Hadiah-B/id={id}', 'AdminController@viewUlasanHadiahB')->name('user.admin.hadiah.ulasanHadiahB');

Route::get('/lampiran/Ulasan-Harta-B/id={id}', 'AdminController@viewUlasanHartaB')->name('user.admin.harta.ulasanHartaB');

Route::get('/lampiran/Ulasan-Harta-C/id={id}', 'AdminController@viewUlasanHartaC')->name('user.admin.harta.ulasanHartaC');

Route::get('/lampiran/Ulasan-Harta-D/id={id}', 'AdminController@viewUlasanHartaD')->name('user.admin.harta.ulasanHartaD');

Route::get('/lampiran/Ulasan-Harta-G/id={id}', 'AdminController@viewUlasanHartaG')->name('user.admin.harta.ulasanHartaG');

Route::get('/senarai-harta', 'AdminController@senaraiAllForm')->name('user.admin.harta.senaraiallharta');

Route::get('/senarai-harta-ketua-jabatan', 'HodivController@senaraiAllForm')->name('user.hodiv.harta.senaraiallharta');

Route::get('/admin/senarai-harta-pengguna/id={id}', 'AdminController@senaraiAllUserForm')->name('user.admin.senaraiallharta1');

Route::get('/admin/senarai-tugasan-harta', 'AdminController@senaraiTugasanHarta')->name('user.admin.harta.senaraitugasanharta');

Route::get('/senarai-hadiah', 'AdminController@senaraiAllHadiah')->name('user.admin.hadiah.senaraiallhadiah');

Route::get('/senarai-hadiah-Ketua-Jabatan', 'HodivController@senaraiAllHadiah')->name('user.hodiv.hadiah.senaraiallhadiah');

Route::get('/admin/senarai-tugasan-hadiah', 'AdminController@senaraiTugasanHadiah')->name('user.admin.hadiah.senaraitugasanhadiah');

Route::get('/admin/senarai-harta-pegawai', 'AdminController@senaraiharta')->name('user.admin.harta.senaraiharta');

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

Route::get('/harta/kemaskini-statusB/id={id}', 'AdminController@kemaskiniB')->name('statuseditadminB.update');

Route::get('/harta/kemaskini-statusC/id={id}', 'AdminController@kemaskiniC')->name('statuseditadminC.update');

Route::get('/harta/kemaskini-statusD/id={id}', 'AdminController@kemaskiniD')->name('statuseditadminD.update');

Route::get('/harta/kemaskini-statusG/id={id}', 'AdminController@kemaskiniG')->name('statuseditadminG.update');





Route::get('/Ketua-Bahagian/senarai/harta', 'HodivController@listAsset')->name('user.hodiv.listAsset');

Route::get('/Ketua-Bahagian/senarai/hadiah', 'HodivController@listGift')->name('user.hodiv.hadiah.listGift');

Route::get('/Ketua-Bahagian/senarai/hadiah/diterima', 'HodivController@listDiterima')->name('user.hodiv.hadiah.HadiahA.listDiterima');

Route::get('/Ketua-Bahagian/senarai/hadiah/tidak-diterima', 'HodivController@listTidakDiterima')->name('user.hodiv.hadiah.HadiahA.listTidakDiterima');

Route::get('/Ketua-Bahagian/senarai/hadiah/tidak-lengkap', 'HodivController@listTidakLengkap')->name('user.hodiv.hadiah.HadiahA.listTidakLengkap');

Route::get('/Ketua-Bahagian/senarai/hadiah/Proses-Ketua-Bahagian', 'HodivController@diprosesHODIV')->name('user.hodiv.hadiah.HadiahA.diprosesHODIV');

Route::get('/Ketua-Bahagian/senarai/hadiah-B', 'HodivController@listGiftB')->name('user.hodiv.hadiah.listGiftB');

Route::post('/Lampiran-B/ulasan/Ketua-Bahagian/id={id}', 'HodivController@updateStatusUlasanHODivB')->name('ulasanHODivB.update');

Route::post('/Lampiran-C/ulasan/Ketua-Bahagian/id={id}', 'HodivController@updateStatusUlasanHODivC')->name('ulasanHODivC.update');

Route::post('/Lampiran-D/ulasan/Ketua-Bahagian/id={id}', 'HodivController@updateStatusUlasanHODivD')->name('ulasanHODivD.update');

Route::post('/Lampiran-G/ulasan/Ketua-Bahagian/id={id}', 'HodivController@updateStatusUlasanHODivG')->name('ulasanHODivG.update');

Route::post('/Hadiah-A/ulasan/Ketua-Bahagian/id={id}', 'HodivController@updateStatusUlasanHODivGift')->name('ulasanHODivGift.update');

Route::post('/Hadiah-B/ulasan/Ketua-Bahagian/id={id}', 'HodivController@updateStatusUlasanHODivGiftB')->name('ulasanHODivGiftB.update');

Route::get('/Ketua-Bahagian/senarai-hadiah', 'HodivController@senaraihadiah')->name('user.hodiv.hadiah.senaraihadiah');

Route::get('/Ketua-Bahagian/senarai-tugasan-hadiah', 'HodivController@senaraiTugasanHadiah')->name('user.hodiv.hadiah.senaraitugasanhadiah');

Route::get('/Ketua-Bahagian/senarai-tugasan-harta', 'HodivController@senaraiTugasanHarta')->name('user.hodiv.harta.senaraitugasanharta');

Route::get('/Ketua-Bahagian/Ulasan-Hadiah-A/id={id}', 'HodivController@viewUlasanHadiah')->name('user.hodiv.hadiah.ulasanHadiah');

Route::get('/Ketua-Bahagian/Ulasan-Hadiah-B/id={id}', 'HodivController@viewUlasanHadiahB')->name('user.hodiv.hadiah.ulasanHadiahB');

Route::get('/Ketua-Bahagian/Ulasan-Harta-B/id={id}', 'HodivController@viewUlasanHartaB')->name('user.hodiv.harta.ulasanHartaB');

Route::get('/Ketua-Bahagian/Ulasan-Harta-C/id={id}', 'HodivController@viewUlasanHartaC')->name('user.hodiv.harta.ulasanHartaC');

Route::get('/Ketua-Bahagian/Ulasan-Harta-D/{id}', 'HodivController@viewUlasanHartaD')->name('user.hodiv.harta.ulasanHartaD');

Route::get('/Ketua-Bahagian/Ulasan-Harta-G/id={id}', 'HodivController@viewUlasanHartaG')->name('user.hodiv.harta.ulasanHartaG');

Route::get('/Ketua-Bahagian/senarai-harta', 'HodivController@senaraiharta')->name('user.hodiv.harta.senaraiharta');

Route::get('/Ketua-Bahagian/senarai/harta-b', 'HodivController@listFormB')->name('user.hodiv.harta.senaraiformB');

Route::get('/Ketua-Bahagian/senarai/harta-c', 'HodivController@listFormC')->name('user.hodiv.harta.senaraiformC');

Route::get('/Ketua-Bahagian/senarai/harta-d', 'HodivController@listFormD')->name('user.hodiv.harta.senaraiformD');

Route::get('/Ketua-Bahagian/senarai/harta-g', 'HodivController@listFormG')->name('user.hodiv.harta.senaraiformG');





Route::get('/Ketua-Jabatan-Integriti/senarai/harta', 'IntegrityHodController@listAsset')->name('user.integrityHOD.listAsset');

Route::get('/Ketua-Jabatan-Integriti/senarai/hadiah', 'IntegrityHodController@listGift')->name('user.integrityHOD.hadiah.listGift');

Route::get('/Ketua-Jabatan-Integriti/senarai/hadiah/diterima', 'IntegrityHodController@listDiterima')->name('user.integrityHOD.hadiah.HadiahA.listDiterima');

Route::get('/Ketua-Jabatan-Integriti/senarai/hadiah/tidak-diterima', 'IntegrityHodController@listTidakDiterima')->name('user.integrityHOD.hadiah.HadiahA.listTidakDiterima');

Route::get('/Ketua-Jabatan-Integriti/senarai/hadiah/tidak-lengkap', 'IntegrityHodController@listTidakLengkap')->name('user.integrityHOD.hadiah.HadiahA.listTidakLengkap');

Route::get('/Ketua-Jabatan-Integriti/senarai/hadiah/Proses-Ketua-Bahagian', 'IntegrityHodController@diprosesHODIV')->name('user.integrityHOD.hadiah.HadiahA.diprosesHODIV');

Route::get('/Ketua-Jabatan-Integriti/senarai/hadiahB', 'IntegrityHodController@listGiftB')->name('user.integrityHOD.hadiah.listGiftB');

Route::get('/Ketua-Jabatan-Integriti/senarai-tugasan-hadiah', 'IntegrityHodController@senaraiTugasanHadiah')->name('user.integrityHOD.hadiah.senaraitugasanhadiah');

Route::get('/Ketua-Jabatan-Integriti/senarai-tugasan-harta', 'IntegrityHodController@senaraiTugasanHarta')->name('user.integrityHOD.harta.senaraitugasanharta');

Route::post('/formB/ulasan/Ketua-Jabatan-Integriti/id={id}', 'IntegrityHodController@updateStatusUlasanHODB')->name('ulasanHODB.update');

Route::post('/formC/ulasan/Ketua-Jabatan-Integriti/id={id}', 'IntegrityHodController@updateStatusUlasanHODC')->name('ulasanHODC.update');

Route::post('/formD/ulasan/Ketua-Jabatan-Integriti/id={id}', 'IntegrityHodController@updateStatusUlasanHODD')->name('ulasanHODD.update');

Route::post('/formG/ulasan/Ketua-Jabatan-Integriti/id={id}', 'IntegrityHodController@updateStatusUlasanHODG')->name('ulasanHODG.update');

Route::post('/Gift/ulasan/Ketua-Jabatan-Integriti/id={id}', 'IntegrityHodController@updateStatusUlasanHODGift')->name('ulasanHODGift.update');

Route::post('/GiftB/ulasan/Ketua-Jabatan-Integriti/id={id}', 'IntegrityHodController@updateStatusUlasanHODGiftB')->name('ulasanHODGiftB.update');

Route::get('/Ketua-Jabatan-Integriti/senarai-hadiah', 'IntegrityHodController@senaraihadiah')->name('user.integrityHOD.hadiah.senaraihadiah');

Route::get('/Ketua-Jabatan-Integriti/viewUlasanHadiah/id={id}', 'IntegrityHodController@viewUlasanHadiah')->name('user.integrityHOD.hadiah.ulasanHadiah');

Route::get('/Ketua-Jabatan-Integriti/viewUlasanHadiahB/id={id}', 'IntegrityHodController@viewUlasanHadiahB')->name('user.integrityHOD.hadiah.ulasanHadiahB');

Route::get('/Ketua-Jabatan-Integriti/Ulasan-Harta-B/id={id}', 'IntegrityHodController@viewUlasanHartaB')->name('user.integrityHOD.harta.ulasanHartaB');

Route::get('/Ketua-Jabatan-Integriti/Ulasan-Harta-C/id={id}', 'IntegrityHodController@viewUlasanHartaC')->name('user.integrityHOD.harta.ulasanHartaC');

Route::get('/Ketua-Jabatan-Integriti/Ulasan-Harta-D/id={id}', 'IntegrityHodController@viewUlasanHartaD')->name('user.integrityHOD.harta.ulasanHartaD');

Route::get('/Ketua-Jabatan-Integriti/Ulasan-Harta-G/id={id}', 'IntegrityHodController@viewUlasanHartaG')->name('user.integrityHOD.harta.ulasanHartaG');

Route::get('/Ketua-Jabatan-Integriti/senaraiharta', 'IntegrityHodController@senaraiharta')->name('user.integrityHOD.harta.senaraiharta');

Route::get('/Ketua-Jabatan-Integriti/senarai/harta/b', 'IntegrityHodController@listFormB')->name('user.integrityHOD.harta.senaraiformB');

Route::get('/Ketua-Jabatan-Integriti/senarai/harta/c', 'IntegrityHodController@listFormC')->name('user.integrityHOD.harta.senaraiformC');

Route::get('/Ketua-Jabatan-Integriti/senarai/harta/d', 'IntegrityHodController@listFormD')->name('user.integrityHOD.harta.senaraiformD');

Route::get('/Ketua-Jabatan-Integriti/senarai/harta/g', 'IntegrityHodController@listFormG')->name('user.integrityHOD.harta.senaraiformG');


// IT ADMIN ROUTES
Route::get('/itadmin/homepage','ItAdminController@itDashboard')->name('user.it.view');

Route::get('/itadmin/sistem-konfigurasi', 'ItAdminController@SistemKonfigurasi')->name('user.it.sistemkonfigurasi');

Route::get('/itadmin/background/queues', 'ItAdminController@backgroundQueues')->name('user.it.backgroundqueues');

// Route::get('/itadmin/system/notification', 'ItAdminController@errorLogging')->name('user.it.errorlog');

Route::get('/itadmin/backup', 'ItAdminController@backup')->name('user.it.backup');

Route::get('/itadmin/backup/run/full', 'ItAdminController@backupRun')->name('user.it.backup.run');

Route::get('/itadmin/backup/run//database', 'ItAdminController@backupRunDatabase')->name('user.it.backup.run-database');

Route::get('/itadmin/backup/run/system', 'ItAdminController@backupRunSystem')->name('user.it.backup.run-system');

Route::get('/itadmin/backup/download/{filename}', 'ItAdminController@backupDownload')->name('user.it.backup.download');

Route::get('/itadmin/audit', 'ItAdminController@audit')->name('user.it.audit');

Route::get('/itadmin/audit/user', 'ItAdminController@auditTrailLogUser')->name('user.it.auditUser');

Route::get('/itadmin/users', 'ItAdminController@users')->name('user.it.users');

Route::get('/itadmin/users/deactivate/{id}', 'ItAdminController@userDelete')->name('user.it.users.deactivate');

Route::post('/itadmin/users/id={id}', 'ItAdminController@updateUserRole')->name('user.update');

Route::get('/itadmin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('user.it.errorlog');


Route::post('/itadmin/sistem-konfigurasi/kemaskini', 'ItAdminController@updateLayout')->name('layout.update');

// Route::post('/itadmin/sistem-konfigurasi/hantar', 'ItAdminController@submitlayout')->name('layout.submit');

Route::get('/itadmin/configure', 'ItAdminController@konfigurasiSistem')->name('user.it.konfigurasi');

Route::post('/itadmin/configure/edit', 'ItAdminController@editKonfigurasiSistem')->name('user.it.konfigurasi.edit');


// Route::prefix('jobs')->group(function () {
//     Route::queueMonitor();
// });


Route::get('/formBs', 'AssetController@createStep1')->name('asset.create');

Route::post('/formB', 'AssetController@PostcreateStep1')->name('asset.post');

Route::get('/formCs', 'AssetController@createStep2')->name('asset.create2');

Route::post('/formC', 'AssetController@PostcreateStep2')->name('asset.post2');

Route::get('/formDs', 'AssetController@createStep3')->name('asset.create3');

Route::post('/formD', 'AssetController@PostcreateStep3')->name('asset.post3');

Route::get('/formGs', 'AssetController@createStep4')->name('asset.create4');

Route::post('/formG', 'AssetController@PostcreateStep4')->name('asset.post4');
