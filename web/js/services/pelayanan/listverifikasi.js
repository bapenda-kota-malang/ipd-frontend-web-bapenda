urls = {
	pathname: '/pelayanan/data-permohonan',
	dataPath: '/regpermohonan',
	dataSrc: '/regpermohonan',
	dataSrcParams: {
		searchKeywords: '',
	}
}
vars = {
	searchKeywords:null,
	statusKolektifs,
	jenisPelayanans,
	verifikasiPermohonans,
	status: null,
}
watch = {
	// searchKeywords() {
	// 	this.search();
	// }
}
methods = {
	// showSetStatus,
	// hapusItem,
	search,
}

// async function showSetStatus() {
// 	console.log("masuk status")
// 	if(!setStatus) {
// 		setStatus = new bootstrap.Modal(document.getElementById('setStatus'))
// 	}
// 	res = await apiFetchData('/permohonan', messages);
// 	if(!res) {
// 		console.error('failed to fetch "permohonan"');
// 	} else {
// 		// app.npwpdList = typeof res.data != 'undefined' ? res.data : [];
// 	}
// 	setStatus.show();
// }

// async function hapusItem(id) {
// 	console.log("masuk hapus")
// 	res = await apiFetch('/permohonan/' + id, "DELETE");
// 	if(!res) {
// 		console.error('failed to delete "permohonan"');
// 	} else {
// 		this.$forceUpdate();
// 		window.location.reload();
// 	}
// }

function postFetchData(data) {
    console.log(data)
	data.forEach(function (item, idx) {
		item.tanggalTerima = formatDate(new Date(item.tanggalTerima), ['d','m','y'], '/');

        GetValue(statusKolektifs, item.statusKolektif).then( value => item.statusKolektif = value);
        GetValue(jenisPelayanans, item.bundlePelayanan).then( value => item.jenisPelayanan = value);
		item.noPelayanan = item.tahunPelayanan + item.bundlePelayanan + item.noUrutPelayanan;
		GetValue(verifikasiPermohonans, item.status).then( value => item.statusnama = value);
	});
}

function search() {
	
	// x = debounce(function () {
	// 	console.log(app.searchKeywords);
		app.setData(app);
	// }, 300);
	// x();
}