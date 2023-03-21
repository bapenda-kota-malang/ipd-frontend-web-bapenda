// const { createApp } = Vue
const messages = [];

var defPagination = {
	page: 1,
	pageSize: 10,
	pages: 0,
	blockSize: 10,
	blocks: [],
}

var defUrls = {
	pathname: location.pathname,
	dataSrc: location.pathname + location.search,
	dataPath: location.pathname,
}

var filterModal = null;

data = typeof data == 'object' ? data : [];
filter = typeof filter != 'undefined' ? filter : null;
vars = typeof vars == 'object' ? vars : {};
methods = typeof methods == 'object' ? methods : {};
components = typeof components == 'object' ? components : {};
urls = typeof urls == 'object' ? urls : { dataSrc: location.pathname + location.search };
search = typeof search == 'function' ? search : function() {};
searchKeywordsFor = typeof searchKeywordsFor != 'undefined' ? searchKeywordsFor : '';
watch = typeof watch == 'object' ? watch : {};
computed = typeof computed == 'object' ? computed : {};

var app = new Vue({
	el: '#main',
	data: {
		data: data,
		filter: filter,
		pagination: {...defPagination},
		noData: false,
		searchKeywords: null,
		searchKeywordsFor,
		urls: (typeof urls == 'object') ? {...urls} : {...defUrls},
		refSources,
		...vars,
		mountedStatus: false,
	},
	created: async function() {
		//
		this.created();
		this.initPagination();
		this.getList();
		this.checkRefSources();
		this.createdStatus = true;
	},
	mounted: function() {
		this.mounted();
		this.mountedStatus = true;

		filterModalEl = document.getElementById('filterModal');
		confirmDelModalEl = document.getElementById('confirmDelModal');
		if(filterModalEl) {
			filterModal = new bootstrap.Modal(filterModalEl);
		}
		if(confirmDelModalEl) {
			confirmDelModal = new bootstrap.Modal(confirmDelModalEl);
		}
	},
	watch: {
		...watch
	},
	computed: {
		...computed
	},
	methods: {
		created,
		mounted,
		postFetchData,
		postFetchDataErr,
		postCheckRefSources,
		checkRefSources,
		refreshSelect,
		getList,
		setPage,
		initPagination,
		goTo,
		search,
		showFilter,
		applyFilter,
		...methods,
	},
	components: { ...components },
})

function search() {

}

function showFilter() {
	if(filterModal) {
		filterModal.show();
	}
}

function applyFilter() {
	this.setData();
	filterModal.hide();
}

function goTo(path, event){
	className = event.target.className;
	if(!event.target.dataset.bsToggle)
		window.location.pathname = path;
}
