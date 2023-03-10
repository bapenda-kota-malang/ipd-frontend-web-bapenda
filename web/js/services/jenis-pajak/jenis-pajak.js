urls = {
  pathname: "/konfigurasi/pajak/pdl/jenis",
  dataPath: "/jenispajak",
  dataSrc: "/jenispajak",
  submit: "/jenispajak/{id}",
};
vars = {
  selectedIdx: null,
  entryData: entryDto,
  entryFormTitle: "Entry Form",
  rekeningList: [],
};
refSources = {
  rekeningList: "/rekening?no_pagination=true",
};
components = {
  vueselect: VueSelect.VueSelect,
};

function cleanData(data) {
  // delete data.id;
  data.kode = null;
  data.uraian = null;
  data.rekening_id = null;
  data.kodeBilling = null;
  data.kodeVAJatim = null;
}

function preSubmitEntry() {}
