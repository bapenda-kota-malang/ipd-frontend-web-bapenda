<?php

$mainMenuData = [
	['label'=> 'Dashboard', 'url'=> '/'],
	['label'=> 'Pelayanan', 'url'=> '/pelayanan', 'items'=> [
		['label'=> 'Data Permohonan', 'url'=> '/pelayanan/data-permohonan']
	]],
	['label'=> 'Pendaftaran', 'url'=> '/pendaftaran', 'items'=> [
		['label'=> 'Pendaftaran Wajib Pajak', 'url'=> '/pendaftaran/wajib-pajak'],
		['label'=> 'Verifikasi Pendaftaran User WP', 'url'=> '/pendaftaran/verifikasi-user-wp'],
		['label'=> 'Verifikasi Pendaftaran NPWPD', 'url'=> '/pendaftaran/verifikasi-npwpd'],
		['label'=> 'Assigntment NPWPD', 'url'=> '/pendaftaran/assigntment-npwpd']
	]],
	['label'=> 'Pendataan', 'url'=> '/pendataan', 'items'=> [
		['label'=> 'Potensi Objek/Wajib Pajak Baru', 'url'=> '/pendataan/potensi-owp-baru'],
		['label'=> 'Kunjungan Pendataan', 'url'=> '/pendataan/kunjungan'],
		['label'=> 'SPOP/LSPOP', 'url'=> '/pendataan/spop-lspop', 'items'=> [
			['label'=> 'Daftar SPOP/LSPOP', 'url'=> '/pendataan/spop-lspop/daftar'],
			['label'=> 'Verifikasi e-SPOP/e-LSPOP', 'url'=> '/pendataan/spop-lspop/verifikasi'],
			['label'=> 'Informasi Rinci SPPT', 'url'=> '/pendataan/spop-lspop/info-rinci-sppt']
		]],
		['label'=> 'Pendataan Obyek Pajak', 'url'=> '/pendataan/obyek-pajak', 'items'=> [
			['label'=> 'Updating Jalan Standar', 'url'=> '/pendataan/obyek-pajak/updating-jalan-standar'],
			['label'=> 'Rencana Pendataan', 'url'=> '/pendataan/obyek-pajak/rencana-pendataan']
		]],
		['label'=> 'Laporan Pendataan OP', 'url'=> '/pendataan/laporan', 'items'=> [
			['label'=> 'Laporan Tabel-Tabel Referensi', 'url'=> '/pendataan/laporan/tabel-referensi'],
			['label'=> 'Laporan Data OP', 'url'=> '/pendataan/laporan/data-op'],
			['label'=> 'Laporan SK Ka. Kanwil', 'url'=> '/pendataan/laporan/sk-ka-kanwil']
		]],
		['label'=> 'Pemekaran Wilayah', 'url'=> '/pendataan/pemekaran-wilayah'],
		['label'=> 'Reklas', 'url'=> '/pendataan/reklas'],
		['label'=> 'Pemberian Flag NJOPTKP', 'url'=> '/pendataan/pemberian-flag-njoptkp'],
		['label'=> 'Update RT/RW Massal', 'url'=> '/pendataan/update-rt-rw-massal'],
		['label'=> 'Daftar Nilai Individu < Nilai Sistem', 'url'=> '/pendataan/nilai-individu-lk-sistem'],
		['label'=> 'SIN', 'url'=> '/pendataan/sin', 'items'=> [
			['label'=> 'Orang Pribadi dan Badan', 'url'=> '/pendataan/sin/orang-pribadi-badan'],
			['label'=> 'Aset Negara Aset Daerah', 'url'=> '/pendataan/sin/aset-negara-aset-daerah']
		]],
		['label'=> 'Relasi NOP-NPWPD', 'url'=> '/pendataan/relasi-nop-npwpd'],
		['label'=> 'Pembuatan ZNT', 'url'=> '/pendataan/znt', 'items'=> [
			['label'=> 'Pembuatan Tabel Blok', 'url'=> '/pendataan/znt/pembuatan-tabel-blok'],
			['label'=> 'Perubahan NIR', 'url'=> '/pendataan/znt/perubahan-nir'],
			['label'=> 'Pembuatan Tabel Peta ZNT', 'url'=> '/pendataan/znt/pembuatan-tabel-peta-znt'],
			['label'=> 'Perubahan ZNT Massal', 'url'=> '/pendataan/znt/perubahan-znt-massal']
		]],
		['label'=> 'Pembuatan DBKB', 'url'=> '/pendataan/dbkb', 'items'=> [
			['label'=> 'DBKB Standar', 'url'=> '/pendataan/dbkb/standar', 'items'=> [
				['label'=> 'DBKB Fasilitas Umum', 'url'=> '/pendataan/dbkb/standar/fasilitas-umum']
			]],
			['label'=> 'DBKB Non Standar', 'url'=> '/pendataan/dbkb/non-standar', 'items'=> [
				['label'=> 'DBKB JPB 2', 'url'=> '/pendataan/dbkb/non-standar/jpb-2'],
				['label'=> 'DBKB JPB 3', 'url'=> '/pendataan/dbkb/non-standar/jpb-3'],
				['label'=> 'DBKB JPB 4', 'url'=> '/pendataan/dbkb/non-standar/jpb-4'],
				['label'=> 'DBKB JPB 5', 'url'=> '/pendataan/dbkb/non-standar/jpb-5'],
				['label'=> 'DBKB JPB 6', 'url'=> '/pendataan/dbkb/non-standar/jpb-6'],
				['label'=> 'DBKB JPB 7', 'url'=> '/pendataan/dbkb/non-standar/jpb-7'],
				['label'=> 'DBKB JPB 8_A', 'url'=> '/pendataan/dbkb/non-standar/jpb-8_a'],
				['label'=> 'DBKB JPB 8_B', 'url'=> '/pendataan/dbkb/non-standar/jpb-8_b'],
				['label'=> 'DBKB JPB 9', 'url'=> '/pendataan/dbkb/non-standar/jpb-9'],
				['label'=> 'DBKB JPB 12', 'url'=> '/pendataan/dbkb/non-standar/jpb-12'],
				['label'=> 'DBKB JPB 13', 'url'=> '/pendataan/dbkb/non-standar/jpb-13'],
				['label'=> 'DBKB JPB 14', 'url'=> '/pendataan/dbkb/non-standar/jpb-14'],
				['label'=> 'DBKB JPB 15', 'url'=> '/pendataan/dbkb/non-standar/jpb-15'],
				['label'=> 'DBKB JPB 16', 'url'=> '/pendataan/dbkb/non-standar/jpb-16'],
				['label'=> 'DBKB MEZZANIN', 'url'=> '/pendataan/dbkb/non-standar/mezzanin']
			]]
		]],
		['label'=> 'Kelas Tanah', 'url'=> '/pendataan/kelas-tanah'],
		['label'=> 'Kelas Bangunan', 'url'=> '/pendataan/kelas-bangunan']
	]],
	['label'=> 'Penetapan', 'url'=> '/penetapan', 'items'=> [
		['label'=> 'Verifikasi e-SPTPD', 'url'=> '/penetapan/verifikasi-e-sptpd', 'items'=> [
			['label'=> 'Pajak Hotel', 'url'=> '/penetapan/verifikasi-e-sptpd/pajak-hotel'],
			['label'=> 'Pajak Resto', 'url'=> '/penetapan/verifikasi-e-sptpd/pajak-resto'],
			['label'=> 'Pajak Air Tanah', 'url'=> '/penetapan/verifikasi-e-sptpd/pajak-air-tanah'],
			['label'=> 'Pajak Parkir', 'url'=> '/penetapan/verifikasi-e-sptpd/pajak-parkir'],
			['label'=> 'Pajak Hiburan', 'url'=> '/penetapan/verifikasi-e-sptpd/pajak-hiburan'],
			['label'=> 'Pajak Penerangan Jalan', 'url'=> '/penetapan/verifikasi-e-sptpd/pajak-penerangan-jalan']
		]],
		['label'=> 'Verifikasi e-BPHTB', 'url'=> '/penetapan/verifikasi-e-bphtb'],
		['label'=> 'Validasi e-BPHTB', 'url'=> '/penetapan/validasi-e-bphtb'],
		['label'=> 'SPTPD', 'url'=> '/penetapan/sptpd', 'items'=> [
			['label'=> 'Pajak Hotel', 'url'=> '/penetapan/sptpd/pajak-hotel'],
			['label'=> 'Pajak Resto', 'url'=> '/penetapan/sptpd/pajak-resto'],
			['label'=> 'Pajak Air Tanah', 'url'=> '/penetapan/sptpd/pajak-air-tanah'],
			['label'=> 'Pajak Parkir', 'url'=> '/penetapan/sptpd/pajak-parkir'],
			['label'=> 'Pajak Hiburan', 'url'=> '/penetapan/sptpd/pajak-hiburan'],
			['label'=> 'Pajak Penerangan Jalan', 'url'=> '/penetapan/sptpd/pajak-penerangan-jalan']
		]],
		['label'=> 'SKPD', 'url'=> '/penetapan/skpd', 'items'=> [
			['label'=> 'Pajak Reklame', 'url'=> '/penetapan/skpd/pajak-reklame'],
			['label'=> 'Pajak Hotel', 'url'=> '/penetapan/skpd/pajak-hotel'],
			['label'=> 'Pajak Resto', 'url'=> '/penetapan/skpd/pajak-resto'],
			['label'=> 'Pajak Air Tanah', 'url'=> '/penetapan/skpd/pajak-air-tanah'],
			['label'=> 'Pajak Parkir', 'url'=> '/penetapan/skpd/pajak-parkir'],
			['label'=> 'Pajak Hiburan', 'url'=> '/penetapan/skpd/pajak-hiburan'],
			['label'=> 'Pajak Penerangan Jalan', 'url'=> '/penetapan/skpd/pajak-penerangan-jalan']
		]],
		['label'=> 'SKPDKB/SKPDKBT', 'url'=> '/penetapan/skpdkb-skpdkbt', 'items'=> [
			['label'=> 'SA', 'url'=> '/penetapan/skpdkb-skpdkbt/sa'],
			['label'=> 'OA', 'url'=> '/penetapan/skpdkb-skpdkbt/oa']
		]],
		['label'=> 'Surat Ketetapan Pajak Daerah Lebih Bayar', 'url'=> '/penetapan/skpdlb'],
		['label'=> 'Penetapan Massal Surat Ketetapan Pajak Daerah/ Surat Ketetapan Pajak Daerah Kurang Bayar', 'url'=> '/penetapan/massal-skpdkb', 'items'=> [
			['label'=> 'Pajak Reklame', 'url'=> '/penetapan/massal-skpdkb/pajak-reklame'],
			['label'=> 'Pajak Hotel', 'url'=> '/penetapan/massal-skpdkb/pajak-hotel'],
			['label'=> 'Pajak Resto', 'url'=> '/penetapan/massal-skpdkb/pajak-resto'],
			['label'=> 'Pajak Air Tanah', 'url'=> '/penetapan/massal-skpdkb/pajak-air-tanah'],
			['label'=> 'Pajak Parkir', 'url'=> '/penetapan/massal-skpdkb/pajak-parkir'],
			['label'=> 'Pajak Hiburan', 'url'=> '/penetapan/massal-skpdkb/pajak-hiburan'],
			['label'=> 'Pajak Penerangan Jalan', 'url'=> '/penetapan/massal-skpdkb/pajak-penerangan-jalan']
		]],
		['label'=> 'Penetapan Terseleksi PBB', 'url'=> '/penetapan/terseleksi-pbb'],
		['label'=> 'Penilaian, Penetapan dan Cetak Massal PBB', 'url'=> '/penetapan/penilaian-penetapan-cetak-massal-pbb', 'items'=> [
			['label'=> 'Cetak Massal SPPT PBB', 'url'=> '/penetapan/penilaian-penetapan-cetak-massal-pbb/cetak-massal-sppt'],
			['label'=> 'Copy DBKB. ZNT. TP SPPT Masal Tahun Sebelumnya', 'url'=> '/penetapan/penilaian-penetapan-cetak-massal-pbb/copy-dbkb-znt-tp-sppt-masal']
		]],
		['label'=> 'Simulasi Penetapan Massal PBB', 'url'=> '/penetapan/simulasi-penetapan-massal-pbb'],
		['label'=> 'Salinan SPPT PBB', 'url'=> '/penetapan/salinan-sppt-pbb'],
		['label'=> 'Penetapan SPPT Terseleksi', 'url'=> '/penetapan/sppt-terseleksi'],
		['label'=> 'Informasi SPPT/SKP', 'url'=> '/penetapan/info-sppt-skp', 'items'=> [
			['label'=> 'Informasi Relasi Objek Pajak Dengan Subyek Pajak', 'url'=> '/penetapan/info-sppt-skp/relasi-op-sp'],
			['label'=> 'Informasi RInci SKP Terhadap SPOP', 'url'=> '/penetapan/info-sppt-skp/rinci-skp-spop'],
			['label'=> 'Informasi Rinci SKP Kurang Bayar', 'url'=> '/penetapan/info-sppt-skp/rinci-skp-kurang-byr'],
			['label'=> 'Daftar PBB Lebih atau Kurang Bayar', 'url'=> '/penetapan/info-sppt-skp/pbb-lebih-kurang-byr']
		]],
		['label'=> 'Perubahan SPPT/SKP', 'url'=> '/penetapan/perubahan-sppt-skp', 'items'=> [
			['label'=> 'Pembetulan SPPT/SKP', 'url'=> '/penetapan/perubahan-sppt-skp/pembetulan', 'items'=> [
				['label'=> 'Input SK Pembetulan Tunggal', 'url'=> '/penetapan/perubahan-sppt-skp/pembetulan/input-tungal'],
				['label'=> 'Proses SK Pembetulan Tunggal', 'url'=> '/penetapan/perubahan-sppt-skp/pembetulan/proses-tunggal'],
				['label'=> 'Input SK Pembetulan Kolektif', 'url'=> '/penetapan/perubahan-sppt-skp/pembetulan/input-kolektif'],
				['label'=> 'Proses SK Pembetulan Kolektif', 'url'=> '/penetapan/perubahan-sppt-skp/pembetulan/proses-kolektif'],
				['label'=> 'Pembetulan Secara Jabatan', 'url'=> '/penetapan/perubahan-sppt-skp/pembetulan/secara-jabatan'],
				['label'=> 'Proses Cetak Pembetulan Secara Jabatan', 'url'=> '/penetapan/perubahan-sppt-skp/pembetulan/cetak-secara-jabatan']
			]],
			['label'=> 'Pembatalan SPPT/SKP', 'url'=> '/penetapan/perubahan-sppt-skp/batal', 'items'=> [
				['label'=> 'Input SK Pembatalan Tunggal', 'url'=> '/penetapan/perubahan-sppt-skp/batal/input-tunggal'],
				['label'=> 'Proses SK Pembatalan Tunggal', 'url'=> '/penetapan/perubahan-sppt-skp/batal/proses-tunggal'],
				['label'=> 'Input SK Pembatalan Kolektif', 'url'=> '/penetapan/perubahan-sppt-skp/batal/input-kolektif'],
				['label'=> 'Proses SK Pembatalan Kolektif', 'url'=> '/penetapan/perubahan-sppt-skp/batal/proses-kolektif']
			]]
		]],
		['label'=> 'Penundaan Tanggal Jatuh Tempo', 'url'=> '/penetapan/penundaan-tanggal-jatuh-tempo'],
		['label'=> 'Laporan Distribusi OP', 'url'=> '/penetapan/lap-dist-op', 'items'=> [
			['label'=> 'OP Per Kelompok JPB', 'url'=> '/penetapan/lap-dist-op/per-kelompok-jpb'],
			['label'=> 'OP Per Kelas', 'url'=> '/penetapan/lap-dist-op/per-kelas'],
			['label'=> 'Perbandingan Kelas Per Desa/Kelurahan', 'url'=> '/penetapan/lap-dist-op/perbandingan-kelas-per-desa-kelurahan'],
			['label'=> 'OP Per Group Ketetapan', 'url'=> '/penetapan/lap-dist-op/per-group-ketetapan']
		]],
		['label'=> 'Laporan Himpunan Ketetapan PBB/NJOP', 'url'=> '/penetapan/lap-himpunan-ketetapan-pbb-njop'],
		['label'=> 'Tanda Terima SPPT/SKP/STP', 'url'=> '/penetapan/tanda-terima-sppt-skp-stp'],
		['label'=> 'Penilaian', 'url'=> '/penetapan/penilaian', 'items'=> [
			['label'=> 'Penilaian Massal', 'url'=> '/penetapan/penilaian/massal'],
			['label'=> 'Laporan Penilaian', 'url'=> '/penetapan/penilaian/laporan']
		]]
	]],
	['label'=> 'Peta Pajak', 'url'=> '/peta-pajak', 'items'=> [
		['label'=> 'Peta Kelas Bangunan', 'url'=> '/peta-pajak/kelas-bangunan'],
		['label'=> 'Peta Jenis Tanah', 'url'=> '/peta-pajak/jenis-tanah'],
		['label'=> 'Peta Jenis Peruntukan Bangunan', 'url'=> '/peta-pajak/jenis-peruntukan-bangunan'],
		['label'=> 'Peta ZNT', 'url'=> '/peta-pajak/znt'],
		['label'=> 'Peta Tunggakan Pajak', 'url'=> '/peta-pajak/tunggakan-pajak'],
		['label'=> 'Peta Objek Pajak', 'url'=> '/peta-pajak/objek-pajak'],
		['label'=> 'Peta Fasum/Fasos', 'url'=> '/peta-pajak/fasum-fasos'],
		['label'=> 'Peta Reklame', 'url'=> '/peta-pajak/reklame'],
		['label'=> 'Peta PDL', 'url'=> '/peta-pajak/pdl'],
		['label'=> 'Cetak Peta', 'url'=> '/peta-pajak/cetak-peta']
	]],
	['label'=> 'Penagihan dan Pemeriksaan', 'url'=> '/penagihan-pemeriksaan', 'items'=> [
		['label'=> 'Surat Tagihan Pajak Daerah', 'url'=> '/penagihan-pemeriksaan/surat-tagihan-pd'],
		['label'=> 'Undangan Pemeriksaan', 'url'=> '/penagihan-pemeriksaan/und-pemeriksaan'],
		['label'=> 'Berita Acara Penagihan/Pemeriksaan', 'url'=> '/penagihan-pemeriksaan/bapp'],
		['label'=> 'Jurnal Piutang', 'url'=> '/penagihan-pemeriksaan/jurnal-piutang'],
		['label'=> 'Penagihan', 'url'=> '/penagihan-pemeriksaan/penagihan', 'items'=> [
			['label'=> 'Daftar Tunggakan', 'url'=> '/penagihan-pemeriksaan/penagihan/tunggakan', 'items'=> [
				['label'=> 'Laporan OP Tunggakan', 'url'=> '/penagihan-pemeriksaan/penagihan/tunggakan/lap-op-tunggakan']
			]],
			['label'=> 'Pengeluaran Himbauan', 'url'=> '/penagihan-pemeriksaan/penagihan/pengeluaran-himbauan']
		]],
		['label'=> 'Pencabutan dan Pencetakan Surat Sita', 'url'=> '/penagihan-pemeriksaan/pencabutan-dan-surat-sita']
	]],
	['label'=> 'Jaminan Bongkar Reklame', 'url'=> '/jaminan-bongkar-reklame'],
	['label'=> 'Bendahara', 'url'=> '/bendahara', 'items'=> [
		['label'=> 'Surat Setoran Pajak Daerah', 'url'=> '/bendahara/surat-setoran-pajak-daerah'],
		['label'=> 'Sinkronisasi Data Pembayaran Bank', 'url'=> '/bendahara/sinkronisasi-data-pembayaran-bank'],
		['label'=> 'Surat Tanda Setoran', 'url'=> '/bendahara/surat-tanda-setoran'],
		['label'=> 'Pembayaran', 'url'=> '/bendahara/pembayaran/pencatatan', 'items'=> [
			['label'=> 'Pencatatan Pembayaran', 'url'=> '/bendahara/pembayaran/pencatatan', 'items'=> [
				['label'=> 'Pencatatan Tunggal', 'url'=> '/bendahara/pembayaran/pencatatan/tunggal'],
				['label'=> 'Pencatatan SSP PBB', 'url'=> '/bendahara/pembayaran/pencatatan/ssp-pbb'],
				['label'=> 'Surat Keterangan Pembayaran Elektronik', 'url'=> '/bendahara/pembayaran/pencatatan/surat-ket-pembayaran-elektro']
			]]
		]],
		['label'=> 'Pembayaran BPHTB', 'url'=> '/bendahara/pembayaran-bphtb'],
		['label'=> 'Tempat Pembayaran', 'url'=> '/bendahara/tempat-pembayaran', 'items'=> [
			['label'=> 'Tempat pembayaran elektronik', 'url'=> '/bendahara/tempat-pembayaran/elektro', 'items'=> [
				['label'=> 'Update VA satuan', 'url'=> '/bendahara/tempat-pembayaran/elektro/update-va-satuan']
			]]
		]]
	]],
	['label'=> 'Pengurangan', 'url'=> '/pengurangan'],
	['label'=> 'Keberatan', 'url'=> '/keberatan', 'items'=> [
		['label'=> 'Varifikasi / Validasi', 'url'=> '/keberatan/verifikasi'],
		['label'=> 'Penyelesaian Permohonan Keberatan', 'url'=> '/keberatan/penyelesaian-permohonan', 'items'=> [
			['label'=> 'Input SK Keberatan PBB', 'url'=> '/keberatan/penyelesaian-permohonan/input'],
			['label'=> 'Mencetak SK Keberatan', 'url'=> '/keberatan/penyelesaian-permohonan/cetak']
		]],
		['label'=> 'Pembetulan SK Keberatan', 'url'=> '/keberatan/pembetulan-sk', 'items'=> [
			['label'=> 'Input Pembetulan SK Keberatan PBB', 'url'=> '/keberatan/pembetulan-sk/input'],
			['label'=> 'Mencetak Pembetulan SK Keberatan PBB', 'url'=> '/keberatan/pembetulan-sk/cetak']
		]]
	]],
	['label'=> 'Restitusi', 'url'=> '/restitusi', 'items'=> [
		['label'=> 'Restitusi Pajak Daerah', 'url'=> '/restitusi/pajak-daerah'],
		['label'=> 'Pemindahbukuan Pembayaran', 'url'=> '/restitusi/pemindahbukuan-pembayaran']
	]],
	['label'=> 'PPAT', 'url'=> '/ppat', 'items'=> [
		['label'=> 'Manajemen User PPAT', 'url'=> '/ppat/manajemen-user-ppat'],
		['label'=> 'Daftar Laporan PPAT', 'url'=> '/ppat/lap-ppat'],
		['label'=> 'Daftar Transaksi PPAT', 'url'=> '/ppat/transaksi-ppat'],
		['label'=> 'Ringkasan Bulanan Transaksi PPAT', 'url'=> '/ppat/ringkasan-bulanan-transaksi-ppat']
	]],
	['label'=> 'Pelaporan', 'url'=> '/pelaporan', 'items'=> [
		['label'=> 'Penerimaan', 'url'=> '/pelaporan/penerimaan'],
		['label'=> 'Setoran', 'url'=> '/pelaporan/setoran'],
		['label'=> 'Target dan Realisasi', 'url'=> '/pelaporan/target-realisasi'],
		['label'=> 'Target dan Realisasi per Jenis Pajak', 'url'=> '/pelaporan/target-realisasi-per-jenis-pajak'],
		['label'=> 'Rincian Wajib Pajak/Objek Pajak', 'url'=> '/pelaporan/rincian-wajib-pajak-objek-pajak'],
		['label'=> 'Buku Pembantu Penerimaan Sejenis via Bank', 'url'=> '/pelaporan/buku-pembantu-penerimaan-sejenis-via-bank'],
		['label'=> 'Buku Pembantu Per Rincian Objek Penerimaan', 'url'=> '/pelaporan/buku-pembantu-per-rincian-objek-penerimaan'],
		['label'=> 'Buku Rekapitulasi Penerimaan Harian/Bulanan/Tahunan', 'url'=> '/pelaporan/buku-rekap-penerimaan-hbt'],
		['label'=> 'Buku Kas Umum Penerimaan', 'url'=> '/pelaporan/buku-kas-umum-penerimaan']
	]],
	['label'=> 'Customer Service', 'url'=> '/customer-service', 'items'=> [
		['label'=> 'Chat Customer Service', 'url'=> '/customer-service/chat']
	]],
	['label'=> 'Konfigurasi', 'url'=> '/konfigurasi', 'items'=> [
		['label'=> 'Manajemen User', 'url'=> '/konfigurasi/manajemen-user', 'items'=> [
			['label'=> 'User', 'url'=> '/konfigurasi/manajemen-user/user'],
			['label'=> 'Group', 'url'=> '/konfigurasi/manajemen-user/group']
		]],
		['label'=> 'Data Referensi', 'url'=> '/konfigurasi/data-ref', 'items'=> [
			['label'=> 'Wilayah', 'url'=> '/konfigurasi/data-ref/wilayah'],
			['label'=> 'Tempat Pembayaran SPPT Massal', 'url'=> '/konfigurasi/data-ref/tempat-pembayaran-sppt-massal'],
			['label'=> 'Resource', 'url'=> '/konfigurasi/data-ref/resource', 'items'=> [
				['label'=> 'Harga Resource', 'url'=> '/konfigurasi/data-ref/resource/harga'],
				['label'=> 'Laporan Harga Resource', 'url'=> '/konfigurasi/data-ref/resource/lap-harga']
			]],
			['label'=> 'Buku/NJOPTKP/Tarif', 'url'=> '/konfigurasi/data-ref/buku-njoptkp-tarif'],
			['label'=> 'Kantor Lelang', 'url'=> '/konfigurasi/data-ref/kantor-lelang'],
			['label'=> 'Ref Umum', 'url'=> '/konfigurasi/data-ref/ref-umum'],
			['label'=> 'Parameter Keluaran PST', 'url'=> '/konfigurasi/data-ref/parameter-keluaran-pst'],
			['label'=> 'Master Data', 'url'=> '/konfigurasi/data-ref/master', 'items'=> [
				['label'=> 'NOP', 'url'=> '/konfigurasi/data-ref/master/nop'],
				['label'=> 'PPAT', 'url'=> '/konfigurasi/data-ref/master/ppat'],
				['label'=> 'NIK', 'url'=> '/konfigurasi/data-ref/master/nik'],
				['label'=> 'Provinsi', 'url'=> '/konfigurasi/data-ref/master/provinsi'],
				['label'=> 'Kabupaten', 'url'=> '/konfigurasi/data-ref/master/kabupaten'],
				['label'=> 'Kecamatan', 'url'=> '/konfigurasi/data-ref/master/kecamatan'],
				['label'=> 'Kelurahan', 'url'=> '/konfigurasi/data-ref/master/kelurahan'],
				['label'=> 'Bank User', 'url'=> '/konfigurasi/data-ref/master/bank-user'],
				['label'=> 'Jenis Perolehan', 'url'=> '/konfigurasi/data-ref/master/jenis-perolehan'],
				['label'=> 'Daftar Refrensi Bank', 'url'=> '/konfigurasi/data-ref/master/refrensi-bank'],
				['label'=> 'Pegawai', 'url'=> '/konfigurasi/data-ref/master/pegawai'],
				['label' => 'Satuan Kerja', 'url' => '/konfigurasi/data-ref/master/satuan-kerja'],
				['label' => 'Rekening', 'url' =>'/konfigurasi/data-ref/master/rekening'],
				['label' => 'Anggaran', 'url' =>'/konfigurasi/data-ref/master/anggaran'],
				['label' => 'Sumber Dana', 'url' =>'/konfigurasi/data-ref/master/sumber-dana'],
				['label' => 'Bendahara', 'url' =>'/konfigurasi/data-ref/master/bendahara'],
				['label' => 'Jurnal', 'url' =>'/konfigurasi/data-ref/master/jurnal'],
				['label' => 'Harga Referensi', 'url' =>'/konfigurasi/data-ref/master/harga-ref'],
			]]
		]],
		['label'=> 'Lihat', 'url'=> '/konfigurasi/lihat', 'items'=> [
			['label'=> 'Data Objek Pajak', 'url'=> '/konfigurasi/lihat/data-op/', 'items'=> [
				['label'=> 'Daftar SPOP/LSPOP', 'url'=> '/konfigurasi/lihat/data-op/spop-lspop'],
				['label'=> 'Daftar OP Dengan Keringanan Permanen', 'url'=> '/konfigurasi/lihat/data-op/op-keringanan-permanen'],
				['label'=> 'Daftar Objek Bersama', 'url'=> '/konfigurasi/lihat/data-op/objek-bersama'],
				['label'=> 'Daftar Objek Dengan Nilai Individu', 'url'=> '/konfigurasi/lihat/data-op/objek-nilai-individu'],
				['label'=> 'Catatan Pembayaran PBB', 'url'=> '/konfigurasi/lihat/data-op/catatan-pembayaran-pbb'],
				['label'=> 'Catatan Sejarah WP', 'url'=> '/konfigurasi/lihat/data-op/catatan-sejarah-wp'],
				['label'=> 'Catatan Sejarah OP', 'url'=> '/konfigurasi/lihat/data-op/catatan-sejarah-op'],
				['label'=> 'Daftar Rekapitulasi OP', 'url'=> '/konfigurasi/lihat/data-op/rekapitulasi-op'],
				['label'=> 'OP dengan Pengurangan Stimulus/Kebijakan Pengenaan', 'url'=> '/konfigurasi/lihat/data-op/op-pengurangan-stimulus-kebijakan-pengenaan'],
				['label'=> 'Daftar OP tanpa Peta', 'url'=> '/konfigurasi/lihat/data-op/op-tanpa-peta'],
				['label'=> 'Daftar OP yang Telah Dihapus', 'url'=> '/konfigurasi/lihat/data-op/op-yang-telah-dihapus'],
				['label'=> 'Daftar OP SIN', 'url'=> '/konfigurasi/lihat/data-op/op-sin']
			]],
			['label'=> 'Tabel', 'url'=> '/konfigurasi/lihat/tabel', 'items'=> [
				['label'=> 'ZNT', 'url'=> '/konfigurasi/lihat/tabel/znt'],
				['label'=> 'Jalan Standart', 'url'=> '/konfigurasi/lihat/tabel/jalan-std'],
				['label'=> 'Tempat Pembayaran', 'url'=> '/konfigurasi/lihat/tabel/tempat-pembayaran'],
				['label'=> 'Surat Keputusan', 'url'=> '/konfigurasi/lihat/tabel/surat-kep']
			]],
			['label'=> 'Penetapan', 'url'=> '/konfigurasi/lihat/penetapan', 'items'=> [
				['label'=> 'Daftar Tagihan Tidak Sampai', 'url'=> '/konfigurasi/lihat/penetapan/tagihan-tidak-sampai'],
				['label'=> 'Daftar Tegoran Diterbitkan', 'url'=> '/konfigurasi/lihat/penetapan/tegoran-diterbitkan'],
				['label'=> 'Daftar Penerimaan', 'url'=> '/konfigurasi/lihat/penetapan/penerimaan'],
				['label'=> 'Daftar Tunggakan', 'url'=> '/konfigurasi/lihat/penetapan/tunggakan']
			]],
			['label'=> 'Kinerja Organisasi', 'url'=> '/konfigurasi/lihat/kinerja-org', 'items'=> [
				['label'=> 'Statistik Kinerja Pelayanan', 'url'=> '/konfigurasi/lihat/kinerja-org/stat-kinerja-pelayanan'],
				['label'=> 'Rincian Pendataan Lapangan', 'url'=> '/konfigurasi/lihat/kinerja-org/rinci-pendataan-lapangan'],
				['label'=> 'Rincian Perekaman Data', 'url'=> '/konfigurasi/lihat/kinerja-org/rinci-rekam-data'],
				['label'=> 'Rincian Perekaman STTS', 'url'=> '/konfigurasi/lihat/kinerja-org/rinci-rekam-stts'],
				['label'=> 'Rincian Perekaman Tanda Terima SPPT', 'url'=> '/konfigurasi/lihat/kinerja-org/rinci-rekam-td-terima-sppt']]],
			['label'=> 'Daftar Perubahan', 'url'=> '/konfigurasi/lihat/perubahan', 'items'=> [
				['label'=> 'Daftar Perubahan Data OP', 'url'=> '/konfigurasi/lihat/perubahan/data-op'],
				['label'=> 'Daftar Perubahan Tabel ZNT', 'url'=> '/konfigurasi/lihat/perubahan/tabel-znt']
			]],
			['label'=> 'Sejarah Objek Pajak', 'url'=> '/konfigurasi/lihat/sejarah', 'items'=> [
				['label'=> 'Sejarah Objek Pajak', 'url'=> '/konfigurasi/lihat/sejarah/op'],
				['label'=> 'Sejarah SPPT', 'url'=> '/konfigurasi/lihat/sejarah/sppt']
			]],
			['label'=> 'Nomor Pelayanan', 'url'=> '/konfigurasi/lihat/nomor-pelayanan'],
			['label'=> 'NOP Terbesar', 'url'=> '/konfigurasi/lihat/nop-terbesar'],
			['label'=> 'Perubahan NOP', 'url'=> '/konfigurasi/lihat/perubahan-nop']
		]],
		['label'=> 'Konfigurasi Pajak', 'url'=> '/konfigurasi/pajak'],
		['label'=> 'Konfigurasi Pembayaran', 'url'=> '/konfigurasi/pembayaran'],
		['label'=> 'Konfigurasi API', 'url'=> '/konfigurasi/api'],
		['label'=> 'Pengumuman', 'url'=> '/konfigurasi/pengumuman'],
		['label'=> 'Utilitas', 'url'=> '/konfigurasi/utilitas', 'items'=> [
			['label'=> 'Setting Session', 'url'=> '/konfigurasi/utilitas/setting-session']
		]]
	]],
	['label'=> 'BPHTB', 'url'=> '/bphtb', 'items'=> [
		['label'=> 'Laporan BPHTB', 'url'=> '/bphtb/lap-bphtb'],
		['label'=> 'Pembayaran SSPD', 'url'=> '/bphtb/pembayaran-sspd'],
		['label'=> 'Kurang Bayar SSPD', 'url'=> '/bphtb/kurang-byr-sspd'],
		['label'=> 'Laporan Penerimaan Bank', 'url'=> '/bphtb/lap-penerimaan-bank'],
		['label'=> 'Cek Jumlah Transaksi Wajib Pajak', 'url'=> '/bphtb/jumlah-transaksi-wp']
	]],
	['label'=> 'Rak Berkas', 'url'=> '/rak-berkas']
];

