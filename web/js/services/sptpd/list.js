objekPajak = document.getElementById('objekPajak').value;

urls = {
	pathname: '/penetapan/sptpd/' + objekPajak,
	dataPath: '/sptpd',
	dataSrc: '/sptpd'
}
vars = {
	status: ['Baru', 'Aktif', 'Diblokir', 'Ditolak'],
}

function postDataFetch(data) {
	data.forEach(function (item, idx) {
		item.createdAt = formatDate(new Date(item.createdAt), ['d','m','y'], '/');
		item.periodeAwal = formatDate(new Date(item.periodeAwal), ['d','m','y'], '/');
		item.periodeAkhir = formatDate(new Date(item.periodeAkhir), ['d','m','y'], '/');
		item.jatuhTempo = formatDate(new Date(item.jatuhTempo), ['d','m','y'], '/');
	});
}
