urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-13',
	dataPath: '/dbkbjpb13',
	dataSrc: '/dbkbjpb13',
	submit: '/dbkbjpb13/{id}',
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
	data.tahunDbkbJpb13 = null;
	data.kelasDbkbJpb13 = null;
	data.lantaiMinJpb13 = null;
	data.lantaiMaxJpb13 = null;
	data.nilaiDbkbJpb13 = null;
}

function preSubmitEntry() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.lantaiMinJpb13 = parseInt(this.entryData.lantaiMinJpb13 );
	this.entryData.lantaiMaxJpb13 = parseInt(this.entryData.lantaiMaxJpb13);
	this.entryData.nilaiDbkbJpb13 = parseInt(this.entryData.nilaiDbkbJpb13);
}