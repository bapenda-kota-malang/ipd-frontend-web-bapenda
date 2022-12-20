urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-5',
	dataPath: '/dbkbjpb5',
	dataSrc: '/dbkbjpb5',
	submit: '/dbkbjpb5/{id}',
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
	data.tahunDbkbJpb5 = null;
	data.kelasDbkbJpb5 = null;
	data.lantaiMinJpb5 = null;
	data.lantaiMaxJpb5 = null;
	data.nilaiDbkbJpb5 = null;
}

function preSubmit() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.lantaiMinJpb5 = parseInt(this.entryData.lantaiMinJpb5 );
	this.entryData.lantaiMaxJpb5 = parseInt(this.entryData.lantaiMaxJpb5);
	this.entryData.nilaiDbkbJpb5 = parseInt(this.entryData.nilaiDbkbJpb5);
}