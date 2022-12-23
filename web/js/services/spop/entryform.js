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
	rtField:null,
	rwField:null,
}
urls = {
	preSubmit: '/pendataan/spop-lspop/daftar',
	postSubmit: '/pendataan/spop-lspop/daftar',
	submit: '/objekpajakpbb/{id}',
	dataSrc: '/objekpajakpbb',
}
methods = {
	// addDetailObjekPajak,
	// delDetailObjekPajak,
	// addPemilik,
	// delPemilik,
	// addNarahubung,
	// delNarahubung,
}
refSources = {
	kelurahanList: '/kelurahan?kode=3573&kode_opt=left',
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

// Vue.use(DatePicker);
// Vue.use(VueSelect.VueSelect);

function mounted(xthis) {
	// if(!xthis.id) {
	// 	addPemilik(xthis)
	// 	addNarahubung(xthis)
	// }
	// xthis.rekenings.forEach(function(item, idx){
	// 	xthis.rekenings[idx].nama = item.kode + ' - ' + item.nama;
	// })
}

function preSubmit(xthis) {
	mergeNop(nopBersamaFields);
	// xthis.data.nop = '';
	// data = xthis.data
	// if(data.tanggalNpwpd && typeof data.tanggalNpwpd['getDate'] == 'function') {
	// 	data.tanggalNpwpd = formatDate(data.tanggalNpwpd);
	// } 
	// if(data.tanggalPengukuhan && typeof data.tanggalPengukuhan['getDate'] == 'function') {
	// 	data.tanggalPengukuhan = formatDate(data.tanggalPengukuhan);
	// } 
	// if(data.tanggalMulaiUsaha && typeof data.tanggalMulaiUsaha['getDate'] == 'function') {
	// 	data.tanggalMulaiUsaha = formatDate(data.tanggalMulaiUsaha);
	// } 
}

function postDataFetch(data, xthis) {

}

function mergeNop(input) {
	result = '';
	for (const item in input) {
		result += `${object[property]}.`;
	}
	console.log(result.substring(result.length));
	// if()
	return result;
}
