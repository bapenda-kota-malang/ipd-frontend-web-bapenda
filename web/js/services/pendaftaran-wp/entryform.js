data = {...npwpd};
vars = {
	detailObjekPajak: [],
	pemilikLists: [],
	narahubungLists: [],
	// 
	// dateFormat,
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
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

// Vue.use(DatePicker);
// Vue.use(VueSelect.VueSelect);

function mounted(xthis) {
	if(!xthis.id) {
		addPemilik(app)
		addNarahubung(xthis)
	}
	// xthis.rekenings.forEach(function(item, idx){
	// 	xthis.rekenings[idx].nama = item.kode + ' - ' + item.nama;
	// })
}

function preSubmit(xthis) {
	data = xthis.data
	data.tanggalNpwpd = formatDate(xthis.tanggalNpwpdTemp, ['y','m','d'], '-');
	data.tanggalPengukuhan = formatDate(xthis.tanggalPengukuhanTemp, ['y','m','d'], '-');
	data.tanggalMulaiUsaha = formatDate(xthis.tanggalMulaiUsahaTemp, ['y','m','d'], '-');
}

function postDataFetch(data, xthis) {
	if(xthis.id) {
		xthis.tanggalNpwpdTemp = data.tanggalNpwpd ? new Date(data.tanggalNpwpd.substr(0,10)) : null;
		xthis.tanggalPengukuhanTemp = data.tanggalPengukuhan ? new Date(data.tanggalPengukuhan.substr(0,10)) : null;
		xthis.tanggalMulaiUsahaTemp = data.tanggalMulaiUsaha ? new Date(data.tanggalMulaiUsaha.substr(0,10)) : null;
		xthis.refreshSelect(data.objekPajak.kecamatan_id, xthis.kecamatans, `/kelurahan?kecamatan_kode=${data.objekPajak.kecamatan.kode}&no_pagination=true`, xthis.kelurahans, 'kode');
		data.pemilik.forEach(function(item, idx) {
			addPemilikLists(xthis);
			xthis.refreshSelect(item.daerah_id, xthis.daerahs, `/kelurahan?kode=${data.pemilik[idx].daerah.kode}&kode_opt=left&no_pagination=true`, xthis.pemilikLists[idx].kelurahans, 'kode');
			if(item.direktur_daerah_id)
				xthis.refreshSelect(item.direktur_daerah_id, xthis.daerahs, `/kelurahan?kode=${data.pemilik[idx].direktur_daerah.kode}&kode_opt=left&no_pagination=true`, xthis.pemilikLists[idx].direktur_kelurahans, 'kode');
		})
		data.narahubung.forEach(function(item, idx) {
			addNarahubungLists(xthis);
			xthis.refreshSelect(item.daerah_id, xthis.daerahs, `/kelurahan?kode=${data.narahubung[idx].daerah.kode}&kode_opt=left&no_pagination=true`, xthis.narahubungLists[idx].kelurahans, 'kode');
		})

		if(data.rekening.objek == '01') {
			data.detailObjekPajak = data.detailObjekPajakHotel;
		} else if(data.rekening.objek == '02') {
			data.detailObjekPajak = data.detailObjekPajakResto;
		} else if(data.rekening.objek == '03') {
			data.detailObjekPajak = data.detailObjekPajakHiburan;
		} else if(data.rekening.objek == '04') {
			data.detailObjekPajak = data.detailObjekPajakReklame;
		} else if(data.rekening.objek == '05') {
			data.detailObjekPajak = data.detailObjekPajakPeneranganJalan;
		} else if(data.rekening.objek == '06') {
			data.detailObjekPajak = data.detailObjekPajakHotel;
		} else if(data.rekening.objek == '07') {
			data.detailObjekPajak = data.detailObjekPajakParkir;
		} else if(data.rekening.objek == '08') {
			data.detailObjekPajak = data.detailObjekPajakAirTanah;
		} else {
			data.detailObjekPajak = [];
		}
	}
}

function addDetailObjekPajak(xthis) {
	app.data.detailObjekPajak.push({
		klasifikasi: null,
		jumlahOp: null,
		unitOp: null,
		tarifOp: null,
		notes: null,
	});
}

function delDetailObjekPajak(xthis, i){
	if(i > app.data.detailObjekPajak.length - 1)
		return;
	app.data.detailObjekPajak.splice(i, 1);
}

function addPemilik(xthis) {
	app.data.pemilik.push({
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
	app.pemilikLists.push({
		kelurahans: [],
		direktur_kelurahans: [],
	})
}

function delPemilik(xthis, i){
	if(i > app.data.pemilik.length - 1)
		return;
	app.data.pemilik.splice(i, 1);
	app.pemilikLists.splice(i, 1);
}

function addNarahubung(xthis) {
	app.data.narahubung.push({
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
	app.narahubungLists.push({
		kelurahans: [],
	})
}

function delNarahubung(xthis, i){
	if(i > app.data.narahubung.length - 1)
		return;
	app.data.narahubung.splice(i, 1);
	app.narahubungLists.splice(i, 1);
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

