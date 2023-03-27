data = {
	months: [],
	lists: [],
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

vars = {}

components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

methods = {
	getList: () => {}
}

async function mounted() {
	await new Promise(resolve => setTimeout(resolve, 150))
	const isDummy = true
	data.months = months
	if (isDummy) {
		data.lists = data.dummies?.map((item) => {
			item.tanggalText = item.tanggal || 'TIDAK ADA LAPORAN'
			item.jumlahTransaksiText = item.jumlahTransaksi === 0 ? '-' : item.jumlahTransaksi
			item.nominalTransaksiText = item.nominalTransaksi === 0 ? '-' : item.nominalTransaksi
			item.nominalBphtbText = item.nominalBphtb === 0 ? '-' : item.nominalBphtb
			return item
		})
	}
}