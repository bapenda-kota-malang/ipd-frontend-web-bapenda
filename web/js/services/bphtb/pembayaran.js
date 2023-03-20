data = {...verifikasi};
vars = {
	bidangKerja_kode: null,
	jabatan_id: null,
	user_name: null,
	user_id: null,
	nip: null,
	noDokumen: null,
	errNoDokumen: null,
	dataSptpd: null,
	PaymentPoints : [],
	options:['test', 'ok'],
}
urls = {
	preSubmit: '/pembayaranbphtb',
	postSubmit: '/pembayaranbphtb',
	submit: '/pembayaranbphtb/{id}',
	dataSrc: '/pembayaranbphtb',
}
refSources = {
	getdatasptpd:'/bphtbsptpd/',
	getdatapaymentpoint:'/paymentpoint/',
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
	jabatan_id = document.getElementById('jabatan_id') ? document.getElementById('jabatan_id').value : null;
	user_name = document.getElementById('user_name') ? document.getElementById('user_name').value : null;
	user_id = document.getElementById('user_id') ? document.getElementById('user_id').value : null;
    nip = document.getElementById('nip') ? document.getElementById('nip').value : null;
	
	getDataPaymentPoint();
	console.log(user_id);
}

async function getDataSptpd() {
	if (noDokumen.length > 5) {
		res = await apiFetch(refSources.getdatasptpd + noDokumen, 'GET');
		console.log(res)
		if(typeof res.data == 'object') {
			dataSptpd = res.data;
		} else {
			errNoDokumen = "Data SPTPD tidak ditemukan."
		}
	}
}

async function getDataPaymentPoint() {
	res = await apiFetch(refSources.getdatapaymentpoint, 'GET');
	console.log(res)
	if(typeof res.data == 'object') {
		PaymentPoints = res.data;
	}
}

function preSubmit() {
	console.log("preSubmit") ;
	data.nominalBayar = dataSptpd.jumlahSetor;
}

function postDataFetch(data, xthis) {
	console.log("origin");
	console.log(data);

	if(xthis.id) {
	}	
}

