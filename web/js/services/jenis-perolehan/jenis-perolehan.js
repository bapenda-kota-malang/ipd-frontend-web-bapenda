urls = {
	pathname: '/konfigurasi/data-ref/master/jenis-perolehan',
	dataPath: '/jenisperolehan',
	dataSrc: '/jenisperolehan',
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