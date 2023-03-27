data = {
	lists: [],
  namaPpat: 'PPAT01',
	periode: '1 Februari 2023 - 31 Februari 2023',
	dummies: [
		{ 
      id: '123456', letakTanah: 'Jl Candi', tanah: 100, bangunan: 80, 
      nop: '35.73.040.010.005.0087.0', nominalNjop: '400000000', harga: '400000000', nominalBhptb: '20000000', namaWp: 'Supeno', alamatWp: 'Jl Candi', 
      jenisTransaksi: 'Jual Beli', jenisHak: 'SHM', noSSPD: '29.10.2022.4000.000', 
      tanggalPengajuan: '10-02-2022',  tanggalJatuhTempo: '24-02-2022', nominalSspd: '20000000', statusSspd: 'Validasi'
    }
	]
}

urls = {
	pathname: '/',
	dataPath: '/ppat',
	dataSrc: '/ppat'
}

vars = {}

methods = {
	getList: () => {}
}


async function mounted() {
	await new Promise(resolve => setTimeout(resolve, 150))
	const isDummy = true
	data.lists = []
  if (isDummy) {
		for (let i = 0; i < 3; i++) {
      data.lists.push(data.dummies[0])
    } 
	}
}