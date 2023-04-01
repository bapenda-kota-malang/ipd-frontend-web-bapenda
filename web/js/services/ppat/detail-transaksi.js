data = {
	lists: [],
  	namaPpat: 'PPAT01',
	periode: '1 Februari 2023 - 31 Februari 2023'
}

urls = {
	pathname: '/',
	dataPath: '/ppat',
	dataSrc: '/ppat'
}
refSources = {
	detailTransPPAT:'/ppat-transaksi/',
}

vars = {}

methods = {
	getDetailPPAT,
	getList: () => {}
}


async function getDetailPPAT() {
	console.log("masuk")
	filter = "";
	if (data.bulan != null) {
		filter = filter == ""? "bulan="+data.bulan : "&bulan="+data.bulan;
	}
	if (data.tahun != null) {
		filter = filter == ""? "tahun="+data.tahun : "&tahun="+data.tahun;
	}
	if (data.ppat != null) {
		filter = filter == ""? "ppat_id="+data.ppat : "&ppat_id="+data.ppat;
	}
	console.log(filter)
	res = await apiFetch(refSources.listTransPPAT + filter, 'GET');
	console.log(res.data.data)
	if(typeof res.data == 'object') {
		data.lists = res.data.data?.map((item) => {
			item.nop = item.permohonanProvinsiID + item.permohonanProvinsiID + item.permohonanProvinsiID;
			item.letakTanah = "" ? '' : '';
			item.namaWp = "" ? '' : '';
			item.alamatWp = "" ? '' : '';
			item.tanah = "" ? '' : '';
			item.bangunan = "" ? '' : '';
			item.nominalNjop = "" ? '' : '';
			item.harga = "" ? '' : '';
			item.nominalBhptb = "" ? '' : '';
			item.jenisTransaksi = "" ? '' : '';
			item.jenisHak = "" ? '' : '';
			item.tanggalPengajuan = "" ? '' : '';
			item.statusSspd = "" ? '' : '';
			item.tanggalJatuhTempo = "" ? '' : '';
			return item
		})
		// $forceUpdate();
	} else {
		console.log("data wppbb tidak ditemukan");
	}
}

async function created() {
	await new Promise(resolve => setTimeout(resolve, 150))
	await getDetailPPAT();
}