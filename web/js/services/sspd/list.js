urls = {
	pathname: '/bendahara/surat-setoran-pajak-daerah/',
	dataPath: '/sspd',
	dataSrc: '/sspd'
}
vars = {
	status: ['Baru', 'Aktif', 'Diblokir', 'Ditolak'],
}

function postDataFetch(data) {
	console.log(data)
	// data.forEach(function (item, idx) {
	// 	item.createdAt = formatDate(new Date(item.createdAt), ['d','m','y'], '/');
	// 	item.periodeAwal = formatDate(new Date(item.periodeAwal), ['d','m','y'], '/');
	// 	item.periodeAkhir = formatDate(new Date(item.periodeAkhir), ['d','m','y'], '/');
	// 	item.jatuhTempo = formatDate(new Date(item.jatuhTempo), ['d','m','y'], '/');
	// });
}
