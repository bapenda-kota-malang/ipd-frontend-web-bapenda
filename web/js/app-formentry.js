const { createApp } = Vue;
const messages = [];

/*
Please provide (since we don't use class) some neeeded variables as listed 
at the following structure:
------------------------
data = {}, mostly dot object or just plain model
vars = {}, any variables
refs = {}, since it's for references, mostly { varName1: [], varName2: [], ... }
refSources =  { varName1: '/{url1}', varName2: '/{url2}', ...}, based on ref's varName above
*/

/*
Some optional variables:
------------------------
preSubmit = function(){}
postSubmit = function(){}
submitFailed = function(){}
methods = { function(){},  function(){}, ... }
mounted = function(this){}, this from vue object
url = {
	preSubmit: '/{url}',
	postSubmit: '/{url}',
	submit: '/{url}',
}
skipDetail = boolean
appEl = ''
*/

///// Default optional values that needs to be set
if(typeof methods == 'undefined') {
	methods = {}
}
if(typeof components == 'undefined') {
	components = {}
}
if(typeof urls == 'undefined') {
	urls =  {
		preSubmit: '/',
		postSubmit: location.pathname + location.search,
		submit: location.pathname + location.search
	}
}

// Go vue, goooo
createApp({
	data() {
		return {
			// main
			id: 0,
			data: {...data}, // clone for non reference mode
			dataErr: flattenClass(data), // clone for non reference mode
			// refs
			vars: {...vars}, 
			refs: {...refs}, // array of object
			mainMessage: {
				show: false,
				content: null,
			}
		}
	},
	async mounted() {
		// sources for refs that need to fetch data
		if(typeof refSources === 'object') {
			for (const prop in refSources) {
				if(typeof this.refs[prop] != 'object')
					continue;
				res = await apiFetchData(refSources[prop], messages);
				if(!res) {
					console.error('failed to fetch "' + refSources[prop] + '"');
					continue;
				}
				this.refs[prop] = typeof res.data != 'undefined' ? res.data : [];
			}
		}

		// editing mode
		if(typeof skipDetail == 'undefined' || !skipDetail) {
			this.id = document.getElementById('id');
			if(this.id && this.id > 0) {
				res = await getDetail(this.id);
				if(typeof res.data == 'object') {
					this.data = res.data;
				}
			}
		}

		// some additional function for mounted
		if(typeof mounted == 'function') {
			mounted(this);
		}
	},
	methods: {
		async submitData() {
			this.mainMessage.show = false;
			cleanArrayString(this.dataErr)
			if(typeof preSubmit == 'function') {
				preSubmit(this);
			}
			if(!this.id) {
				res = await apiFetch(urls.submit, 'POST', this.data);
			} else {
				res = await apiFetch(urls.submit.replace('{id}', this.id), 'PATCH', this.data);
			}
			if(res.success) {
				if(typeof postSubmit == 'function') {
					postSubmit(this);
				} else {
					window.location.href = urls.postSubmit;
				}
			} else {
				if(typeof submitFailed == 'function') {
					submitFailed(this);
				}
				if(typeof res.message !== 'undefined') {
					applyErrMessage(res.message, this.mainMessage, this.dataErr);
				}
			}
		},
		async refreshSelect(event, srcRef, fieldName, url, targetRef) {
			if((typeof fieldName == 'undefined') || (fieldName == "")) {
				fieldName = 'id';
			}
			targetRef.splice(0, targetRef.length);
			value = event.target.selectedOptions[0].value.trim();
			res = await apiFetch(urls.replace('{' + fieldName + '}', srcRef[value][fieldName]))
			res.data.data.forEach(function(item)  {
				targetRef.push(item);		
			});
		},
		log(name, val) {
			console.log(name, val);
		},
		...methods
	},
	components: { ...components },
}).mount(appEl)


function flattenClass(input, parent) {
	if(typeof input != 'object')
		return;
	
	res = {}
	for(const key in input) {
		if(typeof input[key] == 'object') {
			res = {...res, ...flattenClass(input[key], key)}
		} else {
			res[parent + "." + key] = "";
		}
	}
	return res
}