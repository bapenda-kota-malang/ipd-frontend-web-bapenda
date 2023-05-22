function addPemilik() {
	this.data[pemilikVarName].push({
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
}

function addPemilikLists() {
	this.pemilikLists.push({
		kelurahans: [],
		direktur_kelurahans: [],
	})
}

function delPemilik(i){
	if(i > this.data[pemilikVarName].length - 1)
		return;
	this.data[pemilikVarName].splice(i, 1);
	this.pemilikLists.splice(i, 1);
}

function addNarahubung() {
	this.data[narahubungVarName].push({
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
	this.cekAutoNarahubung();
}

function delNarahubung(i){
	if(i > this.data[narahubungVarName].length - 1)
		return;
    this.data[narahubungVarName].splice(i, 1);
	this.narahubungLists.splice(i, 1);
	this.cekAutoNarahubung();
}

function cekAutoPemilik() {
	if(this.autoPemilik) {
		daerah = this.daerahs.filter(function(item) {
			return item.kode=="3573";
		});
		refreshSelect(daerah[0].id, this.daerahs, '/kelurahan?kode={kode}&kode_opt=left&no_pagination=true', this.pemilikLists[0].kelurahans, 'kode')
		this.data[pemilikVarName][0].alamat = this.data[detailVarName].alamat;
		this.data[pemilikVarName][0].daerah_id = daerah[0].id;
		this.data[pemilikVarName][0].kelurahan_id = this.data[detailVarName].kelurahan_id;
	}
}

function cekAutoNarahubung() {
	if(this.autoNarahubung && this.data[narahubungVarName].length > 0) {
		daerah = this.daerahs.filter(function(item) {
			return item.kode=="3573";
		});
		refreshSelect(daerah[0].id, this.daerahs, '/kelurahan?kode={kode}&kode_opt=left&no_pagination=true', this.pemilikLists[0].kelurahans, 'kode')
		this.data[narahubungVarName][0].alamat = this.data[detailVarName].alamat;
		this.data[narahubungVarName][0].daerah_id = daerah[0].id;
		this.data[narahubungVarName][0].kelurahan_id = this.data[detailVarName].kelurahan_id;
	}
}

function cekAlamat() {
	if(this.autoPemilik) {
		this.data[pemilikVarName][0].alamat = this.data[detailVarName].alamat;
	}
	if(this.autoNarahubung && this.data[narahubungVarName].length > 0) {
		this.data[narahubungVarName][0].alamat = this.data[detailVarName].alamat;
	}
}

function cekKelurahan() {
	if(this.autoPemilik) {
		this.data[pemilikVarName][0].kelurahan_id = this.data[detailVarName].kelurahan_id;
	}
	if(this.autoNarahubung && this.data[narahubungVarName].length > 0) {
		this.data[narahubungVarName][0].kelurahan_id = this.data[detailVarName].kelurahan_id;
	}
}

function cekTelp() {
	if(this.autoPemilik) {
		this.data[pemilikVarName][0].telp = this.data[detailVarName].telp;
	}
	if(this.autoNarahubung && this.data[narahubungVarName].length > 0) {
		this.data[narahubungVarName][0].telp = this.data[detailVarName].telp;
	}
}

