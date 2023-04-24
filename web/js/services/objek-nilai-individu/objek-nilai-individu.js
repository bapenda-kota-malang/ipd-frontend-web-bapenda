urls = {
  pathname: "/lihat/data-op/objek-nilai-individu",
  dataPath: "",
  dataSrc: "",
  submit: "",
};
vars = {
  selectedIdx: null,
  entryData: {},
  entryFormTitle: "Entry Form",
  provinsiList: [],
  daerahList: [],
  kecamatanList: [],
  kelurahanList: [],
  filter: {
    provinsi_kode: null,
    daerah_kode: null,
    kecamatan_kode: null,
    kelurahan_kode: null,
  },
};
refSources = {
  provinsiList: "/provinsi?no_pagination=true",
};
components = {
  vueselect: VueSelect.VueSelect,
};

methods = {
  onClickFilterSearch,
  onClickBtnBlokNOP,
};

function cleanData(data) {}

async function onClickFilterSearch() {
  let payload = {
    ...this.filter,
  };

  let res = await apiFetch("/nilaiindividu", "GET", payload);

  if (res.success) {
    this.data = res.data.data;
  }
}

async function onClickBtnBlokNOP() {
  let payload = {
    ...this.filter,
  };

  let res = await apiFetch("/nilaiindividu", "GET", payload);

  if (res.success) {
    // this.data = res.data;
  }
}
