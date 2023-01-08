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
	provChange,
	daerahChange,
	kecamatanChange,
	kelurahanChange,
	nopNextAfter
}
components = {
	vueselect: VueSelect.VueSelect,
}

function preSubmitEntry(){
	this.entryData.luasTanahOp = parseInt(this.entryData.luasTanahOp);
	this.entryData.njopTanahOp = parseInt(this.entryData.njopTanahOp);
	this.entryData.luasBangunanOp = parseInt(this.entryData.luasBangunanOp);
	this.entryData.njopBangunanOp = parseInt(this.entryData.njopBangunanOp);
}

async function postShowEntry() {
	if(this.provinsi_kode) {
		await this.refreshSelect(this.provinsi_kode, this.provinsiList, '/daerah?provinsi_kode={kode}&no_pagination=true', this.daerahList, 'kode', 'id');
	}
	if(this.daerah_kode) {
		await this.refreshSelect(this.daerah_kode, this.daerahList, '/kecamatan?kecamatan_kode={kode}&no_pagination=true', this.kecamatanList, 'kode', 'id');
	}
	if(this.kecamatan_kode) {
		await this.refreshSelect(this.kecamatan_kode, this.kecamatanList, '/kelurahan?kecamatan_kode={kode}&no_pagination=true', this.kelurahanList, 'kode', 'id');
	}
}

function provChange(byText, bySelect){
	if(byText) {
		this.provinsi_kode = byText;
	} else {
		if(bySelect) {
			this.entryData.provinsi_kode = bySelect;
		}
	}
}

function daerahChange(byText, bySelect){
	if(byText) {
		this.daerah_kode = `${this.provinsi_kode}${byText}`;
	} else {
		if(bySelect) {
			this.entryData.daerah_kode = bySelect.substring(2,4);
		}
	}
}

function kecamatanChange(byText, bySelect){
	if(byText) {
		this.kecamatan_kode = `${this.daerah_kode}${byText}`;
	} else {
		if(bySelect) {
			this.entryData.kecamatan_kode = bySelect.substring(4,7);
		}
	}
}

function kelurahanChange(byText, bySelect){
	if(byText) {
		this.kelurahan_kode = `${this.kecamatan_kode}${byText}`;
	} else {
		if(bySelect) {
			this.entryData.kelurahan_kode = bySelect.substring(7,10);
		}
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