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
		this.filter = this.filter == ""? this.filter + "bulan="+data.bulan : this.filter + "&bulan="+data.bulan;
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
			item.nop = item.permohonanProvinsiID + "." + item.permohonanKotaID  + "." + item.permohonanKecamatanID + "." + item.permohonanKelurahanID + "." + item.permohonanBlokID + "." + item.noUrutPemohon + "." + item.pemohonJenisOPID

			item.nominalNjop = item.NjopPbbOp === null ? '' : item.NjopPbbOp
			item.harga = item.nilaiOp === null  ? '' : item.nilaiOp
			item.nominalBhptb = item.jumlahSetor === null  ? '' : item.jumlahSetor

			item.jenisTransaksi = "" ? '' : GetValue(jenisPerolehans, item.jenisPerolehanOp).then( value => item.jenisTransaksi = value)
			// item.jenisHak = "" ? '' : GetValue(jenisHaks, item.jenisHak).then( value => item.jenisHak = value)
			item.statusSspd = item.status === null ? '' : GetValue(this.verifikasiValidasiBphtb, item.status).then( value => item.statusSspd = value)

			item.tanggalPengajuan = item.tanggal === null ? '' : item.tanggal.substr(0,10)
			item.tanggalJatuhTempo = item.tglExpBilling === null ? '' : item.tglExpBilling.substr(0,10)
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