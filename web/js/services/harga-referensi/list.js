urls = {
	pathname: '/pendataan/harga-referensi',
	dataPath: '/harga-referensi',
	dataSrc: '/harga-referensi',
	dataSrcParams: {
		searchKeywords: '',
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
	res = await apiFetch(urls.dataSrc + "?" + setQueryParam(this.urls.dataSrcParams) + "&no_pagination=true", 'GET');
	if(typeof res.data == 'object') {
		this.data = res.data.data;
		console.log(res.data.data);
	}
	filterModal.show = false;
    this.$forceUpdate();
}

async function hapusItem(id) {
	res = await apiFetch('/harga-referensi/' + id, "DELETE");
	if(!res) {
		console.error('failed to delete "harga-referensi"');
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
		app.setData(app);
	// }, 300);
	// x();
}