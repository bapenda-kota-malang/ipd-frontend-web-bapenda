urls = {
	pathname: '/pendataan/kelas-bangunan',
	dataPath: '/kelasbangunan',
	dataSrc: '/kelasbangunan',
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
	showFilter,
	strRight,
	search,
}

async function showFilter() {
	console.log("masuk filter")
	if(!setStatus) {
		setStatus = new bootstrap.Modal(document.getElementById('setFilter'))
	}
	res = await apiFetchData('/kelasbangunan', messages);
	if(!res) {
		console.error('failed to fetch "kelas tanah"');
	} 
	setStatus.show();
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