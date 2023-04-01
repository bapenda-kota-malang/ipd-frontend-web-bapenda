urls = {
  pathname: "/lihat/nop-terbesar",
  submit: "/objekpajakpbb/nop-terbesar",
};
vars = {
  selectedIdx: null,
  entryData: entryDto,
  entryFormTitle: "Entry Form",
  provinsiList: [],
  daerahList: [],
  kecamatanList: [],
  kelurahanList: [],
};
refSources = {
  provinsiList: "/provinsi?no_pagination=true",
};
components = {
  vueselect: VueSelect.VueSelect,
};

methods = {
  onClickSubmit,
};

function cleanData(data) {
  delete data.id;
  data.provinsi_kode = null;
  data.daerah_kode = null;
  data.kecamatan_kode = null;
  data.kelurahan_kode = null;
  data.blok_kode = null;
}

async function onClickSubmit() {
  let payload = {
    ...this.entryData,
  };

  let res = await apiFetch(this.urls.submit, "POST", payload);

  if (res.success) {
	this.data.no_urut = res.data;
  } else {
	alert(res.message);
  }
}