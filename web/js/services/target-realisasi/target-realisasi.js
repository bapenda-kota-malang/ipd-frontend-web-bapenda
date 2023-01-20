urls = {
	pathname: '/konfigurasi/target-realisasi',
	dataPath: '/target-realisasi',
	dataSrc: '/target-realisasi',
	submit: '/target-realisasi/{id}',
}
vars = {
	selectedIdx: null,
	entryData: {},
	entryFormTitle: 'Entry Form',
	jenisPajakList: [],
	jenisPajakSimpleList: [],
}
refSources = {
	jenisPajakList: '/jenispajak?no_pagination=true',
}
components = {
	vueselect: VueSelect.VueSelect,
}

function mounted() {
	
}

function cleanData(data) {
	// delete data.id;
	data.tahun = null;
	data.target = null;
	if(data.jenisPajak_kode) {
		data.jenisPajak_kode = null;
	}
}

function preSubmitEntry() {
	this.entryData.target = parseFloat(this.entryData.target);
}