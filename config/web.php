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
				'PATCH /api/<part>/<id:[\d]+|[A-Za-z0-9\-]+>' => 'api/patch', // wilways with id
				'DELETE /api/<part>/<id:[\d]+|[A-Za-z0-9\-]+>' => 'api/delete', // wilways with id
				
				'GET /api/<part>/<action>' => 'api/get-action',
				'GET /api/<part>/<id:[\d]+>/<action>' => 'api/get-id-action',
				'POST /api/<part>/<action>' => 'api/post-action',
				'PATCH /api/<part>/<id:[\d]+|[A-Za-z0-9\-]+>/<action>' => 'api/patch-action',

				'GET /resources/<part>/<content:[A-Za-z0-9\-_]+[___]*[A-Za-z0-9.]*>' => 'api/get-static',
				// 'GET /api/static/<part:img>/<id>' => 'api/static',

				'/pelayanan/data-permohonan/<id:[\d]+>' => '/pelayanan/data-permohonan/detail',
				'/pelayanan/data-permohonan/<id:[\d]+>/edit' => '/pelayanan/data-permohonan/edit',
				'/pelayanan/data-permohonan/<id:[\d]+>/status' => '/pelayanan/data-permohonan/status',
				'/pelayanan/data-permohonan/<id:[\d]+>/delete' => '/pelayanan/data-permohonan/delete',
				
				'/pendaftaran/wajib-pajak/<id:[\d]+>' => '/pendaftaran/wajib-pajak/detail',
				'/pendaftaran/<ctr:wajib-pajak,verifikasi-user-wp,verifikasi-npwpd>/<id:[\d]+>' => '/pendaftaran/<ctr>/detail',

				'/pendaftaran/wajib-pajak/<id:[\d]+>/edit' => '/pendaftaran/wajib-pajak/edit',
				'/pendaftaran/verifikasi-user-wp/<id:[\d]+>' => '/pendaftaran/verifikasi-user-wp/detail',
				'/pendaftaran/verifikasi-npwpd/<id:[\d]+>' => '/pendaftaran/verifikasi-npwpd/detail',
				
				'/pendataan/potensi-owp-baru/tambah' => '/pendataan/potensi-owp-baru/tambah',
				'/pendataan/potensi-owp-baru/<id:[A-Za-z0-9\-_]+>' => '/pendataan/potensi-owp-baru/detail',
				'/pendataan/potensi-owp-baru/<id:[A-Za-z0-9\-_]+>/edit' => '/pendataan/potensi-owp-baru/edit',

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
				'/penetapan/verifikasi-e-sptpd/<ctrl:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan>/<id:[A-Za-z0-9\-]+>' => '/penetapan/verifikasiESptpd/<ctrl>/detail',

				'/penetapan/<type:sptpd|skpd>/<ctrl:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan|pajak-reklame>/tambah' => '/penetapan/<type>/<ctrl>/tambah',
				'/penetapan/<type:sptpd|skpd>/<ctrl:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan|pajak-reklame>/<id:[A-Za-z0-9\-]+>' => '/penetapan/<type>/<ctrl>/detail',
				'/penetapan/<type:sptpd|skpd>/<ctrl:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan|pajak-reklame>/<id:[A-Za-z0-9\-]+>/edit' => '/penetapan/<type>/<ctrl>/edit',

				'/penetapan/skpdkb-skpdkbt/sa' => '/penetapan/skpdkbSkpdkbt/sa',
				'/penetapan/skpdkb-skpdkbt/oa' => '/penetapan/skpdkbSkpdkbt/oa',
				'/penetapan/massal-skpdkb/pajak-reklame' => '/penetapan/massalSkpdkb/pajak-reklame',
				'/penetapan/massal-skpdkb/pajak-hotel' => '/penetapan/massalSkpdkb/pajak-hotel',
				'/penetapan/massal-skpdkb/pajak-resto' => '/penetapan/massalSkpdkb/pajak-resto',
				'/penetapan/massal-skpdkb/pajak-air-tanah' => '/penetapan/massalSkpdkb/pajak-air-tanah',
				'/penetapan/massal-skpdkb/pajak-parkir' => '/penetapan/massalSkpdkb/pajak-parkir',
				'/penetapan/massal-skpdkb/pajak-hiburan' => '/penetapan/massalSkpdkb/pajak-hiburan',
				'/penetapan/massal-skpdkb/pajak-penerangan-jalan' => '/penetapan/massalSkpdkb/pajak-penerangan-jalan',
				'/penetapan/penilaian-penetapan-cetak-massal-pbb/cetak-massal-sppt' => '/penetapan/penilaianPenetapanCetakMassalPbb/cetak-massal-sppt',
				'/penetapan/penilaian-penetapan-cetak-massal-pbb/copy-dbkb-znt-tp-sppt-masal' => '/penetapan/penilaianPenetapanCetakMassalPbb/copy-dbkb-znt-tp-sppt-masal',
				'/penetapan/info-sppt-skp/relasi-op-sp' => '/penetapan/infoSpptSkp/relasi-op-sp',
				'/penetapan/info-sppt-skp/rinci-skp-spop' => '/penetapan/infoSpptSkp/rinci-skp-spop',
				'/penetapan/info-sppt-skp/rinci-skp-kurang-byr' => '/penetapan/infoSpptSkp/rinci-skp-kurang-byr',
				'/penetapan/info-sppt-skp/pbb-lebih-kurang-byr' => '/penetapan/infoSpptSkp/pbb-lebih-kurang-byr',
				'/penetapan/perubahan-sppt-skp/pembetulan/input-tungal' => '/penetapan/perubahanSpptSkp/pembetulan/input-tungal',
				'/penetapan/perubahan-sppt-skp/pembetulan/proses-tunggal' => '/penetapan/perubahanSpptSkp/pembetulan/proses-tunggal',
				'/penetapan/perubahan-sppt-skp/pembetulan/input-kolektif' => '/penetapan/perubahanSpptSkp/pembetulan/input-kolektif',
				'/penetapan/perubahan-sppt-skp/pembetulan/proses-kolektif' => '/penetapan/perubahanSpptSkp/pembetulan/proses-kolektif',
				'/penetapan/perubahan-sppt-skp/pembetulan/secara-jabatan' => '/penetapan/perubahanSpptSkp/pembetulan/secara-jabatan',
				'/penetapan/perubahan-sppt-skp/pembetulan/cetak-secara-jabatan' => '/penetapan/perubahanSpptSkp/pembetulan/cetak-secara-jabatan',
				'/penetapan/perubahan-sppt-skp/batal/input-tunggal' => '/penetapan/perubahanSpptSkp/batal/input-tunggal',
				'/penetapan/perubahan-sppt-skp/batal/proses-tunggal' => '/penetapan/perubahanSpptSkp/batal/proses-tunggal',
				'/penetapan/perubahan-sppt-skp/batal/input-kolektif' => '/penetapan/perubahanSpptSkp/batal/input-kolektif',
				'/penetapan/perubahan-sppt-skp/batal/proses-kolektif' => '/penetapan/perubahanSpptSkp/batal/proses-kolektif',
				'/penetapan/lap-dist-op/per-kelompok-jpb' => '/penetapan/lapDistOp/per-kelompok-jpb',
				'/penetapan/lap-dist-op/per-kelas' => '/penetapan/lapDistOp/per-kelas',
				'/penetapan/lap-dist-op/perbandingan-kelas-per-desa-kelurahan' => '/penetapan/lapDistOp/perbandingan-kelas-per-desa-kelurahan',
				'/penetapan/lap-dist-op/per-group-ketetapan' => '/penetapan/lapDistOp/per-group-ketetapan',

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

				'/penagihan-pemeriksaan/penagihan/daftar-tunggakan/laporan-op-tunggakan' => '/penagihanDanPemeriksaan/penagihan/daftarTunggakan/laporan-op-tunggakan',
				'/penagihan-pemeriksaan/penagihan/pengeluaran-himbauan' => '/penagihanDanPemeriksaan/penagihan/pengeluaran-himbauan',

				'/penagihan-pemeriksaan/<ctr:surat-tagihan-pd|surat-peringatan-tunggak-pd|und-pemeriksaan|bapp|jurnal-piutang|pencabutan-surat-sita>' => '/penagihanPemeriksaan/<ctr>',
				'/penagihan-pemeriksaan/<ctr:surat-tagihan-pd|surat-peringatan-tunggak-pd|und-pemeriksaan|bapp|jurnal-piutang|pencabutan-surat-sita>/tambah' => '/penagihanPemeriksaan/<ctr>/tambah',
				'/penagihan-pemeriksaan/<ctr:surat-tagihan-pd|surat-peringatan-tunggak-pd|und-pemeriksaan|bapp|jurnal-piutang|pencabutan-surat-sita>/<id:[\d]+>' => '/penagihanPemeriksaan/<ctr>/detail',
				'/penagihan-pemeriksaan/<ctr:surat-tagihan-pd|surat-peringatan-tunggak-pd|und-pemeriksaan|bapp|jurnal-piutang|pencabutan-surat-sita>/<id:[\d]+>/edit' => '/penagihanPemeriksaan/<ctr>/edit',

				'/bendahara/surat-setoran-pajak-daerah/<id:[\d]+>' => '/bendahara/surat-setoran-pajak-daerah/detail',
				'/bendahara/surat-tanda-setoran/<id:[\d]+>' => '/bendahara/surat-tanda-setoran/detail',

				'/bendahara/tempat-pembayaran/elektro/update-va-satuan' => '/bendahara/tempatPembayaran/elektronik/update-va-satuan',

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
				'/konfigurasi/data-ref/resource/harga-resource' => '/konfigurasi/dataReferensi/resource/harga-resource',
				'/konfigurasi/data-ref/resource/laporan-harga-resource' => '/konfigurasi/dataReferensi/resource/laporan-harga-resource',
				'/konfigurasi/data-ref/master/nop' => '/konfigurasi/dataReferensi/master/nop',
				'/konfigurasi/data-ref/master/ppat' => '/konfigurasi/dataReferensi/master/ppat',
				'/konfigurasi/data-ref/master/nik' => '/konfigurasi/dataReferensi/master/nik',
				'/konfigurasi/data-ref/master/provinsi' => '/konfigurasi/dataReferensi/master/provinsi',
				'/konfigurasi/data-ref/master/kabupaten' => '/konfigurasi/dataReferensi/master/kabupaten',
				'/konfigurasi/data-ref/master/kecamatan' => '/konfigurasi/dataReferensi/master/kecamatan',
				'/konfigurasi/data-ref/master/kelurahan' => '/konfigurasi/dataReferensi/master/kelurahan',
				'/konfigurasi/data-ref/master/bank-user' => '/konfigurasi/dataReferensi/master/bank-user',
				'/konfigurasi/data-ref/master/jenis-perolehan' => '/konfigurasi/dataReferensi/master/jenis-perolehan',
				'/konfigurasi/data-ref/master/daftar-refrensi-bank' => '/konfigurasi/dataReferensi/master/daftar-refrensi-bank',
				'/konfigurasi/data-ref/master/pegawai' => '/konfigurasi/dataRef/master/pegawai',
				'/konfigurasi/data-ref/master/satuan-kerja' => '/konfigurasi/dataRef/master/satuan-kerja',
				'/konfigurasi/data-ref/master/rekening' => '/konfigurasi/dataRef/master/rekening',
				'/konfigurasi/data-ref/master/anggaran' => '/konfigurasi/dataRef/master/anggaran',
				'/konfigurasi/data-ref/master/sumber-dana' => '/konfigurasi/dataRef/master/sumber-dana',
				'/konfigurasi/data-ref/master/bendahara' => '/konfigurasi/dataRef/master/bendahara',
				'/konfigurasi/data-ref/master/jurnal' => '/konfigurasi/dataRef/master/jurnal',
				'/konfigurasi/data-ref/master/harga-ref' => '/konfigurasi/dataRef/master/harga-ref',
				'/konfigurasi/data-ref/wilayah' => '/konfigurasi/dataReferensi/wilayah',
				'/konfigurasi/data-ref/tempat-pembayaran-sppt-massal' => '/konfigurasi/dataReferensi/tempat-pembayaran-sppt-massal',
				'/konfigurasi/data-ref/buku-njoptkp-tarif' => '/konfigurasi/dataReferensi/buku-njoptkp-tarif',
				'/konfigurasi/data-ref/kantor-lelang' => '/konfigurasi/dataReferensi/kantor-lelang',
				'/konfigurasi/data-ref/ref-umum' => '/konfigurasi/dataReferensi/ref-umum',
				'/konfigurasi/data-ref/parameter-keluaran-pst' => '/konfigurasi/dataReferensi/parameter-keluaran-pst',
				'/konfigurasi/lihat/data-op/spop-lspop' => '/konfigurasi/lihat/dataOp/spop-lspop',
				'/konfigurasi/lihat/data-op/op-dengan-keringanan-permanen' => '/konfigurasi/lihat/dataOp/op-dengan-keringanan-permanen',
				'/konfigurasi/lihat/data-op/obyek-bersama' => '/konfigurasi/lihat/dataOp/obyek-bersama',
				'/konfigurasi/lihat/data-op/obyek-dengan-nilai-individu' => '/konfigurasi/lihat/dataOp/obyek-dengan-nilai-individu',
				'/konfigurasi/lihat/data-op/catatan-pembayaran-pbb' => '/konfigurasi/lihat/dataOp/catatan-pembayaran-pbb',
				'/konfigurasi/lihat/data-op/catatan-sejarah-wp' => '/konfigurasi/lihat/dataOp/catatan-sejarah-wp',
				'/konfigurasi/lihat/data-op/catatan-sejarah-op' => '/konfigurasi/lihat/dataOp/catatan-sejarah-op',
				'/konfigurasi/lihat/data-op/daftar-rekapitulasi-op' => '/konfigurasi/lihat/dataOp/daftar-rekapitulasi-op',
				'/konfigurasi/lihat/data-op/op-dengan-pengurangan-stimulus-kebijakan-pengenaan' => '/konfigurasi/lihat/dataOp/op-dengan-pengurangan-stimulus-kebijakan-pengenaan',
				'/konfigurasi/lihat/data-op/daftar-op-tanpa-peta' => '/konfigurasi/lihat/dataOp/daftar-op-tanpa-peta',
				'/konfigurasi/lihat/data-op/daftar-op-yang-telah-dihapus' => '/konfigurasi/lihat/dataOp/daftar-op-yang-telah-dihapus',
				'/konfigurasi/lihat/data-op/daftar-op-sin' => '/konfigurasi/lihat/dataOp/daftar-op-sin',
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
