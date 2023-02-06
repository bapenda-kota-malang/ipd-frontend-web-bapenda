id = document.getElementById('id').value;
if(!id)
	id = 0;

data = {...objekPjakPbbDetail}
urls = {
	dataSrc: '/objekpajakpbb/' +id,
}
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
	noFormulirFields: ['','',''],
}
methods = {
}

function postFetchData(data) {
	if(!data.wajibPajakPbb) {
		data.wajibPajakPbb = {}
	}
	if(!data.objekPajakBumi) {
		data.objekPajakBumi = {}
	}
	if(!data.anggotaObjekPajak) {
		data.anggotaObjekPajak = {}
	}
	this.nopFields.provinsi_kode = data.provinsi_kode;
	this.nopFields.daerah_kode = data.daerah_kode;
	this.nopFields.kecamatan_kode = data.kecamatan_kode;
	this.nopFields.kelurahan_kode = data.kelurahan_kode;
	this.nopFields.kodeBlok = data.blok_kode;
	this.nopFields.noUrut = data.noUrut;
	this.nopFields.kodeJenisOp = data.jenisOp;
}