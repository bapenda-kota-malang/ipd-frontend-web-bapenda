data = {
  tanggalAwal: null,
  tanggalAkhir: null,
  report: null,
  reports: [
    { id: 'hari', text: 'Harian' },
    { id: 'bulan', text: 'Bulanan' },
    { id: 'tahun', text: 'Tahunan' },
  ]
}

vars = {}

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
  const data = xthis.data
  const dateCurrent = new Date()
  const dateAfter = new Date()
  dateAfter.setDate(dateCurrent.getDate() + 1)
  data.tanggalAwal = dateCurrent
  data.tanggalAkhir = dateAfter
  data.report = 'hari'
  xthis.$forceUpdate()
}
