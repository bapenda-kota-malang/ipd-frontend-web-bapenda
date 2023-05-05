urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-4',
	dataPath: '/dbkbjpb4',
	dataSrc: '/dbkbjpb4',
	submit: '/dbkbjpb4/{id}',
}
vars = {
	filter: {},
	selectedIdx: null,
	entryData: {},
	entryFormTitle: 'Entry Form',
	provinsiList: [
		{ kode: '35', nama:'Jawa Timur'}
	],
	daerahList: [
		{ kode: '73', nama:'Kota Malang'}
	]
}
components = {
	vueselect: VueSelect.VueSelect,
}

function cleanData(data) {
	delete data.id;
	data.provinsi_kode = '35';
	data.daerah_kode = '73';
	data.tahunDbkbJpb4 = null;
	data.kelasDbkbJpb4 = null;
	data.lantaiMinJpb4 = null;
	data.lantaiMaxJpb4 = null;
	data.nilaiDbkbJpb4 = null;
}

function preSubmitEntry() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.lantaiMinJpb4 = parseInt(this.entryData.lantaiMinJpb4);
	this.entryData.lantaiMaxJpb4 = parseInt(this.entryData.lantaiMaxJpb4);
	this.entryData.nilaiDbkbJpb4 = parseInt(this.entryData.nilaiDbkbJpb4);
}