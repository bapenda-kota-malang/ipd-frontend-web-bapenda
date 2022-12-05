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
}
