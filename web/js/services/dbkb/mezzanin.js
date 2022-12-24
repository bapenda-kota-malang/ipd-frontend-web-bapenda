urls = {
	pathname: '/pendataan/dbkb/non-standar/mezzanin',
	dataPath: '/dbkbmezanin',
	dataSrc: '/dbkbmezanin',
	submit: '/dbkbmezanin/{id}',
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
	data.tahunDbkbMezzanin = null;
	data.nilaiDbkbMezzanin = null;
}

function preSubmit() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.nilaiDbkbMezzanin = parseInt(this.entryData.nilaiDbkbMezzanin);
}