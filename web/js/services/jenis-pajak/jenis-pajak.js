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
  data.oa = null;
  data.sa = null;
}

function preSubmitEntry() {
  if (this.entryData.oa) {
    this.entryData.oa = "1";
  } else {
    this.entryData.oa = "0";
  }

  if (this.entryData.sa) {
    this.entryData.sa = "1";
  } else {
    this.entryData.sa = "0";
  }
}
