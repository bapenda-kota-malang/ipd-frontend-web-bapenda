data = {
	ppat: null,
	bulan: null,
	tahun: null,
	lists: [],
  	namaPpat: 'PPAT01',
	periode: '1 Februari 2023 - 31 Februari 2023'
}

urls = {
	pathname: '/',
	dataPath: '/ppat-transaksi/',
	dataSrc: '/ppat-transaksi/'
}
refSources = {
	detailTransPPAT:'/ppat-transaksi-detail?',
}

vars = {
	filter: "",
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
	res = await apiFetch(refSources.detailTransPPAT + this.filter, 'GET');
	console.log(res.data.data)
	if(typeof res.data == 'object') {
		data.lists = res.data.data?.map((item) => {
			item.nop = item.permohonanProvinsiID + "." + item.permohonanKotaID  + "." + item.permohonanKecamatanID + "." + item.permohonanKelurahanID + "." + item.permohonanBlokID + "." + item.noUrutPemohon + "." + item.pemohonJenisOPID
			// item.nominalNjop = item.nominalNjop === null ? '' : toRupiah(item.nominalNjop, {formal: false, dot: '.'})
			// item.harga = item.harga === null  ? '' : toRupiah(item.harga, {formal: false, dot: '.'})
			// item.nominalBhptb = item.nominalBhptb === null  ? '' : toRupiah(item.nominalBhptb, {formal: false, dot: '.'})

			// item.jenisTransaksi = "" ? '' : GetValue(jenisTransaksis, item.jenisTransaksi).then( value => item.jenisTransaksi = value)
			// item.jenisHak = "" ? '' : GetValue(jenisHaks, item.jenisHak).then( value => item.jenisHak = value)
			// item.statusSspd = "" ? '' : GetValue(statusSspds, item.statusSspd).then( value => item.statusSspd = value)
			// item.tanggalPengajuan = item.tanggalPengajuan === null ? '' : Date(item.tanggalPengajuan.substr(0,10))
			// item.tanggalJatuhTempo = item.tanggalJatuhTempo === null ? '' : Date(item.tanggalJatuhTempo.substr(0,10))
			return item
		})
		// $forceUpdate();
	} else {
		console.log("data sptpd tidak ditemukan");
	}
}

async function created() {
	await new Promise(resolve => setTimeout(resolve, 150))
    let queryString = window.location.search;
    let urlParams = new URLSearchParams(queryString);
	if( urlParams.has('ppat_id') ){
        data.ppat = urlParams.get('ppat_id');
    }
	if( urlParams.has('bulan') ){
        data.bulan = urlParams.get('bulan');
    }
	if( urlParams.has('tahun') ){
        data.tahun = urlParams.get('tahun');
    }

	await getDetailPPAT();
}