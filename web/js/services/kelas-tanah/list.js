urls = {
	pathname: '/pendataan/kelas-tanah',
	dataPath: '/kelastanah',
	dataSrc: '/kelastanah',
	dataSrcParams: {
		searchKeywords: '',
		tahunAwalKelasTanah: null,
		tahunAkhirKelasTanah: null,
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
	applyFilter,
	hapusItem,
	strRight,
	search,
}

async function applyFilter() {
	console.log("masuk filter");
	console.log(this.data);
	res = await apiFetch(urls.dataSrc + "?" + setQueryParam(this.urls.dataSrcParams) + "&no_pagination=true", 'GET');
	if(typeof res.data == 'object') {
		this.data = res.data.data;
		console.log(res.data.data);
	}
	// filterModal.show = false;
    this.$forceUpdate();
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

