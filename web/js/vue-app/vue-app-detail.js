// const { createApp } = Vue
const messages = [];

urls = typeof urls == 'undefined' ? { dataSrc: location.pathname + location.search } : urls;

var app = new Vue({
	el: appEl,
	data: {
		id: null,
		data: data,
		noData: false,
		hideApproval: false,
		useFetchData,
		fetchData: null,
		// pathname: location.pathname,
		urls,
		refSources,
		...vars,
		mountedStatus: false,
	}, 
	created: async function() {
		//
		this.created();
		this.getDetail();
		this.checkRefSources();
		this.createdStatus = true;
	},
	mounted: async function() {
		this.mounted();
		this.mountedStatus = true;
	},
	methods: {
		created,
		mounted,
		postFetchData,
		postFetchDataErr,
		postCheckRefSources,
		checkRefSources,
		refreshSelect,
		getDetail,
		goTo,
		...methods
	},
	watch: { ...watch },
	computed: { ...computed },
	components: { ...components },
})
