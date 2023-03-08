urls = {
  pathname: "/konfigurasi/pajak/pdl/rekening-pajak",
  dataPath: "/konfigurasipajak",
  dataSrc: "/konfigurasipajak",
  submit: "/konfigurasipajak/{id}",
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
  data.rekening_id = null;
  data.oa = false;
  data.sa = false;
  data.urlDaftarOa = null;
  data.urlDaftarSa = null;
}

methods = {
  preSubmitEntry,
  formatStatus,
};

function formatStatus(data) {
  if (data.oa == "1" && data.sa == "1") {
    return "Checked";
  } else if (data.oa == "1") {
    return "Checked OA";
  } else if (data.sa == "1") {
    return "Checked SA";
  } else {
    return "Unchecked";
  }
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
