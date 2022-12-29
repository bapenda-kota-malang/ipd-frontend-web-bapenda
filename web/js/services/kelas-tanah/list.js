urls = {
	pathname: '/pendataan/kelas-tanah',
	dataPath: '/kelastanah',
	dataSrc: '/kelastanah',
	dataSrcParams: {
		searchKeywords: '',
		tahunAwal: null,
		tahunAkhir: null,
	}
}
vars = {
	searchKeywords:null,
}
watch = {
	// searchKeywords() {
	// 	this.search();
	// }
}
methods = {
	getFilter,
	hapusItem,
	strRight,
	search,
}

async function getFilter() {
	console.log("masuk filter")
	console.log(data)

	res = await apiFetchData('/kelastanah', messages);
	if(!res) {
		console.error('failed to fetch "kelas tanah"');
	} 
	setStatus.hide();
}

async function hapusItem(id) {
	console.log("masuk hapus")
	res = await apiFetch('/kelastanah/' + id, "DELETE");
	if(!res) {
		console.error('failed to delete "kelastanah"');
	} else {
		this.$forceUpdate();
		window.location.reload();
	}
}

function postDataFetch(data) {
    console.log(data)
	data.forEach(function (item, idx) {
	
	});
}

function search() {
	// x = debounce(function () {
	// 	console.log(app.searchKeywords);
		// app.setData(app);
	// }, 300);
	// x();
}

