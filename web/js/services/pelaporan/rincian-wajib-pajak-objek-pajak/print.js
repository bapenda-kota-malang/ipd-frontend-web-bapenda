data = {...printEntry}

vars = {
    golonganList: [
        {golongan: 'Badan'},
        {golongan: 'Pribadi'},
    ],
    npwpdList: [],
    pajakList: [],
}

refSources = {
    npwpdList: '/npwpd',
    pajakList: '/rekening?kodeJenisUsaha=0&kodeJenisUsaha_opt=gt&no_pagination=true',
}

components = {
    datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function mounted(xthis) {
	xthis.npwpdList.forEach(function(item, idx){
		xthis.npwpdList[idx].nama = item.npwpd + ' - ' + item.rekening.jenisUsaha;
	});

    xthis.pajakList.forEach(function(item, idx){
		xthis.pajakList[idx].nama = item.kode + ' - ' + item.nama;
	})
}