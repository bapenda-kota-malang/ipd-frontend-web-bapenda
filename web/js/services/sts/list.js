urls = {
	pathname: '/bendahara/surat-setoran-pajak-daerah',
	dataPath: '/sts',
	dataSrc: '/sts'
}
vars = {
	status: ['Baru', 'Aktif', 'Diblokir', 'Ditolak'],
}

function postDataFetch(data) {
	if(data.length > 0) {
		data.forEach(function(item, idx){
			nominal = 0;
			if(data.stsDetail && data.stsDetail.length > 0) {
				data.stsDetail.forEach(function(item2){
					nominal += item2.nominal ? parseInt(item2.nominal) : 0;
				});
			}
			data[idx].nominal = nominal;
		});
	}
	// data.forEach(function (item, idx) {
	// 	item.createdAt = formatDate(new Date(item.createdAt), ['d','m','y'], '/');
	// 	item.periodeAwal = formatDate(new Date(item.periodeAwal), ['d','m','y'], '/');
	// 	item.periodeAkhir = formatDate(new Date(item.periodeAkhir), ['d','m','y'], '/');
	// 	item.jatuhTempo = formatDate(new Date(item.jatuhTempo), ['d','m','y'], '/');
	// });
}
