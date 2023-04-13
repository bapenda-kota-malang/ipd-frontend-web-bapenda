data = {...printEntry}

vars = {
    pajakList: [],
}

refSources = {
    pajakList: '/rekening?kodeJenisUsaha=0&kodeJenisUsaha_opt=gt&no_pagination=true',
}

components = {
    datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function mounted(xthis) {
	xthis.pajakList.forEach(function(item, idx){
		xthis.pajakList[idx].nama = item.kode + ' - ' + item.nama;
	})
}