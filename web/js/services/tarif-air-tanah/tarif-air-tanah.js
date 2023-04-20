vars = {
    selectedIdx: null,
    reklameList: [],
    entryData: entryDto,
    entryFormTitle: "Entry Form",
    peruntukanList: [
        {title: 'NON NIAGA'},
        {title: 'INDUSTRI'},
        {title: 'NIAGA'},
        {title: 'PDAM'},
    ],
}

urls = {
    pathname: "/konfigurasi/pajak/pdl/tarif-air-tanah",
    dataPath: '/hargadasarair?peruntukan=NON NIAGA',
    dataSrc: '/hargadasarair?peruntukan=NON NIAGA',
    submit: '/hargadasarair/{id}',
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
    this.urls.dataPath = '/hargadasarair?peruntukan=NON NIAGA';
    this.urls.dataSrc = '/hargadasarair?peruntukan=NON NIAGA';
    
    this.data = null;
    res = await apiFetch('/hargadasarair?peruntukan=NON NIAGA', 'GET');
    //console.log(this.data);
    this.data = res.data.data;

    setPagination(res.data.meta, this.pagination);
    window.history.pushState({html:document.html}, "", `${this.urls.pathname}`);
}

async function setTabTwo() {
    this.urls.dataPath = '/hargadasarair?peruntukan=INDUSTRI';
    this.urls.dataSrc = '/hargadasarair?peruntukan=INDUSTRI';
    
    this.data = null;
    res = await apiFetch('/hargadasarair?peruntukan=INDUSTRI', 'GET');
    //console.log(this.data);
    this.data = res.data.data;

    setPagination(res.data.meta, this.pagination);
    window.history.pushState({html:document.html}, "", `${this.urls.pathname}`);
}

async function setTabThree() {
    this.urls.dataPath = '/hargadasarair?peruntukan=NIAGA';
    this.urls.dataSrc = '/hargadasarair?peruntukan=NIAGA';
    
    this.data = null;
    res = await apiFetch('/hargadasarair?peruntukan=NIAGA', 'GET');
    //console.log(this.data);
    this.data = res.data.data;

    setPagination(res.data.meta, this.pagination);
    window.history.pushState({html:document.html}, "", `${this.urls.pathname}`);
}

async function setTabFour() {
    this.urls.dataPath = '/hargadasarair?peruntukan=PDAM';
    this.urls.dataSrc = '/hargadasarair?peruntukan=PDAM';
    
    this.data = null;
    res = await apiFetch('/hargadasarair?peruntukan=PDAM', 'GET');
    //console.log(this.data);
    this.data = res.data.data;

    setPagination(res.data.meta, this.pagination);
    window.history.pushState({html:document.html}, "", `${this.urls.pathname}`);
}

function cleanData(data) {
    data.peruntukan = null;
    data.batasBawah = null;
    data.batasAtas = null;
    data.tarifMataAir = null;
    data.tarifBukanMataAir = null;
}