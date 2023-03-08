urls = {
  pathname: "/konfigurasi/pajak/pdl/rekening-pajak",
  dataPath: "",
  dataSrc: "",
  submit: "",
  table: {
    pajakTable: "/konfigurasipajak",
    rekeningTable: "/rekening",
  },
  form: {
    pajak: "/konfigurasipajak/{id}",
    rekening: "/rekening/{id}",
  },
};
vars = {
  selectedIdx: null,
  pajakEntryDto: pajakEntryDto,
  entryFormTitle: "Entry Form",
  pajakList: [],
  rekeningOptions: [],
  rekeningList: [],
  entryMode: "",
};
refSources = {
  rekeningOptions: "/rekening?no_pagination=true",
};
components = {
  vueselect: VueSelect.VueSelect,
};

methods = {
  onSubmitPajak,
  onDelete,
  fetchPajakList,
};

async function onDelete(type, id) {
  let url = urls.form[type].replace("{id}", id);
  let res = await apiFetch(url, "DELETE");
  if (res.success) {
    this.pajakList = this.pajakList.filter((item) => item.id != id);
    this.$forceUpdate();
  }
}

async function onSubmitPajak() {
  let payload = {
    ...this.pajakEntryDto,
  };

  if (payload.oa == true) {
    payload.oa = "1";
  } else {
    payload.oa = "0";
  }

  if (payload.sa == true) {
    payload.sa = "1";
  } else {
    payload.sa = "0";
  }

  let res = null;

  if (this.entryMode == "add") {
    res = await apiFetch(urls.form.pajak.replace("/{id}", ""), "POST", payload);
  } else {
    res = await apiFetch(
      urls.form.pajak.replace("{id}", this.selectedData_id),
      "PATCH",
      payload
    );
  }

  if (res.success) {
    // refresh table
    this.pajakList = [];
    this.fetchPajakList();

    this.$forceUpdate();
  }
}

async function fetchPajakList() {
  let url = this.urls.table.pajakTable;
  let response = await apiFetchData(url);
  if (response) {
    response.data.map((item) => {
      let data = {
        ...item,
      };

      if (data.oa == "1") {
        data.oa = true;
      } else {
        data.oa = false;
      }

      if (data.sa == "1") {
        data.sa = true;
      } else {
        data.sa = false;
      }

      this.pajakList.push(data);
    });
  }
}

function mounted() {
  this.fetchPajakList();
  //   this.fetchRekeningList();
}
