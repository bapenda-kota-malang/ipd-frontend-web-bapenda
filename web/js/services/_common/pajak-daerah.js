data = { 
  errors: {},
  jenisPengurangan: null,
  jenisPenguranganList: penguranganJenis?.map((item, idx) => ({ id: idx + 1, name: item }) )
}
vars = {}

urls = {
  sptpd: '/sptpd',
  skpd: '/skpd'
}

components = {
  vueselect: VueSelect.VueSelect,
  datepicker: DatePicker
}

let timeoutSearch = null

function onClickAttach(attachId, type) {
  if (attachId) this.data.attachId = attachId
  const fileElement = type === 'image' ? document.querySelector(`input[name="myImage"]`) :  document.querySelector(`input[name="myFile"]`)
	if (fileElement) {
		fileElement.value = null
		fileElement.click()
	}
}

function onClickView(id) {
  const apiHostEl = document.getElementById('apiHost')
  const appToken = document.getElementById('secKey')
  if (apiHostEl && this.data[id]) {
    const type = id === 'fotoKtp' ? 'img' : 'pdf'
    const urlProxy = 'https://cors-get-proxy.sirjosh.workers.dev/?url='
    const urlText = 'http://' + apiHostEl.value + '/static/' + type + '/' + this.data[id]
    fetch(urlText, { headers: { 'Authorization': 'Bearer ' +  appToken.value } } )
      .then((response) => response.blob())
      .then((blob) => {
        var urlResult = window.URL.createObjectURL(blob);
        window.open(urlResult, '_blank').focus(); // window.open + focus
    }).catch((err) => {
      console.log(err);
    })
  }
}

function onHandleAttach(event) {
  const self = this
  const xdata = this.data
  const attachName = xdata?.attachId || null
  const inputs = event?.target || null
	const files = inputs?.files || null
	if (!inputs || !files) return
	const file = files.length > 0 ? files[0] : null
	if (!file) return
  const reader = new FileReader()
  reader.readAsDataURL(file)
  reader.onload = (e) => {
    let result = e.target.result
    if (!attachName) return
    xdata.errors[attachName] = null
    xdata[attachName + 'Raw'] = result
    xdata[attachName + 'Name'] = file.name
    if (self) self.$forceUpdate()
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

function onAfterSearchText(self, data, isDateString = false) {
  self.data.npwpd = data?.npwpd?.npwpd || ''
  self.data.jenisUsaha = data?.rekening?.jenisUsaha || ''
  self.data.namaUsaha = data?.objekPajak?.nama || ''
  self.data.alamatUsaha = (data?.objekPajak?.alamat || '' + ' ' + data?.objekPajak?.rtRw).trim()
  self.data.kelurahan = data?.objekPajak?.kelurahan?.nama || ''
  self.data.kecamatan = data?.objekPajak?.kecamatan?.nama || ''
  self.data.periodeAwal = dateFormat(new Date(data.periodeAwal), ['d', 'm', 'y', '/'])
  self.data.periodeAkhir = dateFormat(new Date(data.periodeAkhir), ['d', 'm', 'y', '/'])
  self.data.jatuhTempo = dateFormat(new Date(data.jatuhTempo), ['d', 'm', 'y', '/'])
  self.data.potensi = data?.omset || '0'
  self.data.jumlahPajak = data?.jumlahPajak || '0'
  if (isDateString) {
    self.data.tanggal = dateFormat(new Date(data.tanggalSpt), ['d', 'm', 'y', '/'])
  } else if (!self.data.tanggal) {
    self.data.tanggal = new Date()
  }
}

function onSearchText() {
  onSearchByCode(this)
}

function onSearchByCode(self, isDateString = false) {
  const uuidMax = 36
  let code = self.data.skpd || ''
  clearTimeout(timeoutSearch)
  if (code.length < uuidMax) return
  timeoutSearch = setTimeout(async () => {
    const result = await getSkpdById(code)
    if (!result) {
      alert('Data tidak ditemukan')
    } else {
      onAfterSearchText(self, result, isDateString)
    }
    self.$forceUpdate()
  }, 500);
}