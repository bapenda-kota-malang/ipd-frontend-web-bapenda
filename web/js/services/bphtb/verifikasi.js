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
	formTolak: false,
	pilihAlamats,
	jenisPerolehans,
	options:['test', 'ok'],
}
urls = {
	preSubmit: '/bphtbsptpd',
	postSubmit: '/bphtbsptpd',
	submit: '/bphtbsptpd/{id}/verifikasi',
	dataSrc: '/bphtbsptpd',
}
refSources = {
	submitCetak:'/bphtb/{id}/cetak',
	submitVerifikasi:'/bphtb/{id}/verifikasi',
	submitTolakVerifikasi: '/bphtb/{id}/tolakverifikasi',
}
methods = {
	submitCetak,
	showTolakForm,
	hideTolakForm,
	submitVerifikasi,
	submitTolakVerifikasi,
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function mounted(xthis) {
	if(!xthis.id) {
	}
}

async function submitCetak(id, xthis) {
	res = await apiFetch(refSources.submitCetak + id, 'GET');
	console.log(res)
}

async function showTolakForm(xthis) {
	xthis.formTolak = true;
}

async function hideTolakForm(xthis) {
	xthis.formTolak = false;
}

async function submitVerifikasi(data) {
	if (data.status == '00') {
		data.status = '01'
	}
	// res = await apiFetch(refSources.submitVerifikasi + id, 'PATCH');
	console.log(data)
}

async function submitTolakVerifikasi(id, xthis) {
	res = await apiFetch(refSources.submitTolakVerifikasi + id, 'PATCH');
	console.log(res)
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

		if (data.proses == "0") {
			xthis.jbtStaff = "Staff"
		} else if (data.proses == "1") {
			xthis.jbtStaff = "Kasubid"
		} else if (data.proses == "2") {
			xthis.jbtStaff = "Kabid"
		}

		data.tanggal = formatDate(new Date(data.tanggal), ['d','m','y'], '-');
		GetValue(jenisPerolehans, data.jenisPerolehanOp).then( value => data.jenisPerolehanOp = data.jenisPerolehanOp + " - "  +  value);
	}	
}

