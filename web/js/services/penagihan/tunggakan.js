data = {...tunggakan};
vars = {
	buku2s,
	pilihanLaporans,
}
components = {
	vueselect: VueSelect.VueSelect,
}
urls = {
	preSubmit: '/pelayanan/data-permohonan',
	postSubmit: '/pelayanan/data-permohonan',
	submit: '/permohonan/{id}',
	dataSrc: '/permohonan',
}
refSources = {
	propinsiurl: "/provinsi/",
	dati2url: "/daerah/",
	kecamatanurl: "/kecamatan/",
	kelurahanurl: "/kelurahan/",
}
methods = {
	propinsiChanged,
	dati2Changed,
	kecamatanChanged,
	kelurahanChanged,
}

function mounted(xthis) {
	if(!xthis.id) {
		// xthis.data.tahunAwal = new Date().getFullYear().toString();
		// xthis.data.tahunAkhir = new Date().getFullYear().toString();
	}
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

function preSubmit(xthis) {
	data = xthis.data;
	console.log("preSubmit") ;
}

function postDataFetch(data, xthis) {
	console.log("origin");
	console.log(data);

	if(xthis.id) {

	}

}

