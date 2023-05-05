urls = {
	pathname: '/penetapan/verifikasi-e-bphtb',
	dataPath: '/bphtbsptpd-approval/ver',
	dataSrc: '/bphtbsptpd-approval/ver',
	dataSrcParams: {
		namaWP_opt: 'left',
	}
}
vars = {
	statusDoc: [],
	searchKeywords:null,
	verifikasiValidasiBphtb,
}
methods = {
	strRight,
}

searchFieldTarget = 'namaWP';
searchPlaceHolder = 'Cari nama WP...';

function formatNameDate(date) {
	const monthNames = ["January", "February", "March", "April", "May", "June",
		"July", "August", "September", "October", "November", "December"
	],
	tempDate = date.split("-")
	tempDate[1] = monthNames[parseInt(tempDate[1])]
	result = tempDate.join(" ")
	return result 
}

function postFetchData(data) {
	xthis = this;
	data.forEach(function (item, idx) {
		item.noUrutItem = idx + 1;
		item.tanggal = formatNameDate(formatDate(new Date(item.tanggal), ['d','m','y'], '-'));
		item.jumlahSetor = toRupiah(item.jumlahSetor, {formal: false, dot: '.'})
		
		GetValue(verifikasiValidasiBphtb, item.status).then( value => xthis.statusDoc[item.noUrutItem] = value);
	});
}
