urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-2',
	dataPath: '/dbkbjpb2',
	dataSrc: '/dbkbjpb2',
	submit: '/dbkbjpb2/{id}',
}
vars = {
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
	data.tahunDbkbJpb2 = null;
	data.kelasDbkbJpb2 = null;
	data.lantaiMinJpb2 = null;
	data.lantaiMaxJpb2 = null;
	data.nilaiDbkbJpb2 = null;
}

function preSubmit() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.lantaiMinJpb2 = parseInt(this.entryData.lantaiMinJpb2);
	this.entryData.lantaiMaxJpb2 = parseInt(this.entryData.lantaiMaxJpb2);
	this.entryData.nilaiDbkbJpb2 = parseInt(this.entryData.nilaiDbkbJpb2);
}