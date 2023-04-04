data = {
	months: [],
	lists: [],
	ppats:[],
	dummies: [
		{ id: 1, nama: 'PPAT 0001', tanggal: '31-02-2022', jumlahTransaksi: 5, nominalTransaksi: 1000000000, nominalBphtb: 50000000, status: 'verified' },
		{ id: 2, nama: 'PPAT 0002', tanggal: '31-02-2022', jumlahTransaksi: 5, nominalTransaksi: 59000000, nominalBphtb: 0, status: 'notverified' },
		{ id: 3, nama: 'PPAT 0003', tanggal: '31-02-2022', jumlahTransaksi: 0, nominalTransaksi: 0, nominalBphtb: 0, status: 'verified' },
		{ id: 4, nama: 'PPAT 0004', tanggal: null, jumlahTransaksi: 0, nominalTransaksi: 0, nominalBphtb: 0, status: 'notverified' },
	]
}

urls = {
	pathname: '/',
	dataPath: '/ppat-laporan',
	dataSrc: '/ppat-laporan'
}
refSources = {
	listLapPPAT:'/ppat-laporan?',
}

vars = {
	verifikasiValidasiBphtb,
	total: {
		jumlahTransaksiText: 0,
		nominalTransaksiText: 0,
		nominalBphtbText: 0,
	},
	filter: "",
}

components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

methods = {
	getListLapPPAT,
	getPPAT,
	getList: () => {}
}

async function getPPAT() {
	res = await apiFetch(refSources.listLapPPAT, 'GET');
	// console.log(res.data.data)
	if(typeof res.data == 'object') {
		data.ppats = res.data.data?.map((item) => {
			item.id = item.ppat_id
			item.nama = item.ppat_name === null ? "PPAT-" + item.ppat_id : item.ppat_name
			return item
		})
	} else {
		console.log("data sptpd tidak ditemukan");
	}
}

async function getListLapPPAT() {
	console.log("masuk")
	this.filter = "";
	if (data.bulan.id != null) {
		this.filter = this.filter == ""? this.filter + "bulan="+data.bulan.id : this.filter + "&bulan="+data.bulan.id;
	}
	if (data.tahun != null) {
		this.filter = this.filter == ""? this.filter + "tahun="+data.tahun.getFullYear() : this.filter + "&tahun="+data.tahun.getFullYear();
	}
	if (data.ppat != null) {
		this.filter = this.filter == ""? this.filter + "ppat_id="+data.ppat : this.filter + "&ppat_id="+data.ppat;
	}
	console.log(this.filter)
	res = await apiFetch(refSources.listLapPPAT + this.filter, 'GET');
	console.log(res.data.data)
	if(typeof res.data == 'object') {
		data.lists = res.data.data?.map((item) => {
			item.id = item.ppat_id
			item.nama = item.ppat_name === null ? "PPAT-" + item.ppat_id : item.ppat_name
			item.tanggalText = item.tglLapor  === null ? item.tglLapor : 'TIDAK ADA LAPORAN'
			item.jumlahTransaksiText = item.sptpd_id === null ? '-' : parseInt(item.sptpd_id, 10)
			item.nominalTransaksiText = item.nilaiOp === null ? '-' : toRupiah(item.nilaiOp, {formal: false, dot: '.'})
			item.nominalBphtbText = item.jumlahSetor === null ? '-' : toRupiah(item.jumlahSetor, {formal: false, dot: '.'})
			item.statusText = item.status === null ? '-' : GetValue(this.verifikasiValidasiBphtb, item.status).then( value => item.statusSspd = value)
			item.nilaiOp = item.nilaiOp === 0 ? '-' : item.nilaiOp
			item.jumlahSetor = item.jumlahSetor === 0 ? '-' : item.jumlahSetor
			item.filter = this.filter
			return item
		})
		// $forceUpdate();
	} else {
		console.log("data sptpd tidak ditemukan");
	}
}

async function mounted() {
	await new Promise(resolve => setTimeout(resolve, 150))
	data.months = months;
	await getPPAT();
	await getListLapPPAT();
	console.log("list: ");
	console.log(data.lists);
	for(let i = 0; i < data.lists.length; i++){
		this.total.jumlahTransaksiText = this.total.jumlahTransaksiText + data.lists[i].jumlahTransaksiText;
		this.total.nominalTransaksiText = data.lists[i].nilaiOp === '-' ? this.total.nominalTransaksiText : this.total.nominalTransaksiText + parseInt(data.lists[i].nilaiOp, 10);
		this.total.nominalBphtbText = data.lists[i].jumlahSetor === '-' ? this.total.nominalBphtbText : this.total.nominalBphtbText + parseInt(data.lists[i].jumlahSetor, 10);
	}
	this.total.nominalTransaksiText =  toRupiah(this.total.nominalTransaksiText, {formal: false, dot: '.'})
	this.total.nominalBphtbText =  toRupiah(this.total.nominalBphtbText, {formal: false, dot: '.'})
	console.log(data.total);
}