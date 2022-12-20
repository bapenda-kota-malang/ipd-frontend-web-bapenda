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
	showSetStatus,
	strRight,
	search,
}

async function showSetStatus() {
	console.log("masuk status")
	if(!setStatus) {
		setStatus = new bootstrap.Modal(document.getElementById('setStatus'))
	}
	res = await apiFetchData('/permohonan', messages);
	if(!res) {
		console.error('failed to fetch "permohonan"');
	} else {
		app.npwpdList = typeof res.data != 'undefined' ? res.data : [];
	}
	setStatus.show();
}

function postDataFetch(data) {
    console.log(data)
	data.forEach(function (item, idx) {
		item.tanggalTerima = formatDate(new Date(item.tanggalTerima), ['d','m','y'], '/');
		item.tanggalPermohonan = formatDate(new Date(item.tanggalPermohonan), ['d','m','y'], '/');
		item.tanggalSelesai = formatDate(new Date(item.tanggalSelesai), ['d','m','y'], '/');

        GetValue(statusKolektifs, item.statusKolektif).then( value => item.statusKolektif = value);
        GetValue(jenisPelayanans, item.bundlePelayanan).then( value => item.jenisPelayanan = value);
		item.noPelayanan = item.tahunPelayanan + item.bundlePelayanan + item.noUrutPelayanan
	});
}

function search() {
	
	// x = debounce(function () {
	// 	console.log(app.searchKeywords);
		app.setData(app);
	// }, 300);
	// x();
}