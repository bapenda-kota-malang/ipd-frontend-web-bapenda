

data = {...potensiOp};
vars = {
	selectedRekening: null,
	jenisOp: null,
	jenisRincian: null,
	jenisOpCode: null,
	arrayDetailStatus: false,
	arrayDetailStatus: false,
	detailPajaks: [],
	pemilikLists: [],
	narahubungLists: [],
	// dateFormat,
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
	options:['test', 'ok'],
	pegawais: [],
	selectedPegawais: [],
	users: [],
	petugasList: [],
	jabatans,
	jenisOp: null,
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
	resizeImage,
	storeFileToField,
	addPetugas,
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

function mounted() {
	if(!this.id) {
		this.addPemilik()
	}
	this.rekenings.forEach(function(item, idx){
		this.rekenings[idx].nama = item.kode + ' - ' + item.nama;
	})
}

function preSubmit() {
	data = this.data;
	tt = this.tinjauTanggal;
	tinjauTanggal = tt.getFullYear() + '-' + strRight('0' + (tt.getMonth() + 1), 2) + '-' + strRight('0' + tt.getDate(), 2);
	this.tinjauJam = this.tinjauJam ? this.tinjauJam : '00';
	this.tinjauMenit = this.tinjauMenit ? this.tinjauMenit : '00';
	tinjauJam = `${strRight('00' + this.tinjauJam, 2)}:${strRight('00' + this.tinjauMenit, 2)}:01`;
	tinjauF = `${tinjauTanggal}T${tinjauJam}+07:00`;
	data.bapl.tanggalPeninjauan = tinjauF;
	console.log(data.bapl.tanggalPeninjauan);
	data.bapl.koordinator_pegawai_id = parseInt(data.bapl.koordinator_pegawai_id);
	data.bapl.petugas_pegawai_id = [];
	this.selectedPegawais.forEach(function(item){
		data.bapl.petugas_pegawai_id.push(item.id);
	});

	//
	if(this.jenisOp == '01') {
		this.jenisOpCode = 'hotel';
	} else if(this.jenisOp == '02') {
		this.jenisOpCode = 'resto';
	} else if(this.jenisOp == '03') {
		this.jenisOpCode = 'hiburan';
	} else if(this.jenisOp == '04') {
		this.jenisOpCode = 'reklame';
	} else if(this.jenisOp == '05' && this.jenisRincian == '01') {
		this.jenisOpCode = 'ppj';
	} else if(this.jenisOp == '05' && this.jenisRincian == '02') {
		this.jenisOpCode = 'ppjnonpln';
	} else if(this.jenisOp == '07') {
		this.jenisOpCode = 'parkir';
	} else if(this.jenisOp == '08') {
		this.jenisOpCode = 'airtanah';
	}

	this.detailPajaks.forEach(function(item, idx){
		this.data.detailPajaks[idx].jenisOp = jenisOp;
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
		return rekening.id == rekening_id
	});
	if(this.selectedRekening.length > 0) {
		this.jenisOp = this.selectedRekening[0].objek;
		this.jenisRincian = this.selectedRekening[0].rincian;
		this.initDetailObjekPajak();
	}
}

function initDetailObjekPajak() {
	if(this.jenisOp == '02' || this.jenisOp == '03' || this.jenisOp == '08' || (this.jenisOp == '05' && this.selectedRekening[0].rincian == '01')) {
		this.arrayDetailStatus = false;
		this.data.detailPajaks = {};
	} else {
		this.arrayDetailStatus = true;
		this.data.detailPajaks = [];
	}
	this.addDetailObjekPajak();
}

function addDetailObjekPajak() {
	// if(data.rekening.objek == '01') {
	// 	xthis.data.dataDetails = [];
	// 	data.detailSptHotel.forEach(function(item) {
	// 		xthis.data.dataDetails.push({
	// 			id: item.id,
	// 			spt_id: item.spt_id,
	// 			golonganKamar: item.golonganKamar,
	// 			jumlahKamar: item.jumlahKamar,
	// 			jumlahKamarYangLaku: item.jumlahKamarYangLaku,
	// 			tarif: item.tarif,
	// 		});
	// 	})
	// } else if(data.rekening.objek == '02') {
	// 	xthis.data.dataDetails = {
	// 		id: data.detailSptResto.id,
	// 		spt_id: data.detailSptResto.spt_id,
	// 		jumlahKursi: data.detailSptResto.jumlahKursi,
	// 		jumlahMeja: data.detailSptResto.jumlahMeja,
	// 		jumlahPengunjung: data.detailSptResto.jumlahPengunjung,
	// 		tarifMakanan: data.detailSptResto.tarifMakanan,
	// 		tarifMinuman: data.detailSptResto.tarifMinuman,
	// 	};
	// } else if(data.rekening.objek == '03') {
	// 	xthis.data.dataDetails = {};
	// } else if(data.rekening.objek == '05' && data.rincian == '01') {
	// 	xthis.data.dataDetails = {};
	// } else if(data.rekening.objek == '05' && data.rincian == '02') {
	// 	xthis.data.dataDetails = {};
	// } else if(data.rekening.objek == '07') { 
	// 	xthis.data.dataDetails = {};
	// } else if(data.rekening.objek == '08') {
	// 	xthis.data.dataDetails = {};
	// }
	
	if(this.jenisOp == '01') {
		this.data.detailPajaks.push({
			id: null,
			golonganKamar: null,
			tarif: 0,
			jumlahKamar: 0,
			jumlahKamarYangLaku: 0,
		});
	} else if(this.jenisOp == '02') {
		this.data.detailPajaks = {
			id: null,
			jumlahMeja: 0,
			jumlahKursi: 0,
			tarifMinuman: 0,
			tarifMakanan: 0,
			jumlahPengunjung: 0,
		};
	} else if(this.jenisOp == '03') {
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
	} else if(this.jenisOp == '05' && rekening_rincian == '01') {
		this.data.detailPajaks = {
			id: null,
			jenisMesinPenggerak: null,
			tahunMesin: null,
			dayaMesin: null,
			bebanMesin: null,
			jumlahJam: 0,
			jumlahHari: 0,
			listrikPLN: null,
		};
	} else if(this.jenisOp == '05' && rekening_rincian == '02') {
		this.data.detailPajaks.push({
			id: null,
			jenisPPJ_id: null,
			jumlahPelanggan: 0,
			jumlahRekening: 0,
			tarif: 0,
		});
	} else if(this.jenisOp == '07') {
		this.data.detailPajaks.push({
			jenisKendaraan: null,
			kapasitas: 0,
			tarif: 0,
		});
	} else if(this.jenisOp == '08') {
		this.data.detailPajaks = {
			id: null,
			peruntukan: null,
			jenisAbt: null,
			pengenaan: 0,		
		};
	}
}

function delDetailObjekPajak(i){
	if(i > data.detailPajaks.length - 1)
		return;
	this.data.detailPajaks.splice(i, 1);
}

function addPemilik() {
	this.data.potensiPemilikWps.push({
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
	this.addPemilikLists();
    // this.$forceUpdate();
}

function addPemilikLists() {
	this.pemilikLists.push({
		kelurahans: [],
		direktur_kelurahans: [],
	})
}

function delPemilik(i){
	if(i > this.data.potensiPemilikWps.length - 1)
		return;
	this.data.potensiPemilikWps.splice(i, 1);
	this.pemilikLists.splice(i, 1);
}

function addNarahubung() {
	data.potensiNarahubungs.push({
		nama: null,
		nik: null,
		alamat: null,
		rtRw: null,
		daerah_id: null,
		kelurahan_id: null,
		telp: null,
	});
	this.addNarahubungLists();
}

function addNarahubungLists() {
	this.narahubungLists.push({
		kelurahans: [],
	})
}

function delNarahubung(i){
	if(i > data.potensiNarahubungs.length - 1)
		return;
	data.potensiNarahubungs.splice(i, 1);
	this.narahubungLists.splice(i, 1);
}

function addPetugas() {
	this.selectedPegawais.push(null);
	// this.data.bapl.petugas_pegawai_id.push(null);
}
