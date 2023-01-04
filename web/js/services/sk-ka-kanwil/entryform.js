data = {...skkakanwil};
vars = {
    jabatan_id: null,
    user_name: null,
    user_id: null,
    nip: null,
    jenissk,
    options:['test', 'ok'],
}
urls = {
	preSubmit: '/sksk',
	postSubmit: '/pendataan/laporan/sk-ka-kanwil',
	submit: '/sksk',
	dataSrc: '/sksk',
}
refSources = {
	propinsiurl: "/provinsi/",
	dati2url: "/daerah/",
	kecamatanurl: "/kecamatan/",
	kelurahanurl: "/kelurahan/",

    submitCetak: "/sksk/cetak",
}
methods = {
	propinsiChanged,
	dati2Changed,
	kecamatanChanged,
	kelurahanChanged,
    submitCetak,
}

components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function mounted(xthis) {
	if(!xthis.id) {
	}
    // xthis.data.namaPropinsi = 'ngawur';
	xthis.jabatan_id = document.getElementById('jabatan_id') ? document.getElementById('jabatan_id').value : null;
	xthis.user_name = document.getElementById('user_name') ? document.getElementById('user_name').value : null;
	xthis.user_id = document.getElementById('user_id') ? document.getElementById('user_id').value : null;
    xthis.nip = document.getElementById('nip') ? document.getElementById('nip').value : null;
	console.log(xthis.user_id);

    xthis.data.tanggal = new Date();
    xthis.data.tahun = new Date().getFullYear();
    xthis.$forceUpdate();
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
        console.log(res)
        if(typeof res.data == 'object') {
            this.data.namaKelurahan = res.data.data.nama;
        } else {
            console.log("data kelurahan tidak ditemukan");
        }
    }
    this.$forceUpdate();
}

async function submitCetak() {

    data.tahun = data.tahun.toString();
    data.jenis = 'K';
    data.kanwil_id = data.provinsi_kode;
    data.kpbb_id = data.daerah_kode;
    data.tglCetak = new Date();
    data.nipCetak = xthis.nip;
    
    res = await apiFetch(refSources.submitCetak, 'POST');
    console.log(res)
    if(typeof res.data == 'object') {
        console.log(res.data.data);
    } else {
        console.log("data laporan tidak ditemukan");
    }
    this.$forceUpdate();
}

function preSubmit(xthis) {
	data = xthis.data;

    data.tahun = data.tahun.toString();
    data.jenis = 'K';
    data.kanwil_id = data.provinsi_kode;
    data.kpbb_id = data.daerah_kode;
    data.tglCetak = new Date();
    data.nipCetak = xthis.nip;

	console.log("preSubmit") ;
}

function postDataFetch(data, xthis) {
	console.log("origin");
	console.log(data);

	if(xthis.id) {

		console.log("jabatan id :" + xthis.jabatan_id);
		console.log("jabatanstaff :" + xthis.jbtStaff);
		console.log("status :" + data.status);

	}	
}

