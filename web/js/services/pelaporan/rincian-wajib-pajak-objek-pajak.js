data = {
  tanggalAwal: null,
  tanggalAkhir: null,
  golongan: null,
  golonganList: [
    { id: '-', text: '-' },
    { id: 'badan', text: 'Badan' },
    { id: 'pribadi', text: 'Pribadi' },
  ],
  pajak: null,
  pajakList: []
}

vars = {}

urls = {
  jenisUsaha: '/jenisusaha'
}

components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

methods = {
  onPrint: function() {
    console.log(this.data)
  },
  onBack: () => {
    location.href = '/'
  }
}

async function mounted(xthis) {
  await new Promise((resolve) => setTimeout(resolve, 250))
  let res = await apiFetch(urls.jenisUsaha, 'GET')
  if (!res.success) {
    const dataServer = res.data
    console.log(dataServer)
  } 
  const data = xthis.data
  const dateCurrent = new Date()
  const dateAfter = new Date()
  dateAfter.setDate(dateCurrent.getDate() + 1)
  data.tanggalAwal = dateCurrent
  data.tanggalAkhir = dateAfter
  data.golongan = '-'
  xthis.$forceUpdate()
}
