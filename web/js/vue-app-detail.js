// const { createApp } = Vue
const messages = [];

methods = typeof methods == 'object' ? methods : {};
components = typeof components == 'object' ? components : {};

if(typeof urls == 'undefined') {
	urls =  {
		dataSrc: location.pathname + location.search,
	}
}

var app = new Vue({
	el: '#main',
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

		res = await apiFetchData(urls.dataSrc, messages);
		if(res && typeof res == 'object' && typeof res.data != 'undefined') {
			if(typeof postDataFetch == 'function') {
				postDataFetch(res.data, this)
			}
			this.data = res.data;
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
		...methods
	},
	components: { ...components },
})
