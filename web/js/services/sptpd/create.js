objekPajak = document.getElementById('objekPajak').value;

data = { ...data }
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
	npwpdFound: false,
	rekening_id: null,
	rekening_objek: null,
	rekening_rincian: null,
	arrayDetailStatus: false,
	npwpdList: [],
}
urls = {
	preSubmit: '/',
	postSubmit: '/penetapan/sptpd/' + objekPajak,
	submit: '/sptpd?'
}
methods = {
	showNpwpSearch,
	setNpwpd,
	enableSetNpwpd,
	pilihNpwpd ,
	addDetail,
	calculateJumlahPajak,
	storeFileToField,
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

appEl = '#vueBox';

var npwpdSearchModal = null;

async function mounted(xthis) {
	npwpd = getQueryParam('npwpd');
	if(npwpd) {
		xthis.npwpd = npwpd;
		await checkNpwpd(npwpd, xthis);
	}
	today = new Date()
	xthis.data.spt.periodeAwal.setDate(1);
	xthis.data.spt.periodeAwal.setMonth(xthis.data.spt.periodeAwal.getMonth() - 1);
	xthis.data.spt.periodeAkhir = new Date(today.getFullYear(), today.getMonth(), 0)
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
		detail.forEach(function(item,idx){
		})
		detail.tarif = parseFloat(detail.tarif);
		detail.pengunjungWeekday = parseFloat(detail.pengunjungWeekday);
		detail.pengunjungWeekend = parseFloat(detail.pengunjungWeekend);
		detail.pertunjukanWeekday = parseFloat(detail.pertunjukanWeekday);
		detail.pertunjukanWeekend = parseFloat(detail.pertunjukanWeekend);
		detail.jumlahMeja = parseFloat(detail.jumlahMeja);
		detail.jumlahRuangan = parseFloat(detail.jumlahRuangan);
	} else if(rekening_objek == '05' && rekening_rincian == '01') {
		data.jumlahJam = parseFloat(detail.jumlahJam);
		data.jumlahHari = parseFloat(detail.jumlahHari);
	} else if(rekening_objek == '05' && rekening_rincian == '02') {
		detail.forEach(function(item,idx){
		})
		data.jumlahPelanggan = parseFloat(detail.jumlahPelanggan);
		data.jumlahRekening = parseFloat(detail.jumlahRekening);
		data.tarif = parseFloat(detail.tarif);
	} else if(rekening_objek == '07') {
		detail.forEach(function(item,idx){
		})
		data.kapasitas = parseFloat(detail.kapasitas);
		data.tarif = parseFloat(detail.tarif);
	} else if(rekening_objek == '08') {
		data.pengenaan = parseFloat(detail.pengenaan);		
	}
}

async function showNpwpSearch() {
	if(!npwpdSearchModal) {
		npwpdSearchModal = new bootstrap.Modal(document.getElementById('npwpdSearch'))
	}
	res = await apiFetchData('/api/npwpd', messages);
	if(!res) {
		console.error('failed to fetch "npwpd"');
	} else {
		app.npwpdList = typeof res.data != 'undefined' ? res.data : [];
	}
	npwpdSearchModal.show();
}

async function setNpwpd(xthis) {
	// url = ;
	if(window.location.pathname + window.location.search != "/esptpd?npwpd=" + xthis.npwpd) {
		window.history.pushState({html:document.html}, "", "/esptpd?npwpd=" + xthis.npwpd); // "html":response.html,
	}
	await checkNpwpd(xthis.npwpd, xthis);
}

function enableSetNpwpd(xthis) {
	document.getElementById('npwpd').focus({focusVisible: true});
	xthis.jenisUsaha = null;
	xthis.namaUsaha = null;
	xthis.alamtUsaha = null;
	xthis.rtRwUsaha = null;
	xthis.kelurahanUsaha = null;
	xthis.npwpdFound = false;
	xthis.datanpwpd_id = null;
	xthis.objekPajak_id = null;
	xthis.rekening_id = null;
	xthis.location = null;
	xthis.description = null;
	xthis.tarifPajak_id = null;
	xthis.omset = 0;
	xthis.jumlahPajak = null;
	xthis.attachment = '',
	xthis.data.dataDetails = null;
}

async function checkNpwpd(npwpd, xthis) {
	if(npwpd) {
		res = await apiFetch('/npwpd?npwpd=' + npwpd, 'GET');
		if(typeof res.data == 'object') {
			xd = res.data.data[0];
			// vars for view
			xthis.jenisUsaha = xd.rekening.jenisUsaha;
			xthis.kodeRekening = xd.rekening.kode;
			xthis.namaUsaha = xd.objekPajak.nama;
			xthis.alamatUsaha = xd.objekPajak.alamat;
			xthis.rtRwUsaha = xd.objekPajak.rtRw;
			xthis.kelurahanUsaha = xd.objekPajak.kelurahan.nama;
			xthis.rekening_id = xd.rekening.id;
			xthis.rekening_objek = xd.rekening.objek;
			xthis.rekening_rincian = xd.rekening.rincian;
			xthis.npwpdFound = true;
			if(xd.rekening.objek == '02' || xd.rekening.objek == '03' || xd.rekening.objek == '08' || (xd.rekening.objek == '05' && xd.rekening.rincian == '01')) {
				xthis.arrayDetailStatus = false;
				xthis.data.dataDetails = {};
			} else {
				xthis.arrayDetailStatus = true;
				xthis.data.dataDetails = [];
			}
			addDetail(xthis.data, xd.rekening.objek, xd.rekening.rincian)
			// data
			xthis.data.spt.npwpd_id = xd.id;
			xthis.data.spt.objekPajak_id = xd.objekPajak_id;
			xthis.data.spt.rekening_id = xd.rekening_id;
			if(xd.rekening.objek == '01')
				urls.submit = '/sptpd?category=hotel';
			else if(xd.rekening.objek == '02')
				urls.submit = '/sptpd?category=resto';
			else if(xd.rekening.objek == '03')
				urls.submit = '/sptpd?category=hiburan';
			else if(xd.rekening.objek == '05' && xd.rincian == '01')
				urls.submit = '/sptpd?category=ppjpln';
			else if(xd.rekening.objek == '05' && xd.rincian == '02')
				urls.submit = '/sptpd?category=ppjnonpln';
			else if(xd.rekening.objek == '07')
				urls.submit = '/sptpd?category=parkir';
			else if(xd.rekening.objek == '08')
				urls.submit = '/sptpd?category=air';
		} else {
			xthis.npwpdFound = false;
			xthis.messageProp.show = true;
			content = 'NPWPD tidak dapat ditemukan!!';
		}
	} else {
		xthis.npwpdFound = false;
	}
}

async function pilihNpwpd(npwpd) {
	app.npwpd = npwpd;
	await checkNpwpd(npwpd, app);
	npwpdSearchModal.hide();
}

function addDetail(data, rekening_objek, rekening_rincian) {
	if(rekening_objek == '01') {
		data.dataDetails.push({
			golonganKamar: null,
			tarif: 0,
			jumlahKamar: 0,
			jumlahKamarYangLaku: 0,
		});
	} else if(rekening_objek == '02') {
		data.dataDetails = {
			jumlahMeja: 0,
			jumlahKursi: 0,
			tarifMinuman: 0,
			tarifMakanan: 0,
			jumlahPengunjung: 0,
		};
	} else if(rekening_objek == '03') {
		data.dataDetails = {
			pengunjungWeekday: 0,
			pengunjungWeekend: 0,
			pertunjukanWeekday: 0,
			pertunjukanWeekend: 0,
			jumlahMeja: 0,
			jumlahRuangan: 0,
			karcisBebas: true,
			jumlahKarcisBebas: 0,
			mesinTiket: false,
			pembukuan: false,
			kelas: [''],
			tarif: [0],
		};
	} else if(rekening_objek == '05' && rekening_rincian == '01') {
		data.dataDetails = {
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
			peruntukan: null,
			jenisAbt: null,
			pengenaan: 0,		
		};
	}
}

function addHiburanClass(data) {
	data.kelas.push('');
	data.tarif.push(0);
}


async function calculateJumlahPajak() {
	date = new Date();
	year = date.getMonth() == 0 ? date.getFullYear() - 1 : date.getFullYear(); 
	res = await apiFetchData(`/tarifpajak?rekening_id=${this.rekening_id}&tahun=${year}&omsetAwal=${this.data.spt.omset}&omsetAwal_Opt=lte`, messages);
	if(typeof res.data != "undefined") {
		if(res.data[0].tarifRp <=1 ) {
			this.data.spt.tarifPajak = res.data[0].tarifPersen;
			this.data.spt.jumlahPajak = res.data[0].tarifPersen / 100 * data.spt.omset;
		} else {
			this.data.spt.tarifPajak = null;
			this.data.spt.jumlahPajak = res.data[0].tarifRp;
		}
		this.$forceUpdate();
	}
	// data.espt.jumlahPajak = data.espt.omset * data.espt.tarif / 100;
}
