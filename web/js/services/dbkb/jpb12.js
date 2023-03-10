urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-12',
	dataPath: '/dbkbjpb12',
	dataSrc: '/dbkbjpb12',
	submit: '/dbkbjpb12/{id}',
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
	data.tahunDbkbJpb12 = null;
	data.kelasDbkbJpb12 = null;
	data.lantaiMinJpb12 = null;
	data.lantaiMaxJpb12 = null;
	data.nilaiDbkbJpb12 = null;
}

function preSubmitEntry() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.lantaiMinJpb12 = parseInt(this.entryData.lantaiMinJpb12 );
	this.entryData.lantaiMaxJpb12 = parseInt(this.entryData.lantaiMaxJpb12);
	this.entryData.nilaiDbkbJpb12 = parseInt(this.entryData.nilaiDbkbJpb12);
}