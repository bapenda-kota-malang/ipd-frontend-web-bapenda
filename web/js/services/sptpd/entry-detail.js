useFetchData = false;
skipPopulate = true;
appEl = '#vueBox';

var npwpdSearchModal = null;

function created() {
}

async function mounted() {
	if(!this.id) {
		today = new Date();
		this.data.spt.periodeAwal.setDate(1);
		this.data.spt.periodeAwal.setMonth(this.data.spt.periodeAwal.getMonth() - 1);
		this.data.spt.periodeAkhir = new Date(today.getFullYear(), today.getMonth(), 0);
		this.data.spt.jatuhTempo = new Date(today.getFullYear(), today.getMonth() + 1, 0);
	}
}
 
function postFetchData(data) {
	this.data.spt = {
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
		this.data.dataDetails = {
			golonganKamar: [''],
			tarif: [0],
			jumlahKamar: [0],
			jumlahKamarYangLaku: [0],
			kasRegister: false,
			pembukuan: false,
        }
	} else if(data.rekening.objek == '02') {
		this.data.dataDetails = {
			id: data.detailSptResto.id,
			spt_id: data.detailSptResto.spt_id,
			jumlahKursi: data.detailSptResto.jumlahKursi,
			jumlahMeja: data.detailSptResto.jumlahMeja,
			jumlahPengunjung: data.detailSptResto.jumlahPengunjung,
			tarifMakanan: data.detailSptResto.tarifMakanan,
			tarifMinuman: data.detailSptResto.tarifMinuman,
		};
	} else if(data.rekening.objek == '03') {
		this.data.dataDetails = {};
	} else if (data.rekening.objek == '04') {
		this.data.dataDetails = [];
	} else if(data.rekening.objek == '05' && data.rincian == '02') {
		this.data.dataDetails = {
			jenisMesinPenggerak: data.detailSptNonPln.jenisMesinPenggerak,
			tahunMesin: data.detailSptNonPln.tahunMesin,
			dayaMesin: data.detailSptNonPln.dayaMesin,
			bebanMesin: data.detailSptNonPln.bebanMesin,
			jumlahHari: data.detailSptNonPln.jumlahHari,
			jumlahJam: data.detailSptNonPln.jumlahJam,
			listrikPl: data.detailSptNonPln.tarifMinuman,
		};
	} else if(data.rekening.objek == '07') { 
		this.data.dataDetails = {};
	} else if(data.rekening.objek == '08') {
		this.data.dataDetails = {};
	}
	this.npwpd = data.npwpd.npwpd;
	this.rekening_id = data.rekening_id;
	data.npwpd.objekPajak = data.objekPajak;
	data.npwpd.rekening = data.rekening;
	this.applyNpwpd(data.npwpd, true);
	calculateJumlahPajak(this);
	console.log(this.data.spt);
}

function preSubmit() {
	this.data.spt.omset = parseFloat(this.data.spt.omset);
	detail = this.data.dataDetails;
	if(this.rekening_objek == '01') {
		detail.tarif.forEach(function(item, idx){
			detail.tarif[idx] = parseFloat(item);
			detail.jumlahKamar[idx] = parseFloat(item);
			detail.jumlahKamarYangLaku[idx] = parseFloat(item);
		})
	} else if(this.rekening_objek == '02') {
		detail.jumlahMeja = parseFloat(detail.jumlahMeja);
		detail.jumlahKursi = parseFloat(detail.jumlahKursi);
		detail.tarifMinuman = parseFloat(detail.tarifMinuman);
		detail.tarifMakanan = parseFloat(detail.tarifMakanan);
		detail.jumlahPengunjung = parseFloat(detail.jumlahPengunjung);
	} else if(this.rekening_objek == '03') {
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
	} else if (this.rekening_objek == '04') {
		this.data.spt.jumlahTahun = parseFloat(this.data.spt.jumlahTahun);
		this.data.spt.jumlahBulan = parseFloat(this.data.spt.jumlahBulan);
		this.data.spt.jumlahMinggu = parseFloat(this.data.spt.jumlahMinggu);
		this.data.spt.jumlahHari = parseFloat(this.data.spt.jumlahHari);
		detail.forEach(function (item) {
			item.jumlah = parseFloat(item.jumlah);
			item.sisi = parseFloat(item.sisi);
			item.panjang = parseFloat(item.panjang);
			item.lebar = parseFloat(item.lebar);
			item.diameter = parseFloat(item.diameter);
			item.diskon = parseFloat(item.diskon);
			item.jumlahRp = parseFloat(item.jumlahRp);
		})
	} else if(this.rekening_objek == '05' && this.rekening_rincian == '01') {
		detail.forEach(function(item, idx){
			detail[idx].jumlahPelanggan = parseFloat(item.jumlahPelanggan);
			detail[idx].jumlahRekening = parseFloat(item.jumlahRekening);
		})
	} else if(this.rekening_objek == '05' && this.rekening_rincian == '02') {
		detail.jumlahJam = parseFloat(detail.jumlahJam);
		detail.jumlahHari = parseFloat(detail.jumlahHari);
	} else if(this.rekening_objek == '07') {
		detail.forEach(function(item, idx){
			detail[idx].kapasitas = parseFloat(item.kapasitas);
			detail[idx].tarif = parseFloat(item.tarif);
		})
	} else if(this.rekening_objek == '08') {
		detail.pengenaan = parseFloat(detail.pengenaan);		
	}
}

async function showNpwpSearch() {
	if(!npwpdSearchModal) {
		npwpdSearchModal = new bootstrap.Modal(document.getElementById('npwpdSearch'))
	}
	res = await apiFetchData(`/npwpd?rekening_objek=${objekPajak_kode}`, messages);
	if(!res) {
		console.error('failed to fetch "npwpd"');
	} else {
		app.npwpdList = typeof res.data != 'undefined' ? res.data : [];
	}
	npwpdSearchModal.show();
}

async function setNpwpd() {
	// url = ;
	if(window.location.pathname + window.location.search != "/esptpd?npwpd=" + this.npwpd) {
		window.history.pushState({html:document.html}, "", "/esptpd?npwpd=" + this.npwpd); // "html":response.html,
	}
	await this.checkNpwpd(this.npwpd);
}

async function checkNpwpd(npwpd, skipAdvance) {
	this.npwpd = npwpd;
	if(npwpd) {
		res = await apiFetch('/npwpd?npwpd=' + npwpd, 'GET');
		if(typeof res.data == 'object') {
			this.applyNpwpd(res.data.data[0], skipAdvance);
		} else {
			this.npwpdFound = false;
			this.messageProp.show = true;
			content = 'NPWPD tidak dapat ditemukan!!';
		}
	} else {
		this.npwpdFound = false;
	}
}

function applyNpwpd(xd, skipAdvance) {
	// vars for view
	this.jenisUsaha = xd.rekening.jenisUsaha;
	this.kodeRekening = xd.rekening.kode;
	this.namaUsaha = xd.objekPajak.nama;
	this.alamatUsaha = xd.objekPajak.alamat;
	this.rtRwUsaha = xd.objekPajak.rtRw;
	this.kelurahanUsaha = xd.objekPajak.kelurahan.nama;
	this.kecamatanUsaha = xd.objekPajak.kecamatan.nama;
	// this.rekening_id = xd.rekening.id;
	this.rekening_rincian = xd.rekening.rincian;
	this.npwpdFound = true;
	if(!skipAdvance) {
		if(xd.rekening.objek == '01') {
			this.data.dataDetails = {
				golonganKamar: [],
				tarif: [],
				jumlahKamar: [],
				jumlahKamarYangLaku: [],
				kasRegister: false,
				pembukuan: false,
			} 	
			this.arrayDetailStatus = true;
		} else if(xd.rekening.objek == '02' || xd.rekening.objek == '03' || xd.rekening.objek == '08' || (xd.rekening.objek == '05' && xd.rekening.rincian == '02')) {
			this.arrayDetailStatus = false;
			this.data.dataDetails = {};
		} else {
			this.arrayDetailStatus = true;
			this.data.dataDetails = [];
		}
		addDetail(this.data, xd.rekening.objek, xd.rekening.rincian)
	} else {
		if(xd.rekening.objek == '02' || xd.rekening.objek == '03' || xd.rekening.objek == '08' || (xd.rekening.objek == '05' && xd.rekening.rincian == '02')) {
			this.arrayDetailStatus = false;
		} else {
			this.arrayDetailStatus = true;
		}
	}
	// for logic
	this.rekening_objek = xd.rekening.objek;
	// data
	this.data.spt.npwpd_id = xd.id;
	this.data.spt.objekPajak_id = xd.objekPajak_id;
	this.data.spt.rekening_id = xd.rekening_id;
	if(xd.rekening.objek == '01')
		urls.submit = `/${jenisKetetapan}/{id}?category=hotel`;
	else if(xd.rekening.objek == '02')
		urls.submit = `/${jenisKetetapan}/{id}?category=resto`;
	else if(xd.rekening.objek == '03')
		urls.submit = `/${jenisKetetapan}/{id}?category=hiburan`;
	else if (xd.rekening.objek == '04')
		urls.submit = `/skpd/{id}?category=reklame`;
	else if(xd.rekening.objek == '05' && xd.rekening.rincian == '01')
		urls.submit = `/${jenisKetetapan}/{id}?category=ppjpln`;
	else if(xd.rekening.objek == '05' && xd.rekening.rincian == '02')
		urls.submit = `/${jenisKetetapan}/{id}?category=ppjnonpln`;
	else if(xd.rekening.objek == '07')
		urls.submit = `/${jenisKetetapan}/{id}?category=parkir`;
	else if(xd.rekening.objek == '08')
		urls.submit = `/${jenisKetetapan}/{id}?category=air`;
}

async function pilihNpwpd(npwpd) {
	// app.npwpd = npwpd;
	await this.checkNpwpd(npwpd);
	npwpdSearchModal.hide();
}

function addDetail(data, rekening_objek, rekening_rincian) {
	if(rekening_objek == '01') {
		data.dataDetails.golonganKamar.push('');
		data.dataDetails.tarif.push(0);
		data.dataDetails.jumlahKamar.push(0);
		data.dataDetails.jumlahKamarYangLaku.push(0);
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
	} else if (rekening_objek == '04') {
		data.dataDetails.push({
			id: null,
			tarifReklame_id: null,
			lokasi: "",
			nomorPersil: "",
			jumlah: 0,
			sisi: 0,
			panjang: 0,
			lebar: 0,
			diameter: 0,
			diskon: 0,
			jumlahRp: 0,
			jenisDimensi: 2,
		});
	} else if(rekening_objek == '05' && rekening_rincian == '01') {
		data.dataDetails.push({
			id: null,
			jenisPPJ_id: null,
			jumlahPelanggan: 0,
			jumlahRekening: 0,
			tarif: 0,
		});
	} else if(rekening_objek == '05' && rekening_rincian == '02') {
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

function delDetail(i) {
	if (i > this.data.dataDetails.length - 1)
		return;
	this.data.dataDetails.splice(i, 1);
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

async function calculateJumlahPajak() {
	date = new Date();
	year = date.getMonth() == 0 ? date.getFullYear() - 1 : date.getFullYear(); 
	res = await apiFetchData(`/tarifpajak?rekening_id=${this.data.spt.rekening_id}&tahun=${year}&omsetAwal=${this.data.spt.omset}&omsetAwal_Opt=lte`, messages);
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
