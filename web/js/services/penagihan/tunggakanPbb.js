data = {...tunggakanPbb};
vars = {
	// bukuOpts,
	// pilihanLaporans,
}
urls = {
	preSubmit: '/penagihan-pemeriksaan/penagihan/tunggakan/lap-op-tunggakan',
	postSubmit: '/penagihan-pemeriksaan/penagihan/tunggakan/lap-op-tunggakan',
	submit: '/sppt/{id}',
	dataSrc: '/sppt/',
}
components = {
	// vueselect: VueSelect.VueSelect,
}
refSources = {
	propinsiurl: "/provinsi/",
	dati2url: "/daerah/",
	kecamatanurl: "/kecamatan/",
	kelurahanurl: "/kelurahan/",

	submitCetak: "/sppt/cetakdaftartagihan",
}
methods = {
	propinsiChanged,
	dati2Changed,
	kecamatanChanged,
	kelurahanChanged,
	submitCetak,
}

function mounted(xthis) {
	if(!xthis.id) {
		// xthis.data.tahunAwal = new Date().getFullYear().toString();
		// xthis.data.tahunAkhir = new Date().getFullYear().toString();
	}
}

async function propinsiChanged(event) {
	id = event.target.value;
	if (event.target.value.length == 2) {
        res = await apiFetch(refSources.propinsiurl + id + "/kode", 'GET');
        console.log(res)
        if(typeof res.data == 'object') {
            this.data.namaPropinsi = res.data.data.nama;
        } else {
            console.log("data propinsi tidak ditemukan");
        }
    }
    this.$forceUpdate();
}

async function dati2Changed(event) {
	id = this.data.provinsi_kode + event.target.value
    console.log(id)

	if (event.target.value.length == 2) {
        res = await apiFetch(refSources.dati2url + id + "/kode", 'GET');
        console.log(res)
        if(typeof res.data == 'object') {
            this.data.namaKota = res.data.data.nama;
        } else {
            console.log("data Dati II tidak ditemukan");
        }
        this.$forceUpdate();
    }
}

async function kecamatanChanged(event) {
    id = this.data.provinsi_kode + this.data.daerah_kode + event.target.value

	if (event.target.value.length == 3) {
        res = await apiFetch(refSources.kecamatanurl + id + "/kode", 'GET');
        console.log(res)
        if(typeof res.data == 'object') {
            this.data.namaKecamatan = res.data.data.nama;
        } else {
            console.log("data kecamatan tidak ditemukan");
        }
        this.$forceUpdate();
    }
}

async function kelurahanChanged(event) {
	id = this.data.provinsi_kode + this.data.daerah_kode + this.data.kecamatan_kode + event.target.value

	if (event.target.value.length == 3) {
        res = await apiFetch(refSources.kelurahanurl + id + "/kode", 'GET');
        console.log(res);
        if(typeof res.data == 'object') {
            this.data.namaKelurahan = res.data.data.nama;
        } else {
            console.log("data kelurahan tidak ditemukan");
        }
    }
    this.$forceUpdate();
}

async function submitCetak() {
	console.log("masuk cetak");

    resXls = await apiFetch(refSources.submitCetak, 'PATCH', this.data);
    console.log(resXls);
    
    this.$forceUpdate();
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

