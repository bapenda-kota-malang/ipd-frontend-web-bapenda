data = {...nopspptsimulasi};
vars = {
	options:['test', 'ok'],
}
urls = {
	preSubmit: '/sppt-simulasi',
	postSubmit: '/sppt-simulasi',
	submit: '/sppt-simulasi/{id}/{kd}',
	dataSrc: '/sppt-simulasi',
}
refSources = {
	imageUrl: '/static/img/',
	submitCetak:'/sppt-simulasi/{id}/cetak',
	submitProcess:'/sppt-simulasi/',
	doneProcess: '/penetapan/simulasi-penetapan-massal-pbb',
}
methods = {
	propinsiChanged,
	dati2Changed,
	kecamatanChanged,
	kelurahanChanged,
	submitCetak,
	submitProses,
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

async function propinsiChanged(event) {
	id = event.target.value

	res = await apiFetch(refSources.propinsiurl + id + "/kode", 'GET');
	console.log(res)
	if(typeof res.data == 'object') {
		this.data.namaPropinsi = res.data.data.nama;
	} else {
		console.log("data propinsi tidak ditemukan");
	}
}

async function dati2Changed(event) {
	id = event.target.value

	res = await apiFetch(refSources.dati2url + id + "/kode", 'GET');
	console.log(res)
	if(typeof res.data == 'object') {
		this.data.namaDati2 = res.data.data.nama;
	} else {
		console.log("data Dati II tidak ditemukan");
	}
}

async function kecamatanChanged(event) {
	id = event.target.value

	res = await apiFetch(refSources.kecamatanurl + id + "/kode", 'GET');
	console.log(res)
	if(typeof res.data == 'object') {
		this.data.namaKecamatan = res.data.data.nama;
	} else {
		console.log("data kecamatan tidak ditemukan");
	}
}

async function kelurahanChanged(event) {
	id = event.target.value

	res = await apiFetch(refSources.kelurahanurl + id + "/kode", 'GET');
	console.log(res)
	if(typeof res.data == 'object') {
		this.data.namaKelurahan = res.data.data.nama;
	} else {
		console.log("data kelurahan tidak ditemukan");
	}
}

async function submitCetak(id, xthis) {
	res = await apiFetch(refSources.submitCetak + id, 'GET');
	console.log(res)
}

async function submitProses(data) {
	res = await apiFetch(refSources.submitProces + data.id, 'POST', data);
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
		// xthis.totalNJOPLB = data.opLuasTanah * data.njopLuasTanah;
		// xthis.totalNJOPLBB = data.opLuasBangunan * data.njopLuasBangunan;
		// xthis.nilaiTotalOp = (data.opLuasTanah * data.njopLuasTanah) + (data.opLuasBangunan * data.njopLuasBangunan);

		// xthis.totalNpop = data.npop - data.npoptkp;
		// xthis.totalNJOP = (5 / 100) * (data.npop - data.npoptkp);

		// data.tglValidasiDispenda = formatDate(new Date(data.tglValidasiDispenda), ['d','m','y'], '-');
		// data.tglExpBilling = formatDate(new Date(data.tglExpBilling), ['d','m','y'], '-');

		// data.tanggal = formatDate(new Date(data.tanggal), ['d','m','y'], '-');
		// GetValue(jenisPerolehans, data.jenisPerolehanOp).then( value => data.jenisPerolehanOp = data.jenisPerolehanOp + " - "  +  value);

		console.log("jabatan id :" + xthis.jabatan_id);
		console.log("jabatanstaff :" + xthis.jbtStaff);
		console.log("status :" + data.status);

	}	
}

