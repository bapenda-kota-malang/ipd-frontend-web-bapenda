data = { ...bappEntry }
vars = {
	tanggalPemeriksaan: null,
	undanganList: [],
	pegawaiList: [],
	petugasList: [],
	undangan_nomor: null,
	wpd_npwpd: null,
	wpd_nama: null,
	wpd_alamat: null,
	wpd_rtRw: null,
}
urls = {
	preSubmit: '/penagihan-pemeriksaan/bapp',
	postSubmit: '/penagihan-pemeriksaan/bapp',
	submit: '/bapenagihan',
	dataSrc: '/bapenagihan'
}
methods = {
	showSearchUndangan,
	pilihUndangan,
	showSearchPegawai,
	pilihPegawai,
	delPetugas,
	addImage,
}
components = {
	datepicker: DatePicker,
}

var searchUndanganModal = null;
var searchPegawaiModal = null;

async function mounted(xthis) {
}
 
function postDataFetch(data, xthis) {
}

function preSubmit(xthis) {
	xthis.data.tanggalPemeriksaan = formatDate(xthis.tanggalPemeriksaan, ['y', 'm', 'd']) + 'T00:00:00.000Z';
}

async function showSearchUndangan() {
	if(!searchUndanganModal) {
		searchUndanganModal = new bootstrap.Modal(document.getElementById('searchUndanganModal'))
	}
	res = await apiFetchData('/undanganpemeriksaan', messages);
	if(!res) {
		console.error('failed to fetch "npwpd"');
	} else {
		app.undanganList = typeof res.data != 'undefined' ? res.data : [];
	}
	searchUndanganModal.show();
}

async function showSearchPegawai() {
	if(!searchPegawaiModal) {
		searchPegawaiModal = new bootstrap.Modal(document.getElementById('searchPegawaiModal'))
	}
	res = await apiFetchData('/pegawai', messages);
	if(!res) {
		console.error('failed to fetch "npwpd"');
	} else {
		this.pegawaiList = typeof res.data != 'undefined' ? res.data : [];
	}
	searchPegawaiModal.show();
}

async function pilihUndangan(idx) {
	this.data.undangan_id = this.undanganList[idx].id;
	this.undangan_nomor = this.undanganList[idx].noSuratUndangan
	this.wpd_npwpd = this.undanganList[idx].npwpd.npwpd;
	this.wpd_nama = this.undanganList[idx].npwpd.objekPajak.nama;
	this.wpd_alamat = this.undanganList[idx].npwpd.objekPajak.alamat;
	this.wpd_rtRw = this.undanganList[idx].npwpd.objekPajak.rtRw;
	searchUndanganModal.hide();
}

function pilihPegawai(idx) {
	this.data.petugasListDetail.push(this.pegawaiList[idx].id);
	this.petugasList.push({
		nip: this.pegawaiList[idx].nip,
		nama: this.pegawaiList[idx].nama,
		jabatan: jabatans[this.pegawaiList[idx].jabatan_id],
	});
	searchPegawaiModal.hide();
}

function delPetugas(idx) {
	if(idx > this.data.petugasListDetail.length - 1)
		return;
	this.data.petugasListDetail.splice(idx, 1);
	this.petugasList.splice(idx, 1);
}

function addImage($event, elId, method, width, height, object, idx) {
	resizeImage($event, elId, method, width, height, object, idx);
	this.$forceUpdate();
}