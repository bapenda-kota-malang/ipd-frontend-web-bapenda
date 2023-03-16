urls = {
  pathname: "/penetapan-massal",
  dataPath: "/penetapan-massal?type=oa&kode_jenis_usaha=400",
  dataSrc: "/penetapan-massal?type=oa&kode_jenis_usaha=400",
  doSalin: "/penetapan-massal/copy",
};
vars = {
  checkedRows: [],
};

methods = {
  doCheckRow,
  doCheckAll,
  doSalin,
};

async function doSalin() {
  if (this.checkedRows.length == 0) {
    alert("Pilih data yang akan disalin");
    return;
  }

  let payload = {
    spt_id: this.checkedRows.map((item) => item.id),
    types: "sa",
  };

  let response = await apiFetch(urls.doSalin, "POST", payload);

  if (response.success) {
    alert("Berhasil menyalin data");
    this.checkedRows = [];
    this.data.forEach((item, index) => {
      item.checked = false;
    });

    // refresh data
    location.reload();
  } else {
    alert("Gagal menyalin data");
  }
}

function doCheckRow(index) {
  this.data[index].checked = !this.data[index].checked;
  this.data[index].checked
    ? this.checkedRows.push(this.data[index])
    : this.checkedRows.splice(this.checkedRows.indexOf(this.data[index]), 1);
}

function doCheckAll() {
  this.checkedRows = [];
  this.data.forEach((item, index) => {
    item.checked = !this.checkAll;
    item.checked ? this.checkedRows.push(item) : null;
  });
}

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
