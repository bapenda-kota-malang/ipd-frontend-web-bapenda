urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-8_a',
	dataPath: '/dbkbjpb8',
	dataSrc: '/dbkbjpb8',
	submit: '/dbkbjpb8/{id}',
}
vars = {
	selectedIdx: null,
	entryData: {},
	entryFormTitle: 'Entry Form',
	provinsiList: [
		{ kode: '35', nama:'Jawa Timur' }
	],
	daerahList: [
		{ kode: '73', nama:'Kota Malang' }
	],
}
components = {
	vueselect: VueSelect.VueSelect,
}

function cleanData(data) {
	delete data.id;
	data.provinsi_kode = '35';
	data.daerah_kode = '73';
	data.tahunDbkbJpb8 = null;
	data.lebarBentukMinDbkbJpb8 = null;
	data.lebarBentukMaxDbkbJpb8 = null;
	data.tinggiKolomMinDbkbJpb8 = null;
	data.tinggiKolomMaxDbkbJpb8 = null;
	data.nilaiDbkbJpb8 = null;
}

function preSubmit() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.lebarBentukMinDbkbJpb8 = parseInt(this.entryData.lebarBentukMinDbkbJpb8);
	this.entryData.lebarBentukMaxDbkbJpb8 = parseInt(this.entryData.lebarBentukMaxDbkbJpb8);
	this.entryData.tinggiKolomMinDbkbJpb8 = parseInt(this.entryData.tinggiKolomMinDbkbJpb8);
	this.entryData.tinggiKolomMaxDbkbJpb8 = parseInt(this.entryData.tinggiKolomMaxDbkbJpb8);
	this.entryData.nilaiDbkbJpb8 = parseInt(this.entryData.nilaiDbkbJpb8);
}
