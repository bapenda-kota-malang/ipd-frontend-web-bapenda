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
	tanggalPendataan: null,
	tanggalPemeriksaan: null,
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
	this.data.nop = mergeNop(this.nopFields);
	this.data.nopBersama = mergeNop(this.nopBersamaFields);
	this.data.nopAsal = mergeNop(this.nopAsalFields);
	this.data.noFormulirSpop = this.noFormulirFields[0] + this.noFormulirFields[1] + this.noFormulirFields[2];
	this.data.objekPajakBumi.luasBumi = parseInt(this.data.objekPajakBumi.luasBumi);
	this.data.tanggalPendataan = formatDate(this.tanggalPendataan, ['y', 'm', 'd'], '-');
	this.data.tanggalPemeriksaan = formatDate(this.tanggalPemeriksaan, ['y', 'm', 'd'], '-');
}

function mergeNop(input) {
	result = '';
	nullSatus= false;
	for (const item in input) {
		if(input[item] == null || input[item].trim() == '') {
			nullSatus = true;
			break;
		}
		result += input[item] + '.';
	}
	if(!nullSatus) {
		result = result.substring(0, result.length-1);
		return result;
	} else {
		return null;
	}
}
