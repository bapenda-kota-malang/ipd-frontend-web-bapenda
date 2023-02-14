urls = {
	pathname: '/pendaftaran/wajib-pajak',
	dataPath: '/npwpd',
	dataSrc: '/npwpd',
}

data = [

]
vars = {
	searchKeywords:null,
	paymentMethods: [
		{ id: '', name: 'Test' },
		{ id: '', name: 'Test' }
	]
}
refSources = {
}
watch = {
}
methods = {
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function postFetchData(data) {
	while(data.length > 0) {
		data.splice(0, 1);
	}
	dummyDataList.forEach(function(item) {
		data.push(item);
	});
}