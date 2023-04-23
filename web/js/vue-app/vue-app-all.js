var entryFormModal = null;

var app = new Vue({
	el: '#main',
	data: {
		data: data,
		entryData: entryDto,
		entryDataErr: entryDto,
		pagination: {...defPagination},
		noData: false,
		selectedIdx: null,
		searchKeywords: null,
		searchFieldTarget,
		searchPlaceHolder, 
		entryFormTitle: 'Entry Form',
		entryMode: 'add',
		selectedData_id: null,
		urls: (typeof urls == 'object') ? {...urls} : {...defUrls},
		refSources,
		...vars,
		mountedStatus: false,
	},
	created: async function() {
		//
		this.created();
		if(typeof skipDataPopulation == 'undefined' || skipDataPopulation){
			this.getList();
			this.checkRefSources();	
		}
		this.createdStatus = true;
	},
	mounted: async function() {
		this.mounted();
		this.mountedStatus = true;

		filterModalEl = document.getElementById('filterModal');
		entryFormModalEl = document.getElementById('entryFormModal');
		confirmDelModalEl = document.getElementById('confirmDelModal');
		if(filterModalEl) {
			filterModal = new bootstrap.Modal(filterModalEl);
		}
		if(entryFormModalEl) {
			entryFormModal = new bootstrap.Modal(entryFormModalEl);
		}
		if(confirmDelModalEl) {
			confirmDelModal = new bootstrap.Modal(confirmDelModalEl);
		}
	},
	watch: {...watch},
	computed: {...computed},
	methods: {
		created,
		mounted,
		postFetchData,
		postFetchDataErr,
		postCheckRefSources,
		checkRefSources,
		refreshSelect,
		getList,
		setPage,
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
		showFilter,
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