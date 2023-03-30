data = {}

vars = {}

urls = {
  sptpd: '/sptpd',
  skpd: '/skpd'
}

methods = {
  onHandleModal,
  onHandleModalClose,
  onAfterSearchText,
  onSearchText
}

components = {
  datepicker: DatePicker
}

let timeoutSearch = null

async function getSkpdById(code) {
  let output = null
  let res = await apiFetch(urls.sptpd + '/' +  code, 'GET')
  if (!res.success) {
    res = await apiFetch(urls.skpd + '/' +  code, 'GET') 
  } 
  if (res.success) {
    output = res.data?.data
  }
  return output
}

function onAfterSearchText(self, data) {
  self.data.npwpd = data?.npwpd?.npwpd || ''
  self.data.jenisUsaha = data?.rekening?.jenisUsaha || ''
  self.data.namaUsaha = data?.objekPajak?.nama || ''
  self.data.alamatUsaha = (data?.objekPajak?.alamat || '' + ' ' + data?.objekPajak?.rtRw).trim()
  self.data.kelurahan = data?.objekPajak?.kelurahan?.nama || ''
  self.data.kecamatan = data?.objekPajak?.kecamatan?.nama || ''
  self.data.tanggal = dateFormat(new Date(data.tanggalSpt), ['d', 'm', 'y', '/'])
  self.data.periodeAwal = dateFormat(new Date(data.periodeAwal), ['d', 'm', 'y', '/'])
  self.data.periodeAkhir = dateFormat(new Date(data.periodeAkhir), ['d', 'm', 'y', '/'])
  self.data.jatuhTempo = dateFormat(new Date(data.jatuhTempo), ['d', 'm', 'y', '/'])
  self.data.potensi = data?.omset || '0'
  self.data.jumlahPajak = data?.jumlahPajak || '0'
}

function onSearchText() {
  const uuidMax = 36
  const self = this
  let code = this.data.skpd || ''
  clearTimeout(timeoutSearch)
  if (code.length < uuidMax) return
  timeoutSearch = setTimeout(async () => {
    const result = await getSkpdById(code)
    if (!result) {
      alert('Data tidak ditemukan')
    } else {
      onAfterSearchText(self, result)
    }
    self.$forceUpdate();
    console.log(result)
  }, 500);
}