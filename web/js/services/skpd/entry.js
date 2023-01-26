objekPajak = document.getElementById('objekPajak').value;

data = { ...skpdEntry }
vars = {
	// flatten the data
	npwpd: null,
	objek: null,
	rincian: null,
	kodeRekening: null,
	jenisUsaha: null,
	namaUsaha: null,
	alamatUsaha: null,
	rtRwUsaha: null,
	kelurahanUsaha: null,
	kecamatanUsaha: null,
	npwpdFound: false,
	rekening_id: null,
	rekening_objek: null,
	rekening_rincian: null,
	arrayDetailStatus: false,
	npwpdList: [],
}
urls = {
	preSubmit: '/penetapan/skpd/' + objekPajak,
	postSubmit: '/penetapan/skpd/' + objekPajak,
	submit: '/skpd?',
	dataSrc: '/skpd'
}
methods = {
	showNpwpSearch,
	setNpwpd,
	// enableSetNpwpd,
	pilihNpwpd ,
	addDetail,
	addHiburanClass,
	delHiburanClass,
	calculateJumlahPajak,
	storeFileToField,
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}
// skipDetail = true;
skipPopulate = true;
appEl = '#vueBox';

var npwpdSearchModal = null;

async function mounted(xthis) {
	if(!xthis.id) {
		today = new Date();
		xthis.data.spt.periodeAwal.setDate(1);
		xthis.data.spt.periodeAwal.setMonth(xthis.data.spt.periodeAwal.getMonth() - 1);
		xthis.data.spt.periodeAkhir = new Date(today.getFullYear(), today.getMonth(), 0);
		xthis.data.spt.jatuhTempo = new Date(today.getFullYear(), today.getMonth() + 1, 0);	
	}
}
 
function postDataFetch(data, xthis) {
	xthis.data.spt = {
		npwpd_id: data.npwpd_id,
		objekPajak_id: data.objekPajak_id,
		rekening_id: data.rekening_id,
		periodeAwal: new Date(data.periodeAwal.substring(0, 10)),
		periodeAkhir:new Date(data.periodeAkhir.substring(0, 10)),
		jatuhTempo: new Date(data.jatuhTempo.substring(0, 10)),
		attachment: "",
		omset: data.omset,
	}
	if(data.rekening.objek == '01') {
		xthis.data.dataDetails = [];
		data.detailSptHotel.forEach(function(item) {
			xthis.data.dataDetails.push({
				id: item.id,
				spt_id: item.spt_id,
				golonganKamar: item.golonganKamar,
				jumlahKamar: item.jumlahKamar,
				jumlahKamarYangLaku: item.jumlahKamarYangLaku,
				tarif: item.tarif,
			});
		})
	} else if(data.rekening.objek == '02') {
		xthis.data.dataDetails = {
			id: data.detailSptResto.id,
			spt_id: data.detailSptResto.spt_id,
			jumlahKursi: data.detailSptResto.jumlahKursi,
			jumlahMeja: data.detailSptResto.jumlahMeja,
			jumlahPengunjung: data.detailSptResto.jumlahPengunjung,
			tarifMakanan: data.detailSptResto.tarifMakanan,
			tarifMinuman: data.detailSptResto.tarifMinuman,
		};
	} else if(data.rekening.objek == '03') {
		xthis.data.dataDetails = {};
	} else if(data.rekening.objek == '05' && data.rincian == '01') {
		xthis.data.dataDetails = {};
	} else if(data.rekening.objek == '05' && data.rincian == '02') {
		xthis.data.dataDetails = {};
	} else if(data.rekening.objek == '07') { 
		xthis.data.dataDetails = {};
	} else if(data.rekening.objek == '08') {
		xthis.data.dataDetails = {};
	}
	console.log(xthis.data.dataDetails);
	xthis.npwpd = data.npwpd.npwpd;
	xthis.rekening_id = data.rekening_id;
	data.npwpd.objekPajak = data.objekPajak;
	data.npwpd.rekening = data.rekening;
	applyNpwpd(data.npwpd, xthis, true);
	calculateJumlahPajak(xthis);
}

function preSubmit(xthis) {
	xthis.data.spt.omset = parseFloat(xthis.data.spt.omset);
	detail = xthis.data.dataDetails;
	if(xthis.rekening_objek == '01') {
		detail.forEach(function(item){
			item.tarif = parseFloat(item.tarif);
			item.jumlahKamar = parseFloat(item.jumlahKamar);
			item.jumlahKamarYangLaku = parseFloat(item.jumlahKamarYangLaku);
		})
	} else if(xthis.rekening_objek == '02') {
		detail.jumlahMeja = parseFloat(detail.jumlahMeja);
		detail.jumlahKursi = parseFloat(detail.jumlahKursi);
		detail.tarifMinuman = parseFloat(detail.tarifMinuman);
		detail.tarifMakanan = parseFloat(detail.tarifMakanan);
		detail.jumlahPengunjung = parseFloat(detail.jumlahPengunjung);
	} else if(xthis.rekening_objek == '03') {
		detail.pengunjungWeekday = parseFloat(detail.pengunjungWeekday);
		detail.pengunjungWeekend = parseFloat(detail.pengunjungWeekend);
		detail.pertunjukanWeekday = parseFloat(detail.pertunjukanWeekday);
		detail.pertunjukanWeekend = parseFloat(detail.pertunjukanWeekend);
		detail.jumlahMeja = parseFloat(detail.jumlahMeja);
		detail.jumlahRuangan = parseFloat(detail.jumlahRuangan);
		detail.jumlahKarcisBebas = parseFloat(detail.jumlahKarcisBebas);
		detail.kelas.forEach(function(item,idx){
			detail.tarif[idx] = parseFloat(detail.tarif[idx])
		})
	} else if(xthis.rekening_objek == '04') {
		// detail.spt_id = null,
		detail.tanggal = parseFloat(detail.tanggal);
		detail.jenisReklame = parseFloat(detail.jenisReklame);
		detail.tipeReklame = parseFloat(detail.tipeReklame);
		detail.nominal = parseFloat(detail.nominal);
		detail.tanggalBatas = parseFloat(detail.tanggalBatas);
		detail.biayaPemutusan = parseFloat(detail.biayaPemutusan);
	} else if(xthis.rekening_objek == '05' && rekening_rincian == '01') {
		data.jumlahJam = parseFloat(detail.jumlahJam);
		data.jumlahHari = parseFloat(detail.jumlahHari);
	} else if(xthis.rekening_objek == '05' && rekening_rincian == '02') {
		detail.forEach(function(item,idx){
		})
		data.jumlahPelanggan = parseFloat(detail.jumlahPelanggan);
		data.jumlahRekening = parseFloat(detail.jumlahRekening);
		data.tarif = parseFloat(detail.tarif);
	} else if(xthis.rekening_objek == '07') {
		detail.forEach(function(item,idx){
		})
		data.kapasitas = parseFloat(detail.kapasitas);
		data.tarif = parseFloat(detail.tarif);
	} else if(xthis.rekening_objek == '08') {
		data.pengenaan = parseFloat(detail.pengenaan);		
	}
}

async function showNpwpSearch() {
	if(!npwpdSearchModal) {
		npwpdSearchModal = new bootstrap.Modal(document.getElementById('npwpdSearch'))
	}
	res = await apiFetchData('/npwpd', messages);
	if(!res) {
		console.error('failed to fetch "npwpd"');
	} else {
		app.npwpdList = typeof res.data != 'undefined' ? res.data : [];
	}
	npwpdSearchModal.show();
}

async function setNpwpd(xthis) {
	// url = ;
	if(window.location.pathname + window.location.search != "/skpd?npwpd=" + xthis.npwpd) {
		window.history.pushState({html:document.html}, "", "/skpd?npwpd=" + xthis.npwpd); // "html":response.html,
	}
	await checkNpwpd(xthis.npwpd, xthis);
}

async function checkNpwpd(npwpd, xthis, skipAdvance) {
	xthis.npwpd = npwpd;
	if(npwpd) {
		res = await apiFetch('/npwpd?npwpd=' + npwpd, 'GET');
		if(typeof res.data == 'object') {
			applyNpwpd(res.data.data[0], xthis, skipAdvance);
		} else {
			xthis.npwpdFound = false;
			xthis.messageProp.show = true;
			content = 'NPWPD tidak dapat ditemukan!!';
		}
	} else {
		xthis.npwpdFound = false;
	}
}

function applyNpwpd(xd, xthis, skipAdvance) {
	// vars for view
	xthis.jenisUsaha = xd.rekening.jenisUsaha;
	xthis.kodeRekening = xd.rekening.kode;
	xthis.namaUsaha = xd.objekPajak.nama;
	xthis.alamatUsaha = xd.objekPajak.alamat;
	xthis.rtRwUsaha = xd.objekPajak.rtRw;
	xthis.kelurahanUsaha = xd.objekPajak.kelurahan.nama;
	xthis.kecamatanUsaha = xd.objekPajak.kecamatan.nama;
	// for logic
	xthis.rekening_objek = xd.rekening.objek;
	// xthis.rekening_id = xd.rekening.id;
	xthis.rekening_rincian = xd.rekening.rincian;
	xthis.npwpdFound = true;
	if(!skipAdvance) {
		if(xd.rekening.objek == '02' || xd.rekening.objek == '03' || xd.rekening.objek == '08' || (xd.rekening.objek == '05' && xd.rekening.rincian == '01')) {
			xthis.arrayDetailStatus = false;
			xthis.data.dataDetails = {};
		} else {
			xthis.arrayDetailStatus = true;
			xthis.data.dataDetails = [];
		}
		addDetail(xthis.data, xd.rekening.objek, xd.rekening.rincian)
	} else {
		if(xd.rekening.objek == '02' || xd.rekening.objek == '03' || xd.rekening.objek == '08' || (xd.rekening.objek == '05' && xd.rekening.rincian == '01')) {
			xthis.arrayDetailStatus = false;
		} else {
			xthis.arrayDetailStatus = true;
		}	
	}
	// data
	xthis.data.spt.npwpd_id = xd.id;
	xthis.data.spt.objekPajak_id = xd.objekPajak_id;
	xthis.data.spt.rekening_id = xd.rekening_id;
	if(xd.rekening.objek == '01')
		urls.submit = '/skpd/{id}?category=hotel';
	else if(xd.rekening.objek == '02')
		urls.submit = '/skpd/{id}?category=resto';
	else if(xd.rekening.objek == '03')
		urls.submit = '/skpd/{id}?category=hiburan';
	else if(xd.rekening.objek == '05' && xd.rincian == '01')
		urls.submit = '/skpd/{id}?category=ppjpln';
	else if(xd.rekening.objek == '05' && xd.rincian == '02')
		urls.submit = '/skpd/{id}?category=ppjnonpln';
	else if(xd.rekening.objek == '07')
		urls.submit = '/skpd/{id}?category=parkir';
	else if(xd.rekening.objek == '08')
		urls.submit = '/skpd/{id}?category=air';
}

async function pilihNpwpd(npwpd) {
	app.npwpd = npwpd;
	await checkNpwpd(npwpd, app);
	npwpdSearchModal.hide();
}

function addDetail(data, rekening_objek, rekening_rincian) {
	if(rekening_objek == '01') {
		data.dataDetails.push({
			id: null,
			golonganKamar: null,
			tarif: 0,
			jumlahKamar: 0,
			jumlahKamarYangLaku: 0,
		});
	} else if(rekening_objek == '02') {
		data.dataDetails = {
			id: null,
			jumlahMeja: 0,
			jumlahKursi: 0,
			tarifMinuman: 0,
			tarifMakanan: 0,
			jumlahPengunjung: 0,
		};
	} else if(rekening_objek == '03') {
		console.log(rekening_objek);
		data.dataDetails = {
			id: null,
			pengunjungWeekday: 0,
			pengunjungWeekend: 0,
			pertunjukanWeekday: 0,
			pertunjukanWeekend: 0,
			jumlahMeja: 0,
			jumlahRuangan: 0,
			karcisBebas: null,
			jumlahKarcisBebas: 0,
			mesinTiket: null,
			pembukuan: null,
			kelas: [''],
			tarif: [0],
		};
	} else if(rekening_objek == '05' && rekening_rincian == '01') {
		data.dataDetails = {
			id: null,
			jenisMesinPenggerak: null,
			tahunMesin: null,
			dayaMesin: null,
			bebanMesin: null,
			jumlahJam: 0,
			jumlahHari: 0,
			listrikPLN: null,
		};
	} else if(rekening_objek == '05' && rekening_rincian == '02') {
		data.dataDetails.push({
			id: null,
			jenisPPJ_id: null,
			jumlahPelanggan: 0,
			jumlahRekening: 0,
			tarif: 0,
		});
	} else if(rekening_objek == '07') {
		data.dataDetails.push({
			jenisKendaraan: null,
			kapasitas: 0,
			tarif: 0,
		});
	} else if(rekening_objek == '08') {
		data.dataDetails = {
			id: null,
			peruntukan: null,
			jenisAbt: null,
			pengenaan: 0,		
		};
	}
}

function delPemilik(data, i){
	if(i > data.length - 1)
		return;
	data.splice(i, 1);
}

function addHiburanClass(data) {
	data.kelas.push('');
	data.tarif.push(0);
}

function delHiburanClass(data, i) {
	if(i > data.kelas.length - 1)
		return;
	data.kelas.splice(i, 1);
	if(i > data.tarif.length - 1)
		return;
	data.tarif.splice(i, 1);
}

async function calculateJumlahPajak(xthis) {
	if(!xthis) {
		xthis = this;
	}
	date = new Date();
	year = date.getMonth() == 0 ? date.getFullYear() - 1 : date.getFullYear(); 
	res = await apiFetchData(`/tarifpajak?rekening_id=${xthis.data.spt.rekening_id}&tahun=${year}&omsetAwal=${xthis.data.spt.omset}&omsetAwal_Opt=lte`, messages);
	if(typeof res.data != "undefined") {
		if(res.data[0].tarifRp <=1 ) {
			xthis.data.spt.tarifPajak = res.data[0].tarifPersen;
			xthis.data.spt.jumlahPajak = res.data[0].tarifPersen / 100 * data.spt.omset;
		} else {
			xthis.data.spt.tarifPajak = null;
			xthis.data.spt.jumlahPajak = res.data[0].tarifRp;
		}
		xthis.$forceUpdate();
	}
	// data.espt.jumlahPajak = data.espt.omset * data.espt.tarif / 100;
}
