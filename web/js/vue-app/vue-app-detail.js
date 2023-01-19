// const { createApp } = Vue
const messages = [];

methods = typeof methods == 'object' ? methods : {};
components = typeof components == 'object' ? components : {};
urls = typeof urls == 'undefined' ? { dataSrc: location.pathname + location.search } : urls;
appEl = typeof appEl == 'undefined' ? '#main' : appEl;

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
		this.created();
		this.getDetail();
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
		refreshSelect,
		getDetail,
		goTo,
		...methods
	},
	components: { ...components },
})
