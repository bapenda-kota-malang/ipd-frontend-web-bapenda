data = { ...penilaian_massal };
vars = {
  jumlahRecord: null,
  blokKe: null,
  urutKe: null,
  jnsKe: null,
  options: ['test', 'ok'],
}
urls = {
  preSubmit: '/penilaian-massal',
  postSubmit: '/penilaian-massal',
  submit: '/penilaian-massal/{id}/{kd}',
  dataSrc: '/penilaian-massal',
}
refSources = {
  propinsiurl: "/provinsi/",
  kotaurl: "/daerah/",
  kecamatanurl: "/kecamatan/",
  kelurahanurl: "/kelurahan/",
  imageUrl: '/static/img/',
  submitCetak: '/penilaian-massal/{id}/cetak',
  submitProcess: '/spptsimulasi-process',
  processCreate: '/penilaian-massal',
  doneProcess: '/penetapan/penilaian/massal',
}
methods = {
  propinsiChanged,
  kotaChanged,
  kecamatanChanged,
  kelurahanChanged,
  submitCetak,
  submitData,
}
components = {
  datepicker: DatePicker,
  vueselect: VueSelect.VueSelect,
}

function mounted(xthis) {
  // if (!xthis.id) {
  // }
  // xthis.jabatan_id = document.getElementById('jabatan_id') ? document.getElementById('jabatan_id').value : null;
  // xthis.user_name = document.getElementById('user_name') ? document.getElementById('user_name').value : null;
  // xthis.user_id = document.getElementById('user_id') ? document.getElementById('user_id').value : null;
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

async function kotaChanged(event) {
  id = this.data.provinsiID + event.target.value

  if (event.target.value.length == 2) {
    res = await apiFetch(refSources.kotaurl + id + "/kode", 'GET');
    if (typeof res.data == 'object') {
      this.data.namaKota = res.data.data.nama;
    } else {
      console.log("data Dati II tidak ditemukan");
    }
    this.$forceUpdate();
  }
}

async function kecamatanChanged(event) {
  id = this.data.provinsiID + this.data.kotaID + event.target.value

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
  id = this.data.provinsiID + this.data.kotaID + this.data.kecamatanID + event.target.value

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
  res = await apiFetch(refSources.submitCetak + id, 'GET');
  console.log(res)
}

async function submitData(data) {
  data.isLoading = true;
  payload = {
    tahun: data.tahunPajak,
    provinsi_kode: data.provinsiID,
    namaPropinsi: data.namaPropinsi,
    daerah_kode: data.kotaID,
    namaKota: data.namaKota,
    kecamatan_kode: data.kecamatanID,
    namaKecamatan: data.namaKecamatan,
    kelurahan_kode: data.kelurahanID,
    namaKelurahan: data.namaKelurahan
  }
  const spptReq = await apiFetch('/penilaian/massal', 'POST', payload);
  let sppt = spptReq.data.data;
  data.jmlRecord = sppt.length
  i = 1;
  // for (const item of sppt) {
  //   data.recordKe = i
  //   data.noUrut = item.sppt.noUrut
  //   i += 1;
  // }
  if (spptReq) {
    data.isLoading = false;
  }
}

function preSubmit(xthis) {
  data = xthis.data;

  console.log("preSubmit");
}

function postDataFetch(data, xthis) {
  console.log("origin");
  console.log(data);

  if (xthis.id) {
    // xthis.totalNJOPLB = data.opLuasTanah * data.njopLuasTanah;
    // xthis.totalNJOPLBB = data.opLuasBangunan * data.njopLuasBangunan;
    // xthis.nilaiTotalOp = (data.opLuasTanah * data.njopLuasTanah) + (data.opLuasBangunan * data.njopLuasBangunan);

    // xthis.totalNpop = data.npop - data.npoptkp;
    // xthis.totalNJOP = (5 / 100) * (data.npop - data.npoptkp);

    // data.tglValidasiDispenda = formatDate(new Date(data.tglValidasiDispenda), ['d','m','y'], '-');
    // data.tglExpBilling = formatDate(new Date(data.tglExpBilling), ['d','m','y'], '-');

    // data.tanggal = formatDate(new Date(data.tanggal), ['d','m','y'], '-');
    // GetValue(jenisPerolehans, data.jenisPerolehanOp).then( value => data.jenisPerolehanOp = data.jenisPerolehanOp + " - "  +  value);

    console.log("jabatan id :" + xthis.jabatan_id);
    console.log("jabatanstaff :" + xthis.jbtStaff);
    console.log("status :" + data.status);

  }
}
