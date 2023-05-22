urls = {
	pathname: '/penagihan-pemeriksaan/surat-tagihan-pd',
	dataPath: '/suratpemberitahuan',
	dataSrc: '/suratpemberitahuan'
}
vars = {
}

function postDataFetch(data) {
	data.forEach(function (item, idx) {
		data[idx].tanggal = formatDate(new Date(item.createdAt), ['d','m','y'], '/');
		// data[idx].periode = formatDate(new Date(item.spt.periodeAwal), ['d','m','y'], '/') + ' s/d ' + formatDate(new Date(item.spt.periodeAkhir), ['d','m','y', '/']);
		data[idx].status = suratPenagihanStatuses[item.status];
	});
}
