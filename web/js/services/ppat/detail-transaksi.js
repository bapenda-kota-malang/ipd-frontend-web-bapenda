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
	verifikasiValidasiBphtb,
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

async function created() {
	await new Promise(resolve => setTimeout(resolve, 150))
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