data = { ...salinan_sppt_pbb };
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
  propinsiurl: '/provinsi/',
  dati2url: '/daerah/',
  kecamatanurl: '/kecamatan/',
  kelurahanurl: '/kelurahan/',
  imageUrl: '/static/img/',
  submitCetak: '/{id}/cetak',
  submitProcess: '/',
  processCreate: '/',
  doneProcess: '/',
}
methods = {
  propinsiChanged,
  dati2Changed,
  kecamatanChanged,
  kelurahanChanged,
  submitCetak,
  submitProcess,
}
components = {
  datepicker: DatePicker,
  vueselect: VueSelect.VueSelect,
}

async function propinsiChanged(event) {
  id = event.target.value;
  if (event.target.value.length == 2) {
    res = await apiFetch(refSources.propinsiurl + id + "/kode", 'GET');
    if (typeof res.data == 'object') {
      this.data.namaPropinsi = res.data.data.nama;
    } else {
      console.log("data propinsi tidak ditemukan");
    }
  }
  this.$forceUpdate();
}

async function dati2Changed(event) {
  id = this.data.provinsiID + event.target.value
  if (event.target.value.length == 2) {
    res = await apiFetch(refSources.dati2url + id + "/kode", 'GET');
    if (typeof res.data == 'object') {
      this.data.namaDati2 = res.data.data.nama;
    } else {
      console.log("data Dati II tidak ditemukan");
    }
    this.$forceUpdate();
  }
}

async function kecamatanChanged(event) {
  id = this.data.provinsiID + this.data.dati2ID + event.target.value
  if (event.target.value.length == 3) {
    res = await apiFetch(refSources.kecamatanurl + id + "/kode", 'GET');
    if (typeof res.data == 'object') {
      this.data.namaKecamatan = res.data.data.nama;
    } else {
      console.log("data kecamatan tidak ditemukan");
    }
    this.$forceUpdate();
  }
}

async function kelurahanChanged(event) {
  id = this.data.provinsiID + this.data.dati2ID + this.data.kecamatanID + event.target.value
  if (event.target.value.length == 3) {
    res = await apiFetch(refSources.kelurahanurl + id + "/kode", 'GET');
    if (typeof res.data == 'object') {
      this.data.namaKelurahan = res.data.data.nama;
    } else {
      console.log("data kelurahan tidak ditemukan");
    }
  }
  this.$forceUpdate();
}

async function submitCetak(id, xthis) {
  console.log('submit cetak')
}

async function submitProcess(data) {
  console.log('submit proses')
}