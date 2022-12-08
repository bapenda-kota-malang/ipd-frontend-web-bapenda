urls = {
	pathname: '/konfigurasi/data-ref/master/kecamatan',
	dataPath: '/kecamatan',
	dataSrc: '/kecamatan',
	submit: '/kecamatan/{id}',
}
vars = {
	selectedIdx: null,
	entryData: {},
	entryFormTitle: 'Entry Form',
	provinsiList: [],
	daerahList: [],
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