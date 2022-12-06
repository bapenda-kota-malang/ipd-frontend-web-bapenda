forcePostDataFetch = true;

id = document.getElementById('id').value;
if(!id)
	id = 0;

data = {...bappDetail}
urls = {
	dataSrc: '/bapenagihan'
}
vars = {
	npwpd: null,
}
methods = {
} 

function postDataFetch(data, xthis) {
	data.tanggal = formatDate(new Date(data.tanggal), ['y', 'm', 'd'], '/')
	if(data.dokumentasi.length > 0) {
		data.dokumentasi.forEach(function(item, idx) {
			data.dokumentasi[idx] = item.replace('.', '___');
		});
	}
	if(data.dokumenLainLain.length > 0) {
		data.dokumenLainLain.forEach(function(item, idx) {
			data.dokumenLainLain[idx] = item.replace('.', '___');
		});
	}
	console.log(data);
}
