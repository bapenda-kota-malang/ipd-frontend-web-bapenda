urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-16',
	dataPath: '/dbkbjpb16',
	dataSrc: '/dbkbjpb16',
	submit: '/dbkbjpb16/{id}',
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
	data.tahunDbkbJpb16 = null;
	data.kelasDbkbJpb16 = null;
	data.lantaiMinJpb16 = null;
	data.lantaiMaxJpb16 = null;
	data.nilaiDbkbJpb16 = null;
}

function preSubmitEntry() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.lantaiMinJpb16 = parseInt(this.entryData.lantaiMinJpb16 );
	this.entryData.lantaiMaxJpb16 = parseInt(this.entryData.lantaiMaxJpb16);
	this.entryData.nilaiDbkbJpb16 = parseInt(this.entryData.nilaiDbkbJpb16);
}