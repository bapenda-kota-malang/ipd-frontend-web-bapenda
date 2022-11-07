urls = {
	pathname: '/pendaftaran/wajib-pajak',
	dataPath: '/npwpd',
	dataSrc: '/npwpd'
}
vars = {
	golongans,
	jabatans,
	npwpdStatuses,
}

function postDataFetch(data) {
	data.forEach(function (item, idx) {
		item.tanggalNpwpd = formatDate(new Date(item.tanggalNpwpd));
	});
}