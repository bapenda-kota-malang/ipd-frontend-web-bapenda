urls = {
  pathname: '/penetapan/penilaian/massal',
  dataPath: '/penilaian-massal',
  dataSrc: '/penilaian-massal',
}
vars = {
  statusDoc: [],
  searchKeywords: null,
}
watch = {
  // searchKeywords() {
  // 	this.search();
  // }
}
methods = {
  strRight,
  search,
}

function formatNameDate(date) {
  const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ],
    tempDate = date.split("-")
  tempDate[1] = monthNames[parseInt(tempDate[1])]
  result = tempDate.join(" ")
  return result
}

function postDataFetch(data, xthis) {
  console.log(data);
  data.forEach(function (item, idx) {
    item.nop = item.propinsi_Id + "." + item.dati2_Id + "." + item.kecamatan_Id + "." + item.keluarahan_Id + "." + item.blok_Id + "." + item.noUrut + "." + item.jenisOP_Id;
    item.njop_sppt = toRupiah(item.njop_sppt, { formal: false, dot: '.' });
    item.tanggalTerbit_sppt = formatNameDate(formatDate(new Date(item.tanggalTerbit_sppt), ['d', 'm', 'y'], '/'));
    item.tanggalJatuhTempo_sppt = formatNameDate(formatDate(new Date(item.tanggalJatuhTempo_sppt), ['d', 'm', 'y'], '/'));
  });
}

function search() {

  // x = debounce(function () {
  // 	console.log(app.searchKeywords);
  app.setData(app);
  // }, 300);
  // x();
}