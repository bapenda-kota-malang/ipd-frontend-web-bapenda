data = { year: null }

refSources = {
  imageUrl: '/static/img/',
  submitCetak: '/{id}/cetak',
  submitProcess: '/',
  processCreate: '/',
  doneProcess: '/',
}

methods = {
  getList: () => {},
  onSearching
}

components = {
  datepicker: DatePicker
}

async function onSearching(menu, event) {
  if (menu === 'info') {
    const payloads = {
      tahun: this.data.year ? new Date(this.data.year).getFullYear() : new Date().getFullYear()
    }
    console.log(payloads)
  }
}