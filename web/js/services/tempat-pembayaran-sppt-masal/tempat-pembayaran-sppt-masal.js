urls = {
  pathname: "/konfigurasi/pembayaran/tempat-pembayaran-sppt-massal",
  dataPath: "/tempatpembayaranspptmasal",
  dataSrc: "/tempatpembayaranspptmasal",
  submit: "/tempatpembayaranspptmasal/{id}",
};
vars = {
  entryData: entryDto,
  selectedIdx: null,
  entryFormTitle: "Entry Form",
  provinsiList: [],
  daerahList: [],
  kecamatanList: [],
  kelurahanList: [],
  bankTunggalList: [],
  bankPersepsiList: [],
};

refSources = {
  provinsiList: "/provinsi?no_pagination=true",
};

components = {
  vueselect: VueSelect.VueSelect,
};

methods = {
  applyFilter,
  showFilterModal,
};

function cleanData(data) {
  // delete data.id;
  // data.level = null;
  // data.parent_id = null;
  // data.kode = null;
  // data.nama = null;
}

function preSubmitEntry() {
  // this.entryData.parent_id = parseInt(this.entryData.parent_id);
  // this.entryData.level = parseInt(this.entryData.level);
  // if (this.entryData.parent_id == 0) {
  //   this.entryData.parent_id = null;
  // }
}

async function showFilterModal() {
  console.log("showFilter");
}

async function applyFilter() {
  console.log("applyFilter");
  // res = await apiFetch(
  //   urls.dataSrc +
  //     "?" +
  //     setQueryParam(this.urls.dataSrcParams) +
  //     "&no_pagination=true",
  //   "GET"
  // );
  // if (typeof res.data == "object") {
  //   this.data = res.data.data;
  //   console.log(res.data.data);
  // }
  // filterModal.show = false;
  // this.$forceUpdate();
}
