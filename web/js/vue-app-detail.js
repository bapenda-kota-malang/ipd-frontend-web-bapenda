// const { createApp } = Vue
const messages = [];

methods = typeof methods == 'object' ? methods : {};
components = typeof components == 'object' ? components : {};
urls = typeof urls == 'undefined' ? { dataSrc: location.pathname + location.search } : urls;
appEl = typeof appEl == 'undefined' ? '#main' : appEl;
postDataFetchErr = typeof postDataFetchErr == 'function' ? postDataFetchErr : function(){};

var app = new Vue({
	el: appEl,
	data: {
		data:data,
		noData: false,
		hideApproval: false,
		// pathname: location.pathname,
		...vars,
		urls,
		mountedStatus: false,
	}, 
	created: async function() {
		if(typeof forcePostDataFetch != 'undefined') {					
			if(typeof postDataFetch == 'function') {
				postDataFetch(this.data, this);
			}
		}

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

		res = await apiFetchData(urls.dataSrc, this.messages);
		if(res && typeof res == 'object') { // && typeof res.data != 'undefined')
			if(typeof postDataFetch == 'function') {
				postDataFetch(res.data, this)
			}
			this.data = res.data;
		} else if(typeof postDataFetchErr == 'function') {
			this.postDataFetchErr()
		}

		// some additional function for mounted
		if(typeof mounted == 'function') {
			mounted(this);
		}
	},
	methods: {
		goTo(path){
			window.location.pathname = path;
		},
		postDataFetchErr,
		...methods
	},
	components: { ...components },
})
