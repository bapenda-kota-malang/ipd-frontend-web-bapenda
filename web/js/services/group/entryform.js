var menuListModal = null;

data = {...groupCreate};
vars = {
	accessList: []
}
urls = {
	preSubmit: '/konfigurasi/manajemen-user/group',
	postSubmit: '/konfigurasi/manajemen-user/group',
	submit: '/group/{id}',
	dataSrc: '/group',
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}
function mounted() {
	
}