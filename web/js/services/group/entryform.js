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
	showMenuList,
	checkSelectedMenu,
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

function checkSelectedMenu(idx, id) {
	check = this.menuPrivillegeList.filter(item => item.id == id);
	if(check.length == 0) {
		this.menuPrivillegeList.push({
			id,
			privileges: 0,
			title: item[1],
			deleted: null,
		});	
	} else {
		check.deleted = null
	}
}
