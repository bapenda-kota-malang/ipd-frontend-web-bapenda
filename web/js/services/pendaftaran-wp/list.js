urls = {
	pathname: '/pendaftaran/wajib-pajak',
	dataPath: '/npwpd',
	dataSrc: '/npwpd',
	dataSrcParams: {
		searchKeywords: '',
	}
}
vars = {
	searchKeywords:null,
	golongans,
	jabatans,
	npwpdStatuses,
}
watch = {
	// searchKeywords() {
	// 	this.search();
	// }
}
methods = {
	strRight,
	search,
}

function postDataFetch(data) {
	data.forEach(function (item, idx) {
		item.tanggalNpwpd = formatDate(new Date(item.tanggalNpwpd));
	});
}

function search() {
	
	// x = debounce(function () {
	// 	console.log(app.searchKeywords);
		app.setData(app);
	// }, 300);
	// x();
}