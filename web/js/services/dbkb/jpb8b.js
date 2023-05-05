urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-8_b',
	dataPath: '/dbkbdayadukung',
	dataSrc: '/dbkbdayadukung',
	submit: '/dbkbdayadukung/{id}',
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
	// this.entryData.tipeKonstruksi = parseInt(this.entryData.tipeKonstruksi);
	this.entryData.nilaiDbkbDayaDukung = parseInt(this.entryData.nilaiDbkbDayaDukung);
}
