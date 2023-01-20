// const { createApp } = Vue
const messages = [];

urls = typeof urls == 'undefined' ? { dataSrc: location.pathname + location.search } : urls;

var app = new Vue({
	el: appEl,
	data: {
		id: null,
		data:data,
		noData: false,
		hideApproval: false,
		// pathname: location.pathname,
		...vars,
		urls,
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
		checkRefSources,
		refreshSelect,
		getDetail,
		goTo,
		...methods
	},
	components: { ...components },
})
