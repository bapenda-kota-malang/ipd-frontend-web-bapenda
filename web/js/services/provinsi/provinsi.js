urls = {
	pathname: '/konfigurasi/data-ref/master/provinsi',
	dataPath: '/provinsi',
	dataSrc: '/provinsi',
	submit: '/provinsi/{id}',
}
vars = {
	selectedIdx: null,
	entryData: {},
	entryFormTitle: 'Entry Form',
}

function cleanData(data) {
	delete data.id;
	data.kode = null;
	data.nama = null;
}