data = { datePublish: null, ...regionData, ...regionErrors, ...nopData };

vars = {
  bukuOpts,
  jumlahOP: null,
  opKe: null,
  blokKe: null,
  urutKe: null,
  jnsKe: null
}

urls = {
  preSubmit: '/',
  postSubmit: '/',
  submit: '/{id}/{kd}',
  dataSrc: '/',
}

refSources = {
  imageUrl: '/static/img/',
  submitCetak: '/{id}/cetak',
  submitProcess: '/',
  processCreate: '/',
  doneProcess: '/',
}

methods = {
  onChangedRegion,
  submitCetak,
  submitProcess,
}
components = {
  datepicker: DatePicker,
  vueselect: VueSelect.VueSelect,
}

async function onChangedRegion(menu, event) {
  if (menu === 'province') {
    await regionMethods.onChangedProvinceParent(this, event)
  }
  if (menu === 'city') {
    await regionMethods.onChangedCityParent(this, event)
  }
  if (menu === 'district') {
    await regionMethods.onChangedSubdistrictParent(this, event)
  }
  if (menu === 'village') {
    await regionMethods.onChangedVillageParent(this, event)
  }
  this.$forceUpdate()
}

async function submitCetak(id, xthis) {
  console.log('submit cetak')
}

async function submitProcess(data) {
  console.log('submit proses')
}
