urls = {
  pathname: "/konfigurasi/pajak/pdl/jenis-usaha",
  dataPath: "/jenisusaha",
  dataSrc: "/jenisusaha",
  submit: "/jenisusaha/{id}",
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
  data.kode = null;
  data.uraian = null;
  data.jenisUsahaDetail = {
    rekening_id: null,
  };
}
