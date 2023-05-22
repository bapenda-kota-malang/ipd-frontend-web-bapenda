urls = {
	pathname: '/konfigurasi/master/referensi-bank',
	dataPath: '/referensibank',
	dataSrc: '/referensibank',
	submit: '/referensibank/{id}',
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