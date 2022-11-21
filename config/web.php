<?php

include 'web.env.php';

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
	'id' => 'basic',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'defaultRoute' => 'home',
	// custom
	'viewPath' => dirname(__DIR__)."/views/pages",
	'layoutPath' => dirname(__DIR__)."/views/layouts",
	// end of custom
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm'   => '@vendor/npm-asset',
		'@vwCompPath' => '@app/views/components',
		'@dataPath'   => dirname(__DIR__).'/data',
		'@dummyDataPath'   => dirname(__DIR__).'/dummy-data',
	],
	'components' => [
		'request' => [
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => 'eGwdpyL_fzCvNHLyf6VCyZeRO_p1A67T',
			'parsers' => [
				'application/json' => 'yii\web\JsonParser',
			]
		],
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'user' => [
			'identityClass' => 'app\models\User',
			'enableAutoLogin' => true,
		],
		'errorHandler' => [
			'errorAction' => 'common/error',
		],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			// send all mails to a file by default. You have to set
			// 'useFileTransport' to false and configure transport
			// for the mailer to send real emails.
			'useFileTransport' => true,
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'db' => $db,
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [
				'POST /api/<part>' => 'api/post',
				'GET /api/<part>' => 'api/get',
				'GET /api/<part>/<id:[\d]+>' => 'api/get-id',
				'PATCH /api/<part>/<id:[\d]+>' => 'api/patch', // wilways with id
				'DELETE /api/<part>/<id:[\d]+>' => 'api/delete', // wilways with id
				
				'GET /api/<part>/<action>' => 'api/get-action',
				'GET /api/<part>/<id:[\d]+>/<action>' => 'api/get-id-action',
				'POST /api/<part>/<action>' => 'api/post-action',
				'PATCH /api/<part>/<id:[\d]+>/<action>' => 'api/patch-action',
				'PATCH /api/<part>/<id:[a-zA-Z0-9\-]+>/<action>' => 'api/patch-action',

				'GET /resources/<part>/<content:[a-zA-Z0-9\-_]+[___]*[a-zA-Z0-9.]*>' => 'api/get-static',
				// 'GET /api/static/<part:img>/<id>' => 'api/static',

				'/pelayanan/data-permohonan/<id:[\d]+>' => '/pelayanan/data-permohonan/edit',
				
				'/pendaftaran/wajib-pajak/<id:[\d]+>' => '/pendaftaran/wajib-pajak/detail',
				'/pendaftaran/<ctr:wajib-pajak,verifikasi-user-wp,verifikasi-npwpd>/<id:[\d]+>' => '/pendaftaran/<ctr>/detail',

				'/pendaftaran/wajib-pajak/<id:[\d]+>/edit' => '/pendaftaran/wajib-pajak/edit',
				'/pendaftaran/verifikasi-user-wp/<id:[\d]+>' => '/pendaftaran/verifikasi-user-wp/detail',
				'/pendaftaran/verifikasi-npwpd/<id:[\d]+>' => '/pendaftaran/verifikasi-npwpd/detail',
				
				'/pendataan/spop-lspop/daftar' => '/pendataan/spopLspop/daftar',
				'/pendataan/spop-lspop/verifikasi' => '/pendataan/spopLspop/verifikasi',
				'/pendataan/spop-lspop/informasi-rinci-sppt' => '/pendataan/spopLspop/informasi-rinci-sppt',
				'/pendataan/obyek-pajak/updating-jalan-standar' => '/pendataan/obyekPajak/updating-jalan-standar',
				'/pendataan/obyek-pajak/rencana-pendataan' => '/pendataan/obyekPajak/rencana-pendataan',
				'/pendataan/dbkb/non-standar/jpb-2' => '/pendataan/dbkb/nonStandar/jpb-2',
				'/pendataan/dbkb/non-standar/jpb-3' => '/pendataan/dbkb/nonStandar/jpb-3',
				'/pendataan/dbkb/non-standar/jpb-4' => '/pendataan/dbkb/nonStandar/jpb-4',
				'/pendataan/dbkb/non-standar/jpb-5' => '/pendataan/dbkb/nonStandar/jpb-5',
				'/pendataan/dbkb/non-standar/jpb-6' => '/pendataan/dbkb/nonStandar/jpb-6',
				'/pendataan/dbkb/non-standar/jpb-7' => '/pendataan/dbkb/nonStandar/jpb-7',
				'/pendataan/dbkb/non-standar/jpb-7/tambah' => '/pendataan/dbkb/nonStandar/jpb-7/tambah',
				'/pendataan/dbkb/non-standar/jpb-8_a' => '/pendataan/dbkb/nonStandar/jpb-8_a',
				'/pendataan/dbkb/non-standar/jpb-8_b' => '/pendataan/dbkb/nonStandar/jpb-8_b',
				'/pendataan/dbkb/non-standar/jpb-9' => '/pendataan/dbkb/nonStandar/jpb-9',
				'/pendataan/dbkb/non-standar/jpb-12' => '/pendataan/dbkb/nonStandar/jpb-12',
				'/pendataan/dbkb/non-standar/jpb-13' => '/pendataan/dbkb/nonStandar/jpb-13',
				'/pendataan/dbkb/non-standar/jpb-14' => '/pendataan/dbkb/nonStandar/jpb-14',
				'/pendataan/dbkb/non-standar/jpb-15' => '/pendataan/dbkb/nonStandar/jpb-15',
				'/pendataan/dbkb/non-standar/jpb-16' => '/pendataan/dbkb/nonStandar/jpb-16',
				'/pendataan/dbkb/non-standar/mezzanin' => '/pendataan/dbkb/nonStandar/mezzanin',

				'/penetapan/verifikasi-e-sptpd/<ctrl:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan>' => '/penetapan/verifikasiESptpd/<ctrl>',
				'/penetapan/verifikasi-e-sptpd/<ctrl:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan>/<id:[a-zA-Z0-9\-]+>' => '/penetapan/verifikasiESptpd/<ctrl>/detail',
				// '/penetapan/verifikasi-e-sptpd/pajak-resto' => '/penetapan/verifikasiESptpd/pajak-resto',
				// '/penetapan/verifikasi-e-sptpd/pajak-air-tanah' => '/penetapan/verifikasiESptpd/pajak-air-tanah',
				// '/penetapan/verifikasi-e-sptpd/pajak-parkir' => '/penetapan/verifikasiESptpd/pajak-parkir',
				// '/penetapan/verifikasi-e-sptpd/pajak-hiburan' => '/penetapan/verifikasiESptpd/pajak-hiburan',
				// '/penetapan/verifikasi-e-sptpd/pajak-penerangan-jalan' => '/penetapan/verifikasiESptpd/pajak-penerangan-jalan',
				
				'/penetapan/skpdkb-skpdkbt/sa' => '/penetapan/skpdkbSkpdkbt/sa',
				'/penetapan/skpdkb-skpdkbt/oa' => '/penetapan/skpdkbSkpdkbt/oa',
				'/penetapan/massal-skpdkb/pajak-reklame' => '/penetapan/massalSkpdkb/pajak-reklame',
				'/penetapan/massal-skpdkb/pajak-hotel' => '/penetapan/massalSkpdkb/pajak-hotel',
				'/penetapan/massal-skpdkb/pajak-resto' => '/penetapan/massalSkpdkb/pajak-resto',
				'/penetapan/massal-skpdkb/pajak-air-tanah' => '/penetapan/massalSkpdkb/pajak-air-tanah',
				'/penetapan/massal-skpdkb/pajak-parkir' => '/penetapan/massalSkpdkb/pajak-parkir',
				'/penetapan/massal-skpdkb/pajak-hiburan' => '/penetapan/massalSkpdkb/pajak-hiburan',
				'/penetapan/massal-skpdkb/pajak-penerangan-jalan' => '/penetapan/massalSkpdkb/pajak-penerangan-jalan',
				'/penetapan/penialaian-dan-cetak-massal-pbb/cetak-massal-sppt' => '/penetapan/penialaianDanCetakMassalPbb/cetak-massal-sppt',
				'/penetapan/penialaian-dan-cetak-massal-pbb/copy-dbkb-znt-tp-sppt-masal-tahun-sebelumnya' => '/penetapan/penialaianDanCetakMassalPbb/copy-dbkb-znt-tp-sppt-masal-tahun-sebelumnya',
				'/penetapan/informasi-sppt-skp/relasi-obyek-pajak-dengan-subyek-pajak' => '/penetapan/informasiSpptSkp/relasi-obyek-pajak-dengan-subyek-pajak',
				'/penetapan/informasi-sppt-skp/rinci-skp-terhadap-spop' => '/penetapan/informasiSpptSkp/rinci-skp-terhadap-spop',
				'/penetapan/informasi-sppt-skp/rinci-skp-kurang-bayar' => '/penetapan/informasiSpptSkp/rinci-skp-kurang-bayar',
				'/penetapan/informasi-sppt-skp/daftar-pbb-lebih-atau-kurang-bayar' => '/penetapan/informasiSpptSkp/daftar-pbb-lebih-atau-kurang-bayar',
				'/penetapan/perubahan-sppt-skp/pembetulan/input-sk-pembetulan' => '/penetapan/perubahanSpptSkp/pembetulan/input-sk-pembetulan',
				'/penetapan/perubahan-sppt-skp/pembetulan/proses-sk-pembetulan' => '/penetapan/perubahanSpptSkp/pembetulan/proses-sk-pembetulan',
				'/penetapan/perubahan-sppt-skp/pembetulan/input-sk-pembetulan-kolektif' => '/penetapan/perubahanSpptSkp/pembetulan/input-sk-pembetulan-kolektif',
				'/penetapan/perubahan-sppt-skp/pembetulan/proses-sk-pembetulan-kolektif' => '/penetapan/perubahanSpptSkp/pembetulan/proses-sk-pembetulan-kolektif',
				'/penetapan/perubahan-sppt-skp/pembetulan/pembetulan-secara-jabatan' => '/penetapan/perubahanSpptSkp/pembetulan/pembetulan-secara-jabatan',
				'/penetapan/perubahan-sppt-skp/pembetulan/proses-cetak-pembetulan-secara-jabatan' => '/penetapan/perubahanSpptSkp/pembetulan/proses-cetak-pembetulan-secara-jabatan',
				'/penetapan/pembatalan-sppt-skp/input-sk-pembatalan-tunggal' => '/penetapan/pembatalanSpptSkp/input-sk-pembatalan-tunggal',
				'/penetapan/pembatalan-sppt-skp/proses-sk-pembatalan-tunggal' => '/penetapan/pembatalanSpptSkp/proses-sk-pembatalan-tunggal',
				'/penetapan/pembatalan-sppt-skp/input-sk-pembatalan-kolektif' => '/penetapan/pembatalanSpptSkp/input-sk-pembatalan-kolektif',
				'/penetapan/pembatalan-sppt-skp/proses-sk-pembatalan-kolektif' => '/penetapan/pembatalanSpptSkp/proses-sk-pembatalan-kolektif',
				'/penetapan/laporan-distribusi-op/per-kelompok-jpb' => '/penetapan/laporanDistribusiOp/per-kelompok-jpb',
				'/penetapan/laporan-distribusi-op/per-kelas' => '/penetapan/laporanDistribusiOp/per-kelas',
				'/penetapan/laporan-distribusi-op/perbandingan-kelas-per-desa-kelurahan' => '/penetapan/laporanDistribusiOp/perbandingan-kelas-per-desa-kelurahan',
				'/penetapan/laporan-distribusi-op/per-group-ketetapan' => '/penetapan/laporanDistribusiOp/per-group-ketetapan',
				'/peta-pajak/kelas-bangunan' => '/petaPajak/kelas-bangunan',
				'/peta-pajak/jenis-tanah' => '/petaPajak/jenis-tanah',
				'/peta-pajak/jenis-peruntukan-bangunan' => '/petaPajak/jenis-peruntukan-bangunan',
				'/peta-pajak/znt' => '/petaPajak/znt',
				'/peta-pajak/tunggakan-pajak' => '/petaPajak/tunggakan-pajak',
				'/peta-pajak/objek-pajak' => '/petaPajak/objek-pajak',
				'/peta-pajak/fasum-fasos' => '/petaPajak/fasum-fasos',
				'/peta-pajak/reklame' => '/petaPajak/reklame',
				'/peta-pajak/pdl' => '/petaPajak/pdl',
				'/peta-pajak/cetak-peta' => '/petaPajak/cetak-peta',
				'/penagihan-dan-pemeriksaan/penagihan/daftar-tunggakan/laporan-op-tunggakan' => '/penagihanDanPemeriksaan/penagihan/daftarTunggakan/laporan-op-tunggakan',
				'/penagihan-dan-pemeriksaan/penagihan/pengeluaran-himbauan' => '/penagihanDanPemeriksaan/penagihan/pengeluaran-himbauan',
				'/penagihan-dan-pemeriksaan/stpd' => '/penagihanDanPemeriksaan/stpd',
				'/penagihan-dan-pemeriksaan/sptpd' => '/penagihanDanPemeriksaan/sptpd',
				'/penagihan-dan-pemeriksaan/undangan-pemeriksaan' => '/penagihanDanPemeriksaan/undangan-pemeriksaan',
				'/penagihan-dan-pemeriksaan/berita-acara-penagihan-pemeriksaan' => '/penagihanDanPemeriksaan/berita-acara-penagihan-pemeriksaan',
				'/penagihan-dan-pemeriksaan/jurnal-piutang' => '/penagihanDanPemeriksaan/jurnal-piutang',
				'/penagihan-dan-pemeriksaan/pencabutan-dan-pencetakan-surat-sita' => '/penagihanDanPemeriksaan/pencabutan-dan-pencetakan-surat-sita',
				'/bendahara/tempat-pembayaran/elektronik/update-va-satuan' => '/bendahara/tempatPembayaran/elektronik/update-va-satuan',
				'/keberatan/penyelesaian-permohona-keberatan/input-sk-keberatan-pbb' => '/keberatan/penyelesaianPermohonaKeberatan/input-sk-keberatan-pbb',
				'/keberatan/penyelesaian-permohona-keberatan/mencetak-sk-keberatan' => '/keberatan/penyelesaianPermohonaKeberatan/mencetak-sk-keberatan',
				'/keberatan/pembetulan-sk-keberatan/input-pembetulan-sk-keberatan-pbb' => '/keberatan/pembetulanSkKeberatan/input-pembetulan-sk-keberatan-pbb',
				'/keberatan/pembetulan-sk-keberatan/mencetak-pembetulan-sk-keberatan-pbb' => '/keberatan/pembetulanSkKeberatan/mencetak-pembetulan-sk-keberatan-pbb',
				'/customer-service/chat' => '/customerService/chat',
				'/konfigurasi/manajemen-user/user' => '/konfigurasi/manajemenUser/user',
				'/konfigurasi/manajemen-user/user/tambah' => '/konfigurasi/manajemenUser/user/tambah',
				'/konfigurasi/manajemen-user/user/<id:[\d]+>/<action:(edit|delete)>' => '/konfigurasi/manajemenUser/user/<action>',
				'/konfigurasi/manajemen-user/group' => '/konfigurasi/manajemenUser/group',
				'/konfigurasi/manajemen-user/group/tambah' => '/konfigurasi/manajemenUser/group/tambah',
				'/konfigurasi/manajemen-user/group/<id:[\d]+>/<action:(edit|delete)>' => '/konfigurasi/manajemenUser/group/<action>',
				'/konfigurasi/data-referensi/resource/harga-resource' => '/konfigurasi/dataReferensi/resource/harga-resource',
				'/konfigurasi/data-referensi/resource/laporan-harga-resource' => '/konfigurasi/dataReferensi/resource/laporan-harga-resource',
				'/konfigurasi/data-referensi/master-data/nop' => '/konfigurasi/dataReferensi/masterData/nop',
				'/konfigurasi/data-referensi/master-data/ppat' => '/konfigurasi/dataReferensi/masterData/ppat',
				'/konfigurasi/data-referensi/master-data/nik' => '/konfigurasi/dataReferensi/masterData/nik',
				'/konfigurasi/data-referensi/master-data/provinsi' => '/konfigurasi/dataReferensi/masterData/provinsi',
				'/konfigurasi/data-referensi/master-data/kabupaten' => '/konfigurasi/dataReferensi/masterData/kabupaten',
				'/konfigurasi/data-referensi/master-data/kecamatan' => '/konfigurasi/dataReferensi/masterData/kecamatan',
				'/konfigurasi/data-referensi/master-data/kelurahan' => '/konfigurasi/dataReferensi/masterData/kelurahan',
				'/konfigurasi/data-referensi/master-data/bank-user' => '/konfigurasi/dataReferensi/masterData/bank-user',
				'/konfigurasi/data-referensi/master-data/jenis-perolehan' => '/konfigurasi/dataReferensi/masterData/jenis-perolehan',
				'/konfigurasi/data-referensi/master-data/daftar-refrensi-bank' => '/konfigurasi/dataReferensi/masterData/daftar-refrensi-bank',
				'/konfigurasi/data-referensi/master-data/pegawai' => '/konfigurasi/dataReferensi/masterData/pegawai',
				'/konfigurasi/data-referensi/wilayah' => '/konfigurasi/dataReferensi/wilayah',
				'/konfigurasi/data-referensi/tempat-pembayaran-sppt-massal' => '/konfigurasi/dataReferensi/tempat-pembayaran-sppt-massal',
				'/konfigurasi/data-referensi/buku-njoptkp-tarif' => '/konfigurasi/dataReferensi/buku-njoptkp-tarif',
				'/konfigurasi/data-referensi/kantor-lelang' => '/konfigurasi/dataReferensi/kantor-lelang',
				'/konfigurasi/data-referensi/ref-umum' => '/konfigurasi/dataReferensi/ref-umum',
				'/konfigurasi/data-referensi/parameter-keluaran-pst' => '/konfigurasi/dataReferensi/parameter-keluaran-pst',
				'/konfigurasi/lihat/data-obyek-pajak/spop-lspop' => '/konfigurasi/lihat/dataObyekPajak/spop-lspop',
				'/konfigurasi/lihat/data-obyek-pajak/op-dengan-keringanan-permanen' => '/konfigurasi/lihat/dataObyekPajak/op-dengan-keringanan-permanen',
				'/konfigurasi/lihat/data-obyek-pajak/obyek-bersama' => '/konfigurasi/lihat/dataObyekPajak/obyek-bersama',
				'/konfigurasi/lihat/data-obyek-pajak/obyek-dengan-nilai-individu' => '/konfigurasi/lihat/dataObyekPajak/obyek-dengan-nilai-individu',
				'/konfigurasi/lihat/data-obyek-pajak/catatan-pembayaran-pbb' => '/konfigurasi/lihat/dataObyekPajak/catatan-pembayaran-pbb',
				'/konfigurasi/lihat/data-obyek-pajak/catatan-sejarah-wp' => '/konfigurasi/lihat/dataObyekPajak/catatan-sejarah-wp',
				'/konfigurasi/lihat/data-obyek-pajak/catatan-sejarah-op' => '/konfigurasi/lihat/dataObyekPajak/catatan-sejarah-op',
				'/konfigurasi/lihat/data-obyek-pajak/daftar-rekapitulasi-op' => '/konfigurasi/lihat/dataObyekPajak/daftar-rekapitulasi-op',
				'/konfigurasi/lihat/data-obyek-pajak/op-dengan-pengurangan-stimulus-kebijakan-pengenaan' => '/konfigurasi/lihat/dataObyekPajak/op-dengan-pengurangan-stimulus-kebijakan-pengenaan',
				'/konfigurasi/lihat/data-obyek-pajak/daftar-op-tanpa-peta' => '/konfigurasi/lihat/dataObyekPajak/daftar-op-tanpa-peta',
				'/konfigurasi/lihat/data-obyek-pajak/daftar-op-yang-telah-dihapus' => '/konfigurasi/lihat/dataObyekPajak/daftar-op-yang-telah-dihapus',
				'/konfigurasi/lihat/data-obyek-pajak/daftar-op-sin' => '/konfigurasi/lihat/dataObyekPajak/daftar-op-sin',
				'/konfigurasi/lihat/kinerja-organisasi/statistik-kinerja-pelayanan' => '/konfigurasi/lihat/kinerjaOrganisasi/statistik-kinerja-pelayanan',
				'/konfigurasi/lihat/kinerja-organisasi/rincian-pendataan-lapangan' => '/konfigurasi/lihat/kinerjaOrganisasi/rincian-pendataan-lapangan',
				'/konfigurasi/lihat/kinerja-organisasi/rincian-perekaman-data' => '/konfigurasi/lihat/kinerjaOrganisasi/rincian-perekaman-data',
				'/konfigurasi/lihat/kinerja-organisasi/rincian-perekaman-stts' => '/konfigurasi/lihat/kinerjaOrganisasi/rincian-perekaman-stts',
				'/konfigurasi/lihat/kinerja-organisasi/rincian-perekaman-tanda-terima-sppt' => '/konfigurasi/lihat/kinerjaOrganisasi/rincian-perekaman-tanda-terima-sppt',
				'/konfigurasi/lihat/daftar-perubahan/daftar-perubahan-data-op' => '/konfigurasi/lihat/daftarPerubahan/daftar-perubahan-data-op',
				'/konfigurasi/lihat/daftar-perubahan/daftar-perubahan-tabel-znt' => '/konfigurasi/lihat/daftarPerubahan/daftar-perubahan-tabel-znt',
				'/konfigurasi/lihat/sejarah-obyek-pajak/obyek-pajak' => '/konfigurasi/lihat/sejarahObyekPajak/obyek-pajak',
				'/konfigurasi/lihat/sejarah-obyek-pajak/sppt' => '/konfigurasi/lihat/sejarahObyekPajak/sppt',
			],
		],

	],
	'params' => $params,
];

if (YII_ENV_DEV) {
	// configuration adjustments for 'dev' environment
	$config['bootstrap'][] = 'debug';
	$config['modules']['debug'] = [
		'class' => 'yii\debug\Module',
		// uncomment the following to add your IP if you are not connecting from localhost.
		//'allowedIPs' => ['127.0.0.1', '::1'],
	];

	$config['bootstrap'][] = 'gii';
	$config['modules']['gii'] = [
		'class' => 'yii\gii\Module',
		// uncomment the following to add your IP if you are not connecting from localhost.
		//'allowedIPs' => ['127.0.0.1', '::1'],
	];
}

return $config;
