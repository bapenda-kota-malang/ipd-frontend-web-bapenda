data = { ...createDto };
vars = {
  nopFields: {
    provinsi_kode: null,
    daerah_kode: null,
    kecamatan_kode: null,
    kelurahan_kode: null,
    blok_kode: null,
    noUrut: null,
    jenisOp_kd: null,
  },
};
urls = {
  preSubmit: "/sppt/tandaterima",
  postSubmit: "/sppt/tandaterima",
  submit: "/sppt/tandaterima/{id}",
  searchByNOPTahun: "/sppt/tandaterima",
};
methods = {
  nopNextAfter,
  onClickBtnCari,
};
refSources = {};
components = {
  datepicker: DatePicker,
  vueselect: VueSelect.VueSelect,
};

watch = {
  "data.tglTerimaWpSppt": function (val) {
    this.data.tglRekamTtrSppt = val;
  },
};

async function onClickBtnCari() {
  let params = {
    provinsi_kd: this.nopFields.provinsi_kode,
    daerah_kd: this.nopFields.daerah_kode,
    kecamatan_kd: this.nopFields.kecamatan_kode,
    Kelurahan_kd: this.nopFields.kelurahan_kode,
    blok_kd: this.nopFields.kodeBlok,
    noUrut_kd: this.nopFields.noUrut,
    jenisOp_kd: this.nopFields.kodeJenisOp,
    tahunPajakSppt: this.data.tahunPajakSppt,
  };
  // urls with params
  let url =
    urls.searchByNOPTahun + "?" + new URLSearchParams(params).toString();

  // fetch data
  let res = await apiFetch(url);
  if (res.success && res.data.data.length > 0) {
    this.data = res.data.data[0];
    this.data.tglTerimaWpSppt = formatedDate(this.data.tglTerimaWpSppt);
  } else {
    alert("Data tidak ditemukan");
  }
}

// formated date 2023-02-20T00:00:00Z to 2023-02-20
function formatedDate(date) {
  let dateArr = date.split("T");
  let d = new Date(dateArr[0]);
  let year = d.getFullYear();
  let month = d.getMonth() + 1;
  let day = d.getDate();
  return year + "-" + month + "-" + day;
}
