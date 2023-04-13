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
    usahaList: [],
    pejabatList: [
        {pejabat: 'Bambang'},
        {pejabat: 'Yuli'},
        {pejabat: 'Ittofiq'},
    ],
}

refSources = {
    usahaList: '/rekening?kodeJenisUsaha=0&kodeJenisUsaha_opt=gt&no_pagination=true',
}

components = {
    datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function mounted(xthis) {
	xthis.usahaList.forEach(function(item, idx){
		xthis.usahaList[idx].nama = item.kode + ' - ' + item.nama;
	})
}