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

				'/pendaftaran/<ctr:wajib-pajak|verifikasi-user-wp|verifikasi-npwpd>/<id:[\d]+>' => '/pendaftaran/<ctr>/detail',
				'/pendaftaran/wajib-pajak/<id:[\d]+>/edit' => '/pendaftaran/wajib-pajak/edit',
				
				'/pendataan/potensi-owp-baru/tambah' => '/pendataan/potensi-owp-baru/tambah',
				'/pendataan/potensi-owp-baru/<id:[A-Za-z0-9\-_]+>' => '/pendataan/potensi-owp-baru/detail',
				'/pendataan/potensi-owp-baru/<id:[A-Za-z0-9\-_]+>/edit' => '/pendataan/potensi-owp-baru/edit',

				'/pendataan/spop-lspop/<ctr:daftar|verifikasi|informasi-rinci-sppt>' => '/pendataan/spopLspop/<ctr>',

				'/pendataan/obyek-pajak/<ctr:updating-jalan-standar|rencana-pendataan>' => '/pendataan/obyekPajak/<ctr>',

				'/pendataan/dbkb/non-standar/<ctr:jpb-2|jpb-3|jpb-4|jpb-5|jpb-6|jpb-7|jpb-8_a|jpb-8_b|jpb-9|jpb-12|jpb-13|jpb-14|jpb-15|jpb-16|mezzanin>'
					=> '/pendataan/dbkb/nonStandar/<ctr>',

				'/penetapan/verifikasi-e-sptpd/<ctr:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan>'
					=> '/penetapan/verifikasiESptpd/<ctr>',
				'/penetapan/verifikasi-e-sptpd/<ctr:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan>/<id:[A-Za-z0-9\-]+>'
					=> '/penetapan/verifikasiESptpd/<ctr>/detail',
				'/penetapan/<type:sptpd|skpd>/<ctr:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan|pajak-reklame>/tambah'
					=> '/penetapan/<type>/<ctr>/tambah',
				'/penetapan/<type:sptpd|skpd>/<ctr:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan|pajak-reklame>/<id:[A-Za-z0-9\-]+>'
					=> '/penetapan/<type>/<ctr>/detail',
				'/penetapan/<type:sptpd|skpd>/<ctr:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan|pajak-reklame>/<id:[A-Za-z0-9\-]+>/edit'
					=> '/penetapan/<type>/<ctr>/edit',

				'/penetapan/skpdkb-skpdkbt/<ctr:sa|oa>' => '/penetapan/skpdkbSkpdkbt/<ctr>',

				'/penetapan/massal-skpdkb/<ctr:pajak-reklame|pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan>'
					=> '/penetapan/massalSkpdkb/pajak-penerangan-jalan',

				'/penetapan/penilaian-penetapan-cetak-massal-pbb/<ctr:cetak-massal-sppt|copy-dbkb-znt-tp-sppt-masal>'
					=> '/penetapan/penilaianPenetapanCetakMassalPbb/<ctr>',
				
				'/penetapan/info-sppt-skp/<ctr:relasi-op-sp|rinci-skp-spop|rinci-skp-kurang-byr|pbb-lebih-kurang-byr>'
					=> '/penetapan/infoSpptSkp/<ctr>',

				'/penetapan/perubahan-sppt-skp/pembetulan/<ctr:'.
					'input-tungal|proses-tunggal|input-kolektif|proses-kolektif|secara-jabatan|cetak-secara-jabatan>'
					=> '/penetapan/perubahanSpptSkp/pembetulan/<ctr>',

				'/penetapan/perubahan-sppt-skp/batal/<ctr:input-tunggal|proses-tunggal|input-kolektif|proses-kolektif>'
					=> '/penetapan/perubahanSpptSkp/batal/<ctr>',

				'/penetapan/lap-dist-op/<ctr:per-kelompok-jpb|per-kelas|perbandingan-kelas-per-desa-kelurahan|per-group-ketetapan>'
					=> '/penetapan/lapDistOp/<ctr>',

				'/peta-pajak/<ctr:kelas-bangunan|jenis-tanah|jenis-peruntukan-bangunan|znt|tunggakan-pajak|objek-pajak|fasum-fasos|reklame|pdl|cetak-peta>'
					=> '/petaPajak/<ctr>',

				'/penagihan-pemeriksaan/<ctr:surat-tagihan-pd|surat-peringatan-tunggak-pd|und-pemeriksaan|bapp|jurnal-piutang|pencabutan-surat-sita>'
					=> '/penagihanPemeriksaan/<ctr>',
				'/penagihan-pemeriksaan/<ctr:surat-tagihan-pd|surat-peringatan-tunggak-pd|und-pemeriksaan|bapp|jurnal-piutang|pencabutan-surat-sita>/tambah'
					=> '/penagihanPemeriksaan/<ctr>/tambah',
				'/penagihan-pemeriksaan/<ctr:surat-tagihan-pd|surat-peringatan-tunggak-pd|und-pemeriksaan|bapp|jurnal-piutang|pencabutan-surat-sita>/<id:[\d]+>'
					=> '/penagihanPemeriksaan/<ctr>/detail',

				'/penagihan-pemeriksaan/penagihan/daftar-tunggakan/laporan-op-tunggakan' => '/penagihanDanPemeriksaan/penagihan/daftarTunggakan/laporan-op-tunggakan',
				'/penagihan-pemeriksaan/penagihan/pengeluaran-himbauan' => '/penagihanDanPemeriksaan/penagihan/pengeluaran-himbauan',

				'/bendahara/surat-setoran-pajak-daerah/<id:[\d]+>' => '/bendahara/surat-setoran-pajak-daerah/detail',
				'/bendahara/surat-tanda-setoran/<id:[\d]+>' => '/bendahara/surat-tanda-setoran/detail',

				'/bendahara/tempat-pembayaran/elektro/update-va-satuan' => '/bendahara/tempatPembayaran/elektronik/update-va-satuan',

				'/keberatan/penyelesaian-permohonan/<ctr:input|cetak>' => '/keberatan/penyelesaianPermohona/<ctr>',
				'/keberatan/pembetulan-sk/<ctr:input|cetak>' => '/keberatan/pembetulanSk/<ctr>',

				'/customer-service/chat' => '/customerService/chat',

				'/konfigurasi/manajemen-user/<ctr:user|group>' => '/konfigurasi/manajemenUser/<ctr>',
				'/konfigurasi/manajemen-user/<ctr:user|group>/tambah' => '/konfigurasi/manajemenUser/<ctr>/tambah',
				'/konfigurasi/manajemen-user/<ctr:user|group>/<id:[\d]+>/<action:(edit|delete)>' => '/konfigurasi/manajemenUser/<ctr>/<action>',

				'/konfigurasi/data-ref/resource/<ctr:harga|lap-harga>' => '/konfigurasi/data-ref/resource/<ctr>',

				'/konfigurasi/data-ref/master/<ctr:'.
					'nop|ppat|nik|provinsi|kabupaten|kecamatan|kelurahan|bank-user|jenis-perolehan|'.
					'daftar-refrensi-bank|pegawai|satuan-kerja|rekening|anggaran|sumber-dana|bendahara|jurnal|harga-ref>'
					=> '/konfigurasi/dataRef/master/<ctr>',

				'/konfigurasi/data-ref/<ctr:wilayah|tempat-pembayaran-sppt-massal|buku-njoptkp-tarif|kantor-lelang|ref-umum|parameter-keluaran-pst>' => '/konfigurasi/dataRef/<ctr>',

				'/konfigurasi/lihat/data-op/<ctr:'.
					'spop-lspop|op-dengan-keringanan-permanen|objek-bersama|objek-dengan-nilai-individu|'.
					'catatan-pembayaran-pbb|catatan-sejarah-wp|catatan-sejarah-op|daftar-rekapitulasi-op|'.
					'op-dengan-pengurangan-stimulus-kebijakan-pengenaan|daftar-op-tanpa-peta|daftar-op-yang-telah-dihapus|daftar-op-sin>'
						=> '/konfigurasi/lihat/dataOp/<ctr>',

				'/konfigurasi/lihat/kinerja-org/<ctr:stat-kinerja-pelayanan|rinci-pendataan-lapangan|rinci-perekaman-data|rinci-perekaman-stts|rinci-perekaman-tanda-terima-sppt>'
						=> '/konfigurasi/lihat/kinerjaOrg/<ctr>',

				'/konfigurasi/lihat/daftar-perubahan/<ctr:data-op|tabel-znt>' => '/konfigurasi/lihat/daftarPerubahan/<ctr>',
				'/konfigurasi/lihat/sejarah/<ctr:op|sppt>' => '/konfigurasi/lihat/sejarah/<ctr>',
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
