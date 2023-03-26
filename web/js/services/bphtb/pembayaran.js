data = {...pembayaran};
vars = {
	bidangKerja_kode: null,
	jabatan_id: null,
	user_name: null,
	user_id: null,
	nip: null,
	sptpd_id: null,
	sptpd_uuid: null,
	errsptpd_id: null,
	dataSptpd: null,
	PaymentPoints : null,
	options:['test', 'ok'],
}
urls = {
	preSubmit: '/bendahara/pembayaran-bphtb/',
	postSubmit: '/bendahara/pembayaran-bphtb/',
	submit: '/pembayaranbphtb/{id}',
	dataSrc: '/pembayaranbphtb',
}
refSources = {
	getdatasptpd:'/pembayaran-bphtb/',
	getdatapaymentpoint:'/paymentpoint',
}
methods = {
	getDataSptpd,
	getDataPaymentPoint,
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function created() {
	this.jabatan_id = document.getElementById('jabatan_id') ? document.getElementById('jabatan_id').value : null;
	this.user_name = document.getElementById('user_name') ? document.getElementById('user_name').value : null;
	this.user_id = document.getElementById('user_id') ? document.getElementById('user_id').value : null;
    this.nip = document.getElementById('nip') ? document.getElementById('nip').value : null;
	
	this.dataSptpd = tempSptpd;
	// xthis.data.createdAt = new Date().toString();

	getDataPaymentPoint(this);
	console.log(user_id);
}

async function getDataSptpd(xthis) {
	if (xthis.sptpd_id.length >= 5) {
		res = await apiFetch(refSources.getdatasptpd + xthis.sptpd_id, 'GET');
		console.log(res.data)
		if(typeof res.data == 'object') {
			this.sptpd_id = res.data.data.sptpd_id;
			this.sptpd_uuid = res.data.data.id;
			this.dataSptpd.nop = res.data.data.permohonanProvinsiID + "." + res.data.data.permohonanKotaID + "." + res.data.data.permohonanKecamatanID  + "." + res.data.data.permohonanKelurahanID + "." + res.data.data.permohonanBlokID + "." + res.data.data.noUrutPemohon + "." + res.data.data.pemohonJenisOPID;
			this.dataSptpd.namaWp = res.data.data.namaWp;
			this.dataSptpd.opAlamat = res.data.data.opAlamat;
			this.dataSptpd.jumlahSetor = res.data.data.jumlahSetor;
			this.dataSptpd.tglExpBilling = res.data.data.tglExpBilling;
		} else {
			this.errsptpd_id = "Data SPTPD tidak ditemukan."
		}
	}
	console.log(this.dataSptpd);
}

async function getDataPaymentPoint(xthis) {
	res = await apiFetch(refSources.getdatapaymentpoint, 'GET');
	if(typeof res.data == 'object') {
		xthis.PaymentPoints = res.data.data;
	} else {
		xthis.PaymentPoints = []
	}
}

function preSubmit() {
	console.log("preSubmit") ;
	console.log(this.sptpd_id);
	this.data.sptpd_id = this.sptpd_uuid;
	this.data.createdBy = parseInt(this.user_id); 
	if (this.dataSptpd.jumlahSetor != null) {
		this.data.nominalBayar = this.dataSptpd.jumlahSetor.toString();
	} else {
		this.data.nominalBayar = "";
	}
}

function postDataFetch(data, xthis) {
	console.log("origin");
	console.log(data);

	if(xthis.id) {
	}	
}

