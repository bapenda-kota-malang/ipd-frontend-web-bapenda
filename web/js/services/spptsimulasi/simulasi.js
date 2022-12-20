data = {...nopspptsimulasi};
vars = {
    jumlahOP: null,
    opKe: null,
    blokKe: null,
    urutKe: null,
    jnsKe: null,
    bukuValues,
    njopTKPs,
	options:['test', 'ok'],
}
urls = {
	preSubmit: '/sppt-simulasi',
	postSubmit: '/sppt-simulasi',
	submit: '/sppt-simulasi/{id}/{kd}',
	dataSrc: '/sppt-simulasi',
}
refSources = {
	propinsiurl: "/provinsi/",
	dati2url: "/daerah/",
	kecamatanurl: "/kecamatan/",
	kelurahanurl: "/kelurahan/",
    alamatTanah: "/kelastanah-kode/",
    alamatBangunan: "/kelasbangunan-kode/",
	imageUrl: '/static/img/',
	submitCetak:'/sppt-simulasi/{id}/cetak',
	submitProcess:'/spptsimulasi-process',
    processCreate:'/sppt-simulasi',
	doneProcess: '/penetapan/simulasi-penetapan-massal-pbb',
}
methods = {
	propinsiChanged,
	dati2Changed,
	kecamatanChanged,
	kelurahanChanged,
	submitCetak,
	submitProcess,
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
	id = this.data.provinsiID + event.target.value
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
    id = this.data.provinsiID + this.data.kotaID + event.target.value

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
	id = this.data.provinsiID + this.data.kotaID + this.data.kecamatanID + event.target.value

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

async function submitCetak(id, xthis) {
	res = await apiFetch(refSources.submitCetak + id, 'GET');
	console.log(res)
}

async function submitProcess(data) {
    console.log("process")
    console.log(data)
    var sppt = null;
	res = await apiFetch(refSources.submitProcess + '/sppt', 'POST', data);
    if(typeof res.data == 'object') {
        sppt = res.data.data;
        this.jumlahOP = sppt.length;
        i = 1;
        for (const item of sppt) {
            this.opKe = i;
            this.blokKe = item.blok_Id;
            this.urutKe = item.noUrut;
            this.jnsKe = item.jenisOP_Id;
    
            resTanah = await apiFetch(refSources.alamatTanah + item.kelasTanah_Id, 'GET', item);
            if(typeof resTanah.data == 'object') {
                tanah = resTanah.data.data;
                this.data.njopBumi_sppt = (tanah.nilaiPerM2Tanah * 1000) * this.data.luasBumi_sppt;
            } else {
                console.log("data kelas tanah tidak ditemukan");
            }
            
            resBangunan = await apiFetch(refSources.alamatBangunan + item.kelasBangunan_Id, 'GET', item);
            if(typeof resBangunan.data == 'object') {
                bangunan = resBangunan.data.data;
                this.data.njopBangunan_sppt = (bangunan.nilaiPerM2Tanah * 1000) * this.data.luasBangunan_sppt;
            } else {
                console.log("data kelas bangunan tidak ditemukan");
            }
            
            this.data.njop_sppt = this.data.njopBumi_sppt + this.data.njopBangunan_sppt;

            
            item.njopBangunan_sppt = this.data.njopBangunan_sppt;
            item.njopBumi_sppt = this.data.njopBumi_sppt;
            item.njop_sppt = this.data.njop_sppt;

            for (const njopTKP of njopTKPs) {
                if ((njopTKP.awal <= this.data.tahunPajak) || (njopTKP.akhir >= this.data.tahunPajak)) {
                    item.njopTKP_sppt = njopTKP.nilai;
                    item.njKPskp_sppt = item.njop_sppt - item.njopTKP_sppt;
                    break;
                }
            }

            for (const tarif of tarifs) {
                if ((tarif.awal <= this.data.tahunPajak) || (tarif.akhir >= this.data.tahunPajak)) {
                    item.pbbTerhutang_sppt = (tarifs.nilai * item.njKPskp_sppt) / 100;
                    break;
                }
            }

            // belum ada pengurangan => ambil dari table pengurangan (macem iki sek dowo ceritane.)
            // item.faktorpengurangan_sppt = ???

            item.pbbYgHarusDibayar_sppt = item.pbbTerhutang_sppt - item.faktorpengurangan_sppt;
    
            if (item.njop_sppt < bukuValues[0]) {
                item.tanggalJatuhTempo_sppt = this.data.bukuJatuhTempo[0];
                item.tanggalTerbit_sppt = this.data.bukuTerbit[0];
            } else if (item.njop_sppt < bukuValues[1]) {
                item.tanggalJatuhTempo_sppt = this.data.bukuJatuhTempo[1];
                item.tanggalTerbit_sppt = this.data.bukuTerbit[1];
            } else if (item.njop_sppt < bukuValues[2]) {
                item.tanggalJatuhTempo_sppt = this.data.bukuJatuhTempo[2];
                item.tanggalTerbit_sppt = this.data.bukuTerbit[2];
            } else if (item.njop_sppt < bukuValues[3]) {
                item.tanggalJatuhTempo_sppt = this.data.bukuJatuhTempo[3];
                item.tanggalTerbit_sppt = this.data.bukuTerbit[3];
            } else if (item.njop_sppt < bukuValues[4]) {
                item.tanggalJatuhTempo_sppt = this.data.bukuJatuhTempo[4];
                item.tanggalTerbit_sppt = this.data.bukuTerbit[4];
            }

            item.tahunPajakskp_sppt = this.data.tahunPajak;
            res = await apiFetch(refSources.processCreate, 'POST', item);
            i += 1;
            this.$forceUpdate();
        }
    } else {
        console.log("data sppt tidak ditemukan");
    }
    
    console.log("process done")
	console.log(sppt)
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

