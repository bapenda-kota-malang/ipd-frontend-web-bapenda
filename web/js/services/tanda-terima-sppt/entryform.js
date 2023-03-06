data = { ...createDto };
vars = {
  nopFields: {
    provinsi_kode: null,
    daerah_kode: null,
    kecamatan_kode: null,
    kelurahan_kode: null,
    kodeBlok: null,
    noUrut: null,
    kodeJenisOp: null,
  },
};
urls = {
  preSubmit: "/sppt/tandaterima",
  postSubmit: "/sppt/tandaterima",
  submit: "/sppt/tandaterima/{id}",
};
methods = {
  nopNextAfter,
};
refSources = {};
components = {
  datepicker: DatePicker,
  vueselect: VueSelect.VueSelect,
};
