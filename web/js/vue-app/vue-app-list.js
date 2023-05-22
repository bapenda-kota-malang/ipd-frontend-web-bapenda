const messages = [];
var filterModal = null;
var confirmDelModal = null;

var app = new Vue({
	el: '#main',
	data: {
		data: data,
		filter: filter,
		pagination: {...defPagination},
		noData: false,
		searchKeywords: null,
		searchFieldTarget,
		searchPlaceHolder, 
		urls: (typeof urls == 'object') ? {...urls} : {...defUrls},
		refSources,
		...vars,
		mountedStatus: false,
	},
	created: async function() {
		//
		this.created();
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
		goTo,
		preSearch,
		search,
		showFilter,
		applyFilter,
		...methods,
	},
	components: { ...components },
})
