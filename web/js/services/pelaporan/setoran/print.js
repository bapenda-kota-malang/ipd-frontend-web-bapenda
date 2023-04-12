data = {...printEntry}

vars = {
    selected: '',
    pajakList: [
        {pajak: 'Laporan Penerimaan Pajak Hotel'},
		{pajak: 'Laporan Penerimaan Pajak Restoran'},
        {pajak: 'Laporan Penerimaan Pajak Hiburan'},
        {pajak: 'Laporan Penerimaan Pajak Parkir'},
        {pajak: 'Laporan Penerimaan Pajak Reklame'},
        {pajak: 'Laporan Penerimaan Pajak Air Bawah Tanah'},
        {pajak: 'Laporan Penerimaan Pajak Penerangan Jalan'},
    ],
    periodeList: [
        {periode: 'Harian'},
        {periode: 'Bulanan'},
        {periode: 'Tahunan'},
    ],
    usahaList: [
        {usaha: 'Hotel'},
        {usaha: 'Kos-kosan'},
        {usaha: 'Warung Makan'},
    ],
    pejabatList: [
        {pejabat: 'Bambang'},
        {pejabat: 'Yuli'},
        {pejabat: 'Ittofiq'},
    ],
}

refSources = {
    submitCetak: '',
}

methods = {
    submitCetak,
}

components = {
    datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function submitCetak() {
    
}