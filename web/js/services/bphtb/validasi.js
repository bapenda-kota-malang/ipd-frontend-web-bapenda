data = {...verifikasi};
vars = {
	totalNJOPLB: null,
	totalNJOPLBB: null,
	totalNpop: null,
	totalNJOP: null,
	totalNJOPTerbilang: null,
	totalNJOPLB_F: null,
	totalNJOPLBB_F: null,
	totalNpop_F: null,
	totalNJOP_F: null,
	nilaiTotalOp: null,
	nilaiTotalOp_F: null,
	nilaiOp_F: null,
	npop_F: null,
	npoptkp_F: null,
	jbtStaff: null,
	jabatan_id: null,
	formTolak: false,
	pilihAlamats,
	jenisPerolehans,
	options:['test', 'ok'],
}
urls = {
	preSubmit: '/bphtbsptpd',
	postSubmit: '/bphtbsptpd',
	submit: '/bphtbsptpd-approval/{id}/{kd}',
	dataSrc: '/bphtbsptpd',
}
refSources = {
	submitCetak:'/bphtbsptpd-approval/{id}/cetak',
	submitVerifikasi:'/bphtbsptpd-approval/',
	submitTolakVerifikasi: '/bphtbsptpd-approval/{id}/tolakvalidasi',
	doneApproval: '/penetapan/validasi-e-bphtb',
}
methods = {
	submitCetak,
	showTolakForm,
	hideTolakForm,
	submitValidasi,
	submitPengembalian,
	submitTolakValidasi,
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function mounted(xthis) {
	if(!xthis.id) {
	}
	xthis.jabatan_id = document.getElementById('jabatan_id') ? document.getElementById('jabatan_id').value : null;
	xthis.user_name = document.getElementById('user_name') ? document.getElementById('user_name').value : null;
	xthis.user_id = document.getElementById('user_id') ? document.getElementById('user_id').value : null;
	console.log(xthis.user_id)
}

async function submitCetak(id, xthis) {
	res = await apiFetch(refSources.submitCetak + id, 'GET');
	console.log(res)
}

async function showTolakForm() {
	this.formTolak = true;
	console.log(xthis.formTolak)
}

async function hideTolakForm() {
	this.formTolak = false;
	console.log(xthis.formTolak)
}

async function submitValidasi(data) {
	originStatus = data.status
	if (data.status == '06') {
		data.status = '08';
	} else if (data.status == '03') {
		data.status = '06';
	} else if (data.status == '01') {
		data.status = '03';
	}	
	console.log(originStatus)
	console.log(data.status)
	res = await apiFetch(refSources.submitVerifikasi + data.id + "/" + originStatus, 'PATCH', data);
	console.log(res)
	if(typeof res.data == 'object') {
		window.location.href = refSources.doneApproval;
	}
}

async function submitTolakValidasi(data) {
	originStatus = data.status
	if (data.status == '06') {
		data.status = '07';
	} else if (data.status == '03') {
		data.status = '04';
	} else if (data.status == '01') {
		data.status = '02';
	}	
	console.log(originStatus)
	console.log(data.status)
	res = await apiFetch(refSources.submitVerifikasi + data.id + "/" + originStatus, 'PATCH', data);
	console.log(res)
	if(typeof res.data == 'object') {
		window.location.href = refSources.doneApproval;
	}
}

function preSubmit(xthis) {
	data = xthis.data;
	
	console.log("preSubmit") ;
}

function postDataFetch(data, xthis) {
	console.log("origin");
	console.log(data);

	if(xthis.id) {
		xthis.totalNJOPLB = data.opLuasTanah * data.njopLuasTanah;
		xthis.totalNJOPLBB = data.opLuasBangunan * data.njopLuasBangunan;
		xthis.nilaiTotalOp = (data.opLuasTanah * data.njopLuasTanah) + (data.opLuasBangunan * data.njopLuasBangunan);

		xthis.totalNpop = data.npop - data.npoptkp;
		xthis.totalNJOP = (5 / 100) * (data.npop - data.npoptkp);
		xthis.totalNJOPTerbilang = angkaTerbilang(xthis.totalNJOP) + " rupiah";

		xthis.totalNJOPLB_F = toRupiah(xthis.totalNJOPLB, {formal: false, dot: '.'});
		xthis.totalNJOPLBB_F = toRupiah(xthis.totalNJOPLBB, {formal: false, dot: '.'});
		xthis.totalNJOP_F = toRupiah(xthis.totalNJOP, {formal: false, dot: '.'});
		xthis.nilaiOp_F = toRupiah(data.nilaiOp, {formal: false, dot: '.'});
		xthis.npop_F = toRupiah(data.npop, {formal: false, dot: '.'});
		xthis.npoptkp_F = toRupiah(data.npoptkp, {formal: false, dot: '.'});
		xthis.totalNpop_F = toRupiah(xthis.totalNpop, {formal: false, dot: '.'});
		xthis.totalNJOP_F = toRupiah(xthis.totalNJOP, {formal: false, dot: '.'});
		xthis.nilaiTotalOp_F = toRupiah(xthis.nilaiTotalOp, {formal: false, dot: '.'});

		if (data.status == "01") {
			xthis.jbtStaff = "Staff"
		} else if (data.status == "03") {
			xthis.jbtStaff = "Kasubid"
		} else if (data.status == "06") {
			xthis.jbtStaff = "Kabid"
		}

		data.tanggal = formatDate(new Date(data.tanggal), ['d','m','y'], '-');
		GetValue(jenisPerolehans, data.jenisPerolehanOp).then( value => data.jenisPerolehanOp = data.jenisPerolehanOp + " - "  +  value);
	}	
}

