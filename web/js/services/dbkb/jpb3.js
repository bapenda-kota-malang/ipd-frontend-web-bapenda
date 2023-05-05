urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-3',
	dataPath: '/dbkbjpb3',
	dataSrc: '/dbkbjpb3',
	submit: '/dbkbjpb3/{id}',
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
	data.tahunDbkbJpb3 = null;
	data.lebarBentukMinDbkbJpb3 = null;
	data.lebarBentukMaxDbkbJpb3 = null;
	data.tinggiKolomMinDbkbJpb3 = null;
	data.tinggiKolomMaxDbkbJpb3 = null;
	data.nilaiDbkbJpb3 = null;
}

function preSubmitEntry() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.lebarBentukMinDbkbJpb3 = parseInt(this.entryData.lebarBentukMinDbkbJpb3);
	this.entryData.lebarBentukMaxDbkbJpb3 = parseInt(this.entryData.lebarBentukMaxDbkbJpb3);
	this.entryData.tinggiKolomMinDbkbJpb3 = parseInt(this.entryData.tinggiKolomMinDbkbJpb3);
	this.entryData.tinggiKolomMaxDbkbJpb3 = parseInt(this.entryData.tinggiKolomMaxDbkbJpb3);
	this.entryData.nilaiDbkbJpb3 = parseInt(this.entryData.nilaiDbkbJpb3);
}