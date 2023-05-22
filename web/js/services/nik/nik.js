urls = {
	pathname: '/konfigurasi/master/nik',
	dataPath: '/nik',
	dataSrc: '/nik',
	dataSrcParams: {
		nama_opt: 'left',
	},
	submit: '/nik/{id}',
}
vars = {
	selectedIdx: null,
	entryData: {},
	entryFormTitle: 'Entry Form',
	provinsiList: [],
	daerahList: [],
	kecamatanList: [],
	kelurahanList: [],
}
refSources = {
	provinsiList: '/provinsi?no_pagination=true',
}
components = {
	vueselect: VueSelect.VueSelect,
}

async function postShowEntry() {
	if(this.entryData.provinsi_id) {
		await this.refreshSelect(this.entryData.provinsi_id, this.provinsiList, '/daerah?provinsi_kode={kode}&no_pagination=true', this.daerahList, 'kode', 'id');
	}
	if(this.entryData.daerah_id) {
		await this.refreshSelect(this.entryData.daerah_id, this.daerahList, '/kecamatan?kecamatan_kode={kode}&no_pagination=true', this.kecamatanList, 'kode', 'id');
	}
	if(this.entryData.kecamatan_id) {
		await this.refreshSelect(this.entryData.kecamatan_id, this.kecamatanList, '/kelurahan?kecamatan_kode={kode}&no_pagination=true', this.kelurahanList, 'kode', 'id');
	}
}

function cleanData(data) {
	// delete data.id;
	data.nik = null;
	data.nama = null;
	data.rtRw = null;
	data.kodePos = null
	if(data.provinsi_kode) {
		data.provinsi_kode = null;
	}
	if(data.daerah_id) {
		data.daerah_id = null;
	}
	if(data.kecamatan_id ) {
		data.kecamatan_id = null;
	}
	if(data.kelurahan_id) {
		data.kelurahan_id = null;
	}
}