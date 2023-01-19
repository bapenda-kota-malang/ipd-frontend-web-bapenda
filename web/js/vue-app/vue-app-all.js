// const { createApp } = Vue
const messages = [];

// showEntry = typeof showEntry == 'function' ? showEntry : function(){ console.warn('this default function is not doing anything') };
entryFormModal = null;

var app = new Vue({
	el: '#main',
	data: {
		data: data,
		entryData: entryDto,
		entryDataErr: entryDto,
		pagination: {...defPagination},
		noData: false,
		selectedIdx: null,
		urls: (typeof urls == 'object') ? {...urls} : {...defUrls},
		searchKeywords: null,
		searchKeywordsFor,
		entryFormTitle: 'Entry Form',
		entryMode: 'add',
		selectedData_id: null,
		mountedStatus: false,
		...vars,
	},
	created: async function() {
		//
		this.initPagination();
		this.getList();
		this.created();

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
	},
	mounted: async function() {
		entryFormModal = new bootstrap.Modal('#entryFormModal');
		filterModal = new bootstrap.Modal('#filterModal');
		confirmDelModal = new bootstrap.Modal('#confirmDelModal');
		this.mounted();
		this.mountedStatus = true;
	},
	watch: {...watch},
	computed: {...computed},
	methods: {
		created,
		mounted,
		postFetchData,
		postFetchDataErr,
		getList,
		setPage,
		initPagination,
		search,
		goTo,
		getDetail,
		showEntry,
		preShowEntry: typeof preShowEntry == 'function' ? preShowEntry : function(){},
		postShowEntry: typeof postShowEntry == 'function' ? postShowEntry : function(){},
		submitEntry,
		preSubmitEntry: typeof preSubmitEntry == 'function' ? preSubmitEntry : function(){},
		postSubmitEntry: typeof postSubmitEntry == 'function' ? postSubmitEntry : function(){},
		showDel,
		submitDel,
		submitResult,
		refreshSelect,
		...methods,
	},
	components: { ...components },
})

async function showEntry(idx) {
	if(typeof preShowEntry == 'function') {
		this.preShowEntry();
	}

	if(typeof idx == 'undefined') {
		this.entryFormTitle = 'Tambah Data';
		this.entryMode = 'add';
		if(typeof cleanData == 'function') {
			cleanData(this.entryData);
		}	
	} else {
		this.entryFormTitle = 'Modifikasi Data';
		this.entryMode = 'edit';
		this.selectedData_id = this.data[idx].id;
		this.entryData = {...this.data[idx]};
	}
	entryFormModal.show();

	if(typeof postShowEntry == 'function') {
		this.postShowEntry();
	}	
}

async function submitEntry() {
	if(typeof preSubmitEntry == 'function' && this.preSubmitEntry() === false) {
		return;
	}

	if(this.entryMode == 'add') {
		res = await apiFetch(urls.submit.replace('/{id}', ''), 'POST', this.entryData);
	} else {
		res = await apiFetch(urls.submit.replace('{id}', this.selectedData_id), 'PATCH', this.entryData);
	}

	if(typeof postSubmitEntry == 'function') {
		this.postSubmitEntry();
	} else {
		this.submitResult(res);
	}

}

function submitResult(res) {
	if(res.success) {
		if(typeof postSubmit == 'function') {
			this.postSubmit();
		} else {
			this.getList();
			entryFormModal.hide();

		}
	} else {
		if(typeof submitFailed == 'function') {
			this.submitFailed();
		}
		if(typeof res.message !== 'undefined') {
			applyErrMessage(res.message, this.mainMessage, this.entryDataErr);
		}
	}
	this.$forceUpdate();
}