urls = {
	pathname: `/penetapan/verifikasi-e-sptpd/${objekPajak}`,
	dataPath: `/espt?rekening_objek=${objekPajak_kode}`,
	dataSrc: `/espt?rekening_objek=${objekPajak_kode}`,
	dataSrcParams: {
		namaWP_opt: 'left',
	}
}
vars = {
	status: ['Baru', 'Aktif', 'Diblokir', 'Ditolak'],
}

searchFieldTarget = 'namaWP';
searchPlaceHolder = 'Cari nama WP...';