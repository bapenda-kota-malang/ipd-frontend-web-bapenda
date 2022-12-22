data = {...objekPjakPbbCreate};
vars = {
	nopFields = ['','','','','','','']
	// detailObjekPajak: [],
	// pemilikLists: [],
	// narahubungLists: [],
	// // 
	// // dateFormat,
	// assessments,
	// golongans,
	// rekenings: [],
	// daerahs: [],
	// kecamatans: [],
	// kelurahans: [],
	// // 
	// tanggalPengukuhanTemp: null,
	// tanggalNpwpdTemp: null,
	// tanggalMulaiUsahaTemp: null,
	// kodeJenisUsaha: 0,
	// options:['test', 'ok'],
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
	// rekenings: '/rekening?kodeJenisUsaha=0&kodeJenisUsaha_opt=gt&no_pagination=true',
	// daerahs: '/daerah?no_pagination=true',
	// kecamatans: '/kecamatan?daerah_kode=3573',
}
components = {
	// datepicker: DatePicker,
	// vueselect: VueSelect.VueSelect,
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
	xthis.data.nop = '';
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
	// if(xthis.id) {
	// 	data.tanggalNpwpd = data.tanggalNpwpd ? new Date(data.tanggalNpwpd.substr(0,10)) : null;
	// 	data.tanggalPengukuhan = data.tanggalPengukuhan ? new Date(data.tanggalPengukuhan.substr(0,10)) : null;
	// 	data.tanggalMulaiUsaha = data.tanggalMulaiUsaha ? new Date(data.tanggalMulaiUsaha.substr(0,10)) : null;
	// 	xthis.refreshSelect(data.objekPajak.kecamatan_id, xthis.kecamatans, `/kelurahan?kecamatan_kode=${data.objekPajak.kecamatan.kode}&no_pagination=true`, xthis.kelurahans, 'kode');
	// 	data.pemilik.forEach(function(item, idx) {
	// 		addPemilikLists(xthis);
	// 		xthis.refreshSelect(item.daerah_id, xthis.daerahs, `/kelurahan?kode=${data.pemilik[idx].daerah.kode}&kode_opt=left&no_pagination=true`, xthis.pemilikLists[idx].kelurahans, 'kode');
	// 		if(item.direktur_daerah_id)
	// 			xthis.refreshSelect(item.direktur_daerah_id, xthis.daerahs, `/kelurahan?kode=${data.pemilik[idx].direktur_daerah.kode}&kode_opt=left&no_pagination=true`, xthis.pemilikLists[idx].direktur_kelurahans, 'kode');
	// 	})
	// 	data.narahubung.forEach(function(item, idx) {
	// 		addNarahubungLists(xthis);
	// 		xthis.refreshSelect(item.daerah_id, xthis.daerahs, `/kelurahan?kode=${data.narahubung[idx].daerah.kode}&kode_opt=left&no_pagination=true`, xthis.narahubungLists[idx].kelurahans, 'kode');
	// 	})

	// 	if(data.detailObjekPajak) {
	// 		if(data.rekening.objek == '01') {
	// 			xthis.detailObjekPajak = data.detailObjekPajakHotel;
	// 		} else if(data.rekening.objek == '02') {
	// 			xthis.detailObjekPajak = data.detailObjekPajakResto;
	// 		} else if(data.rekening.objek == '03') {
	// 			xthis.detailObjekPajak = data.detailObjekPajakHiburan;
	// 		} else if(data.rekening.objek == '04') {
	// 			xthis.detailObjekPajak = data.detailObjekPajakReklame;
	// 		} else if(data.rekening.objek == '05') {
	// 			xthis.detailObjekPajak = data.detailObjekPajakPeneranganJalan;
	// 		} else if(data.rekening.objek == '06') {
	// 			xthis.detailObjekPajak = data.detailObjekPajakHotel;
	// 		} else if(data.rekening.objek == '07') {
	// 			xthis.detailObjekPajak = data.detailObjekPajakParkir;
	// 		} else if(data.rekening.objek == '08') {
	// 			xthis.detailObjekPajak = data.detailObjekPajakAirTanah;
	// 		}	
	// 	}
	// }
}

// function addDetailObjekPajak(xthis) {
	// xthis.data.detailObjekPajak.push({
	// 	klasifikasi: null,
	// 	jumlahOp: null,
	// 	unitOp: null,
	// 	tarifOp: null,
	// 	notes: null,
	// });
// }

// function delDetailObjekPajak(xthis, i){
	// if(i > data.detailObjekPajak.length - 1)
	// 	return;
	// data.detailObjekPajak.splice(i, 1);
// }

// function addPemilik(xthis) {
// 	data.pemilik.push({
// 		nama: null,
// 		nik: null,
// 		alamat: null,
// 		rtRw: null,
// 		daerah_id: null,
// 		kelurahan_id: null,
// 		telp: null,
// 		direktur_nama: null,
// 		direktur_nik: null,
// 		direktur_alamat: null,
// 		direktur_rtRw: null,
// 		direktur_daerah_id: null,
// 		direktur_kelurahan_id: null,
// 		direktur_telp: null,
// 	});
// 	addPemilikLists(xthis)
// }

// function addPemilikLists(xthis) {
// 	xthis.pemilikLists.push({
// 		kelurahans: [],
// 		direktur_kelurahans: [],
// 	})
// }

// function delPemilik(xthis, i){
// 	if(i > data.pemilik.length - 1)
// 		return;
// 	data.pemilik.splice(i, 1);
// 	xthis.pemilikLists.splice(i, 1);
// }

// function addNarahubung(xthis) {
// 	data.narahubung.push({
// 		nama: null,
// 		nik: null,
// 		alamat: null,
// 		rtRw: null,
// 		daerah_id: null,
// 		kelurahan_id: null,
// 		telp: null,
// 	});
// 	addNarahubungLists(xthis);
// }

// function addNarahubungLists(xthis) {
// 	xthis.narahubungLists.push({
// 		kelurahans: [],
// 	})
// }

// function delNarahubung(xthis, i){
// 	if(i > data.narahubung.length - 1)
// 		return;
// 	data.narahubung.splice(i, 1);
// 	xthis.narahubungLists.splice(i, 1);
// }

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

