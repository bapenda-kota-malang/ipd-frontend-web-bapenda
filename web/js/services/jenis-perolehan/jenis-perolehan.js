urls = {
	pathname: '/konfigurasi/master/jenis-perolehan',
	dataPath: '/jenisperolehan',
	dataSrc: '/jenisperolehan',
	dataSrcParams: {
		nama_opt: 'left',
	},
	submit: '/jenisperolehan/{id}',
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