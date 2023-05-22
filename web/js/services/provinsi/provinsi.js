urls = {
	pathname: '/konfigurasi/master/provinsi',
	dataPath: '/provinsi',
	dataSrc: '/provinsi',
	dataSrcParams: {
		nama_opt: 'left',
	},
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