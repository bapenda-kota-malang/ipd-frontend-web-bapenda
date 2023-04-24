urls = {};
vars = {
  buku: [],
  njoptkp: [],
  tarif: [],
};

methods = {
  addRow,
  removeRow,
};

async function addRow(type) {
  switch (type) {
    case "buku":
      this.buku.push({
        awal: null,
        akhir: null,
        buku: null,
        min: null,
        max: null,
      });
      break;
    case "njoptkp":
      this.njoptkp.push({
        provinsi: null,
        kota: null,
        awal: null,
        akhir: null,
        nilai: null,
      });
      break;
    case "tarif":
      this.tarif.push({
        provinsi: null,
        kota: null,
        awal: null,
        akhir: null,
        min: null,
        max: null,
        nilai: null,
      });
      break;
  }
}

async function removeRow(type, idx) {
  switch (type) {
    case "buku":
      this.buku.splice(idx, 1);
      break;
    case "njoptkp":
      this.njoptkp.splice(idx, 1);
      break;
    case "tarif":
      this.tarif.splice(idx, 1);
      break;
  }
}
