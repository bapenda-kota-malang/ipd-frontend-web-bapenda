data = {...npwpd};
vars = {
	detailObjekPajak: [],
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
	tanggalPengukuhanTemp: null,
	tanggalNpwpdTemp: null,
	tanggalMulaiUsahaTemp: null,
	kodeJenisUsaha: 0,
	pagination: {},
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

pemilikVarName = 'pemilik';
narahubungVarName = 'narahubung';
detailVarName = 'objekPajak';

function mounted() {
	if(!this.id) {
		this.addPemilik();
		this.addNarahubung();
	}
	this.rekenings.forEach(function(item, idx){
		this.rekenings[idx].nama = item.kode + ' - ' + item.nama;
	})
}

function preSubmit() {
	data = this.data
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

function postFetchData(data) {
	if(this.id) {
		data.tanggalNpwpd = data.tanggalNpwpd ? new Date(data.tanggalNpwpd.substr(0,10)) : null;
		data.tanggalPengukuhan = data.tanggalPengukuhan ? new Date(data.tanggalPengukuhan.substr(0,10)) : null;
		data.tanggalMulaiUsaha = data.tanggalMulaiUsaha ? new Date(data.tanggalMulaiUsaha.substr(0,10)) : null;
		this.refreshSelect(data.objekPajak.kecamatan_id, this.kecamatans, `/kelurahan?kecamatan_kode=${data.objekPajak.kecamatan.kode}&no_pagination=true`, this.kelurahans, 'kode');
		data.pemilik.forEach(function(item, idx) {
			this.addPemilikLists(this);
			this.refreshSelect(item.daerah_id, this.daerahs, `/kelurahan?kode=${data.pemilik[idx].daerah.kode}&kode_opt=left&no_pagination=true`, this.pemilikLists[idx].kelurahans, 'kode');
			if(item.direktur_daerah_id)
				this.refreshSelect(item.direktur_daerah_id, this.daerahs, `/kelurahan?kode=${data.pemilik[idx].direktur_daerah.kode}&kode_opt=left&no_pagination=true`, this.pemilikLists[idx].direktur_kelurahans, 'kode');
		})
		data.narahubung.forEach(function(item, idx) {
			this.addNarahubungLists(this);
			this.refreshSelect(item.daerah_id, this.daerahs, `/kelurahan?kode=${data.narahubung[idx].daerah.kode}&kode_opt=left&no_pagination=true`, this.narahubungLists[idx].kelurahans, 'kode');
		})

		if(data.detailObjekPajak) {
			if(data.rekening.objek == '01') {
				this.detailObjekPajak = data.detailObjekPajakHotel;
			} else if(data.rekening.objek == '02') {
				this.detailObjekPajak = data.detailObjekPajakResto;
			} else if(data.rekening.objek == '03') {
				this.detailObjekPajak = data.detailObjekPajakHiburan;
			} else if(data.rekening.objek == '04') {
				this.detailObjekPajak = data.detailObjekPajakReklame;
			} else if(data.rekening.objek == '05') {
				this.detailObjekPajak = data.detailObjekPajakPeneranganJalan;
			} else if(data.rekening.objek == '06') {
				this.detailObjekPajak = data.detailObjekPajakHotel;
			} else if(data.rekening.objek == '07') {
				this.detailObjekPajak = data.detailObjekPajakParkir;
			} else if(data.rekening.objek == '08') {
				this.detailObjekPajak = data.detailObjekPajakAirTanah;
			}	
		}
	}
}

function addDetailObjekPajak() {
	this.data.detailObjekPajak.push({
		klasifikasi: null,
		jumlahOp: null,
		unitOp: null,
		tarifOp: null,
		notes: null,
	});
}

function delDetailObjekPajak(i){
	if(i > this.data.detailObjekPajak.length - 1)
		return;
	this.data.detailObjekPajak.splice(i, 1);
}
