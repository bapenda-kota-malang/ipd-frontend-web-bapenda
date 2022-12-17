urls = {
	pathname: '/konfigurasi/data-ref/master/kabupaten',
	dataPath: '/daerah',
	dataSrc: '/daerah',
	submit: '/daerah/{id}',
}
vars = {
	selectedIdx: null,
	entryData: {},
	entryFormTitle: 'Entry Form',
	provinsiList: [],
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