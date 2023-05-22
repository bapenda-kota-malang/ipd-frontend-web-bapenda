urls = {
	pathname: `/penetapan/verifikasi-e-sptpd/${objekPajak}`,
	dataPath: `/espt`,
	dataSrc: `/espt`,
	dataSrcParams: {
		rekening_objek: objekPajak_kode,
		namaWP_opt: 'left',
	}
}
vars = {
	status: ['Baru', 'Aktif', 'Diblokir', 'Ditolak'],
}

searchFieldTarget = 'namaWP';
searchPlaceHolder = 'Cari nama WP...';