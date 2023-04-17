vars = {
    selected: '',
    selectedIdx: null,
    entryData: entryDto,
    entryFormTitle: "Entry Form",
    jenisTarif: [
        {tarif: 'Reklame Billboard'},
        {tarif: 'Reklame Neon Box'},
        {tarif: 'Reklame'},
    ]
}

urls = {
    pathname: "/konfigurasi/pajak/pdl/tarif-jambong",
    dataPath: "/tarifjambong",
    dataSrc: "/tarifjambong",
    submit: "/tarifjambong/{id}",
}

components = {
    vueselect: VueSelect.VueSelect,
}

function cleanData(data) {
    data.jenisReklame = null;
    data.nominal = null;
    this.selected = null;
}