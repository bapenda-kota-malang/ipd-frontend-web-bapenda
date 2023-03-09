urls = {
  pathname: "/lihat/data-op/objek-nilai-individu",
  dataPath: "/nilaiindividu",
  dataSrc: "/nilaiindividu",
  submit: "/nilaiindividu/{id}",
};
vars = {
  selectedIdx: null,
  entryData: {},
  entryFormTitle: "Entry Form",
  provinsiList: [],
  daerahList: [],
  kecamatanList: [],
  filter: {
    provinsi_kode: null,
    daerah_kode: null,
    kecamatan_kode: null,
  },
};
refSources = {
  provinsiList: "/provinsi?no_pagination=true",
};
components = {
  vueselect: VueSelect.VueSelect,
};

function cleanData(data) {}
