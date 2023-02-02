urls = {
  pathname: "/penetapan-massal",
  dataPath: "/penetapan-massal?type=sa&kode_jenis_usaha=400",
  dataSrc: "/penetapan-massal?type=sa&kode_jenis_usaha=400",
};
vars = {};

function postDataFetch(data) {
  data.forEach(function (item, idx) {
    item.periode_awal = formatDate(
      new Date(item.periode_awal),
      ["d", "m", "y"],
      "/"
    );
    item.periode_akhir = formatDate(
      new Date(item.periode_akhir),
      ["d", "m", "y"],
      "/"
    );
    item.tanggal_spt = formatDate(
      new Date(item.tanggal_spt),
      ["d", "m", "y"],
      "/"
    );
    item.jatuh_tempo = formatDate(
      new Date(item.jatuh_tempo),
      ["d", "m", "y"],
      "/"
    );
  });
}
