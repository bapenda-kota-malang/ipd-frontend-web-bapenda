data = {
	months: []
}

urls = {
	pathname: '/',
	dataPath: '/ppat',
	dataSrc: '/ppat'
}

vars = {
	status: ['Baru', 'Aktif', 'Diblokir', 'Ditolak'],
}

components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function mounted() {
	data.months = months
}