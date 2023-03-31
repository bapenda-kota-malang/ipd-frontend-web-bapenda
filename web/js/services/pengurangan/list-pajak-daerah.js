urls = {
	pathname: '/pengurangan',
	dataPath: '/pengurangan',
	dataSrc: '/pengurangan'
}

vars = {}

function postDataFetch(data) {
	data.forEach((item) => {
    item.display = {
      tanggal: dateFormat(new Date(item.tanggalPengajuan), ['d', 'm', 'y', '/']),
      omset: toRupiah(Number(item.spt?.omset || 0), { symbol: false }),
      jumlahPajak: toRupiah(Number(item.spt?.jumlahPajak || 0), { symbol: true })
    }
  })
}
