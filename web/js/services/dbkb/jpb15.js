urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-15',
	dataPath: '/dbkbjpb15',
	dataSrc: '/dbkbjpb15',
	submit: '/dbkbjpb15/{id}',
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
	],
	tangkiList: [
		{ kode: 1, nama:'Tangki Di Atas Tanah'},
		{ kode: 2, nama:'Tangki Di Bawah Tanah'}
	]
}
components = {
	vueselect: VueSelect.VueSelect,
}

function cleanData(data) {
	delete data.id;
	data.provinsi_kode = '35';
	data.daerah_kode = '73';
	data.tahunDbkbJpb15 = null;
	data.jenisTangkiDbkbJpb15 = null;
	data.kapasitasMinDbkbJpb15 = null;
	data.kapasitasMaxDbkbJpb15 = null;
	data.nilaiDbkbJpb15 = null;
}

function preSubmitEntry() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.kapasitasMinDbkbJpb15 = parseInt(this.entryData.kapasitasMinDbkbJpb15 );
	this.entryData.kapasitasMaxDbkbJpb15 = parseInt(this.entryData.kapasitasMaxDbkbJpb15);
	this.entryData.nilaiDbkbJpb15 = parseInt(this.entryData.nilaiDbkbJpb15);
}