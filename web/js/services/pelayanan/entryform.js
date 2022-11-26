data = {...permohonan};
vars = {
	statusKolektifs,
	jenisPelayanans,
	noPelayananTemp: "0000",
	nopdata: false,
	pengurangan: false,
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
	statusNOP: '/permohonan/statnop?nop=',
	dataNOP: '/permohonan/datanop?nop=',
}
methods = {
	jenisPelayananOnChange,
	getNOP,
	setNOP,
	checkNOP,
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function mounted(xthis) {
	if(!xthis.id) {
		xthis.data.noPelayanan = "AUTO"
	}
}

async function jenisPelayananOnChange(event) {
	if (event.target.value != null) { 
		this.nopdata = true
	} else {
		this.nopdata = false
	}

	if (event.target.value == "0003") {
		this.pengurangan = true
	} else {
		this.pengurangan = false
	}
}

async function getNOP(nop, jp) {
	res = await apiFetch(refSources.dataNOP + nop + "&jp=" + jp, 'GET');
	if(typeof res.data == 'object') {
		return res.data
	} else {
		return nil
	}
}

async function setNOP(nop, jp, xthis) {
	xd = getNOP(nop, jp)
	xthis.namaWP = xd.namaWP;
	xthis.letakOP = xd.letakOP;
	xthis.keterangan = xd.keterangan;
	xthis.tahunPajak = xd.tahunPajak;
	xthis.jenisPengurangan = xd.jenisPengurangan;
	xthis.persentasePengurangan = xd.persentasePengurangan;
}

async function checkNOP(event, jp) {
	console.log("masuk checking nop");
	xthis = this;
	nop = event.target.value; 
	console.log(nop);
	console.log(jp);
	if(nop) {
		res = await apiFetch(refSources.statusNOP + nop + "&jp=" + jp, 'GET');
		console.log("nop url" + refSources.statusNOP + nop + "&jp=" + jp);
		if(typeof res.data == 'object') {
			setNOP(nop, jp, xthis);
		} else {
			console.log("masuk false");
			xthis.nopFound = false;
		}
	} else {
		xthis.nopFound = false;
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
	console.log(data)
	if(xthis.id) {
		data.tanggalTerima = data.tanggalTerima ? new Date(data.tanggalTerima.substr(0,10)) : null;
		data.tanggalSelesai = data.tanggalSelesai ? new Date(data.tanggalSelesai.substr(0,10)) : null;
		data.tanggalPermohonan = data.tanggalSuratPermohonan ? new Date(data.tanggalSuratPermohonan.substr(0,10)) : null;
	}
	console.log(data.penerimaanBerkas)
	data.penerimaanBerkasTemp = data.penerimaanBerkas.split(",")
	data.noPelayanan = data.tahunPelayanan + data.bundlePelayanan + data.noUrutPelayanan
	data.jenisPelayanan = data.bundlePelayanan
	// GetValue(jenisPelayanans, data.bundlePelayanan).then( value => data.jenisPelayanan = value);
}

