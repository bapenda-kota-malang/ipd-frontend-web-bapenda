urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-13',
	dataPath: '/dbkbjpb9',
	dataSrc: '/dbkbjpb9',
	submit: '/dbkbjpb9/{id}',
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
	data.tahunDbkbJpb9 = null;
	data.kelasDbkbJpb9 = null;
	data.lantaiMinJpb9 = null;
	data.lantaiMaxJpb9 = null;
	data.nilaiDbkbJpb9 = null;
}

function preSubmitEntry() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.lantaiMinJpb9 = parseInt(this.entryData.lantaiMinJpb9 );
	this.entryData.lantaiMaxJpb9 = parseInt(this.entryData.lantaiMaxJpb9);
	this.entryData.nilaiDbkbJpb9 = parseInt(this.entryData.nilaiDbkbJpb9);
}