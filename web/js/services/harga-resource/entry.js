data = {};
vars = {
  resources: [],
};

urls = {
  preSubmit: "/jaminan-bongkar-reklame",
  postSubmit: "/jaminan-bongkar-reklame",
  submit: "/jaminanbongkar",
  dataSrc: "/jaminanbongkar",
};

methods = {
  newValue,
  hapusData,
};

async function newValue() {
  console.log("masuk new value");

  let tempData = {
    kd: null,
    nama_resource: null,
    satuan_resource: null,
    harga_resource_lama: null,
    harga_resource_baru: null,
  };
  this.resources.push(tempData);

  this.$forceUpdate();
}

async function hapusData(id) {
  console.log("masuk hapus: " + id);
  this.resources.splice(id, 1);
}
