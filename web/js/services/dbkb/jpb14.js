urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-14',
	dataPath: '/dbkbjpb14',
	dataSrc: '/dbkbjpb14',
	submit: '/dbkbjpb14/{id}',
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
	data.tahunDbkbJpb14 = null;
	data.nilaiDbkbJpb14 = null;
}

function preSubmit() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.nilaiDbkbJpb14 = parseInt(this.entryData.nilaiDbkbJpb14);
}