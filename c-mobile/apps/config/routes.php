<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "Default/Auth";
$route['404_override'] = '';
$route['login'] 		= 'Default/Auth';
$route['logout'] = 'Auth/logout';


/*   route modul profile */
$route['profile'] = 'Setting/Profile/index';


/*   route modul dashboard  */
$route['dashboard'] = 'Support/Dashboard/index';



/*   route modul menu  */
$route['menu'] = 'Setting/Menu/index';
$route['icon'] = 'Setting/Menu/icon';
$route['add-menu'] = 'Setting/Menu/add';
$route['edit-menu/(:any)'] = 'Setting/Menu/edit/$1';


/*   route modul user  */
$route['user'] = 'Setting/User/index';
$route['add-user'] = 'Setting/User/add';
$route['edit-user/(:any)'] = 'Setting/User/edit/$1';


/*   route modul grup  */
$route['user-grup'] = 'Setting/Grup/index';
$route['add-grup'] = 'Setting/Grup/add';
$route['edit-grup/(:any)'] = 'Setting/Grup/edit/$1';


/*    route modul Akses  */
$route['hak-akses/(:any)'] = 'Setting/Akses/hak_akses/$1';


/*   route modul kategori   */
$route['studi'] =   'Category/Studi/index';
$route['add-studi'] = 'Category/Studi/add';
$route['edit-studi/(:any)'] = 'Category/Studi/edit/$1';


/*   route modul kategori   */
$route['kat-fasilitas'] =   'Category/Cat_fasilitas/index';
$route['add-kat-fasilitas'] = 'Category/Cat_fasilitas/add';
$route['edit-kat-fasilitas/(:any)'] = 'Category/Cat_fasilitas/edit/$1';

/*   route modul master trainer*/
$route['trainer'] =   'Category/Trainer/index';
$route['add-trainer'] = 'Category/Trainer/add';
$route['edit-trainer/(:any)'] = 'Category/Trainer/edit/$1';
$route['history-trainer/(:any)'] = 'Category/Trainer/history/$1';
$route['honor'] =   'Category/Honor/index';
$route['add-honor'] =   'Category/Honor/add';
$route['edit-honor/(:any)'] = 'Category/Honor/edit/$1';
$route['tambah-login-tentor/(:any)'] = 'Category/Trainer/tambah_login_tentor/$1';
$route['edit-login-tentor/(:any)'] = 'Category/Trainer/edit_login_tentor/$1';
$route['add-history-siswa'] = 'Siswa/Siswa_aktif/add_history_siswa';

/*   route modul master fasilitas   */
$route['fasilitas'] =   'Master/Fasilitas/index';
$route['add-fasilitas'] = 'Master/Fasilitas/add';
$route['edit-fasilitas/(:any)'] = 'Master/Fasilitas/edit/$1';

/*   route modul master gallery   */
$route['galeri'] =   'Master/Galeri/index';
$route['add-galeri'] = 'Master/Galeri/add';
$route['edit-galeri/(:any)'] = 'Master/Galeri/edit/$1';


/*   route modul master promo  */
$route['promo'] =   'Master/Promo/index';
$route['add-promo'] = 'Master/Promo/add';
$route['edit-promo/(:any)'] = 'Master/Promo/edit/$1';


/*   route modul master loker*/
$route['loker'] =   'Master/Loker/index';
$route['add-loker'] = 'Master/Loker/add';
$route['edit-loker/(:any)'] = 'Master/Loker/edit/$1';

/*   route modul master Pendaftaran*/
$route['daftar'] =   'Master/Daftar/index';
$route['add-daftar-baru'] = 'Master/Daftar/add_baru';
$route['add-daftar-lama'] = 'Master/Daftar/add_lama';
$route['edit-daftar/(:any)'] = 'Master/Daftar/edit/$1';
$route['view-daftar/(:any)'] = 'Master/Daftar/view/$1';
$route['batal-daftar'] = 'Master/Daftar/batal';
// $route['email'] = 'Master/Daftar/sendemail';
$route['export-daftar'] = 'Master/Daftar/export';
$route['aktivasi/(:any)'] = 'Master/Aktivasi/index/$1';
$route['history-pendaftaran/(:any)'] = 'Master/Daftar/history/$1';

/*   route modul master pembayaran*/
$route['pembayaran'] =   'Master/Pembayaran/index';
$route['add-pembayaran'] = 'Master/Pembayaran/add';
$route['edit-pembayaran/(:any)'] = 'Master/Pembayaran/edit/$1';
$route['bukti-pembayaran/(:any)'] = 'Master/Pembayaran/bukti/$1';
$route['download-kwitansi-tubanan/(:any)'] = 'Master/Pembayaran/download_kwitansi_tubanan/$1';
$route['download-kwitansi-nginden/(:any)'] = 'Master/Pembayaran/download_kwitansi_nginden/$1';
$route['print-kwitansi-tubanan/(:any)'] = 'Master/Pembayaran/print_kwitansi_tubanan/$1';
$route['print-kwitansi-nginden/(:any)'] = 'Master/Pembayaran/print_kwitansi_nginden/$1';

/* SERTIFIKAT */
$route['sertifikat'] =   'Master/Sertifikat/index';
$route['add-list-sertifikat'] =   'Master/Sertifikat/add';
$route['edit-list-sertifikat/(:any)'] = 'Master/Sertifikat/edit/$1';

/*   route modul master calon siswa*/
$route['calon-siswa'] =   'Siswa/Calon_siswa/index';
$route['edit-calon-siswa/(:any)'] = 'Siswa/Calon_siswa/edit/$1';


/*   route modul master calon siswa*/
$route['siswa'] =   'Siswa/Siswa_aktif/index';
$route['tambah-siswa'] =   'Siswa/Siswa_aktif/tambah';
$route['edit-siswa/(:any)'] = 'Siswa/Siswa_aktif/edit/$1';
$route['batal-daftar'] = 'Siswa/Siswa_aktif/aktif_login';
$route['view-siswa/(:any)'] = 'Siswa/Siswa_aktif/view/$1';
$route['history-siswa/(:any)'] = 'Siswa/Siswa_aktif/history/$1';
$route['tambah-login/(:any)'] = 'Siswa/Siswa_aktif/tambah_login/$1';
$route['edit-login/(:any)'] = 'Siswa/Siswa_aktif/edit_login/$1';

/*   route modul master calon siswa*/
$route['alumni-siswa'] =   'Siswa/Alumni_siswa/index';
$route['edit-alumni-siswa/(:any)'] = 'Siswa/Alumni_siswa/edit/$1';

/*   route modul master jadwal   */
$route['jadwal'] =   'Master/Jadwal/index';
$route['add-jadwal'] = 'Master/Jadwal/add';
$route['edit-jadwal/(:any)'] = 'Master/Jadwal/edit/$1';

/*   route modul master jadwal kelas   */
$route['jadwal_kelas/(:any)'] =   'Master/JadwalKelas/index/$1';
$route['add-jadwal'] = 'Master/Jadwal/add';
$route['edit-jadwal/(:any)'] = 'Master/Jadwal/edit/$1';
$route['ListJadwal/(:any)'] = 'Master/JadwalKelas/ajax_list/$1';
$route['ListDetailJadwal/(:any)'] = 'Master/JadwalKelas/ajax_list_detail/$1';

/*   route modul master jadwal   */
$route['jadwal-selesai'] =   'Master/Jadwal_selesai/index';
$route['edit-jadwal-selesai/(:any)'] = 'Master/Jadwal_selesai/edit/$1';

/*   route modul master karyawan*/
$route['karyawan'] =   'Master/Karyawan/index';
$route['add-karyawan'] = 'Master/Karyawan/add';
$route['edit-karyawan/(:any)'] = 'Master/Karyawan/edit/$1';
$route['list-sertifikat-karyawan/(:any)'] = 'Master/Karyawan/list_sertif/$1';
$route['ListSertifikat/(:any)'] = 'Master/Sertif_karyawan/ajax_list/$1';
$route['add-sertifikat-karyawan/(:any)'] = 'Master/Sertif_karyawan/add/$1';
// $route['history-karyawan/(:any)'] = 'Master/Karyawan/history/$1';


/*   route modul kategori   */
$route['master-data'] =   'Support/MasterData/index';
$route['add-master-data'] = 'Support/MasterData/add';
$route['edit-master-data/(:any)'] = 'Support/MasterData/edit/$1';
$route['preview-data/(:any)'] = 'Support/MasterData/preview/$1';


/*   route modul Report   */
$route['report'] =   'Support/Report/index';
$route['filter-data'] = 'Support/Report/filter';



/*   route modul Report   */
$route['report-pendaftaran'] =   'Support/Report_pendaftaran/index';
$route['filter-data-pendaftaran'] = 'Support/Report_pendaftaran/filter';

/*   route modul Report   */
$route['report-tagihan'] =   'Support/Report_tagihan/index';
$route['filter-data-tagihan'] = 'Support/Report_tagihan/filter';

/*   route modul Report   */
$route['report-pembayaran'] =   'Support/Report_pembayaran/index';
$route['filter-data-pembayaran'] = 'Support/Report_pembayaran/filter';

/*   route modul Report   */
$route['report-honor'] =   'Support/Report_honor/index';
$route['filter-data-honor'] = 'Support/Report_honor/filter';


/*   route modul master jadwal   */
$route['artikel'] =   'Master/Artikel/index';
$route['add-artikel'] = 'Master/Artikel/add';
$route['edit-artikel/(:any)'] = 'Master/Artikel/edit/$1';

/* ROUTE MODUL PELATIHAN */
$route['pelatihan'] = 'Pelatihan/Pelatihan/index';
$route['add-pelatihan'] = 'Pelatihan/Pelatihan/Add';
$route['detail-pelatihan/(:any)'] = 'Pelatihan/Pelatihan/Detail/$1';
$route['add-bidang-studi-pelatihan/(:any)'] = 'Pelatihan/Pelatihan/Add_study/$1';
$route['add-invoice-pelatihan/(:any)'] = 'Pelatihan/Pelatihan/Add_invoice/$1';
$route['add-pembayaran-pelatihan/(:any)'] = 'Pelatihan/Pelatihan/Add_pembayaran/$1';
$route['add-peserta-pelatihan/(:any)'] = 'Pelatihan/Pelatihan/Add_peserta/$1';


/* ROUTE MODUL INVENTARIS */
$route['inventaris'] = 'Inventaris/Inventaris/index';
$route['add-inventaris'] = 'Inventaris/Inventaris/Add';
$route['edit-inventaris/(:any)'] = 'Inventaris/Inventaris/edit/$1';

$route['barang-masuk'] = 'Inventaris/Barang_masuk/index';
$route['add-barang-masuk'] = 'Inventaris/Barang_masuk/Add';
$route['edit-barang-masuk/(:any)'] = 'Inventaris/Barang_masuk/edit/$1';

$route['barang-keluar'] = 'Inventaris/Barang_keluar/index';
$route['add-barang-keluar'] = 'Inventaris/Barang_keluar/Add';
$route['edit-barang-keluar/(:any)'] = 'Inventaris/Barang_keluar/edit/$1';

$route['jumlah-barang'] = 'Inventaris/Inventaris/jumlah';
















/* End of file routes.php */
/* Location: ./application/config/routes.php */