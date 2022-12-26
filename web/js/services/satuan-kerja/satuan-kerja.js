urls = {
	pathname: '/konfigurasi/data-ref/master/satuan-kerja',
	dataPath: '/satuankerja',
	dataSrc: '/satuankerja',
	submit: '/satuankerja/{id}',
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
	data.alamat = null;
	data.telp = null;
}