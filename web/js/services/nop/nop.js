urls = {
	pathname: '/konfigurasi/data-ref/master/nop',
	dataPath: '/nop',
	dataSrc: '/nop',
	submit: '/nop/{id}',
}
vars = {
	entryData: {},
	entryFormTitle: 'Entry Form',
	provinsiList: [],
	daerahList: [],
	kecamatanList: [],
	kelurahanList: [],
	provinsi_kode: '35',
	daerah_kode:null,
	kecamatan_kode:null,
	kelurahan_kode:null,
	njopTanah: null,
	njopBangunan: null,
	njopTotal: null,
}
refSources = {
	provinsiList: '/provinsi?no_pagination=true',
}
computed = {
	njopTotalCalculate: function() {
		this.njopTanah = parseInt(this.entryData.luasTanahOp * this.entryData.njopTanahOp);
		this.njopBangunan = parseInt(this.entryData.luasBangunanOp * this.entryData.njopBangunanOp);
		this.njopTotal = parseInt(this.njopTanah + this.njopBangunan);
		return this.njopTotal;
	}
}
methods = {
	nopProvChange,
	nopDaerahChange,
	nopKecamatanChange,
	nopKelurahanChange,
	nopNextAfter
}
components = {
	vueselect: VueSelect.VueSelect,
}

function created() {
	console.log('asdf');
	this.entryData.provinsi_kode = this.provinsi_kode;
	console.log(this.entryData);
}

function preSubmitEntry(){
	this.entryData.luasTanahOp = parseInt(this.entryData.luasTanahOp);
	this.entryData.njopTanahOp = parseInt(this.entryData.njopTanahOp);
	this.entryData.luasBangunanOp = parseInt(this.entryData.luasBangunanOp);
	this.entryData.njopBangunanOp = parseInt(this.entryData.njopBangunanOp);
}

async function postShowEntry() {
	if(this.provinsi_kode) {
		await this.refreshSelect(this.provinsi_kode, this.provinsiList, '/daerah?provinsi_kode={kode}&no_pagination=true', this.daerahList, 'kode', 'kode');
	}
	if(this.daerah_kode) {
		await this.refreshSelect(this.daerah_kode, this.daerahList, '/kecamatan?kecamatan_kode={kode}&no_pagination=true', this.kecamatanList, 'kode', 'kode');
	}
	if(this.kecamatan_kode) {
		await this.refreshSelect(this.kecamatan_kode, this.kecamatanList, '/kelurahan?kecamatan_kode={kode}&no_pagination=true', this.kelurahanList, 'kode', 'kode');
	}
}

async function nopProvChange(input){
	if(!input) {
		this.provinsi_kode = this.entryData.provinsi_kode;
		await this.refreshSelect(this.provinsi_kode, this.provinsiList, '/daerah?provinsi_kode={kode}&no_pagination=true', this.daerahList, 'kode', 'kode');
	} else {
		this.entryData.provinsi_kode = input;
	}
}

async function nopDaerahChange(input){
	if(!input) {
		this.daerah_kode = `${this.entryData.provinsi_kode}${this.entryData.daerah_kode}`;
		await this.refreshSelect(this.daerah_kode, this.daerahList, '/kecamatan?kecamatan_kode={kode}&no_pagination=true', this.kecamatanList, 'kode', 'kode');
	} else {
		this.entryData.daerah_kode = input.substring(2,4);
	}
}

async function nopKecamatanChange(input){
	if(!input) {
		this.kecamatan_kode = `${this.entryData.provinsi_kode}${this.entryData.daerah_kode}${this.entryData.kecamatan_kode}`;
		await this.refreshSelect(this.kecamatan_kode, this.kecamatanList, '/kelurahan?kecamatan_kode={kode}&no_pagination=true', this.kelurahanList, 'kode', 'kode');
	} else {
		this.entryData.kecamatan_kode = input.substring(4,7);
	}
}

async function nopKelurahanChange(input){
	if(!input) {
		this.kelurahan_kode = `${this.entryData.provinsi_kode}${this.entryData.daerah_kode}${this.entryData.kecamatan_kode}${this.entryData.kelurahan_kode}`;
	} else {
		this.entryData.kelurahan_kode = input.substring(7,10);
	}
}

function cleanData(data) {
	// delete data.id;
	if(data.provinsi_kode) {
		data.provinsi_kode = null;
	}
	if(data.daerah_id) {
		data.daerah_id = null;
	}
	if(data.kecamatan_id ) {
		data.kecamatan_id = null;
	}
	if(data.kelurahan_id) {
		data.kelurahan_id = null;
	}
	if(data.kodeBlok) {
		data.kodeBlok = null;
	}
	if(data.noUrut) {
		data.noUrut = null;
	}
	if(data.kodeJenisOp) {
		data.kodeJenisOp = null;
	}
	data.opRtRw = null;
	data.luasTanahOp = null;
	data.luasBangunanOp = null;
	data.njopTanahOp = null;
	data.njopBangunanOp = null;
	data.nilaiOp = null;
	data.noSertifikat = null;
	data.njopPbb = null;
	data.namaPenjual = null;
	data.alamatPenjual = null;
	data.lokasiOp = null;
	data.tahunPajakSppt = null;
	data.refTanah = null;
	data.refBangunan= null;
}