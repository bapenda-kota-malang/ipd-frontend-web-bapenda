data = {...pendaftaran};
vars = {
	detailObjekPajak: [],
	pemilik: [],
	narahubung: [],
	// 
	dateFormat,
	assessments,
	golongans,
	rekenings: [],
	daerahs: [],
	kecamatans: [],
	kelurahans: [],
	// 
	tanggalPengukuhanTemp: null,
	tanggalNpwpdTemp: null,
	tanggalMulaiUsahaTemp: null,
	kodeJenisUsaha: 0,
}
urls = {
	preSubmit: '/pendaftaran/wajib-pajak',
	postSubmit: '/pendaftaran/wajib-pajak',
	submit: '/npwpd/{id}',
	dataSrc: '/npwpd',
}
methods = {
	addDetailObjekPajak,
	delDetailObjekPajak,
	addPemilik,
	delPemilik,
	addNarahubung,
	delNarahubung,
}
refSources = {
	rekenings: '/rekening?kodeJenisUsaha=0&kodeJenisUsaha_opt=gt&no_pagination=true',
	daerahs: '/daerah?no_pagination=true',
	kecamatans: '/kecamatan?daerah_kode=3573',
}

mounted = function(xthis) {
	if(!xthis.id) {
		addPemilik(xthis.pemilik)
	}
}

postDataFetch = function(data, xthis) {
	data.tanggalNpwpd = new Date(data.tanggalNpwpd.substr(0,10));
	data.tanggalPengukuhan = new Date(data.tanggalPengukuhan.substr(0,10));
	data.tanggalMulaiUsaha = new Date(data.tanggalMulaiUsaha.substr(0,10));
	if(typeof data.pemilik == 'object') {
		xthis.pemilik = data.pemilik;
	}
	if(typeof data.narahubung == 'object') {
		xthis.narahubung = data.narahubung;
	}
}

preSubmit = function(xthis) {
	if(typeof xthis.pemilik[0] != 'undefined') {
		xthis.data.pemilik = [];
		for(i = 0; i < xthis.pemilik.length; i++) {
			xthis.data.pemilik.push({...xthis.pemilik[i]});
			delete xthis.data.pemilik[i].kelurahans;
			delete xthis.data.pemilik[i].direktur_kelurahans;
		}
	}
	if(typeof xthis.narahubung[0] != 'undefined') {
		xthis.data.narahubung = [];
		for(i = 0; i < xthis.narahubung.length; i++) {
			xthis.data.narahubung.push({...xthis.narahubung[i]});
			delete xthis.data.narahubung[i].kelurahans;
			delete xthis.data.narahubung[i].direktur_kelurahans;
		}
	}
}

components = {
	Datepicker: VueDatePicker,
	VueSelect: VueSelect.VueSelect,
}

// async function refreshKecamatan(myList, event) {
// 	myList.splice(0, myList.length)
// 	values = event.target.selectedOptions[0].text.split('-');
// 	res = await apiFetch('/kecamatan?daerah_kode=' + values[1].trim())
// 	res.data.data.forEach(function(item)  {
// 		myList.push(item)				
// 	});
// }

// async function refreshKelurahan(myList, event) {
// 	myList.splice(0, myList.length)
// 	values = event.target.selectedOptions[0].text.split('-');
// 	res = await apiFetch('/kelurahan?kecamatan_kode=' + values[1].trim())
// 	res.data.data.forEach(function(item)  {
// 		myList.push(item)				
// 	});
// }

function addDetailObjekPajak(xthis) {
	xthis.detailObjekPajak.push({
		klasifikasi: '',
		jumlahOp: '',
		unitOp: '',
		tarifOp: '',
		notes: '',
	});
}

function delDetailObjekPajak(xthis, i){
	xthis.detailObjekPajak = this.detailObjekPajak.filter(function(value, index, arr){ 
		return index != i;
	});
}

function addPemilik(data) {
	data.push({
		nama: '',
		nik: '',
		alamat: '',
		rtRw: '',
		daerah_id: 0,
		kelurahans: [],
		kelurahan_id: 0,
		telp: '',
		direktur_nama: '',
		direktur_nik: '',
		direktur_alamat: '',
		direktur_rtRw: '',
		direktur_daerah_id: 0,
		direktur_kelurahans: [],
		direktur_kelurahan_id: 0,
		direktur_telp: '',
	});
}

function delPemilik(data, i){
	if(i > data.length - 1)
		return;
	data.splice(i, 1);
}

function addNarahubung(xthis) {
	xthis.narahubung.push({
		nama: '',
		nik: '',
		alamat: '',
		rtRw: '',
		daerah_id: 0,
		kelurahans: [],
		kelurahan_id: 0,
		telp: '',
	});
}

function delNarahubung(xthis, i){
	xthis.narahubung = xthis.narahubung.filter(function(value, index, arr){ 
		return index != i;
	});
}

// async function getRekening() {
// 	res = await apiFetch('/rekening')
// 	if(res.success) {
// 		return res.data;
// 	} else {
// 		messages.push('gagal mengambil data rekening');
// 		return { data: [] };
// 	}
// }

// async function getDetail(id) {
// 	res = await apiFetch('/npwpd/' + id)
// 	if(res.success) {
// 		return res.data;
// 	} else {
// 		messages.push('gagal mengambil data');
// 		return { data: [] };
// 	}
// }

function postFetch(xthis) {
	if(xthis.data.rekening.objek == '01') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakHotel;
	} else if(xthis.data.rekening.objek == '02') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakResto;
	} else if(xthis.data.rekening.objek == '03') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakHiburan;
	} else if(xthis.data.rekening.objek == '04') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakReklame;
	} else if(xthis.data.rekening.objek == '05') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakPeneranganJalan;
	} else if(xthis.data.rekening.objek == '06') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakHotel;
	} else if(xthis.data.rekening.objek == '07') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakParkir;
	} else if(xthis.data.rekening.objek == '08') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakAirTanah;
	}
}