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
	strRight,
	search,
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

