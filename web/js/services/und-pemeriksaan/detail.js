forcePostDataFetch = true;

id = document.getElementById('id').value;
if(!id)
	id = 0;

data = {...undPemeriksaanCreate}
urls = {
	dataSrc: '/skpd/' +id
}
vars = {
	npwpd: null,
}
methods = {
} 

function postDataFetch(data, xthis) {
	// data.spt.forEach(function (item, idx) {
	// 	data.spt[idx].tanggal = formatDate(new Date(item.tanggal), ['d','m','y'], '/');
	// 	data.spt[idx].periode = formatDate(new Date(item.periodeAwal), ['d','m','y'], '/') + ' s/d ' + formatDate(new Date(item.periodeAkhir), ['d','m','y', '/']);
	// 	data.spt[idx].jatuhTempo = formatDate(new Date(item.jatuhTempo), ['d','m','y'], '/');
	// 	data.spt[idx].status = suratPenagihanStatuses[item.status];
	// });
}
