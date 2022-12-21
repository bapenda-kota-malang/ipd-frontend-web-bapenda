var menuArray = [
	['/pelayanan/data-permohonan', '/Pelayanan/Data Permohonan'],
	['/pendaftaran/wajib-pajak', '/Pendaftaran/Pendaftaran Wajib Pajak'],
	['/pendaftaran/verifikasi-user-wp', '/Pendaftaran/Verifikasi Pendaftaran User WP'],
	['/pendaftaran/verifikasi-npwpd', '/Pendaftaran/Verifikasi Pendaftaran NPWPD'],
	['/pendaftaran/assigntment-npwpd', '/Pendaftaran/Assigntment NPWPD'],
	['/pendataan/spopLspop/daftar', '/Pendataan/SPOP/LSPOP/Daftar SPOP/LSPOP'],
	['/pendataan/spopLspop/verifikasi', '/Pendataan/SPOP/LSPOP/Verifikasi e-SPOP/e-LSPOP'],
	['/pendataan/spopLspop/info-rinci-sppt', '/Pendataan/SPOP/LSPOP/Informasi Rinci SPPT'],
	['/pendataan/obyekPajak/updating-jalan-standar', '/Pendataan/Pendataan Obyek Pajak/Updating Jalan Standar'],
	['/pendataan/obyekPajak/rencana-pendataan', '/Pendataan/Pendataan Obyek Pajak/Rencana Pendataan'],
	['/pendataan/laporan/tabel-referensi', '/Pendataan/Laporan Pendataan OP/Laporan Tabel-Tabel Referensi'],
	['/pendataan/laporan/data-op', '/Pendataan/Laporan Pendataan OP/Laporan Data OP'],
	['/pendataan/laporan/sk-ka-kanwil', '/Pendataan/Laporan Pendataan OP/Laporan SK Ka. Kanwil'],
	['/pendataan/sin/orang-pribadi-badan', '/Pendataan/SIN/Orang Pribadi dan Badan'],
	['/pendataan/sin/aset-negara-aset-daerah', '/Pendataan/SIN/Aset Negara Aset Daerah'],
	['/pendataan/znt/pembuatan-tabel-blok', '/Pendataan/Pembuatan ZNT/Pembuatan Tabel Blok'],
	['/pendataan/znt/perubahan-nir', '/Pendataan/Pembuatan ZNT/Perubahan NIR'],
	['/pendataan/znt/pembuatan-tabel-peta-znt', '/Pendataan/Pembuatan ZNT/Pembuatan Tabel Peta ZNT'],
	['/pendataan/znt/perubahan-znt-massal', '/Pendataan/Pembuatan ZNT/Perubahan ZNT Massal'],
	['/pendataan/dbkb/standar/fasilitas-umum', '/Pendataan/Pembuatan DBKB/DBKB Standar/DBKB Fasilitas Umum'],
	['/pendataan/dbkb/nonStandar/jpb-2', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB JPB 2'],
	['/pendataan/dbkb/nonStandar/jpb-3', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB JPB 3'],
	['/pendataan/dbkb/nonStandar/jpb-4', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB JPB 4'],
	['/pendataan/dbkb/nonStandar/jpb-5', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB JPB 5'],
	['/pendataan/dbkb/nonStandar/jpb-6', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB JPB 6'],
	['/pendataan/dbkb/nonStandar/jpb-7', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB JPB 7'],
	['/pendataan/dbkb/nonStandar/jpb-8_a', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB JPB 8_A'],
	['/pendataan/dbkb/nonStandar/jpb-8_b', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB JPB 8_B'],
	['/pendataan/dbkb/nonStandar/jpb-9', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB JPB 9'],
	['/pendataan/dbkb/nonStandar/jpb-12', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB JPB 12'],
	['/pendataan/dbkb/nonStandar/jpb-13', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB JPB 13'],
	['/pendataan/dbkb/nonStandar/jpb-14', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB JPB 14'],
	['/pendataan/dbkb/nonStandar/jpb-15', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB JPB 15'],
	['/pendataan/dbkb/nonStandar/jpb-16', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB JPB 16'],
	['/pendataan/dbkb/nonStandar/mezzanin', '/Pendataan/Pembuatan DBKB/DBKB Non Standar/DBKB MEZZANIN'],
	['/pendataan/potensi-owp-baru', '/Pendataan/Potensi Objek/Wajib Pajak Baru'],
	['/pendataan/kunjungan', '/Pendataan/Kunjungan Pendataan'],
	['/pendataan/pemekaran-wilayah', '/Pendataan/Pemekaran Wilayah'],
	['/pendataan/reklas', '/Pendataan/Reklas'],
	['/pendataan/pemberian-flag-njoptkp', '/Pendataan/Pemberian Flag NJOPTKP'],
	['/pendataan/update-rt-rw-massal', '/Pendataan/Update RT/RW Massal'],
	['/pendataan/nilai-individu-lk-sistem', '/Pendataan/Daftar Nilai Individu < Nilai Sistem'],
	['/pendataan/relasi-nop-npwpd', '/Pendataan/Relasi NOP-NPWPD'],
	['/pendataan/kelas-tanah', '/Pendataan/Kelas Tanah'],
	['/pendataan/kelas-bangunan', '/Pendataan/Kelas Bangunan'],
	['/penetapan/verifikasiESptpd/pajak-hotel', '/Penetapan/Verifikasi e-SPTPD/Pajak Hotel'],
	['/penetapan/verifikasiESptpd/pajak-resto', '/Penetapan/Verifikasi e-SPTPD/Pajak Resto'],
	['/penetapan/verifikasiESptpd/pajak-air-tanah', '/Penetapan/Verifikasi e-SPTPD/Pajak Air Tanah'],
	['/penetapan/verifikasiESptpd/pajak-parkir', '/Penetapan/Verifikasi e-SPTPD/Pajak Parkir'],
	['/penetapan/verifikasiESptpd/pajak-hiburan', '/Penetapan/Verifikasi e-SPTPD/Pajak Hiburan'],
	['/penetapan/verifikasiESptpd/pajak-penerangan-jalan', '/Penetapan/Verifikasi e-SPTPD/Pajak Penerangan Jalan'],
	['/penetapan/sptpd/pajak-hotel', '/Penetapan/SPTPD/Pajak Hotel'],
	['/penetapan/sptpd/pajak-resto', '/Penetapan/SPTPD/Pajak Resto'],
	['/penetapan/sptpd/pajak-air-tanah', '/Penetapan/SPTPD/Pajak Air Tanah'],
	['/penetapan/sptpd/pajak-parkir', '/Penetapan/SPTPD/Pajak Parkir'],
	['/penetapan/sptpd/pajak-hiburan', '/Penetapan/SPTPD/Pajak Hiburan'],
	['/penetapan/sptpd/pajak-penerangan-jalan', '/Penetapan/SPTPD/Pajak Penerangan Jalan'],
	['/penetapan/skpd/pajak-reklame', '/Penetapan/SKPD/Pajak Reklame'],
	['/penetapan/skpd/pajak-hotel', '/Penetapan/SKPD/Pajak Hotel'],
	['/penetapan/skpd/pajak-resto', '/Penetapan/SKPD/Pajak Resto'],
	['/penetapan/skpd/pajak-air-tanah', '/Penetapan/SKPD/Pajak Air Tanah'],
	['/penetapan/skpd/pajak-parkir', '/Penetapan/SKPD/Pajak Parkir'],
	['/penetapan/skpd/pajak-hiburan', '/Penetapan/SKPD/Pajak Hiburan'],
	['/penetapan/skpd/pajak-penerangan-jalan', '/Penetapan/SKPD/Pajak Penerangan Jalan'],
	['/penetapan/skpdkbSkpdkbt/sa', '/Penetapan/SKPDKB/SKPDKBT/SA'],
	['/penetapan/skpdkbSkpdkbt/oa', '/Penetapan/SKPDKB/SKPDKBT/OA'],
	['/penetapan/massalSkpdkb/pajak-reklame', '/Penetapan/Penetapan Massal Surat Ketetapan Pajak Daerah/ Surat Ketetapan Pajak Daerah Kurang Bayar/Pajak Reklame'],
	['/penetapan/massalSkpdkb/pajak-hotel', '/Penetapan/Penetapan Massal Surat Ketetapan Pajak Daerah/ Surat Ketetapan Pajak Daerah Kurang Bayar/Pajak Hotel'],
	['/penetapan/massalSkpdkb/pajak-resto', '/Penetapan/Penetapan Massal Surat Ketetapan Pajak Daerah/ Surat Ketetapan Pajak Daerah Kurang Bayar/Pajak Resto'],
	['/penetapan/massalSkpdkb/pajak-air-tanah', '/Penetapan/Penetapan Massal Surat Ketetapan Pajak Daerah/ Surat Ketetapan Pajak Daerah Kurang Bayar/Pajak Air Tanah'],
	['/penetapan/massalSkpdkb/pajak-parkir', '/Penetapan/Penetapan Massal Surat Ketetapan Pajak Daerah/ Surat Ketetapan Pajak Daerah Kurang Bayar/Pajak Parkir'],
	['/penetapan/massalSkpdkb/pajak-hiburan', '/Penetapan/Penetapan Massal Surat Ketetapan Pajak Daerah/ Surat Ketetapan Pajak Daerah Kurang Bayar/Pajak Hiburan'],
	['/penetapan/massalSkpdkb/pajak-penerangan-jalan', '/Penetapan/Penetapan Massal Surat Ketetapan Pajak Daerah/ Surat Ketetapan Pajak Daerah Kurang Bayar/Pajak Penerangan Jalan'],
	['/penetapan/penilaianPenetapanCetakMassalPbb/cetak-massal-sppt', '/Penetapan/Penilaian, Penetapan dan Cetak Massal PBB/Cetak Massal SPPT PBB'],
	['/penetapan/penilaianPenetapanCetakMassalPbb/copy-dbkb-znt-tp-sppt-masal', '/Penetapan/Penilaian, Penetapan dan Cetak Massal PBB/Copy DBKB. ZNT. TP SPPT Masal Tahun Sebelumnya'],
	['/penetapan/infoSpptSkp/relasi-op-sp', '/Penetapan/Informasi SPPT/SKP/Informasi Relasi Objek Pajak Dengan Subyek Pajak'],
	['/penetapan/infoSpptSkp/rinci-skp-spop', '/Penetapan/Informasi SPPT/SKP/Informasi RInci SKP Terhadap SPOP'],
	['/penetapan/infoSpptSkp/rinci-skp-kurang-byr', '/Penetapan/Informasi SPPT/SKP/Informasi Rinci SKP Kurang Bayar'],
	['/penetapan/infoSpptSkp/pbb-lebih-kurang-byr', '/Penetapan/Informasi SPPT/SKP/Daftar PBB Lebih atau Kurang Bayar'],
	['/penetapan/perubahanSpptSkp/pembetulan/input-tungal', '/Penetapan/Perubahan SPPT/SKP/Pembetulan SPPT/SKP/Input SK Pembetulan Tunggal'],
	['/penetapan/perubahanSpptSkp/pembetulan/proses-tunggal', '/Penetapan/Perubahan SPPT/SKP/Pembetulan SPPT/SKP/Proses SK Pembetulan Tunggal'],
	['/penetapan/perubahanSpptSkp/pembetulan/input-kolektif', '/Penetapan/Perubahan SPPT/SKP/Pembetulan SPPT/SKP/Input SK Pembetulan Kolektif'],
	['/penetapan/perubahanSpptSkp/pembetulan/proses-kolektif', '/Penetapan/Perubahan SPPT/SKP/Pembetulan SPPT/SKP/Proses SK Pembetulan Kolektif'],
	['/penetapan/perubahanSpptSkp/pembetulan/secara-jabatan', '/Penetapan/Perubahan SPPT/SKP/Pembetulan SPPT/SKP/Pembetulan Secara Jabatan'],
	['/penetapan/perubahanSpptSkp/pembetulan/cetak-secara-jabatan', '/Penetapan/Perubahan SPPT/SKP/Pembetulan SPPT/SKP/Proses Cetak Pembetulan Secara Jabatan'],
	['/penetapan/perubahanSpptSkp/batal/input-tunggal', '/Penetapan/Perubahan SPPT/SKP/Pembatalan SPPT/SKP/Input SK Pembatalan Tunggal'],
	['/penetapan/perubahanSpptSkp/batal/proses-tunggal', '/Penetapan/Perubahan SPPT/SKP/Pembatalan SPPT/SKP/Proses SK Pembatalan Tunggal'],
	['/penetapan/perubahanSpptSkp/batal/input-kolektif', '/Penetapan/Perubahan SPPT/SKP/Pembatalan SPPT/SKP/Input SK Pembatalan Kolektif'],
	['/penetapan/perubahanSpptSkp/batal/proses-kolektif', '/Penetapan/Perubahan SPPT/SKP/Pembatalan SPPT/SKP/Proses SK Pembatalan Kolektif'],
	['/penetapan/lapDistOp/per-kelompok-jpb', '/Penetapan/Laporan Distribusi OP/OP Per Kelompok JPB'],
	['/penetapan/lapDistOp/per-kelas', '/Penetapan/Laporan Distribusi OP/OP Per Kelas'],
	['/penetapan/lapDistOp/perbandingan-kelas-per-desa-kelurahan', '/Penetapan/Laporan Distribusi OP/Perbandingan Kelas Per Desa/Kelurahan'],
	['/penetapan/lapDistOp/per-group-ketetapan', '/Penetapan/Laporan Distribusi OP/OP Per Group Ketetapan'],
	['/penetapan/penilaian/massal', '/Penetapan/Penilaian/Penilaian Massal'],
	['/penetapan/penilaian/laporan', '/Penetapan/Penilaian/Laporan Penilaian'],
	['/penetapan/verifikasi-e-bphtb', '/Penetapan/Verifikasi e-BPHTB'],
	['/penetapan/validasi-e-bphtb', '/Penetapan/Validasi e-BPHTB'],
	['/penetapan/skpdlb', '/Penetapan/Surat Ketetapan Pajak Daerah Lebih Bayar'],
	['/penetapan/terseleksi-pbb', '/Penetapan/Penetapan Terseleksi PBB'],
	['/penetapan/simulasi-penetapan-massal-pbb', '/Penetapan/Simulasi Penetapan Massal PBB'],
	['/penetapan/salinan-sppt-pbb', '/Penetapan/Salinan SPPT PBB'],
	['/penetapan/sppt-terseleksi', '/Penetapan/Penetapan SPPT Terseleksi'],
	['/penetapan/penundaan-tanggal-jatuh-tempo', '/Penetapan/Penundaan Tanggal Jatuh Tempo'],
	['/penetapan/lap-himpunan-ketetapan-pbb-njop', '/Penetapan/Laporan Himpunan Ketetapan PBB/NJOP'],
	['/penetapan/tanda-terima-sppt-skp-stp', '/Penetapan/Tanda Terima SPPT/SKP/STP'],
	['/petaPajak/kelas-bangunan', '/Peta Pajak/Peta Kelas Bangunan'],
	['/petaPajak/jenis-tanah', '/Peta Pajak/Peta Jenis Tanah'],
	['/petaPajak/jenis-peruntukan-bangunan', '/Peta Pajak/Peta Jenis Peruntukan Bangunan'],
	['/petaPajak/znt', '/Peta Pajak/Peta ZNT'],
	['/petaPajak/tunggakan-pajak', '/Peta Pajak/Peta Tunggakan Pajak'],
	['/petaPajak/objek-pajak', '/Peta Pajak/Peta Objek Pajak'],
	['/petaPajak/fasum-fasos', '/Peta Pajak/Peta Fasum/Fasos'],
	['/petaPajak/reklame', '/Peta Pajak/Peta Reklame'],
	['/petaPajak/pdl', '/Peta Pajak/Peta PDL'],
	['/petaPajak/cetak-peta', '/Peta Pajak/Cetak Peta'],
	['/penagihanPemeriksaan/penagihan/tunggakan/lap-op-tunggakan', '/Penagihan dan Pemeriksaan/Penagihan/Daftar Tunggakan/Laporan OP Tunggakan'],
	['/penagihanPemeriksaan/penagihan/pengeluaran-himbauan', '/Penagihan dan Pemeriksaan/Penagihan/Pengeluaran Himbauan'],
	['/penagihanPemeriksaan/surat-tagihan-pd', '/Penagihan dan Pemeriksaan/Surat Tagihan Pajak Daerah'],
	['/penagihanPemeriksaan/und-pemeriksaan', '/Penagihan dan Pemeriksaan/Undangan Pemeriksaan'],
	['/penagihanPemeriksaan/bapp', '/Penagihan dan Pemeriksaan/Berita Acara Penagihan/Pemeriksaan'],
	['/penagihanPemeriksaan/jurnal-piutang', '/Penagihan dan Pemeriksaan/Jurnal Piutang'],
	['/penagihanPemeriksaan/pencabutan-dan-surat-sita', '/Penagihan dan Pemeriksaan/Pencabutan dan Pencetakan Surat Sita'],
	['/bendahara/pembayaran/pencatatan/pencatatan-tunggal', '/Bendahara/Pembayaran/Pencatatan Pembayaran/Pencatatan Tunggal'],
	['/bendahara/pembayaran/pencatatan/pencatatan-ssp-pbb', '/Bendahara/Pembayaran/Pencatatan Pembayaran/Pencatatan SSP PBB'],
	['/bendahara/pembayaran/pencatatan/surat-ket-pembayaran-elektro', '/Bendahara/Pembayaran/Pencatatan Pembayaran/Surat Keterangan Pembayaran Elektronik'],
	['/bendahara/tempatPembayaran/elektro/update-va-satuan', '/Bendahara/Tempat Pembayaran/Tempat pembayaran elektronik/Update VA satuan'],
	['/bendahara/surat-setoran-pajak-daerah', '/Bendahara/Surat Setoran Pajak Daerah'],
	['/bendahara/sinkronisasi-data-pembayaran-bank', '/Bendahara/Sinkronisasi Data Pembayaran Bank'],
	['/bendahara/surat-tanda-setoran', '/Bendahara/Surat Tanda Setoran'],
	['/bendahara/pembayaran-bphtb', '/Bendahara/Pembayaran BPHTB'],
	['/keberatan/penyelesaianPermohonan/input', '/Keberatan/Penyelesaian Permohonan Keberatan/Input SK Keberatan PBB'],
	['/keberatan/penyelesaianPermohonan/cetak', '/Keberatan/Penyelesaian Permohonan Keberatan/Mencetak SK Keberatan'],
	['/keberatan/pembetulanSk/input', '/Keberatan/Pembetulan SK Keberatan/Input Pembetulan SK Keberatan PBB'],
	['/keberatan/pembetulanSk/cetak', '/Keberatan/Pembetulan SK Keberatan/Mencetak Pembetulan SK Keberatan PBB'],
	['/keberatan/verifikasi', '/Keberatan/Varifikasi / Validasi'],
	['/restitusi/pajak-daerah', '/Restitusi/Restitusi Pajak Daerah'],
	['/restitusi/pemindahbukuan-pembayaran', '/Restitusi/Pemindahbukuan Pembayaran'],
	['/ppat/manajemen-user-ppat', '/PPAT/Manajemen User PPAT'],
	['/ppat/lap-ppat', '/PPAT/Daftar Laporan PPAT'],
	['/ppat/transaksi-ppat', '/PPAT/Daftar Transaksi PPAT'],
	['/ppat/ringkasan-bulanan-transaksi-ppat', '/PPAT/Ringkasan Bulanan Transaksi PPAT'],
	['/pelaporan/penerimaan', '/Pelaporan/Penerimaan'],
	['/pelaporan/setoran', '/Pelaporan/Setoran'],
	['/pelaporan/target-realisasi', '/Pelaporan/Target dan Realisasi'],
	['/pelaporan/target-realisasi-per-jenis-pajak', '/Pelaporan/Target dan Realisasi per Jenis Pajak'],
	['/pelaporan/rincian-wajib-pajak-objek-pajak', '/Pelaporan/Rincian Wajib Pajak/Objek Pajak'],
	['/pelaporan/buku-pembantu-penerimaan-sejenis-via-bank', '/Pelaporan/Buku Pembantu Penerimaan Sejenis via Bank'],
	['/pelaporan/buku-pembantu-per-rincian-objek-penerimaan', '/Pelaporan/Buku Pembantu Per Rincian Objek Penerimaan'],
	['/pelaporan/buku-rekap-penerimaan-hbt', '/Pelaporan/Buku Rekapitulasi Penerimaan Harian/Bulanan/Tahunan'],
	['/pelaporan/buku-kas-umum-penerimaan', '/Pelaporan/Buku Kas Umum Penerimaan'],
	['/customerService/chat', '/Customer Service/Chat Customer Service'],
	['/konfigurasi/manajemenUser/user', '/Konfigurasi/Manajemen User/User'],
	['/konfigurasi/manajemenUser/group', '/Konfigurasi/Manajemen User/Group'],
	['/konfigurasi/dataRef/resource/harga', '/Konfigurasi/Data Referensi/Resource/Harga Resource'],
	['/konfigurasi/dataRef/resource/lap-harga', '/Konfigurasi/Data Referensi/Resource/Laporan Harga Resource'],
	['/konfigurasi/dataRef/master/nop', '/Konfigurasi/Data Referensi/Master Data/NOP'],
	['/konfigurasi/dataRef/master/ppat', '/Konfigurasi/Data Referensi/Master Data/PPAT'],
	['/konfigurasi/dataRef/master/nik', '/Konfigurasi/Data Referensi/Master Data/NIK'],
	['/konfigurasi/dataRef/master/provinsi', '/Konfigurasi/Data Referensi/Master Data/Provinsi'],
	['/konfigurasi/dataRef/master/kabupaten', '/Konfigurasi/Data Referensi/Master Data/Kabupaten'],
	['/konfigurasi/dataRef/master/kecamatan', '/Konfigurasi/Data Referensi/Master Data/Kecamatan'],
	['/konfigurasi/dataRef/master/kelurahan', '/Konfigurasi/Data Referensi/Master Data/Kelurahan'],
	['/konfigurasi/dataRef/master/bank-user', '/Konfigurasi/Data Referensi/Master Data/Bank User'],
	['/konfigurasi/dataRef/master/jenis-perolehan', '/Konfigurasi/Data Referensi/Master Data/Jenis Perolehan'],
	['/konfigurasi/dataRef/master/refrensi-bank', '/Konfigurasi/Data Referensi/Master Data/Daftar Refrensi Bank'],
	['/konfigurasi/dataRef/master/pegawai', '/Konfigurasi/Data Referensi/Master Data/Pegawai'],
	['/konfigurasi/dataRef/master/satuan-kerja', '/Konfigurasi/Data Referensi/Master Data/Satuan Kerja'],
	['/konfigurasi/dataRef/master/rekening', '/Konfigurasi/Data Referensi/Master Data/Rekening'],
	['/konfigurasi/dataRef/master/anggaran', '/Konfigurasi/Data Referensi/Master Data/Anggaran'],
	['/konfigurasi/dataRef/master/sumber-dana', '/Konfigurasi/Data Referensi/Master Data/Sumber Dana'],
	['/konfigurasi/dataRef/master/bendahara', '/Konfigurasi/Data Referensi/Master Data/Bendahara'],
	['/konfigurasi/dataRef/master/jurnal', '/Konfigurasi/Data Referensi/Master Data/Jurnal'],
	['/konfigurasi/dataRef/master/harga-ref', '/Konfigurasi/Data Referensi/Master Data/Harga Referensi'],
	['/konfigurasi/dataRef/wilayah', '/Konfigurasi/Data Referensi/Wilayah'],
	['/konfigurasi/dataRef/tempat-pembayaran-sppt-massal', '/Konfigurasi/Data Referensi/Tempat Pembayaran SPPT Massal'],
	['/konfigurasi/dataRef/buku-njoptkp-tarif', '/Konfigurasi/Data Referensi/Buku/NJOPTKP/Tarif'],
	['/konfigurasi/dataRef/kantor-lelang', '/Konfigurasi/Data Referensi/Kantor Lelang'],
	['/konfigurasi/dataRef/ref-umum', '/Konfigurasi/Data Referensi/Ref Umum'],
	['/konfigurasi/dataRef/parameter-keluaran-pst', '/Konfigurasi/Data Referensi/Parameter Keluaran PST'],
	['/konfigurasi/lihat/dataOp/spop-lspop', '/Konfigurasi/Lihat/Data Objek Pajak/Daftar SPOP/LSPOP'],
	['/konfigurasi/lihat/dataOp/op-keringanan-permanen', '/Konfigurasi/Lihat/Data Objek Pajak/Daftar OP Dengan Keringanan Permanen'],
	['/konfigurasi/lihat/dataOp/objek-bersama', '/Konfigurasi/Lihat/Data Objek Pajak/Daftar Objek Bersama'],
	['/konfigurasi/lihat/dataOp/objek-nilai-individu', '/Konfigurasi/Lihat/Data Objek Pajak/Daftar Objek Dengan Nilai Individu'],
	['/konfigurasi/lihat/dataOp/catatan-pembayaran-pbb', '/Konfigurasi/Lihat/Data Objek Pajak/Catatan Pembayaran PBB'],
	['/konfigurasi/lihat/dataOp/catatan-sejarah-wp', '/Konfigurasi/Lihat/Data Objek Pajak/Catatan Sejarah WP'],
	['/konfigurasi/lihat/dataOp/catatan-sejarah-op', '/Konfigurasi/Lihat/Data Objek Pajak/Catatan Sejarah OP'],
	['/konfigurasi/lihat/dataOp/rekapitulasi-op', '/Konfigurasi/Lihat/Data Objek Pajak/Daftar Rekapitulasi OP'],
	['/konfigurasi/lihat/dataOp/op-pengurangan-stimulus-kebijakan-pengenaan', '/Konfigurasi/Lihat/Data Objek Pajak/OP dengan Pengurangan Stimulus/Kebijakan Pengenaan'],
	['/konfigurasi/lihat/dataOp/op-tanpa-peta', '/Konfigurasi/Lihat/Data Objek Pajak/Daftar OP tanpa Peta'],
	['/konfigurasi/lihat/dataOp/op-yang-telah-dihapus', '/Konfigurasi/Lihat/Data Objek Pajak/Daftar OP yang Telah Dihapus'],
	['/konfigurasi/lihat/dataOp/op-sin', '/Konfigurasi/Lihat/Data Objek Pajak/Daftar OP SIN'],
	['/konfigurasi/lihat/tabel/znt', '/Konfigurasi/Lihat/Tabel/ZNT'],
	['/konfigurasi/lihat/tabel/jalan-std', '/Konfigurasi/Lihat/Tabel/Jalan Standart'],
	['/konfigurasi/lihat/tabel/tempat-pembayaran', '/Konfigurasi/Lihat/Tabel/Tempat Pembayaran'],
	['/konfigurasi/lihat/tabel/surat-kep', '/Konfigurasi/Lihat/Tabel/Surat Keputusan'],
	['/konfigurasi/lihat/penetapan/tagihan-tidak-sampai', '/Konfigurasi/Lihat/Penetapan/Daftar Tagihan Tidak Sampai'],
	['/konfigurasi/lihat/penetapan/tegoran-diterbitkan', '/Konfigurasi/Lihat/Penetapan/Daftar Tegoran Diterbitkan'],
	['/konfigurasi/lihat/penetapan/penerimaan', '/Konfigurasi/Lihat/Penetapan/Daftar Penerimaan'],
	['/konfigurasi/lihat/penetapan/tunggakan', '/Konfigurasi/Lihat/Penetapan/Daftar Tunggakan'],
	['/konfigurasi/lihat/kinerjaOrg/stat-kinerja-pelayanan', '/Konfigurasi/Lihat/Kinerja Organisasi/Statistik Kinerja Pelayanan'],
	['/konfigurasi/lihat/kinerjaOrg/rinci-pendataan-lapangan', '/Konfigurasi/Lihat/Kinerja Organisasi/Rincian Pendataan Lapangan'],
	['/konfigurasi/lihat/kinerjaOrg/rinci-rekam-data', '/Konfigurasi/Lihat/Kinerja Organisasi/Rincian Perekaman Data'],
	['/konfigurasi/lihat/kinerjaOrg/rinci-rekam-stts', '/Konfigurasi/Lihat/Kinerja Organisasi/Rincian Perekaman STTS'],
	['/konfigurasi/lihat/kinerjaOrg/rinci-rekam-td-terima-sppt', '/Konfigurasi/Lihat/Kinerja Organisasi/Rincian Perekaman Tanda Terima SPPT'],
	['/konfigurasi/lihat/perubahan/data-op', '/Konfigurasi/Lihat/Daftar Perubahan/Daftar Perubahan Data OP'],
	['/konfigurasi/lihat/perubahan/tabel-znt', '/Konfigurasi/Lihat/Daftar Perubahan/Daftar Perubahan Tabel ZNT'],
	['/konfigurasi/lihat/sejarah/op', '/Konfigurasi/Lihat/Sejarah Objek Pajak/Sejarah Objek Pajak'],
	['/konfigurasi/lihat/sejarah/sppt', '/Konfigurasi/Lihat/Sejarah Objek Pajak/Sejarah SPPT'],
	['/konfigurasi/lihat/nomor-pelayanan', '/Konfigurasi/Lihat/Nomor Pelayanan'],
	['/konfigurasi/lihat/nop-terbesar', '/Konfigurasi/Lihat/NOP Terbesar'],
	['/konfigurasi/lihat/perubahan-nop', '/Konfigurasi/Lihat/Perubahan NOP'],
	['/konfigurasi/utilitas/setting-session', '/Konfigurasi/Utilitas/Setting Session'],
	['/konfigurasi/pajak', '/Konfigurasi/Konfigurasi Pajak'],
	['/konfigurasi/pembayaran', '/Konfigurasi/Konfigurasi Pembayaran'],
	['/konfigurasi/api', '/Konfigurasi/Konfigurasi API'],
	['/konfigurasi/pengumuman', '/Konfigurasi/Pengumuman'],
	['/bphtb/lap-bphtb', '/BPHTB/Laporan BPHTB'],
	['/bphtb/pembayaran-sspd', '/BPHTB/Pembayaran SSPD'],
	['/bphtb/kurang-byr-sspd', '/BPHTB/Kurang Bayar SSPD'],
	['/bphtb/lap-penerimaan-bank', '/BPHTB/Laporan Penerimaan Bank'],
	['/bphtb/jumlah-transaksi-wp', '/BPHTB/Cek Jumlah Transaksi Wajib Pajak'],
	['/jaminan-bongkar-reklame', '/Jaminan Bongkar Reklame'],
	['/pengurangan', '/Pengurangan'],
	['/bphtb/rak-berkas', '/Rak Berkas'],
];