data = {
	months: [],
	lists: [],
	dummies: [
		{ 
      id: '123', tanggalAkta: '12/02/2022', letakTanah: 'Jl Gajayana 13 Kelurahan Sumbersari Kecamatan Lowokwaru Kota Malang', tanah: 100, bangunan: 80, 
      nop: '35.73.040.010.005.0087.0', nominalNjop: '400000000', harga: '400000000', pihak1: 'Cipto Mangunbroto', pihak2: 'Supeno',
      tanggalSsp: '10/30/2022', nominalSsp: '20000000', bentukHukum: 'Jual Beli', jenisHak: 'SHM 34 1998', noSSPD: '29.10.2022.4000.000', 
      tanggalSspd: '10/29/2022', nominalSspd: '20000000'
    }
	]
}

urls = {
	pathname: '/',
	dataPath: '/ppat-laporan/',
	dataSrc: '/ppat-laporan/'
}
refSources = {
	detailLapPPAT:'/ppat-laporan-detail?',
	pathname: '/penetapan/verifikasi-e-bphtb/'
}

vars = {
	verifikasiValidasiBphtb,
	filter: "",
}

components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

methods = {
	getDetailPPAT,
	getList: () => {}
}

async function getDetailPPAT() {
	console.log("masuk")
	this.filter = ""
	if (data.bulan != null) {
		this.filter = this.filter == ""? this.filter + "bulan="+data.bulan.id : this.filter + "&bulan="+data.bulan.id;
	}
	if (data.tahun != null) {
		this.filter = this.filter == ""? this.filter + "tahun="+data.tahun : this.filter + "&tahun="+data.tahun;
	}
	if (data.ppat != null) {
		this.filter = this.filter == ""? this.filter + "ppat_id="+data.ppat : this.filter + "&ppat_id="+data.ppat;
	}
	console.log(this.filter)
	res = await apiFetch(refSources.detailLapPPAT + this.filter, 'GET');
	console.log(res.data.data)
	if(typeof res.data == 'object') {
		data.namaPpat = res.data.meta.name
		data.periode = res.data.meta.start.substr(0,10) + " - " + res.data.meta.end.substr(0,10)
		data.lists = res.data.data?.map((item) => {
			item.tanggalAkta = item.tglAkta === null  ? '' : item.tglAkta.substr(0,10)
			item.letakTanah = item.opAlamat === null  ? '' : item.opAlamat
			item.tanah = item.opLuasTanah === null  ? '' : item.opLuasTanah
			item.bangunan = item.opLuasBangunan === null  ? '' : item.opLuasBangunan
			item.pihak1 = item.pihakYgMengalihkan === null ? '' : item.pihakYgMengalihkan
			item.pihak2 = (item.namaWp === null? "" : item.namaWp) + " " + (item.alamat === null? "" : item.alamat) + " " + (item.rtRw === null? "" : item.rtRw) + " " + item.kelurahan_id + " " + item.kecamatan_id + " " + item.kabupaten_id + " " + item.provinsi_id
			item.tanggalSsp = item.tglSSP === null  ? '' : item.tglSSP.substr(0,10)
			item.nominalSsp = item.nominalSSP === null  ? '' : item.nominalSSP
			item.bentukHukum = item.jenisPerolehanOp === null ? '' : GetValue(jenisPerolehans, item.jenisPerolehanOp).then( value => item.jenisTransaksi = value)
			item.jenisHak = ' - ' + item.noSertifikatOp
			item.noSSPD = item.noDokumen === null  ? '' : item.noDokumen
			item.tanggalSspd = item.tanggal === null  ? '' : item.tanggal
			item.nominalSspd = item.jumlahSetor === null  ? '' : item.jumlahSetor
			item.nop = item.permohonanProvinsiID + "." + item.permohonanKotaID  + "." + item.permohonanKecamatanID + "." + item.permohonanKelurahanID + "." + item.permohonanBlokID + "." + item.noUrutPemohon + "." + item.pemohonJenisOPID

			item.nominalNjop = item.NjopPbbOp === null ? '' : item.NjopPbbOp
			return item
		})
		// $forceUpdate();
	} else {
		console.log("data sptpd tidak ditemukan");
	}
}

async function mounted() {
	await new Promise(resolve => setTimeout(resolve, 150))
	data.lists = []
  	data.months = months;
	let queryString = window.location.search;
	let urlParams = new URLSearchParams(queryString);

	data.ppat = location.pathname.split('/')[3];
	if( urlParams.has('bulan') ){
		data.bulan = urlParams.get('bulan');
	}
	if( urlParams.has('tahun') ){
		data.tahun = urlParams.get('tahun');
	}
  
	await getDetailPPAT();
}
