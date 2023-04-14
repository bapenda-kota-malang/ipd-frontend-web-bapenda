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
  const data = xthis.data
  const dateCurrent = new Date()
  const dateAfter = new Date()
  dateAfter.setDate(dateCurrent.getDate() + 1)
  data.tanggalAwal = dateCurrent
  data.tanggalAkhir = dateAfter
  data.golongan = '-'
  data.pajakList = []
  let res = await apiFetch(urls.jenisUsaha, 'GET')
  if (res.success) {
    const dataServer = res?.data?.data
    for (let i = 0; i < dataServer.length; i++) {
      const element = dataServer[i];
      data.pajakList.push({ id: element.id, text: element.uraian })
    }
  } 
  xthis.$forceUpdate()
}
