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
	'viewPath' => dirname(__DIR__) . "/views/pages",
	'layoutPath' => dirname(__DIR__) . "/views/layouts",
	// end of custom
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm'   => '@vendor/npm-asset',
		'@vwCompPath' => '@app/views/components',
		'@dataPath'   => dirname(__DIR__) . '/data',
		'@dummyDataPath'   => dirname(__DIR__) . '/dummy-data',
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
				'/pelayanan/data-permohonan/himbauan' => '/pelayanan/data-permohonan/himbauan',
				'/pelayanan/data-permohonan/tunggakan' => '/pelayanan/data-permohonan/tunggakan',
				'/pelayanan/data-permohonan/tunggakan-pbb' => '/pelayanan/data-permohonan/tunggakan-pbb',

				'/pelayanan/verifikasi-data-permohonan/' => '/pelayanan/verifikasi-data-permohonan',
				'/pelayanan/verifikasi-data-permohonan/<id:[A-Za-z0-9\-_]+>' => '/pelayanan/verifikasi-data-permohonan/detail',
				'/pelayanan/verifikasi-data-permohonan/<id:[A-Za-z0-9\-_]+>/verifikasi' => '/pelayanan/verifikasi-data-permohonan/verifikasi',

				'/pendaftaran/wajib-pajak/<id:[\d]+>' => '/pendaftaran/wajib-pajak/detail',
				'/pendaftaran/<ctr:wajib-pajak,verifikasi-user-wp,verifikasi-npwpd>/<id:[\d]+>' => '/pendaftaran/<ctr>/detail',

				'/pendaftaran/<ctr:wajib-pajak|verifikasi-user-wp|verifikasi-npwpd>/<id:[\d]+>' => '/pendaftaran/<ctr>/detail',
				'/pendaftaran/wajib-pajak/<id:[\d]+>/edit' => '/pendaftaran/wajib-pajak/edit',

				'/pendataan/potensi-owp-baru/tambah' => '/pendataan/potensi-owp-baru/tambah',
				'/pendataan/potensi-owp-baru/<id:[A-Za-z0-9\-_]+>' => '/pendataan/potensi-owp-baru/detail',
				'/pendataan/potensi-owp-baru/<id:[A-Za-z0-9\-_]+>/edit' => '/pendataan/potensi-owp-baru/edit',

				'/pendataan/spop-lspop/daftar/tambahspop' => '/pendataan/spopLspop/daftar/tambahspop',
				'/pendataan/spop-lspop/daftar/tambahlspop' => '/pendataan/spopLspop/daftar/tambahlspop',
				'/pendataan/spop-lspop/<ctr:daftar|verifikasi|info-rinci-sppt>' => '/pendataan/spopLspop/<ctr>',
				'/pendataan/spop-lspop/<ctr:daftar|verifikasi|info-rinci-sppt>/<id:[A-Za-z0-9\-_]+>' => '/pendataan/spopLspop/<ctr>/detail',

				'/pendataan/obyek-pajak/<ctr:updating-jalan-standar|rencana-pendataan>' => '/pendataan/obyekPajak/<ctr>',

				'/pendataan/kelas-tanah/' => '/pendataan/kelas-tanah/',
				'/pendataan/kelas-tanah/<id:[\d]+>/edit' => '/pendataan/kelas-tanah/edit',
				'/pendataan/kelas-tanah/<id:[\d]+>/delete' => '/pendataan/kelas-tanah/delete',

				'/pendataan/kelas-bangunan/' => '/pendataan/kelas-bangunan/',
				'/pendataan/kelas-bangunan/<id:[\d]+>/edit' => '/pendataan/kelas-bangunan/edit',
				'/pendataan/kelas-bangunan/<id:[\d]+>/delete' => '/pendataan/kelas-bangunan/delete',

				'/pendataan/dbkb/non-standar/<ctr:jpb-2|jpb-3|jpb-4|jpb-5|jpb-6|jpb-7|jpb-8_a|jpb-8_b|jpb-9|jpb-12|jpb-13|jpb-14|jpb-15|jpb-16|mezzanin>'
				=> '/pendataan/dbkb/nonStandar/<ctr>',

				'/pendataan/harga-referensi/tambah' => '/pendataan/harga-referensi/tambah',
				'/pendataan/harga-referensi/<id:[A-Za-z0-9\-_]+>' => '/pendataan/harga-referensi/detail',
				'/pendataan/harga-referensi/<id:[A-Za-z0-9\-_]+>/edit' => '/pendataan/harga-referensi/edit',

				'/penetapan/verifikasi-e-sptpd/<ctr:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan>'
				=> '/penetapan/verifikasiESptpd/<ctr>',
				'/penetapan/verifikasi-e-sptpd/<ctr:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan>/tambah'
				=> '/penetapan/verifikasiESptpd/<ctr>/tambah',
				'/penetapan/verifikasi-e-sptpd/<ctr:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan>/<id:[A-Za-z0-9\-]+>'
				=> '/penetapan/verifikasiESptpd/<ctr>/detail',
				'/penetapan/<type:sptpd|skpd>/<ctr:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan|pajak-reklame>/tambah'
				=> '/penetapan/<type>/<ctr>/tambah',
				'/penetapan/<type:sptpd|skpd>/<ctr:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan|pajak-reklame>/<id:[A-Za-z0-9\-]+>'
				=> '/penetapan/<type>/<ctr>/detail',
				'/penetapan/<type:sptpd|skpd>/<ctr:pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan|pajak-reklame>/<id:[A-Za-z0-9\-]+>/edit'
				=> '/penetapan/<type>/<ctr>/edit',

				'/penetapan/skpdkb-skpdkbt/<ctr:sa|oa>' => '/penetapan/skpdkbSkpdkbt/<ctr>',
				'/penetapan/skpdkb-skpdkbt/<ctr:sa|oa>/tambah' => '/penetapan/skpdkbSkpdkbt/<ctr>/tambah',
				'/penetapan/skpdkb-skpdkbt/<ctr:sa|oa>/edit' => '/penetapan/skpdkbSkpdkbt/<ctr>/edit',

				'/penetapan/massal-skpdkb/<ctr:pajak-reklame|pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan>'
				=> '/penetapan/massalSkpdkb/<ctr>',
				'/penetapan/massal-skpdkb/<ctr:pajak-reklame|pajak-hotel|pajak-resto|pajak-air-tanah|pajak-parkir|pajak-hiburan|pajak-penerangan-jalan>/<id:[A-Za-z0-9\-_]+>/detail'
				=> '/penetapan/massalSkpdkb/<ctr>/detail',

				'/penetapan/penilaian-penetapan-cetak-massal-pbb/<ctr:cetak-massal-sppt|copy-dbkb-znt-tp-sppt-masal>' => '/penetapan/penilaianPenetapanCetakMassalPbb/<ctr>',
				'/penetapan/penilaian-penetapan-cetak-massal-pbb/<ctr:cetak-massal-sppt|copy-dbkb-znt-tp-sppt-masal>/tambah' => '/penetapan/penilaianPenetapanCetakMassalPbb/<ctr>/tambah',
				'/penetapan/penilaian-penetapan-cetak-massal-pbb/<ctr:cetak-massal-sppt|copy-dbkb-znt-tp-sppt-masal>/<id:[A-Za-z0-9\-_]+>' => '/penetapan/penilaianPenetapanCetakMassalPbb/<ctr>/detail',
				'/penetapan/penilaian-penetapan-cetak-massal-pbb/<ctr:cetak-massal-sppt|copy-dbkb-znt-tp-sppt-masal>/<id:[A-Za-z0-9\-_]+>/edit' => '/penetapan/penilaianPenetapanCetakMassalPbb/<ctr>/edit',

				'/penetapan/penilaian/<ctr:massal|laporan>/tambah' => '/penetapan/penilaian/<ctr>/tambah',
				'/penetapan/penilaian/<ctr:massal|laporan>/<id:[A-Za-z0-9\-_]+>' => '/penetapan/penilaian/<ctr>/detail',

				'/penetapan/info-sppt-skp/<ctr:relasi-op-sp|rinci-skp-spop|rinci-skp-kurang-byr|pbb-lebih-kurang-byr>'
				=> '/penetapan/infoSpptSkp/<ctr>',

				'/penetapan/perubahan-sppt-skp/pembetulan/<ctr:' .
					'input-tungal|proses-tunggal|input-kolektif|proses-kolektif|secara-jabatan|cetak-secara-jabatan>'
				=> '/penetapan/perubahanSpptSkp/pembetulan/<ctr>',

				'/penetapan/perubahan-sppt-skp/batal/<ctr:input-tunggal|proses-tunggal|input-kolektif|proses-kolektif>'
				=> '/penetapan/perubahanSpptSkp/batal/<ctr>',

				'/penetapan/lap-dist-op/<ctr:per-kelompok-jpb|per-kelas|perbandingan-kelas-per-desa-kelurahan|per-group-ketetapan>'
				=> '/penetapan/lapDistOp/<ctr>',

				'/penetapan/verifikasi-e-bphtb/' => '/penetapan/verifikasi-e-bphtb',
				'/penetapan/verifikasi-e-bphtb/<id:[A-Za-z0-9\-_]+>' => '/penetapan/verifikasi-e-bphtb/detail',
				'/penetapan/verifikasi-e-bphtb/<id:[A-Za-z0-9\-_]+>/edit' => '/penetapan/verifikasi-e-bphtb/edit',

				'/penetapan/validasi-e-bphtb/' => '/penetapan/validasi-e-bphtb',
				'/penetapan/validasi-e-bphtb/<id:[A-Za-z0-9\-_]+>' => '/penetapan/validasi-e-bphtb/detail',
				'/penetapan/validasi-e-bphtb/<id:[A-Za-z0-9\-_]+>/edit' => '/penetapan/validasi-e-bphtb/edit',

				'/penetapan/simulasi-penetapan-massal-pbb/' => '/penetapan/simulasi-penetapan-massal-pbb',
				'/penetapan/simulasi-penetapan-massal-pbb/sppt' => '/penetapan/simulasi-penetapan-massal-pbb/sppt',
				// '/penetapan/simulasi-penetapan-massal-pbb/<id:[A-Za-z0-9\-_]+>' => '/penetapan/simulasi-penetapan-massal-pbb/detail',
				'/penetapan/simulasi-penetapan-massal-pbb/<id:[A-Za-z0-9\-_]+>/edit' => '/penetapan/simulasi-penetapan-massal-pbb/edit',

				//'/peta-pajak/<ctr:kelas-bangunan|jenis-tanah|jenis-peruntukan-bangunan|znt|tunggakan-pajak|objek-pajak|fasum-fasos|reklame|pdl|cetak-peta>'
				'/peta-pajak/<ctr:kelas-bangunan|jenis-tanah|jenis-peruntukan-bangunan|znt|tunggakan-pajak|objek-pajak|fasum-fasos|reklame|pdl>'
				=> '/petaPajak/<ctr>',

				'/peta-pajak/<ctr:kelas-bangunan|jenis-tanah|jenis-peruntukan-bangunan|znt|tunggakan-pajak|objek-pajak|fasum-fasos|reklame|pdl|cetak-peta>'
				=> '/petaPajak/<ctr>',

				'/penagihan-pemeriksaan/<ctr:surat-tagihan-pd|surat-peringatan-tunggak-pd|und-pemeriksaan|bapp|jurnal-piutang|pencabutan-surat-sita>'
				=> '/penagihanPemeriksaan/<ctr>',
				'/penagihan-pemeriksaan/<ctr:surat-tagihan-pd|surat-peringatan-tunggak-pd|und-pemeriksaan|bapp|jurnal-piutang|pencabutan-surat-sita>/tambah'
				=> '/penagihanPemeriksaan/<ctr>/tambah',
				'/penagihan-pemeriksaan/<ctr:surat-tagihan-pd|surat-peringatan-tunggak-pd|und-pemeriksaan|bapp|jurnal-piutang|pencabutan-surat-sita>/<id:[\d]+>'
				=> '/penagihanPemeriksaan/<ctr>/detail',

				'/penagihan-pemeriksaan/penagihan/pengeluaran-himbauan' => '/penagihanPemeriksaan/penagihan/pengeluaran-himbauan',
				'/penagihan-pemeriksaan/penagihan/tunggakan/lap-op-tunggakan' => '/penagihanPemeriksaan/penagihan/tunggakan/lap-op-tunggakan',

				'/jaminan-bongkar-reklame/<id:[\d]+>' => '/jaminan-bongkar-reklame/detail',
				'/jaminan-bongkar-reklame/<id:[\d]+>/proses' => '/jaminan-bongkar-reklame/proses',

				'/keberatan/penyelesaian-permohonan/<ctr:input|cetak>' => '/keberatan/penyelesaianPermohonan/<ctr>',
				'/keberatan/pembetulan-sk/<ctr:input|cetak>' => '/keberatan/pembetulanSk/<ctr>',
				'/keberatan/verifikasi-data-permohonan/' => '/keberatan/verifikasi-data-permohonan',
				'/keberatan/verifikasi-data-permohonan/<id:[A-Za-z0-9\-_]+>' => '/keberatan/verifikasi-data-permohonan/detail',
				'/keberatan/verifikasi-data-permohonan/<id:[A-Za-z0-9\-_]+>/verifikasi' => '/keberatan/verifikasi-data-permohonan/verifikasi',

				'/pengurangan/<id:[\d]+>' => '/pengurangan/detail',
				'/pengurangan/pajak-daerah/tambah' => '/pengurangan/pajak-daerah/tambah',
				'/pengurangan/pajak-daerah/<id:[A-Za-z0-9\-_]+>' => '/pengurangan/pajak-daerah/detail',
				'/pengurangan/verifikasi-pdl/<id:[A-Za-z0-9\-_]+>' => '/pengurangan/verifikasi-pdl/detail',
				'/pengurangan/verifikasi-data-permohonan/' => '/pengurangan/verifikasi-data-permohonan',
				'/pengurangan/verifikasi-data-permohonan/<id:[A-Za-z0-9\-_]+>' => '/pengurangan/verifikasi-data-permohonan/detail',
				'/pengurangan/verifikasi-data-permohonan/<id:[A-Za-z0-9\-_]+>/verifikasi' => '/pengurangan/verifikasi-data-permohonan/verifikasi',

				'/bendahara/pembayaran-pdl/<ctr:surat-tanda-setoran-pd|surat-tanda-setoran>' => '/bendahara/pembayaranPdl/<ctr>',
				'/bendahara/pembayaran-pdl/<ctr:surat-tanda-setoran-pd|surat-tanda-setoran>/tambah' => '/bendahara/pembayaranPdl/<ctr>/tambah',
				'/bendahara/pembayaran-pdl/<ctr:surat-tanda-setoran-pd|surat-tanda-setoran>/<id:[\d]+>' => '/bendahara/pembayaranPdl/<ctr>/detail',

				'/bendahara/pembayaran-pbb/<ctr:tunggal|ssp-pbb|surat-ket-pembayaran-elektro>' => '/bendahara/pembayaranPbb/<ctr>',
				'/bendahara/pembayaran-pbb/<ctr:tunggal|ssp-pbb|surat-ket-pembayaran-elektro>/tambah' => '/bendahara/pembayaranPbb/<ctr>/tambah',
				'/bendahara/pembayaran-pbb/<ctr:tunggal|ssp-pbb|surat-ket-pembayaran-elektro>/<id:[\d]+>' => '/bendahara/pembayaranPbb/<ctr>/detail',

				'/bendahara/surat-setoran-pajak-daerah/<id:[\d]+>' => '/bendahara/surat-setoran-pajak-daerah/detail',
				'/bendahara/surat-tanda-setoran/<id:[\d]+>' => '/bendahara/surat-tanda-setoran/detail',

				'/bendahara/tempat-pembayaran/elektro/update-va-satuan' => '/bendahara/tempatPembayaran/elektro/update-va-satuan',

				'/bendahara/pembayaran-bphtb' => '/bendahara/pembayaran-bphtb',
				'/bendahara/pembayaran-bphtb/tambah' => '/bendahara/pembayaran-bphtb/tambah',
				'/bendahara/pembayaran-bphtb/<id:[A-Za-z0-9\-_]+>' => '/bendahara/pembayaran-bphtb/detail',
				'/bendahara/pembayaran-bphtb/<id:[A-Za-z0-9\-_]+>/edit' => '/bendahara/pembayaran-bphtb/edit',

				'/ppat/manajemen-user-ppat/<id:[\d]+>/<action:(edit|delete)>' => '/ppat/manajemen-user-ppat/<action>',
				'/ppat/transaksi-ppat/tambah' => '/ppat/transaksi-ppat/tambah',
				'/ppat/transaksi-ppat/<id:[\d]+>' => '/ppat/transaksi-ppat/detail',
				'/ppat/transaksi-ppat/<id:[\d]+>/edit' => '/ppat/transaksi-ppat/edit',

				'/customer-service/chat' => '/customerService/chat',

				'/konfigurasi/manajemen-user/<ctr:user-pegawai|group>' => '/konfigurasi/manajemenUser/<ctr>',
				'/konfigurasi/manajemen-user/<ctr:user-pegawai|group>/tambah' => '/konfigurasi/manajemenUser/<ctr>/tambah',
				'/konfigurasi/manajemen-user/<ctr:user-pegawai|group>/<id:[\d]+>/<action:(edit|delete)>' => '/konfigurasi/manajemenUser/<ctr>/<action>',

				'/lihat/data-op/<ctr:spop-lspop|op-keringanan-permanen|objek-bersama|catatan-pembayaran-pbb|catatan-sejarah-wp|' .
					'catatan-sejarah-op|rekapitulasi-op|op-pengurangan-stimulus-kebijakan-pengenaan|op-tanpa-peta|op-sin|objek-nilai-individu>'
				=> '/lihat/dataOp/<ctr>',
				'/lihat/data-op/<ctr:spop-lspop|op-keringanan-permanen|objek-bersama|catatan-pembayaran-pbb|catatan-sejarah-wp|' .
					'catatan-sejarah-op|rekapitulasi-op|op-pengurangan-stimulus-kebijakan-pengenaan|op-tanpa-peta|op-sin|objek-nilai-individu>/<id:[\d]+>'
				=> '/lihat/dataOp/<ctr>/detail',
				'/lihat/kinerja-org/<ctr:stat-kinerja-pelayanan|rinci-pendataan-lapangan|rinci-rekam-data|rinci-rekam-stts|rinci-rekam-td-terima-sppt>'
				=> '/lihat/kinerjaOrg/<ctr>',

				// '/konfigurasi/data-ref/resource/<ctr:harga|lap-harga>' => '/konfigurasi/data-ref/resource/<ctr>',

				// '/konfigurasi/data-ref/master/<ctr:' .
				// 	'nop|ppat|nik|provinsi|kabupaten|kecamatan|kelurahan|bank-user|jenis-perolehan|' .
				// 	'referensi-bank|pegawai|satuan-kerja|rekening|anggaran|sumber-dana|bendahara|jurnal|harga-ref>'
				// => '/konfigurasi/dataRef/master/<ctr>',

				// '/konfigurasi/data-ref/<ctr:wilayah|tempat-pembayaran-sppt-massal|buku-njoptkp-tarif|kantor-lelang|ref-umum|parameter-keluaran-pst>' => '/konfigurasi/dataRef/<ctr>',
				// '/konfigurasi/data-ref/<ctr:wilayah|tempat-pembayaran-sppt-massal|buku-njoptkp-tarif|kantor-lelang|ref-umum|parameter-keluaran-pst>/tambah' => '/konfigurasi/dataRef/<ctr>/tambah',

				// '/konfigurasi/lihat/data-op/<ctr:' .
				// 	'spop-lspop|op-dengan-keringanan-permanen|objek-bersama|objek-nilai-individu|' .
				// 	'catatan-pembayaran-pbb|catatan-sejarah-wp|catatan-sejarah-op|daftar-rekapitulasi-op|' .
				// 	'op-dengan-pengurangan-stimulus-kebijakan-pengenaan|daftar-op-tanpa-peta|op-yang-telah-dihapus|daftar-op-sin>'
				// => '/konfigurasi/lihat/dataOp/<ctr>',

				// '/konfigurasi/lihat/kinerja-org/<ctr:stat-kinerja-pelayanan|rinci-pendataan-lapangan|rinci-perekaman-data|rinci-perekaman-stts|rinci-perekaman-tanda-terima-sppt>'
				// => '/konfigurasi/lihat/kinerjaOrg/<ctr>',

				// '/konfigurasi/lihat/daftar-perubahan/<ctr:data-op|tabel-znt>' => '/konfigurasi/lihat/daftarPerubahan/<ctr>',
				// '/konfigurasi/lihat/sejarah/<ctr:op|sppt>' => '/konfigurasi/lihat/sejarah/<ctr>',
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
