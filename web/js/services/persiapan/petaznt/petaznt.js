data = {...petaznt};
vars = {
    options:['test', 'ok'],
}
urls = {
	preSubmit: '/datapetaznt',
	postSubmit: '/datapetaznt',
	submit: '/datapetaznt/bulk',
	dataSrc: '/datapetaznt',
}
refSources = {
	propinsiurl: "/provinsi/",
	dati2url: "/daerah/",
	kecamatanurl: "/kecamatan/",
	kelurahanurl: "/kelurahan/",

    submitProcess:'/datapetaznt/bulk',
    loadBlok:'/datapetaznt',
	doneProcess: '/pendataan/znt/pembuatan-tabel-peta-znt',
}
methods = {
	propinsiChanged,
	dati2Changed,
	kecamatanChanged,
	kelurahanChanged,
    blokChanged,
    newValue,
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

    xthis.nipPendataan = xthis.jabatan_id;
    xthis.nipPemeriksaan = xthis.jabatan_id;
    xthis.tanggalPendataan = new Date();
    xthis.tanggalPemeriksaan = new Date();

	console.log(xthis.user_id)
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


async function blokChanged(event) {
	id = event.target.value

	if (event.target.value.length == 3) {
        resBlok = await apiFetch(refSources.loadBlok, 'GET', this.data);
        if(typeof resBlok.data == 'object') {
            bloks = resBlok.data.data;
            console.log(bloks);
            this.data.datas = null;
            this.data.datas = [];
            for (var blok of bloks) {
                var tempBlok = tempdatas;
                tempBlok = {
                    id: blok.id,
                    blok_kode: blok.blok_kode,
                    znt_kode: blok.znt_kode,
                }
                this.data.datas.push(tempBlok);
            }
            var tempBlok = tempdatas;
            tempBlok = {
                id: null,
                blok_kode: null,
                znt_kode: 0,
            }
            this.data.datas.push(tempBlok);
        } else {
            console.log("data bloks tidak ditemukan");
        }
    }
    this.$forceUpdate();
}

async function newValue(event) {
    console.log("masuk new value")
    id = event.target.id
    lenDatas = this.data.datas.length - 1;
    if (event.target.value.length == 3) { 
        if (id == lenDatas) {
            var tempBlok = tempdatas;
            tempBlok = {
                id: null,
                blok_kode: null,
                znt_kode: 0,
            }
            this.data.datas.push(tempBlok);
        }
    }
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

		console.log("jabatan id :" + xthis.jabatan_id);
		console.log("jabatanstaff :" + xthis.jbtStaff);
		console.log("status :" + data.status);

	}	
}

