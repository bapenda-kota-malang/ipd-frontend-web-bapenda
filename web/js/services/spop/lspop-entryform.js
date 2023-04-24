data = {...objekPjakBangunanCreate};
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
	daerahList: [
		{ kode: '3573', nama: 'Kota Malang' }
	],
	noFormulier: [0,0,0],
	kelurahanList: [],
	jpbs: [],
	noFormulirFields: ['','',''],
	tanggalPerekaman: null,
	tanggalPendataan: null,
	tanggalPemeriksaan: null,
	kondisis: [
		{ kode:"1", nama:"1 - Sangat Baik" },
		{ kode:"2", nama:"2 - Baik" },
		{ kode:"3", nama:"3 - Sedang" },
		{ kode:"4", nama:"4 - Jelek" },
	],
	finishingKolams: [
		{ kode:"1", nama:"1 - Diplester" },
		{ kode:"2", nama:"2 - Dengan Pelapis" },
	],
	bahanPagars: [
		{ kode:"1", nama:"1 - Baja/Besi" },
		{ kode:"2", nama:"2- Bata//Batako" },
	],
	jenisKonstruksis: [
		{ kode:"1", nama:"1 - Baja" },
		{ kode:"2", nama:"2 - Beton" },
		{ kode:"3", nama:"3 - Batu Bata" },
		{ kode:"4", nama:"4 - Kayu" },
	],
	jenisAtaps: [
		{ kode:"1", nama:"1 - Decrabon/Beton/Gtg. Glazur" },
		{ kode:"2", nama:"2 - Gtg. Beton/Alumunium" },
		{ kode:"3", nama:"3 - Gtg. Biasa/Sirap" },
		{ kode:"4", nama:"4 - Asbes" },
		{ kode:"5", nama:"5 - Seng" },
	],
	kodeDindings: [
		{ kode:"1", nama:"1 - Kaca/Alumunium" },
		{ kode:"2", nama:"2 - Beton" },
		{ kode:"3", nama:"3 - atu Bata/Conblok" },
		{ kode:"4", nama:"4 - Kayu" },
		{ kode:"5", nama:"5 - Seng" },
		{ kode:"6", nama:"6 - Tidak Ada" },
	],
	kodeLantais: [
		{ kode:"1", nama:"1 - Marmer" },
		{ kode:"2", nama:"2 - Keramik" },
		{ kode:"3", nama:"3 - Teraso" },
		{ kode:"4", nama:"4 - Ubin PC/Papan" },
		{ kode:"5", nama:"5 - Semen" },
	],
	kodeLangitLangits: [
		{ kode:"1", nama:"1 - Akustik/Jati" },
		{ kode:"2", nama:"2 - Triplek/Asbes Bambu" },
		{ kode:"3", nama:"3 - Tidak Ada" },
	],
}
urls = {
	preSubmit: '/pendataan/spop-lspop/daftar',
	postSubmit: '/pendataan/spop-lspop/daftar',
	submit: '/objekpajakbangunan/{id}',
	dataSrc: '/objekpajakbangunan',
}
methods = {
	nopNextAfter,
}
refSources = {
	kelurahanList: '/kelurahan?kode=3573&kode_opt=left&no_pagination=true',
	jpbs: '/jpb?no_pagination=true',
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function mounted() {
}

function preSubmit() {
	this.data.nop = mergeNop(this.data);
	this.data.noFormulirSpop = this.noFormulirFields[0] + this.noFormulirFields[1] + this.noFormulirFields[2];
	// this.data.objekPajakBumi.luasBumi = parseInt(this.data.objekPajakBumi.luasBumi);
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
