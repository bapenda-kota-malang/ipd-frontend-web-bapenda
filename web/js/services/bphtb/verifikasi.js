data = {...verifikasi};
vars = {
	// statusKolektifs,
	// jenisPelayanans,
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
	data = xthis.data
	if(data.tanggalTerima && typeof data.tanggalTerima['getDate'] == 'function') {
		data.tanggalTerima = formatDate(data.tanggalTerima);
	} 
	if(data.tanggalSelesai && typeof data.tanggalSelesai['getDate'] == 'function') {
		data.tanggalSelesai = formatDate(data.tanggalSelesai);
	} 
	if(data.tanggalPermohonan && typeof data.tanggalPermohonan['getDate'] == 'function') {
		data.tanggalPermohonan = formatDate(data.tanggalPermohonan);
	}
	
	console.log("preSubmit") 
	data.penerimaanBerkas = data.penerimaanBerkasTemp.toString()
	data.nip = sessionStorage.getItem("nip") 
	console.log(data.nip)
}

function postDataFetch(data, xthis) {
	console.log("origin")
	console.log(data)

	if(xthis.id) {
	}
	
}

