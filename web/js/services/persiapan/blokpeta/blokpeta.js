data = {...blokpeta};
vars = {
    tempdatas,
    options:['test', 'ok'],
}
urls = {
	preSubmit: '/datapetablok',
	postSubmit: '/pendataan/znt/pembuatan-tabel-blok',
	submit: '/datapetablok/bulk',
	dataSrc: '/datapetablok',
}
refSources = {
	propinsiurl: "/provinsi/",
	dati2url: "/daerah/",
	kecamatanurl: "/kecamatan/",
	kelurahanurl: "/kelurahan/",

    submitProcess:'/datapetablok/bulk',
    loadBlok:'/datapetablok?',
	doneProcess: '/pendataan/znt/pembuatan-tabel-blok',
}
methods = {
	propinsiChanged,
	dati2Changed,
	kecamatanChanged,
	kelurahanChanged,
    newValue,
    checkPeta,
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
            console.log(this.data)
            resBlok = await apiFetch(refSources.loadBlok + setQueryParam(this.data) + "&no_pagination=true", 'GET');
            if(typeof resBlok.data == 'object') {
                bloks = resBlok.data.data;
                console.log(bloks);
                this.data.datas = null;
                this.data.datas = [];
                for (var blok of bloks) {
                    var tempBlok = tempdatas;
                    tempBlok = {
                        blok_kode: blok.blok_kode,
                        statusPetaBlok: blok.statusPetaBlok,
                    }
                    if (blok.statusPetaBlok == 1) {
                        tempBlok.isChecked = true;
                    }
                    this.data.datas.push(tempBlok);
                }
                var tempBlok = tempdatas;
                tempBlok = {
                    blok_kode: null,
                    statusPetaBlok: 0,
                    isChecked: false,
                }
                this.data.datas.push(tempBlok);
            } else {
                console.log("data bloks tidak ditemukan");
            }
        } else {
            console.log("data kelurahan tidak ditemukan");
        }
    }
    this.$forceUpdate();
}

async function newValue(event) {
    console.log("masuk new value")
    id = event.target.id
    lenDatas = this.data.datas.length - 1;
    console.log("id: " + id + " - len: " + lenDatas + " val - " + event.target.value.length);
    if (event.target.value.length == 3) { 
        if (id == lenDatas) {
            var tempBlok = tempdatas;
            tempBlok = {
                blok_kode: null,
                statusPetaBlok: 0,
                isChecked: false,
            }
            this.data.datas.push(tempBlok);
        }
    }
    this.$forceUpdate();
}

async function checkPeta(event) {
    // event.target.value = 1
    console.log(event.target.id)
    if (this.data.datas[event.target.id].statusPetaBlok == 0) {
        this.data.datas[event.target.id].statusPetaBlok = 1;
        this.data.datas[event.target.id].isChecked = true;
    } else {
        this.data.datas[event.target.id].statusPetaBlok = 0;
        this.data.datas[event.target.id].isChecked = false;
    }
    this.$forceUpdate();
}

function preSubmit(xthis) {
	console.log("preSubmit") ;
	data = xthis.data;
    console.log(data.datas);
    lenDatas = data.datas.length - 1;
    console.log(data.datas[lenDatas].blok_kode);
	if (data.datas[lenDatas].blok_kode == null || data.datas[lenDatas].blok_kode == "") {
        data.datas.pop();
    }
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

