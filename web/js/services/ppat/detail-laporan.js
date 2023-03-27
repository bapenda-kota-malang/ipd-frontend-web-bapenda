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
	data.lists = []
  data.months = months
	if (isDummy) {
		for (let i = 0; i < 5; i++) {
      data.lists.push(data.dummies[0])
    } 
	}
}