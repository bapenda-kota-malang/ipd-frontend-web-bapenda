urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-8_b',
	dataPath: '/dbkbjpbdayadukung',
	dataSrc: '/dbkbjpbdayadukung',
	submit: '/dbkbjpbdayadukung/{id}',
}
vars = {
	filter: {},
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
	data.tipeKonstruksi = null;
	data.nilaiDbkbDayaDukung = null;
}

function preSubmitEntry() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.lebarBentukMinDbkbJpb8 = parseInt(this.entryData.lebarBentukMinDbkbJpb8);
	this.entryData.lebarBentukMaxDbkbJpb8 = parseInt(this.entryData.lebarBentukMaxDbkbJpb8);
	this.entryData.tinggiKolomMinDbkbJpb8 = parseInt(this.entryData.tinggiKolomMinDbkbJpb8);
	this.entryData.tinggiKolomMaxDbkbJpb8 = parseInt(this.entryData.tinggiKolomMaxDbkbJpb8);
	this.entryData.nilaiDbkbJpb8 = parseInt(this.entryData.nilaiDbkbJpb8);
}
