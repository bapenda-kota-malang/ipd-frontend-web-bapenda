urls = {
	pathname: '/pendataan/potensi-owp-baru',
	dataPath: '/potensiopwp',
	dataSrc: '/potensiopwp',
	dataSrcParams: {
		namaOp_opt: 'left',
	}
}
vars = {
	searchKeywords:null,
	golongans,
	jabatans,
	npwpdStatuses,
}
methods = {
	strRight,
}

searchFieldTarget = 'namaOp';
searchPlaceHolder = 'Cari nama OP...';

function postFetchData(data) {
	data.forEach(function (item, idx) {
		item.tanggalNpwpd = formatDate(new Date(item.tanggalNpwpd));
	});
}
