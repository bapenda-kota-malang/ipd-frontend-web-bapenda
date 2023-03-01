urls = {
  pathname: "/konfigurasi/pembayaran/tempat-pembayaran-sppt-massal",
  dataPath: "/tempatpembayaranspptmasal",
  dataSrc: "/tempatpembayaranspptmasal",
  submit: "/tempatpembayaranspptmasal/{id}",
  dataSrcParams: {
    searchKeywords: "",
    provinsi_kode: null,
    dati2_kode: null,
    kecamatan_kode: null,
    kelurahan_kode: null,
    tahun: null,
  },
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
  kanwilList: [],
  kppbbList: [],
  tempatPembayaranList: [],
};

refSources = {
  provinsiList: "/provinsi?no_pagination=true",
  bankTunggalList: "/banktunggal?no_pagination=true",
  bankPersepsiList: "/bankpersepsi?no_pagination=true",
  kanwilList: "/kanwil?no_pagination=true",
  kppbbList: "/kppbb?no_pagination=true",
  tempatPembayaranList: "/tempatpembayaran?no_pagination=true",
};

components = {
  vueselect: VueSelect.VueSelect,
};

methods = {
  applyFilter,
};

async function applyFilter() {
  res = await apiFetch(
    urls.dataSrc +
      "?" +
      setQueryParam(this.urls.dataSrcParams) +
      "&no_pagination=true",
    "GET"
  );
  if (typeof res.data == "object") {
    this.data = res.data.data;
  }
  filterModal.hide();
  this.$forceUpdate();
}
