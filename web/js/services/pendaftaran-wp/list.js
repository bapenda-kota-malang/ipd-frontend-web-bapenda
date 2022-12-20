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
	rekenings: [],
	daerahs: [],
	kecamatans: [],
	kelurahans: [],
}
refSources = {
	rekenings: '/rekening?kodeJenisUsaha=0&kodeJenisUsaha_opt=gt&no_pagination=true',
	daerahs: '/daerah?no_pagination=true',
	kecamatans: '/kecamatan?daerah_kode=3573',
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