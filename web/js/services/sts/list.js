urls = {
	pathname: '/bendahara/surat-tanda-setoran',
	dataPath: '/sts',
	dataSrc: '/sts'
}
vars = {
	status: ['Baru', 'Aktif', 'Diblokir', 'Ditolak'],
}

function postFetchData(data) {
	if(data.length > 0) {
		data.forEach(function(item, idx){
			nominal = 0;
			if(item.stsDetail && item.stsDetail.length > 0) {
				item.stsDetail.forEach(function(item2){
					nominal += item2.nominal ? parseInt(item2.nominal) : 0;
				});
			}
			data[idx].nominal = nominal;
			if(data[idx].tanggalSts) {
				data[idx].tanggalSts = formatDate(new Date(item.tanggalSts), ['d','m','y','/'])
			}
		});
	}
}
