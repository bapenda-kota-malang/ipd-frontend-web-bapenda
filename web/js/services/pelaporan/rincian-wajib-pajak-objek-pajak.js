data = {
  tanggalAwal: null,
  tanggalAkhir: null,
  golongan: null,
  golonganList: [
    { id: '-', text: '-' },
    { id: 'badan', text: 'Badan' },
    { id: 'pribadi', text: 'Pribadi' },
  ]
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
    console.log(res.data)
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
