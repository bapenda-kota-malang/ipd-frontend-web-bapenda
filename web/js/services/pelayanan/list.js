urls = {
	pathname: '/pelayanan/data-permohonan',
	dataPath: '/permohonan',
	dataSrc: '/permohonan',
	dataSrcParams: {
		searchKeywords: '',
	}
}
vars = {
	searchKeywords:null,
	statusKolektifs,
	jenisPelayanans,
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
    console.log(data)
	data.forEach(function (item, idx) {
		item.tanggalTerima = formatDate(new Date(item.tanggalTerima));
		item.tanggalSelesai = formatDate(new Date(item.tanggalSelesai));
		item.tanggalPermohonan = formatDate(new Date(item.tanggalPermohonan));

        GetValue(statusKolektifs, item.statusKolektif).then( value => item.statusKolektif = value);
        GetValue(jenisPelayanans, item.jenisPelayanan).then( value => item.jenisPelayanan = value);
	});
}

function search() {
	
	// x = debounce(function () {
	// 	console.log(app.searchKeywords);
		app.setData(app);
	// }, 300);
	// x();
}