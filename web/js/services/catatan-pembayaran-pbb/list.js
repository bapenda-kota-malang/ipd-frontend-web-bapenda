urls = {
  pathname: "/lihat/data-op/catatan-pembayaran-pbb",
  dataPath: "/catatanpembayaranpbb",
  dataSrc: "/catatanpembayaranpbb",
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
};

methods = {
  onClickBtnCari,
  nopNextAfter,
};

async function onClickBtnCari() {
  let url = this.urls.dataSrc +
    "?propinsi_Id=" + this.nopFields.provinsi_kode +
    "&dati2_Id=" + this.nopFields.daerah_kode +
    "&kecamatan_Id=" +  this.nopFields.kecamatan_kode +
    "&keluarahan_Id=" + this.nopFields.kelurahan_kode +
    "&blok_Id=" + this.nopFields.kodeBlok +
    "&noUrut=" + this.nopFields.noUrut +
    "&jenisOP_Id=" + this.nopFields.kodeJenisOp;

  let res = await apiFetch(url);

  if (res.success) {
    this.data = res.data.data;
    this.data.list = res.data.data.list.map((item) => {
      item.tanggalBayar = dateFormat(new Date(data.tanggalBayar), [
        "d",
        "m",
        "y",
        "/",
      ]);
      item.tanggalRekam = dateFormat(new Date(data.tanggalRekam), [
        "d",
        "m",
        "y",
        "/",
      ]);
      return item;
    });
  } else {
    this.data = {
      namaWajibPajak: "",
      jalanObjekPajak: "",
      jalanWajibPajak: "",
      blokKavNo: "",
      blokKavNo2: "",
      list: [],
    };

    alert(res.message);
  }
}
