data = {...nirs};
vars = {
    jabatan_id: null,
    user_name: null,
    user_id: null,
    nip: null,
    noDokMessage: null,
    options:['test', 'ok'],
}
urls = {
	preSubmit: '/datanir',
	postSubmit: '/pendataan/znt/perubahan-nir',
	submit: '/datanir/bulk',
	dataSrc: '/datanir',
}
refSources = {
	propinsiurl: "/provinsi/",
	dati2url: "/daerah/",
	kecamatanurl: "/kecamatan/",
	kelurahanurl: "/kelurahan/",

    submitProcess:'/datanir/bulk',
    loadBlok:'/datanir?',
    getDokument:'/datanir-dokument/',
	doneProcess: '/pendataan/znt/perubahan-nir',
}
methods = {
	propinsiChanged,
	dati2Changed,
	kecamatanChanged,
	kelurahanChanged,
    noDokumentChanged,
    newValue,
    hapusZnt,
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

    xthis.data.nipPendataan = xthis.nip;
    xthis.data.nipPemeriksaan = xthis.nip;
    xthis.data.tglPendataan = new Date();
    xthis.data.tglPemeriksaan = new Date();
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

async function noDokumentChanged(event) {
	id = event.target.value

    if (event.target.value.length > 11) {
        this.noDokMessage = "No Dokumen melebihi 11 digit.";
        this.data.datas = null;
        this.data.datas = [];
    } else if (event.target.value.length == 11) {
        this.noDokMessage = null;
        res = await apiFetch(refSources.getDokument + id , 'GET');
        console.log(res)
        if(typeof res.data == 'object') {
            if (id == res.data.data.noDokumen) {
                event.target.value = null;
                this.noDokMessage = "No Dokumen telah digunakan.";
                this.data.datas = null;
                this.data.datas = [];
            }
        } else {
            resBlok = await apiFetch(refSources.loadBlok + setQueryParam(this.data) + "&no_pagination=true", 'GET');
            if(typeof resBlok.data == 'object') {
                bloks = resBlok.data.data;
                console.log(bloks);
                this.data.datas = null;
                this.data.datas = [];
                for (var blok of bloks) {
                    var tempBlok = tempdatas;
                    tempBlok = {
                        id: blok.id,
                        znt_kode: blok.znt_kode,
                        nir: blok.nir,
                    }
                    this.data.datas.push(tempBlok);
                }
                var tempBlok = tempdatas;
                tempBlok = {
                    id: null,
                    znt_kode: null,
                    nir: 0,
                }
                this.data.datas.push(tempBlok);
            } else {
                console.log("data ZNT tidak ditemukan");
            }
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
                znt_kode: null,
                nir: 0,
            }
            this.data.datas.push(tempBlok);
        }
    }
    this.$forceUpdate();
}

async function hapusZnt(idx) {
    console.log("masuk hapus")
    this.data.datas.splice(idx,1);
    this.$forceUpdate();
}

function preSubmit(xthis) {
	data = xthis.data;

    data.tahun = data.tahun.toString();
    // need to re-check
    data.jenisDokumen = '1';
    data.kanwil_id = data.provinsi_kode;
    data.kpbb_id = data.daerah_kode;

    for(const item of data.datas) {
        item.nir = parseFloat(item.nir);
    }

    lenDatas = data.datas.length - 1;
	if (data.datas[lenDatas].znt_kode == null || data.datas[lenDatas].znt_kode == "") {
        data.datas.pop();
    }
	
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

