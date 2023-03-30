data = {}

vars = {}

urls = {
  sptpd: '/sptpd',
  skpd: '/skpd'
}

methods = {
  onClickAttach,
  onHandleAttach,
  onHandleModal,
  onHandleModalClose,
  onAfterSearchText,
  onSearchText
}

components = {
  vueselect: VueSelect.VueSelect,
  datepicker: DatePicker
}

let timeoutSearch = null

if (onBack) methods.onBack = onBack
if (onSave) methods.onSave = function () {
  onSave('/', this.data)
}

function onClickAttach(attachId) {
  if (attachId) this.data.attachId = attachId
  const fileElement = document.querySelector(`input[name="myFile"]`)
	if (fileElement) {
		fileElement.value = null
		fileElement.click()
	}
}

function onHandleAttach(event) {
  const inputs = event?.target || null
	const files = inputs?.files || null
	if (!inputs || !files) return
	const file = files.length > 0 ? files[0] : null
  console.log(this.data.attachId)
  console.log(file.name)
	if (!file) return
  const reader = new FileReader()
  reader.readAsDataURL(file)
  reader.onload = (e) => {
    let result = e.target.result
    console.log(result)
  }
}

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
