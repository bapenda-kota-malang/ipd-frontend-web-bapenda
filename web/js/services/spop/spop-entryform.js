data = {...objekPjakPbbCreate};
vars = {
	nopFields:{
		provinsi_kode:null,
		daerah_kode:null,
		kecamatan_kode:null,
		kelurahan_kode:null,
		kodeBlok:null,
		noUrut:null,
		kodeJenisOp:null,
	},
	nopBersamaFields: {
		provinsi_kode:null,
		daerah_kode:null,
		kecamatan_kode:null,
		kelurahan_kode:null,
		kodeBlok:null,
		noUrut:null,
		kodeJenisOp:null,
	},
	nopAsalFields: {
		provinsi_kode:null,
		daerah_kode:null,
		kecamatan_kode:null,
		kelurahan_kode:null,
		kodeBlok:null,
		noUrut:null,
		kodeJenisOp:null,
	},
	daerahList: [
		{ kode: '3573', nama: 'Kota Malang' }
	],
	kelurahanList: [],
	noFormulirFields: ['','',''],
	tanggalPerekaman: null,
	tanggalPemeriksaan: null,
	jenisBumis: [
		{ kode: "1", nama: "Tanah + Bangunan" },
		{ kode: "2", nama: "Kavling Siap Bangun" },
		{ kode: "3", nama: "Tanah Kosong" },
		{ kode: "4", nama: "Fasilitas Umum" },
	],
}
urls = {
	preSubmit: '/pendataan/spop-lspop/daftar',
	postSubmit: '/pendataan/spop-lspop/daftar',
	submit: '/objekpajakpbb/{id}',
	dataSrc: '/objekpajakpbb',
}
methods = {
	nopNextAfter,
}
refSources = {
	kelurahanList: '/kelurahan?kode=3573&kode_opt=left&no_pagination=true',
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function mounted() {
}

function preSubmit() {
	this.data.nop = mergeNop(this.data);
	this.data.nopBersama = mergeNop(this.nopBersamaFields);
	this.data.nopAsal = mergeNop(this.nopAsalFields);
	this.data.noFormulirSpop = this.noFormulirFields[0] + this.noFormulirFields[1] + this.noFormulirFields[2];
	this.data.objekPajakBumi.luasBumi = parseInt(this.data.objekPajakBumi.luasBumi);
	this.data.tanggalPerekaman = formatDate(this.tanggalPerekaman, ['y', 'm', 'd'], '-');
	this.data.tanggalPemeriksaan = formatDate(this.tanggalPemeriksaan, ['y', 'm', 'd'], '-');
	this.data.noFormulirSpop = `${this.noFormulirFields[0]}${this.noFormulirFields[1]}${this.noFormulirFields[2]}`;
}

function mergeNop(input) {
	result = '';
	nullSatus= false;
	keys = ['provinsi_kode','daerah_kode','kecamatan_kode','kelurahan_kode','blok_kode','noUrut','jenisOp'];
	for(i = 0; i<keys.length; i++) {
		if(input[keys[i]] == null || input[keys[i]].trim() == '') {
			nullSatus = true;
			break;
		}
		result += input[keys[i]] + '.';
	}
	if(!nullSatus) {
		result = result.substring(0, result.length-1);
		return result;
	} else {
		return null;
	}
}
