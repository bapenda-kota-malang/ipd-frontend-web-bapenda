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

function mounted(xthis) {
}

function preSubmit(xthis) {
	xthis.data.nop = mergeNop(xthis.nopFields);
	xthis.data.nopBersama = mergeNop(xthis.nopBersamaFields);
	xthis.data.nopAsal = mergeNop(xthis.nopAsalFields);
	xthis.data.noFormulirSpop = xthis.noFormulirFields[0] + xthis.noFormulirFields[1] + xthis.noFormulirFields[2];
	xthis.data.objekPajakBumi.luasBumi = parseInt(xthis.data.objekPajakBumi.luasBumi);
	xthis.data.tanggalPendataan = formatDate(xthis.tanggalPendataan, ['y', 'm', 'd'], '-');
	xthis.data.tanggalPemeriksaan = formatDate(xthis.tanggalPemeriksaan, ['y', 'm', 'd'], '-');
}

function postDataFetch(data, xthis) {

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
