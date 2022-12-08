urls = {
	pathname: '/penetapan/verifikasi-e-bphtb/',
	dataPath: '/bphtbsptpd',
	dataSrc: '/bphtbsptpd',
	dataSrcParams: {
		searchKeywords: '',
	}
}
vars = {
	statusDoc: [],
	searchKeywords:null,
	verifikasiValidasiBphtb,
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
		item.noUrutItem = idx + 1;
		item.tanggal = formatNameDate(formatDate(new Date(item.tanggal), ['d','m','y'], '-'));
		item.jumlahSetor = toRupiah(item.jumlahSetor, {formal: false, dot: '.'})
		
		GetValue(verifikasiValidasiBphtb, item.status).then( value => xthis.statusDoc[item.noUrutItem] = value);
	});
}

function search() {
	
	// x = debounce(function () {
	// 	console.log(app.searchKeywords);
		app.setData(app);
	// }, 300);
	// x();
}