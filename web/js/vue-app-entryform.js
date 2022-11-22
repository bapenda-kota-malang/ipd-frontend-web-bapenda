// const { createApp } = Vue;
const messages = [];

/* 
--------------------------------------------------------------------------------
Please provide (since we don't use class) some neeeded variables as listed 
at the following structure:
--------------------------------------------------------------------------------
data = {}, mostly dot object or just plain model
vars = {}, any variables
refSources = { varName1: '/{url1}', varName2: '/{url2}', ...}, based on ref's

--------------------------------------------------------------------------------
Some optional variables:
--------------------------------------------------------------------------------
preSubmit = function(){}
postSubmit = function(){}
submitFailed = function(){}
methods = { function(){},  function(){}, ... }
mounted = function(this){}, this from vue object
components = {}
urls = {
	preSubmit: '/{url}',
	postSubmit: '/{url}',
	submit: '/{url}',
}
skipDetail = boolean
appEl = ''
*/

/* Some optional variables that have default value: */
methods = typeof methods == 'object' ? methods : {};
components = typeof components == 'object' ? components : {};
if(typeof urls == 'undefined') {
	urls =  {
		preSubmit: '/',
		postSubmit: location.pathname + location.search,
		submit: location.pathname + location.search
	}
}
if(typeof appEl == 'undefined') {
	appEl = '#main';
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
					res = await apiFetchData(`${urls.dataSrc}/${this.id}`, messages);
					if(typeof res.data == 'object') {
						// check again T_T
						if(typeof postDataFetch == 'function') {
							postDataFetch(res.data, this);
						}
						// finally
						if(typeof skipPopulate == 'undefined' || !skipPopulate) {
							this.data = res.data;
						}
					}
				}	
			}
		}

		// some additional function for mounted
		if(typeof mounted == 'function') {
			mounted(this);
		}

		// mark mounted
		this.mountedStatus = true;
	},
	methods: {
		async submitData() {
			this.mainMessage.show = false;
			cleanArrayString(this.dataErr)
			if(typeof preSubmit == 'function') {
				preCheck = preSubmit(this);
				if(preCheck === false) {
					return;
				}
			}
			if(!this.id) {
				res = await apiFetch(urls.submit.replace('/{id}', ''), 'POST', this.data);
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
			this.$forceUpdate();
		},
		async refreshSelect(selectedOption, srcRef, url, targetRef, srcFieldName, srcIdx) {
			if((typeof srcFieldName == 'undefined') || (srcFieldName == "")) {
				srcFieldName = 'id';
			}
			if((typeof srcIdx == 'undefined') || (srcIdx == "")) {
				srcIdx = 'id';
			}
			targetRef.splice(0, targetRef.length);
			// value = event.target.selectedOptions[0].value.trim();
			src = null;
			for (var i=0; i < srcRef.length; i++) {
				if (srcRef[i][srcIdx] == selectedOption) {
					src = srcRef[i];
					break
				}
			}
			if(!src)
				return;
			res = await apiFetch(url.replace('{' + srcFieldName + '}', src[srcFieldName]))
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
})

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