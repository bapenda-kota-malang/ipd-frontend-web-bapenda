urls = {
	pathname: '/pengurangan',
	dataPath: '/pengurangan',
	dataSrc: '/pengurangan'
}
vars = {
	penguranganStatuses,
}

function postDataFetch(data) {
	data.forEach(function (item, idx) {
		data[idx].tanggalPengajuan = formatDate(new Date(item.tanggalPengajuan), ['d','m','y'], '/');
		// data[idx].periode = formatDate(new Date(item.spt.periodeAwal), ['d','m','y'], '/') + ' s/d ' + formatDate(new Date(item.spt.periodeAkhir), ['d','m','y', '/']);
		// data[idx].status = suratPenagihanStatuses[item.status];
	});
}
