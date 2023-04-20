vars = {
    selectedIdx: null,
    reklameList: [],
    entryData: entryDto,
    entryFormTitle: "Entry Form",
    masaList: [
        {no: 1, masa: 'Masak Pajak Tetap 1 Tahun'},
        {no: 2, masa: 'Masa Pajak Insidentil 1 Tahun'},
        {no: 3, masa: 'Masa Pajak Insidentil 1 Bulan'},
        {no: 4, masa: 'Masa Pajak Insidentil 1 Kali Penyelenggaraan'},
    ],
    dasarList: [
        {dasar: 'Unit'},
        {dasar: 'Luas'},
    ]
}

urls = {
    pathname: "/konfigurasi/pajak/pdl/koefisian-reklame",
    dataPath: "/tarifreklame?jenisMasa=1",
    dataSrc: "/tarifreklame?jenisMasa=1",
    submit: "/tarifreklame/{id}",
}

refSources = {
    reklameList: '/tarifjambong?no_pagination=true',
}

methods = {
    setTabOne,
    setTabTwo,
    setTabThree,
    setTabFour,
}

components = {
    vueselect: VueSelect.VueSelect,
}

async function setTabOne() {
    this.urls.dataPath = "/tarifreklame?jenisMasa=1";
    this.urls.dataSrc = "/tarifreklame?jenisMasa=1";
    
    this.data = null;
    res = await apiFetch('/tarifreklame?jenisMasa=1', 'GET');
    //console.log(this.data);
    this.data = res.data.data;

    setPagination(res.data.meta, this.pagination);
    window.history.pushState({html:document.html}, "", `${this.urls.pathname}`);
}

async function setTabTwo() {
    this.urls.dataPath = "/tarifreklame?jenisMasa=2";
    this.urls.dataSrc = "/tarifreklame?jenisMasa=2";
    
    this.data = null;
    res = await apiFetch('/tarifreklame?jenisMasa=2', 'GET');
    //console.log(this.data);
    this.data = res.data.data;

    setPagination(res.data.meta, this.pagination);
    window.history.pushState({html:document.html}, "", `${this.urls.pathname}`);
}

async function setTabThree() {
    this.urls.dataPath = "/tarifreklame?jenisMasa=3";
    this.urls.dataSrc = "/tarifreklame?jenisMasa=3";
    
    this.data = null;
    res = await apiFetch('/tarifreklame?jenisMasa=3', 'GET');
    //console.log(this.data);
    this.data = res.data.data;

    setPagination(res.data.meta, this.pagination);
    window.history.pushState({html:document.html}, "", `${this.urls.pathname}`);
}

async function setTabFour() {
    this.urls.dataPath = "/tarifreklame?jenisMasa=4";
    this.urls.dataSrc = "/tarifreklame?jenisMasa=4";
    
    this.data = null;
    res = await apiFetch('/tarifreklame?jenisMasa=4', 'GET');
    //console.log(this.data);
    this.data = res.data.data;

    setPagination(res.data.meta, this.pagination);
    window.history.pushState({html:document.html}, "", `${this.urls.pathname}`);
}

function cleanData(data) {
    this.selected = null;
    data.jenisMasa = null;
    data.jenisReklame = null;
    data.dasarPengenaan = null;
    data.klasifikasiJalan_id = null;
    data.tarif = null;
}