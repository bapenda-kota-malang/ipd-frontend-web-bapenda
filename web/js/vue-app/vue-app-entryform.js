// const { createApp } = Vue;
const messages = [];

/* Some optional variables that have default value: */
if(typeof urls == 'undefined') {
	urls =  {
		preSubmit: '/',
		postSubmit: location.pathname + location.search,
		submit: location.pathname + location.search
	}
}

var app = new Vue({
	el: appEl,
	data: {
		// main
		id: 0,
		data: {...data}, // clone for non reference mode
		dataErr: flattenClass(data), // clone for non reference mode
		useFetchData,
		fetchData: null,
		...vars, // any variables
		mountedStatus: false,
		mainMessage: {
			show: false,
			content: null,
		}
	},
	created: async function() {
		// created
		this.created();
		this.checkRefSources();
		this.createdStatus = true;

		// editing mode
		if(typeof skipDetail == 'undefined' || !skipDetail) {
			idEl = document.getElementById('id');
			if(idEl) {
				this.id = idEl.value;
				if(this.id && (this.id != '' || this.id > 0)) {
					urls.dataSrc += '/' + this.id;
					this.getDetail();
				}	
			}
		}
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
		preSubmit,
		submitData,
		...methods
	},
	components: { ...components },
})
