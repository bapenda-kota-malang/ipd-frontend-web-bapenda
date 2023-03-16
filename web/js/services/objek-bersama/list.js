urls = {
  pathname: "/lihat/data-op/objek-bersama",
  dataPath: "/indukobjekpajak",
  dataSrc: "/indukobjekpajak",
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
    alamat_objek_bersama: "",
    kelurahan: "",
    luas_bangunan: 0,
    luas_bumi: 0,
    details: [],
  },
};

methods = {
  onClickBtnCari,
  nopNextAfter,
};

async function onClickBtnCari() {
  let url =
    this.urls.dataSrc +
    "?provinsi_kode=" +
    this.nopFields.provinsi_kode +
    "&dati2_kode=" +
    this.nopFields.daerah_kode +
    "&kecamatan_kode=" +
    this.nopFields.kecamatan_kode +
    "&kelurahan_kode=" +
    this.nopFields.kelurahan_kode +
    "&blok_kode=" +
    this.nopFields.kodeBlok +
    "&no_urut=" +
    this.nopFields.noUrut +
    "&jenis_op_kode=" +
    this.nopFields.kodeJenisOp;

  let res = await apiFetch(url);

  if (res.success) {
    this.data = res.data.data;
  } else {
    this.data = {
      alamat_objek_bersama: "",
      kelurahan: "",
      luas_bangunan: 0,
      luas_bumi: 0,
      details: [],
    };

    alert(res.message);
  }
}
