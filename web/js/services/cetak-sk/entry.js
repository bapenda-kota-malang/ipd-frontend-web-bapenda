data = {};
vars = {
  pengurangans: [],
};

urls = {
  // preSubmit: "/jaminan-bongkar-reklame",
  // postSubmit: "/jaminan-bongkar-reklame",
  // submit: "/jaminanbongkar",
  // dataSrc: "/jaminanbongkar",
};

methods = {
  newValue,
  hapusData,
};

async function newValue() {
  let tempData = {
    kd: null,
    nama_resource: null,
    satuan_resource: null,
    harga_resource_lama: null,
    harga_resource_baru: null,
  };
  this.pengurangans.push(tempData);

  this.$forceUpdate();
}

async function hapusData(id) {
  this.pengurangans.splice(id, 1);
}
