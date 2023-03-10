urls = {
  pathname: "/konfigurasi/master/rekening",
  dataPath: "/rekening",
  dataSrc: "/rekening",
  submit: "/rekening/{id}",
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
  data.parent_id = null;
  data.tipe = null;
  data.kelompok = null;
  data.jenis = null;
  data.objek = null;
  data.rincian = null;
  data.sub1 = null;
  data.sub2 = null;
  data.sub3 = null;
  data.kode = null;
  data.nama = null;
  data.level = null;
  data.kodeJenisPajak = null;
  data.kodeVaJatim = null;
  data.kodeBilling = null;
  data.kodeJenisUsaha = null;
  data.jenisUsaha = null;
}

function preSubmitEntry() {
  // to string
  this.entryData.parent_id = this.entryData.parent_id.toString();
}
