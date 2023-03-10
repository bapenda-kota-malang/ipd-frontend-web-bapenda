urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-6',
	dataPath: '/dbkbjpb6',
	dataSrc: '/dbkbjpb6',
	submit: '/dbkbjpb6/{id}',
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
	data.tahunDbkbJpb6 = null;
	data.kelasDbkbJpb6 = null;
	data.nilaiDbkbJpb6 = null;
}

function preSubmitEntry() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.nilaiDbkbJpb6 = parseInt(this.entryData.nilaiDbkbJpb6);
}