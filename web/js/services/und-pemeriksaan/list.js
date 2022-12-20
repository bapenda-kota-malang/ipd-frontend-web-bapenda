urls = {
	pathname: '/penagihan-pemeriksaan/und-pemeriksaan',
	dataPath: '/undanganpemeriksaan',
	dataSrc: '/undanganpemeriksaan'
}
vars = {
}

function postDataFetch(data) {
	data.forEach(function (item, idx) {
		data[idx].tanggalPemeriksaan = formatDate(new Date(item.tanggalPemeriksaan), ['d','m','y'], '/');
		data[idx].status = suratPenagihanStatuses[item.status];
	});
}
