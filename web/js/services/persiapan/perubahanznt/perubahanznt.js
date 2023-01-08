data = {...perubahanznt};
vars = {
    maxData: 10,
    jabatan_id: null,
    user_name: null,
    user_id: null,
    nip: null,
    noDokMessage: null,
    datas1:[],
    datas2:[],
    datas3:[],
    datas4:[],
    datas5:[],
    datas6:[],
    zntCodes:[],
    options:['test', 'ok'],
}
urls = {
	preSubmit: '/dataznt',
	postSubmit: '/dataznt',
	submit: '/objekpajakbumi/bulk',
	dataSrc: '/dataznt',
}
refSources = {
	propinsiurl: "/provinsi/",
	dati2url: "/daerah/",
	kecamatanurl: "/kecamatan/",
	kelurahanurl: "/kelurahan/",

    submitProcess:'/datapetaznt/bulk',
    getDokument:'/datanir-dokument/',
    getBumi:'/objekpajakbumi?',
    loadZnt:'/dataznt?',
	doneProcess: '/pendataan/znt/perubahan-znt-massal',
}
methods = {
	propinsiChanged,
	dati2Changed,
	kecamatanChanged,
	kelurahanChanged,
    noUrutChanged,
    noDokumentChanged,
    jnsOpChanged,
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

    for (j=0; j<=6; j++) {
        for (i=0; i<xthis.maxData; i++) {
            var tempData = tempdatas;
            tempData = {
                no_urut: null,
                jns_op: null,
                isNoUrutExist: null,
                isJnsOpExist: null,
                urut: 'urut-' + j + '-',
                jns: 'jns-' + j + '-',
            }
            if (j == 1) {
                xthis.datas1.push(tempData)
            } else if (j == 2) {
                xthis.datas2.push(tempData)
            } else if (j == 3) {
                xthis.datas3.push(tempData)
            } else if (j == 4) {
                xthis.datas4.push(tempData)
            } else if (j == 5) {
                xthis.datas5.push(tempData)
            } else if (j == 6) {
                xthis.datas6.push(tempData)
            }             
        }
    }
        
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
            resBlok = await apiFetch(refSources.loadZnt + setQueryParam(this.data) + "&no_pagination=true", 'GET');
            if(typeof resBlok.data == 'object') {
                this.zntCodes = resBlok.data.data;
                console.log(this.zntCodes);
            }
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
            console.log("data Document tidak ditemukan");
        }
    }
    this.$forceUpdate();
}

async function noUrutChanged(event) {
    console.log("masuk urut")

    id = event.target.id;
    console.log("id: " + id);
    res = await apiFetch(refSources.getBumi + setQueryParam(this.data), 'GET');
    if(typeof res.data == 'object') {
        console.log(res.data.data.noUrut);
    } else {
        // this.data
    }

    this.$forceUpdate();
}

async function jnsOpChanged(event) {
    console.log("masuk jnsop");
    id = event.target.id;
    len6 = this.datas6.length - 1;
    idExp = 'jns-6-'+len6
    console.log(id + " :: " + idExp);
    if (id == idExp){
        for (j=0; j<=6; j++) {
            var tempData = tempdatas;
            tempData = {
                no_urut: null,
                jns_op: null,
                isNoUrutExist: null,
                isJnsOpExist: null,
                urut: 'urut-' + j + '-',
                jns: 'jns-' + j + '-',
            }
            if (j == 1) {
                this.datas1.push(tempData)
            } else if (j == 2) {
                this.datas2.push(tempData)
            } else if (j == 3) {
                this.datas3.push(tempData)
            } else if (j == 4) {
                this.datas4.push(tempData)
            } else if (j == 5) {
                this.datas5.push(tempData)
            } else if (j == 6) {
                this.datas6.push(tempData)
            }   
        }   
    }

    this.$forceUpdate();
}

function preSubmit(xthis) {
	data = xthis.data;

    data.datas = xthis.datas1.concat(xthis.datas2, xthis.datas3, xthis.datas4, xthis.datas5, xthis.datas6);
    console.log(data.datas);
    for (var i = data.datas.length - 1; i >= 0; i--) {
        // console.log(data.datas[i]);
        if (data.datas[i].no_urut == null || data.datas[i].no_urut == "") {
            data.datas.splice(i, 1);
        } 
    }
    console.log(data.datas);
    // need to re-check
    data.jenisDokumen = '1';
    data.kanwil_id = data.provinsi_kode;
    data.kpbb_id = data.daerah_kode;

	console.log("preSubmit");
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

