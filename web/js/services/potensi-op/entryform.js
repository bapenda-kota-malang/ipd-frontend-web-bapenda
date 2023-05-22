

data = {...potensiOp};
vars = {
	selectedRekening: null,
	jenisOp: null,
	jenisRincian: null,
	jenisOpCode: null,
	arrayDetailStatus: false,
	arrayDetailStatus: false,
	// detailPajaks: [],
	pemilikLists: [],
	narahubungLists: [],
	autoPemilik: false,
	autoNarahubung: false,
	assessments,
	golongans,
	rekenings: [],
	daerahs: [],
	kecamatans: [],
	kelurahans: [],
	tinjauTanggal: new Date(),
	tinjauJam: null,
	tinjauMenit: null,
	tanggalPengukuhanTemp: null,
	tanggalNpwpdTemp: null,
	tanggalMulaiUsahaTemp: null,
	kodeJenisUsaha: 0,
	pegawais: [],
	selectedPegawais: [],
	users: [],
	petugasList: [],
	jabatans,
	jenisOp: null,
	potensiStatus: false,
	pxlStatus: false,
	jamBukaTutupStatus:false,
	gensetStatus: false,
	airTanahStatus: false,
	pajakKonsumenStatus: false,
	pagination: {},
}
urls = {
	preSubmit: '/pendataan/potensi-owp-baru',
	postSubmit: '/pendataan/potensi-owp-baru',
	submit: '/potensiopwp/{id}',
	dataSrc: '/potensiopwp',
}
methods = {
	setJenisOp,
	initDetailObjekPajak,
	addDetailObjekPajak,
	delDetailObjekPajak,
	addPemilik,
	addPemilikLists,
	delPemilik,
	addNarahubung,
	addNarahubungLists,
	delNarahubung,
	cekAutoPemilik,
	cekAutoNarahubung,
	cekAlamat,
	cekKelurahan,
	cekTelp,
	addPetugas,
	resizeImage,
	storeFileToField,
}
refSources = {
	rekenings: '/rekening?kodeJenisUsaha=0&kodeJenisUsaha_opt=gt&no_pagination=true',
	daerahs: '/daerah?no_pagination=true',
	kecamatans: '/kecamatan?daerah_kode=3573',
	pegawais: '/pegawai',
	users: '/user?position=0',
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

pemilikVarName = 'potensiPemilikWps';
narahubungVarName = 'potensiNarahubungs';
detailVarName = 'detailPotensiOp';

function mounted() {
	if(!this.id) {
		this.addPemilik()
	}
	this.rekenings.forEach(function(item, idx){
		this.rekenings[idx].nama = item.kode + ' - ' + item.nama;
	})
}

function preSubmit() {
	if(!this.jenisOp) {
		this.dataErr['potensiOp.rekening_id'] = 'harus diisi';
		this.$forceUpdate();
		return false;
	}
	data = this.data;
	tt = this.tinjauTanggal;
	tinjauTanggal = tt.getFullYear() + '-' + strRight('0' + (tt.getMonth() + 1), 2) + '-' + strRight('0' + tt.getDate(), 2);
	this.tinjauJam = this.tinjauJam ? this.tinjauJam : '00';
	this.tinjauMenit = this.tinjauMenit ? this.tinjauMenit : '00';
	tinjauJam = `${strRight('00' + this.tinjauJam, 2)}:${strRight('00' + this.tinjauMenit, 2)}:01`;
	tinjauF = `${tinjauTanggal}T${tinjauJam}+07:00`;
	data.bapl.tanggalPeninjauan = tinjauF;
	data.bapl.koordinator_pegawai_id = parseInt(data.bapl.koordinator_pegawai_id);
	data.potensiOp.omsetOp = parseFloat(data.potensiOp.omsetOp); 
	data.bapl.petugas_pegawai_id = [];
	this.selectedPegawais.forEach(function(item){
		data.bapl.petugas_pegawai_id.push(item.id);
	});

	//
	if(this.jenisOp=='01') {
		this.jenisOpCode = 'hotel';
		dp = this.data.detailPajaks;
		this.data.detailPajaks.forEach(function(item, idx){
			dp[idx].jumlahFasilitas = parseInt(item.jumlahFasilitas);
			dp[idx].jumlahKamar = parseInt(item.jumlahKamar);
			dp[idx].jumlahKamarYangLaku = parseInt(item.jumlahKamarYangLaku);
			dp[idx].kapasitas = parseInt(item.kapasitas);
			dp[idx].tarifFasilitas = parseInt(item.tarifFasilitas);
		});
	} else if(this.jenisOp=='02') {
		this.jenisOpCode = 'resto';
		data.detailPajaks.jumlahKursi = parseInt(data.detailPajaks.jumlahKursi);
		data.detailPajaks.jumlahMeja = parseInt(data.detailPajaks.jumlahMeja);
		data.detailPajaks.jumlahPengunjung = parseInt(data.detailPajaks.jumlahPengunjung);
		data.detailPajaks.tarifMakanan = parseInt(data.detailPajaks.tarifMakanan);
		data.detailPajaks.tarifMinuman = parseInt(data.detailPajaks.tarifMinuman);
		
	} else if(this.jenisOp=='03') {
		this.jenisOpCode = 'hiburan';
	} else if(this.jenisOp=='04') {
		this.jenisOpCode = 'reklame';
	} else if(this.jenisOp=='05' && this.jenisRincian=='01') {
		this.jenisOpCode = 'ppj';
	} else if(this.jenisOp=='05' && this.jenisRincian=='02') {
		this.jenisOpCode = 'ppjnonpln';
	} else if(this.jenisOp=='07') {
		this.jenisOpCode = 'parkir';
	} else if(this.jenisOp=='08') {
		this.jenisOpCode = 'airtanah';
	}

	urls.submit = `/potensiopwp/{id}?category=${this.jenisOpCode}`

	this.data.detailPajaks.forEach(function(item, idx){
		this.data.detailPajaks[idx].jenisOp = this.jenisOp;
	})
}

function postFetchData(data) {
	if(this.id) {
		data.tanggalNpwpd = data.tanggalNpwpd ? new Date(data.tanggalNpwpd.substr(0,10)) : null;
		data.tanggalPengukuhan = data.tanggalPengukuhan ? new Date(data.tanggalPengukuhan.substr(0,10)) : null;
		data.tanggalMulaiUsaha = data.tanggalMulaiUsaha ? new Date(data.tanggalMulaiUsaha.substr(0,10)) : null;
		this.refreshSelect(data.objekPajak.kecamatan_id, this.kecamatans, `/kelurahan?kecamatan_kode=${data.objekPajak.kecamatan.kode}&no_pagination=true`, this.kelurahans, 'kode');
		data.potensiPemilikWps.forEach(function(item, idx) {
			this.addPemilikLists();
			this.refreshSelect(item.daerah_id, this.daerahs, `/kelurahan?kode=${data.pemilik[idx].daerah.kode}&kode_opt=left&no_pagination=true`, this.pemilikLists[idx].kelurahans, 'kode');
			if(item.direktur_daerah_id)
				this.refreshSelect(item.direktur_daerah_id, this.daerahs, `/kelurahan?kode=${data.pemilik[idx].direktur_daerah.kode}&kode_opt=left&no_pagination=true`, this.pemilikLists[idx].direktur_kelurahans, 'kode');
		})
		data.potensiNarahubungs.forEach(function(item, idx) {
			this.addNarahubungLists(this);
			this.refreshSelect(item.daerah_id, this.daerahs, `/kelurahan?kode=${data.potensiNarahubungs[idx].daerah.kode}&kode_opt=left&no_pagination=true`, this.narahubungLists[idx].kelurahans, 'kode');
		})
	}
}

function setJenisOp(rekening_id) {
	this.selectedRekening = this.rekenings.filter(function(rekening){
		return rekening.id==rekening_id
	});
	objek = this.selectedRekening[0].objek;
	rincian = this.selectedRekening[0].rincian;
	this.pxlStatus = (objek=='01' || objek=='07') ? true : false;
	this.potensiStatus = (objek!='04' && objek!='08') || (objek=='05' && rincian=='02') ? true : false;
	this.jamBukaTutupStatus = objek!='04' ? true : false;
	this.gensetStatus = (objek!='04' && objek!='08') || (objek=='05' && rincian=='02') ? true : false;
	this.airTanahStatus = (objek!='04' && objek!='08') || (objek=='05' && rincian=='02') ? true : false;
	this.pajakKonsumenStatus = (objek=='02' || objek=='03') ? true : false;
	if(this.selectedRekening.length > 0) {
		this.jenisOp = objek;
		this.jenisRincian = rincian;
		this.initDetailObjekPajak();
	}
}

function initDetailObjekPajak() {
	if(this.jenisOp=='02' || this.jenisOp=='03' || this.jenisOp=='08' || (this.jenisOp=='05' && this.selectedRekening[0].rincian=='01')) {
		this.arrayDetailStatus = false;
		this.data.detailPajaks = {};
	} else {
		this.arrayDetailStatus = true;
		this.data.detailPajaks = [];
	}
	this.addDetailObjekPajak();
}

function addDetailObjekPajak() {
	if(this.jenisOp=='01') {
		this.data.detailPajaks.push({
			id: null,
			golonganKamar: null,
			tarif: 0,
			jumlahKamar: 0,
			jumlahKamarYangLaku: 0,
		});
	} else if(this.jenisOp=='02') {
		this.data.detailPajaks = {
			id: null,
			jumlahMeja: 0,
			jumlahKursi: 0,
			tarifMinuman: 0,
			tarifMakanan: 0,
			jumlahPengunjung: 0,
		};
	} else if(this.jenisOp=='03') {
		this.data.detailPajaks = {
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
	} else if(this.jenisOp=='05' && this.jenisRincian=='01') {
		this.data.detailPajaks = {
			id: null,
			jenisMesinPenggerak: null,
			tahunMesin: null,
			dayaMesin: null,
			bebanMesin: null,
			// jumlahJam: 0,
			jumlahHari: 0,
			listrikPLN: null,
		};
	} else if(this.jenisOp=='05' && this.jenisRincian=='02') {
		this.data.detailPajaks.push({
			id: null,
			jenisPPJ_id: null,
			jumlahPelanggan: 0,
			jumlahRekening: 0,
			tarif: 0,
		});
	} else if(this.jenisOp=='07') {
		this.data.detailPajaks.push({
			jenisKendaraan: null,
			kapasitas: 0,
			tarif: 0,
		});
	} else if(this.jenisOp=='08') {
		this.data.detailPajaks = {
			id: null,
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

function delDetailObjekPajak(i){
	if(i > this.data.detailPajaks.length - 1)
		return;
	this.data.detailPajaks.splice(i, 1);
}

function addPetugas() {
	this.selectedPegawais.push(null);
	// this.data.bapl.petugas_pegawai_id.push(null);
}

