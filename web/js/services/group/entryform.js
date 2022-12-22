var menuListModal = null;

data = {...groupCreate};
vars = {
	accessList: [],
	menuArray,
	menuPrivillegeList: [],
	selectedMenuArrayIdx: [],
}
urls = {
	preSubmit: '/konfigurasi/manajemen-user/group',
	postSubmit: '/konfigurasi/manajemen-user/group',
	submit: '/group/{id}',
	dataSrc: '/group',
}
methods = {
	showMenuList
}
components = {
}

function mounted() {
}

function showMenuList() {
	if(!menuListModal) {
		menuListModal = new bootstrap.Modal('#menuListModal');
	}
	this.$forceUpdate();
	menuListModal.show();
}