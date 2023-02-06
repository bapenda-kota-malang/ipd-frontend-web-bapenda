urls = {
	pathname: '/pendataan/spop-lspop/daftar',
	dataPath: '/objekpajakpbb',
	dataSrc: '/objekpajakpbb'
}
vars = {
	status: ['Baru', 'Aktif', 'Diblokir', 'Ditolak'],
}

function postFetchData(data) {
	data.forEach(function (item, idx) {
		if(item.sspdDetail && item.sspdDetail[0].spt) {
			if(item.sspdDetail[0].spt.periodeAwal) {
				data[idx].sspdDetail[0].spt.periodeAwal = formatDate(new Date(item.sspdDetail[0].spt.periodeAwal), ['d','m','y'], '/')
			}
			if(item.sspdDetail[0].spt.periodeAkhir) {
				data[idx].sspdDetail[0].spt.periodeAkhir = formatDate(new Date(item.sspdDetail[0].spt.periodeAkhir), ['d','m','y'], '/')
			}
		}
	});
}
