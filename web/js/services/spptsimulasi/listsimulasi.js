urls = {
	pathname: '/penetapan/simulasi-penetapan-massal-pbb/',
	dataPath: '/sppt-simulasi/ver',
	dataSrc: '/sppt-simulasi/ver',
	dataSrcParams: {
		searchKeywords: '',
	}
}
vars = {
	statusDoc: [],
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

function formatNameDate(date) {
	const monthNames = ["January", "February", "March", "April", "May", "June",
		"July", "August", "September", "October", "November", "December"
	],
	tempDate = date.split("-")
	tempDate[1] = monthNames[parseInt(tempDate[1])]
	result = tempDate.join(" ")
	return result 
}

function postDataFetch(data, xthis) {
    console.log(data);
	data.forEach(function (item, idx) {
        item.njop_sppt = toRupiah(item.njop_sppt, {formal: false, dot: '.'})
		item.tanggalTerbit_sppt = formatNameDate(formatDate(new Date(item.tanggalTerbit_sppt), ['d','m','y'], '/'));
		item.tanggalTerbit_sppt = formatNameDate(formatDate(new Date(item.tanggalJatuhTempo_sppt), ['d','m','y'], '/'));
	});
}

function search() {
	
	// x = debounce(function () {
	// 	console.log(app.searchKeywords);
		app.setData(app);
	// }, 300);
	// x();
}