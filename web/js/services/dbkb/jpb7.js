urls = {
	pathname: '/pendataan/dbkb/non-standar/jpb-7',
	dataPath: '/dbkbjpb7',
	dataSrc: '/dbkbjpb7',
	submit: '/dbkbjpb7/{id}',
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
	jenisList: [
		{ kode: '1', nama:'Resort' },
		{ kode: '2', nama:'Non Resort' }
	],
	bintangList: [
		{ kode: '0', nama:'Non Bintang' },
		{ kode: '1', nama:'Bintang 5' },
		{ kode: '2', nama:'Bintang 4' },
		{ kode: '3', nama:'Bintang 3' },
		{ kode: '4', nama:'Bintang 1,2' },
		{ kode: '5', nama:'Non Bintang' },
	],
}
components = {
	vueselect: VueSelect.VueSelect,
}

function cleanData(data) {
	delete data.id;
	data.provinsi_kode = '35';
	data.daerah_kode = '73';
	data.jenisDbkbJpb7 = null;
	data.bintangDbkbJpb7 = null;
	data.tahunDbkbJpb7 = null;
	data.lantaiMinJpb7 = null;
	data.lantaiMaxJpb7 = null;
	data.nilaiDbkbJpb7 = null;
}

function preSubmitEntry() {
	this.entryData.provinsi_kode = `${this.entryData.provinsi_kode}`;
	this.entryData.daerah_kode = `${this.entryData.daerah_kode}`;
	this.entryData.lantaiMinJpb7 = parseInt(this.entryData.lantaiMinJpb7);
	this.entryData.lantaiMaxJpb7 = parseInt(this.entryData.lantaiMaxJpb7);
	this.entryData.nilaiDbkbJpb7 = parseInt(this.entryData.nilaiDbkbJpb7);
}
