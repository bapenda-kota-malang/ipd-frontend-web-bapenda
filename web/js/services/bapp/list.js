urls = {
	pathname: '/penagihan-pemeriksaan/bapp',
	dataPath: '/bapenagihan',
	dataSrc: '/bapenagihan'
}
vars = {
}

function postDataFetch(data) {
	console.log(data);
	data.forEach(function (item, idx) {
		data[idx].tanggalPemeriksaan = formatDate(new Date(item.tanggalPemeriksaan), ['d','m','y'], '/');
		data[idx].status = verifikasiStatuses[item.status];
	});
}
