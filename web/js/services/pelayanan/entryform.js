data = {...permohonan};
vars = {
	statusKolektifs,
	jenisPelayanans,
	noPelayananTemp: "0000",
	nopdata: false,
	pengurangan: false,
	datadetil: null,
	databaru: null,
	datapengurangan: null,
	options:['test', 'ok'],
}
urls = {
	preSubmit: '/pelayanan/data-permohonan',
	postSubmit: '/pelayanan/data-permohonan',
	submit: '/permohonan/{id}',
	dataSrc: '/permohonan',
}
refSources = {
	noPelayanan:'/permohonan/nolayanan/?jp=',
	statusNOP: '/statnop/',
	dataNOP: '/wajibpajakpbb/',
}
methods = {
	jenisPelayananOnChange,
	getNOP,
	checkNOP,
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function mounted(xthis) {
	if(!xthis.id) {
		xthis.data.noPelayanan = "AUTO";
		xthis.data.tahunPajak = new Date().getFullYear().toString();
	}
}

async function jenisPelayananOnChange(event) {
	if (event.target.value != null) { 
		this.nopdata = true;
	} else {
		this.nopdata = false;
	}

	if (event.target.value == "0003") {
		this.pengurangan = true;
	} else {
		this.pengurangan = false;
	}
}

async function getNOP(id, xthis) {
	res = await apiFetch(refSources.dataNOP + id, 'GET');
	console.log(res)
	console.log(res.data.data)
	if(typeof res.data == 'object') {
		xthis.data.namaWP = res.data.data.nama;
		xthis.data.letakOP = res.data.data.alamat;
	} else {
		console.log("data wppbb tidak ditemukan");
	}
}

async function checkNOP(event) {
	console.log("masuk checking nop");
	nop = event.target.value; 
	if(nop) {
		res = await apiFetch(refSources.statusNOP + nop, 'GET');
		if(typeof res.data == 'object') {
			console.log(res.data.data.wajibPajakPBB_Id)
			getNOP(res.data.data.wajibPajakPBB_Id, this);
		} else {
			console.log("masuk false");
		}
	} else {
		console.log("masuk false");
	}
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
	data.penerimaanBerkas = data.penerimaanBerkasTemp.toString()
	data.nip = sessionStorage.getItem("nip") 
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

	data.tahunPajak = data.tahunPelayanan
	
	data.penerimaanBerkasTemp = data.penerimaanBerkas.split(",");
	data.noPelayanan = data.tahunPelayanan + data.bundlePelayanan + data.noUrutPelayanan;
	data.jenisPelayanan = data.bundlePelayanan;
	// GetValue(jenisPelayanans, data.bundlePelayanan).then( value => data.jenisPelayanan = value);
}

