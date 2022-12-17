urls = {
	pathname: '/konfigurasi/data-ref/master/kelurahan',
	dataPath: '/kelurahan',
	dataSrc: '/kelurahan',
	submit: '/kelurahan/{id}',
}
vars = {
	selectedIdx: null,
	entryData: {},
	entryFormTitle: 'Entry Form',
	provinsiList: [],
	daerahList: [],
	kecamatanList: [],
}
refSources = {
	provinsiList: '/provinsi?no_pagination=true',
}
components = {
	vueselect: VueSelect.VueSelect,
}

function cleanData(data) {
	// delete data.id;
	data.kode = null;
	data.nama = null;
	if(data.provinsi_kode) {
		data.provinsi_kode = null;
	}
}