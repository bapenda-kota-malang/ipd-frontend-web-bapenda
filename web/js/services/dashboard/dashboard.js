date = new Date();

urls = {
	pathname: '/',
	dataPath: '/target-realisasi?tahun=' + date.getFullYear(),
	dataSrc: '/target-realisasi?tahun=' + date.getFullYear(),
}
vars = {
	date:date,
	jenisPajakList,
	targetRealisasiList: {},
	searchKeywords:null,
}

appEl = '#vueBox';

function mounted(xthis) {
	console.log(xthis.data);
}

function postDataFetch(data, xthis) {
	data.forEach(function(item){
		console.log(item);
	});
}