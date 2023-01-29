var today = new Date();

urls = {
	pathname: '/pendataan/dbkb/standar/fasilitas-umum',
	dataPath: '/dbkbfasum',
	dataSrc: '/dbkbfasum?no_pagination=true',
	dataSrcParams: {
		searchKeywords: '',
	}
}

vars = {
	searchKeywords:null,
	tahun: today.getFullYear(),
	dbkbFasumList: {},
	dbkbFasumNonDepList: {},
	dbkbFasumBintangList: {},
	dbkbFasumMinMaxList:{},
}
refSources = {
	dbkbFasumNonDepList: '/dbkbfasum',
	dbkbFasumBintangList: '/dbkbfasum',
	dbkbFasumMinMaxList: '/dbkbfasum',
}
watch = {
}
methods = {
}
components = {
	// dbkbFasumItem
}

function submitData() {

}

function postFetchData(data) {
	dbkbFasumList = this.dbkbFasumList;
	data.forEach(function(item, idx){
		dbkbFasumList[item.kode] = {
			nama: item.nama,
			items: [],
		}
	});
	console.log(this.dbkbFasumList);
	this.$forceUpdate();
}
