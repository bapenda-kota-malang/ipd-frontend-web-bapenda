urls = {
	pathname: '/penetapan/skpd/' + objekPajak,
	dataPath: '/skpd',
	dataSrc: '/skpd',
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

function postFetchData(data) {
	data.forEach(function (item, idx) {
		item.createdAt = formatDate(new Date(item.createdAt), ['d','m','y'], '/');
		item.periodeAwal = formatDate(new Date(item.periodeAwal), ['d','m','y'], '/');
		item.periodeAkhir = formatDate(new Date(item.periodeAkhir), ['d','m','y'], '/');
		item.jatuhTempo = formatDate(new Date(item.jatuhTempo), ['d','m','y'], '/');
	});
}
