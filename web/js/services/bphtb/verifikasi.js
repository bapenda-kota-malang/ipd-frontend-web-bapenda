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
	nilaiOp_F: null,
	npop_F: null,
	npoptkp_F: null,

	pilihAlamats,
	options:['test', 'ok'],
}
urls = {
	preSubmit: '/bphtbsptpd',
	postSubmit: '/bphtbsptpd',
	submit: '/bphtbsptpd/{id}/verifikasi',
	dataSrc: '/bphtbsptpd',
}
refSources = {
	submitVerifikasi:'/bphtb/{id}/cetak',
	submitVerifikasi:'/bphtb/{id}/verifikasi',
	submitTolakVerifikasi: '/bphtb/{id}/tolakverifikasi',
	submitValidasi: '/bphtb/{id}/validasi',
	submitTolakValidasi: '/bphtb/{id}/tolakvalidasi',
}
methods = {
	submitCetak,
	submitVerifikasi,
	submitTolakVerifikasi,
	submitValidasi,
	submitTolakValidasi,
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

async function submitVerifikasi(id, xthis) {
	res = await apiFetch(refSources.submitVerifikasi + id, 'PATCH');
	console.log(res)
}

async function submitTolakVerifikasi(id, xthis) {
	res = await apiFetch(refSources.submitTolakVerifikasi + id, 'PATCH');
	console.log(res)
}

async function submitValidasi(id, xthis) {
	res = await apiFetch(refSources.submitValidasi + id, 'PATCH');
	console.log(res)
}

async function submitTolakValidasi(id, xthis) {
	res = await apiFetch(refSources.submitTolakValidasi + id, 'PATCH');
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
		xthis.totalNJOPLB = data.opLuasTanah * data.njopLuasTanah
		xthis.totalNJOPLBB = data.opLuasBangunan * data.njopLuasBangunan

		xthis.totalNpop = data.npop - data.npoptkp
		xthis.totalNJOP = (5 / 100) * (data.npop - data.npoptkp)
		xthis.totalNJOPTerbilang = angkaTerbilang(xthis.totalNJOP)

		xthis.totalNJOPLB_F = toRupiah(xthis.totalNJOPLB, {formal: false, dot: '.'})
		xthis.totalNJOPLBB_F = toRupiah(xthis.totalNJOPLBB, {formal: false, dot: '.'})
		xthis.totalNJOP_F = toRupiah(xthis.totalNJOP, {formal: false, dot: '.'})
		xthis.nilaiOp_F = toRupiah(data.nilaiOp, {formal: false, dot: '.'})
		xthis.npop_F = toRupiah(data.npop, {formal: false, dot: '.'})
		xthis.npoptkp_F = toRupiah(data.npoptkp, {formal: false, dot: '.'})
		xthis.totalNpop_F = toRupiah(xthis.totalNpop, {formal: false, dot: '.'})
		xthis.totalNJOP_F = toRupiah(xthis.totalNJOP, {formal: false, dot: '.'})

		data.tanggal = formatDate(new Date(data.tanggal), ['d','m','y'], '-');
	}	
}

