urls = {
  pathname: "/lihat/data-op/catatan-sejarah-wp",
  dataPath: "/catatansejarahwp",
  dataSrc: "/catatansejarahwp",
};
vars = {
  nopFields: {
    provinsi_kode: null,
    daerah_kode: null,
    kecamatan_kode: null,
    kelurahan_kode: null,
    kodeBlok: null,
    noUrut: null,
    kodeJenisOp: null,
  },
  data: {
    alamatObjekPajak: null,
    kelurahan: null,
    rt_rw: null,
    luasTanah: null,
    list: [],
  },
};

methods = {
  onClickBtnCari,
  nopNextAfter,
  postFetchData,
};

async function onClickBtnCari() {
  let url =
    this.urls.dataSrc +
    "?propinsi_Id=" +
    this.nopFields.provinsi_kode +
    "&dati2_Id=" +
    this.nopFields.daerah_kode +
    "&kecamatan_Id=" +
    this.nopFields.kecamatan_kode +
    "&keluarahan_Id=" +
    this.nopFields.kelurahan_kode +
    "&blok_Id=" +
    this.nopFields.kodeBlok +
    "&noUrut=" +
    this.nopFields.noUrut +
    "&jenisOP_Id=" +
    this.nopFields.kodeJenisOp;

  let res = await apiFetch(url);

  if (res.success) {
    this.data = res.data.data;
    // format date
    this.data.list.forEach((item) => {
      if (item.tanggalCetak != null) {
        item.tanggalCetak = formatDate(
          new Date(item.tanggalCetak),
          ["d", "m", "y"],
          "/"
        );
      }
      if (item.tanggalJatuhTempo != null) {
        item.tanggalJatuhTempo = formatDate(
          new Date(item.tanggalJatuhTempo),
          ["d", "m", "y"],
          "/"
        );
      }

      if (item.tanggalTerbit != null) {
        item.tanggalTerbit = formatDate(
          new Date(item.tanggalTerbit),
          ["d", "m", "y"],
          "/"
        );
      }
    });
  } else {
    this.data = {
      alamatObjekPajak: null,
      kelurahan: null,
      rt_rw: null,
      luasTanah: null,
      list: [],
    };

    alert(res.message);
  }
}

function postFetchData(data) {
  console.log(data);
}
