urls = {
  pathname: "/konfigurasi/master/ref-umum",
  dataPath: "/refumum",
  dataSrc: "/refumum",
  submit: "/refumum/{id}",
};
vars = {
  selectedIdx: null,
  entryData: entryDto,
  entryFormTitle: "Entry Form",
};

function cleanData(data) {
  delete data.id;
  data.kode = null;
  data.keterangan = null;
  data.nama = null;
}
