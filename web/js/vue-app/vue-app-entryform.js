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
		...vars, // any variables
		mountedStatus: false,
		mainMessage: {
			show: false,
			content: null,
		}
	},
	created: async function() {
		// sources for refs that need to fetch data
		if(typeof refSources === 'object') {
			for (const prop in refSources) {
				if(typeof this[prop] != 'object')
					continue;
				res = await apiFetchData(refSources[prop], messages);
				if(!res) {
					console.error('failed to fetch "' + refSources[prop] + '"');
					continue;
				}
				this[prop] = typeof res.data != 'undefined' ? res.data : [];
			}
		}

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

		// created
		this.created();
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
		preSubmit,
		submitData,
		refreshSelect,
		...methods
	},
	components: { ...components },
})
