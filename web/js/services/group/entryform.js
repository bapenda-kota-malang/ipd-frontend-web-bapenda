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
	deleteSelectedMenu,
}
components = {
}

function mounted(xthis) {
	xthis.menuPrivillegeList = JSON.parse(xthis.data.access);
	xthis.menuPrivillegeList.forEach(function(item) {
		console.log(xthis.menuArray[0]);
		check = xthis.menuArray.filter(function(obj) { if(obj[0] == item.path) return obj });
		found = null;
		if(check.length > 0) {
			found = check[0];
		}
		idx = xthis.menuArray.indexOf(found);
		xthis.menuArray[idx][4] = true;
	});
}

function showMenuList() {
	if(!menuListModal) {
		menuListModal = new bootstrap.Modal('#menuListModal');
	}
	this.$forceUpdate();
	menuListModal.show();
}

function checkSelectedMenu(event, item, idx) {
	// ga pake arrow function, backward compatibility mengkhawatirkan
	check = this.menuPrivillegeList.filter(function(obj) { if(obj.path == item[0]) return obj });
	if(event.target.checked) {
		if(check.length == 0) {
			newItem = {
				idx,
				path: item[0],
				title: item[1],
				privilegesObj: {
					read: 0,
					create: 0,
					update: 0,
					delete: 0,
				},
				deleted: null,
			};
			check = this.menuPrivillegeList.filter(function(obj) { if(obj.idx > idx) return obj });
			if(check.length == 0) {
				this.menuPrivillegeList.push(newItem);
			} else {
				pos = this.menuPrivillegeList.indexOf(check[0]);
				this.menuPrivillegeList.splice(pos, 0, newItem);
			}
		} else {
			check[0].deleted = null
		}
		this.menuArray[idx][4] = true;
	} else {
		this.menuArray[idx][4] = false;
		check[0].deleted = true
	}
}

function deleteSelectedMenu(idx) {
	this.menuPrivillegeList[idx].deleted = true
	this.menuArray[idx][4] = false;
}

function preSubmit(xthis) {
	selected = xthis.menuPrivillegeList.filter(function(obj) { if(obj => !obj.deleted) return obj });
	xthis.data.access = JSON.stringify(selected);
}