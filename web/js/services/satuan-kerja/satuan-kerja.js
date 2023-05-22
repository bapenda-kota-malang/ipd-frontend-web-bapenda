urls = {
	pathname: '/konfigurasi/master/satuan-kerja',
	dataPath: '/satuankerja',
	dataSrc: '/satuankerja',
	dataSrcParams: {
		nama_opt: 'left',
	},
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