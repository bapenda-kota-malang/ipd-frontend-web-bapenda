data = {...kunjungan};
vars = {
    typeNoNPWPD: true,
    typeNoNOP: false,
    pegawai,
	options:['test', 'ok'],
}
urls = {
	preSubmit: '/pendataan/kunjungan',
	postSubmit: '/pendataan/kunjungan',
	submit: '/kunjungan/{id}',
	dataSrc: '/kunjungan',
}
refSources = {
	dataNPWPD: '/nop-bynopstr/',
	dataNOP: '/npwpd-byno/',
}
methods = {
    typeOnChange,
    newValue,
    hapusData,
	getData,
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function mounted(xthis) {
	if(!xthis.id) {
		xthis.data.noPelayanan = "AUTO";
	}
	xthis.jabatan_id = document.getElementById('jabatan_id') ? document.getElementById('jabatan_id').value : null;
	xthis.user_name = document.getElementById('user_name') ? document.getElementById('user_name').value : null;
	xthis.user_id = document.getElementById('user_id') ? document.getElementById('user_id').value : null;
    xthis.nip = document.getElementById('nip') ? document.getElementById('nip').value : null;
	console.log(xthis.user_id);

    var tempData = pegawai;
    tempData = {
        nip: xthis.nip,
        nama: xthis.user_name,
        jabatan: xthis.jabatan_id,
    }
    this.data.pegawais.push(tempData);

	xthis.data.tanggalKunjungan = new Date();
}

async function typeOnChange() {
	if (this.typeNoNPWPD == true) {
        this.data.typeNo = "NPWPD";
    } else {
        this.data.typeNo = "NOP";
    }
}

async function getData(event) {
    no = event.target.value;
    if (this.typeNo == "NOP") {
        res = await apiFetch(refSources.dataNOP + no, 'GET');
    } else {
        res = await apiFetch(refSources.dataNPWPD + no, 'GET');
    }

    if(typeof res.data == 'object') {
        xthis.data.jenisOP = res.data.data.jenisOP;
        xthis.data.namaWP = res.data.data.namaWP;
        xthis.data.alamatWP = res.data.data.alamatWP;
    } else {
        console.log("data wppbb tidak ditemukan");
    }
}

async function newValue() {
    console.log("masuk new value")

    var tempData = pegawai;
    tempData = {
        nip: null,
        nama: null,
        jabatan: 0,
    }
    this.data.pegawais.push(tempData);

    this.$forceUpdate();
}

async function hapusData(idx) {
    console.log("masuk hapus")
    this.data.pegawais.splice(idx,1);
    // update del data
    this.$forceUpdate();
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
	
	data.kanwilId = '35' 
	data.kppbbId = '73'
	
	console.log(data.nip)
}

function postDataFetch(data, xthis) {
	console.log("origin")
	console.log(data)

	if(xthis.id) {
		data.tanggalTerima = data.tanggalTerima ? new Date(data.tanggalTerima.substr(0,10)) : null;
		data.tanggalPermohonan = data.tanggalSuratPermohonan ? new Date(data.tanggalSuratPermohonan.substr(0,10)) : null;
		data.tanggalSelesai = data.pstDetil.tanggalSelesai ? new Date(data.pstDetil.tanggalSelesai.substr(0,10)) : null;
	}

	data.tahunPajak = data.tahunPelayanan;
	
	data.penerimaanBerkasTemp = data.penerimaanBerkas.split(",");
	data.noPelayanan = data.tahunPelayanan + data.bundlePelayanan + data.noUrutPelayanan;
	data.jenisPelayanan = data.bundlePelayanan;
	// GetValue(jenisPelayanans, data.bundlePelayanan).then( value => data.jenisPelayanan = value);
}

