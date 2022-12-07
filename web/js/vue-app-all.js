// const { createApp } = Vue
const messages = [];

showAdd = typeof showAdd == 'function' ? showAdd : function(){ console.warn('this default function is not doing anything') };
submitAdd = typeof submitAdd == 'function' ? submitAdd : function(){ console.warn('this default function is not doing anything') };
showEdit = typeof showEdit == 'function' ? showEdit : function(){ console.warn('this default function is not doing anything') };
submitEdit = typeof submitEdit == 'function' ? submitEdit : function(){ console.warn('this default function is not doing anything') };

entryFormModal = null;

var app = new Vue({
	el: '#main',
	data: {
		data: data,
		entryData: entryDto,
		pagination: {...defPagination},
		noData: false,
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
		confirmDelModal = new bootstrap.Modal('#confirmDelModal');
		this.mounted();
	},
	watch: {...watch},
	methods: {
		created,
		mounted,
		getList,
		setPage,
		initPagination,
		search,
		goTo,
		getDetail,
		showAdd,
		showEdit,
		submitEntry,
		showDel,
		submitDel,
		submitResult,
		...methods,
	},
	components: { ...components },
})

function showAdd() {
	this.entryFormTitle = 'Tambah Data';
	this.entryMode = 'add';
	if(typeof cleanData == 'function') {
		cleanData(this.entryData);
	}
	entryFormModal.show();
	// this.$forceUpdate();
}

async function showEdit(idx) {
	this.entryFormTitle = 'Modifikasi Data';
	this.entryMode = 'edit';
	this.selectedData_id = this.data[idx].id;
	this.entryData = {...this.data[idx]};
	entryFormModal.show();
	this.$forceUpdate();
}

async function submitEntry() {
	if(typeof preSubmit == 'function' && this.preSubmit() === false) {
		return;
	}

	if(this.entryMode == 'add') {
		res = await apiFetch(urls.submit.replace('/{id}', ''), 'POST', this.entryData);
	} else {
		res = await apiFetch(urls.submit.replace('{id}', this.selectedData_id), 'PATCH', this.entryData);
	}
	this.submitResult(res);
}

function submitResult(res) {
	if(res.success) {
		if(typeof postSubmit == 'function') {
			this.postSubmit(this);
		} else {
			this.getList();
			entryFormModal.hide();

		}
	} else {
		if(typeof submitFailed == 'function') {
			this.submitFailed(this);
		}
		if(typeof res.message !== 'undefined') {
			applyErrMessage(res.message, this.mainMessage, this.dataErr);
		}
	}
	this.$forceUpdate();
}