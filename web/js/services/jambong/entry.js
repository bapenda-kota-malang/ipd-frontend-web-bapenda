data = { ...jambongEntry }
vars = {
	// flatten the data
	skpd_id: null,
	skpd_tanggal: null,
	skpd_tahun: null,
	wp_npwpd: null,
	wp_nama: null,
	wp_alamat: null,
	skpddFound: false,
	rekening_id: null,
	rekening_objek: null,
	rekening_rincian: null,
	arrayDetailStatus: false,
	reklameList: [],
	skpdList: [],
	tarifReklameList: [],
}
urls = {
	preSubmit: '/jaminan-bongkar-reklame',
	postSubmit: '/jaminan-bongkar-reklame',
	submit: '/jaminanbongkar',
	dataSrc: '/jaminanbongkar'
}
methods = {
	showSkpdSearch,
	// setSkpd,
	checkSkpd,
	pilihSkpd,
	applySkpd,
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}
// skipDetail = true;
skipPopulate = true;
appEl = '#vueBox';

var skpdSearchModal = null;

async function mounted() {
}
 
function postDataFetch(data) {
}

function preSubmit() {
}

async function showSkpdSearch() {
	if(!skpdSearchModal) {
		skpdSearchModal = new bootstrap.Modal(document.getElementById('skpdSearch'))
	}
	res = await apiFetchData('/skpd', messages);
	if(!res) {
		console.error('failed to fetch "skpd"');
	} else {
		app.skpdList = typeof res.data != 'undefined' ? res.data : [];
	}
	skpdSearchModal.show();
}

// async function setSkpd() {
// 	// url = ;
// 	if(window.location.pathname + window.location.search != "/skpd?npwpd=" + this.npwpd) {
// 		window.history.pushState({html:document.html}, "", "/skpd?npwpd=" + this.npwpd); // "html":response.html,
// 	}
// 	await this.checkSkpd(this.npwpd);
// }

async function checkSkpd(skpd_id, skipAdvance) {
	this.skpd_id = skpd_id;
	if(skpd_id) {
		res = await apiFetch('/skpd/' + skpd_id, 'GET');
		if(typeof res.data == 'object') {
			this.applySkpd(res.data.data, skipAdvance);
		} else {
			this.skpdFound = false;
			this.messageProp.show = true;
			content = 'NPWPD tidak dapat ditemukan!!';
		}
	} else {
		this.skpdFound = false;
	}
}

function applySkpd(xd, skipAdvance) {
	// vars for view
	this.skpd_tanggal = xd.createdAt.substring(0,10);
	this.skpd_tahun = xd.jatuhTempo.substring(0,4);
	this.wp_npwpd = xd.npwpd.npwpd;
	this.wp_nama = xd.npwpd.nama;
	this.wp_alamat = xd.objekPajak.alamat;
	this.reklameList = xd.detailSptReklame;
}

async function pilihSkpd(skpd_id) {
	await this.checkSkpd(skpd_id);
	skpdSearchModal.hide();
}
