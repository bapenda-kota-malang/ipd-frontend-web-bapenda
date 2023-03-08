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
  onChangedProvince,
  onChangedCity,
  onChangedSubdistrict,
  onChangedVillage,
  submitCetak,
  submitProcess,
}
components = {
  datepicker: DatePicker,
  vueselect: VueSelect.VueSelect,
}

async function onChangedProvince(event) {
  await regionMethods.onChangedProvinceParent(this, event)
  this.$forceUpdate()
}

async function onChangedCity(event) {
  await regionMethods.onChangedCityParent(this, event)
  this.$forceUpdate()
}

async function onChangedSubdistrict(event) {
  await regionMethods.onChangedSubdistrictParent(this, event)
  this.$forceUpdate()
}

async function onChangedVillage(event) {
  await regionMethods.onChangedVillageParent(this, event)
  this.$forceUpdate()
}

async function submitCetak(id, xthis) {
  console.log('submit cetak')
}

async function submitProcess(data) {
  console.log('submit proses')
}
