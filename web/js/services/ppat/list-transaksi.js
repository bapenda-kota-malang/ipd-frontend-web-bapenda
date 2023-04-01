data = {
	months: [],
	lists: [],
	ppats:[],
	dummies: [
		{ id: 1, nama: 'PPAT 0001', tanggal: '31-02-2022', jumlahTransaksi: 5, nominalTransaksi: 1000000000, nominalBphtb: 50000000 },
		{ id: 2, nama: 'PPAT 0002', tanggal: '31-02-2022', jumlahTransaksi: 5, nominalTransaksi: 59000000, nominalBphtb: 0 },
		{ id: 3, nama: 'PPAT 0003', tanggal: '31-02-2022', jumlahTransaksi: 0, nominalTransaksi: 0, nominalBphtb: 0 }
	]
}

urls = {
	pathname: '/',
	dataPath: '/ppat',
	dataSrc: '/ppat'
}
refSources = {
	listTransPPAT:'/ppat-transaksi?',
}

vars = {
	total: {
		jumlahTransaksiText: 0,
		jumlahSetorText: 0,
		nominalTransaksiText: 0,
		nominalBphtbText: 0,
	},
}

components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

methods = {
	getListPPAT,
	getPPAT,
	getList: () => {}
}

async function getPPAT() {
	res = await apiFetch(refSources.listTransPPAT, 'GET');
	// console.log(res.data.data)
	if(typeof res.data == 'object') {
		data.ppats = res.data.data?.map((item) => {
			item.id = item.ppat_id
			item.nama = item.ppat_name === null ? "PPAT-" + item.ppat_id : item.ppat_name
			return item
		})
	} else {
		console.log("data wppbb tidak ditemukan");
	}
}

async function getListPPAT() {
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
			item.id = item.ppat_id
			item.nama = item.ppat_name === null ? "PPAT-" + item.ppat_id : item.ppat_name
			item.jumlahTransaksiText = item.sptpd_id === null ? '-' : parseInt(item.sptpd_id, 10)
			item.jumlahSetorText = item.countJumlahSetor === null ? '-' : parseInt(item.countJumlahSetor, 10)
			item.nominalTransaksiText = item.nilaiOp === null ? '-' : toRupiah(item.nilaiOp, {formal: false, dot: '.'})
			item.nominalBphtbText = item.jumlahSetor === null ? '-' : toRupiah(item.jumlahSetor, {formal: false, dot: '.'})
			item.nilaiOp = item.nilaiOp === 0 ? '-' : item.nilaiOp
			item.jumlahSetor = item.jumlahSetor === 0 ? '-' : item.jumlahSetor
			return item
		})
		// $forceUpdate();
	} else {
		console.log("data wppbb tidak ditemukan");
	}
}

async function created() {
	await new Promise(resolve => setTimeout(resolve, 150))
	// const isDummy = true
	data.months = months;
	await getPPAT();
	await getListPPAT();
	console.log("list: ");
	console.log(data.lists);
	for(let i = 0; i < data.lists.length; i++){
		this.total.jumlahTransaksiText = this.total.jumlahTransaksiText + data.lists[i].jumlahTransaksiText;
		this.total.jumlahSetorText = this.total.jumlahSetorText + data.lists[i].jumlahSetorText;
		this.total.nominalTransaksiText = data.lists[i].nilaiOp === '-' ? this.total.nominalTransaksiText : this.total.nominalTransaksiText + parseInt(data.lists[i].nilaiOp, 10);
		this.total.nominalBphtbText = data.lists[i].jumlahSetor === '-' ? this.total.nominalBphtbText : this.total.nominalBphtbText + parseInt(data.lists[i].jumlahSetor, 10);
	}
	this.total.nominalTransaksiText =  toRupiah(this.total.nominalTransaksiText, {formal: false, dot: '.'})
	this.total.nominalBphtbText =  toRupiah(this.total.nominalBphtbText, {formal: false, dot: '.'})
	console.log(data.total);
}