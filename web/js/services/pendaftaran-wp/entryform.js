data = {...pendaftaran};
vars = {
	detailObjekPajak: [],
	pemilikLists: [],
	narahubungLists: [],
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
	options:['test', 'ok'],
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

function mounted(xthis) {
	if(!xthis.id) {
		addPemilik(xthis)
		addNarahubung(xthis)
	} else {
		xthis.data.pemilik.forEach(function(item) {
			addPemilikLists(xthis);
		})
		xthis.data.narahubung.forEach(function(item) {
			addNarahubungLists(xthis);
		})
	}
}

function preSubmit(xthis) {
	data = xthis.data
	if(data.tanggalNpwpd && typeof data.tanggalNpwpd['getDate'] == 'function') {
		data.tanggalNpwpd = formatDate(data.tanggalNpwpd);
	} 
	if(data.tanggalPengukuhan && typeof data.tanggalPengukuhan['getDate'] == 'function') {
		data.tanggalPengukuhan = formatDate(data.tanggalPengukuhan);
	} 
	if(data.tanggalMulaiUsaha && typeof data.tanggalMulaiUsaha['getDate'] == 'function') {
		data.tanggalMulaiUsaha = formatDate(data.tanggalMulaiUsaha);
	} 
}

function postDataFetch() {
	xthis.data.tanggalNpwpd = dxthis.ata.tanggalNpwpd ? new Date(xthis.data.tanggalNpwpd.substr(0,10)) : null;
	xthis.data.tanggalPengukuhan = xthis.data.tanggalPengukuhan ? new Date(xthis.data.tanggalPengukuhan.substr(0,10)) : null;
	xthis.data.tanggalMulaiUsaha = xthis.data.tanggalMulaiUsaha ? new Date(xthis.data.tanggalMulaiUsaha.substr(0,10)) : null;
}

components = {
	Datepicker: VueDatePicker,
	// 'vue-select': VueNextSelect
}

function addDetailObjekPajak(xthis) {
	xthis.detailObjekPajak.push({
		klasifikasi: null,
		jumlahOp: null,
		unitOp: null,
		tarifOp: null,
		notes: null,
	});
}

function delDetailObjekPajak(xthis, i){
	xthis.detailObjekPajak = this.detailObjekPajak.filter(function(value, index, arr){ 
		return index != i;
	});
}

function addPemilik(xthis) {
	xthis.data.pemilik.push({
		nama: null,
		nik: null,
		alamat: null,
		rtRw: null,
		daerah_id: null,
		kelurahan_id: null,
		telp: null,
		direktur_nama: null,
		direktur_nik: null,
		direktur_alamat: null,
		direktur_rtRw: null,
		direktur_daerah_id: null,
		direktur_kelurahan_id: null,
		direktur_telp: null,
	});
	addPemilikLists(xthis)
}

function addPemilikLists(xthis) {
	xthis.pemilikLists.push({
		kelurahans: [],
		direktur_kelurahans: [],
	})
}

function delPemilik(xthis, i){
	if(i > xthis.data.pemilik.length - 1)
		return;
	xthis.data.pemilik.splice(i, 1);
	xthis.pemilikLists.splice(i, 1);
}

function addNarahubung(xthis) {
	xthis.data.narahubung.push({
		nama: null,
		nik: null,
		alamat: null,
		rtRw: null,
		daerah_id: null,
		kelurahan_id: null,
		telp: null,
	});
	addNarahubungLists(xthis);
}

function addNarahubungLists(xthis) {
	xthis.narahubungLists.push({
		kelurahans: [],
	})
}

function delNarahubung(xthis, i){
	if(i > xthis.data.narahubung.length - 1)
		return;
	xthis.data.narahubung.splice(i, 1);
	xthis.narahubungLists.splice(i, 1);
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