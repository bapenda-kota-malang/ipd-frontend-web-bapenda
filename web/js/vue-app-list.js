// const { createApp } = Vue
const messages = [];

var defPagination = {
	page: 1,
	pageSize: 10,
	pages: 0,
	blockSize: 10,
	blocks: [],
}

var defUrls = {
	pathname: location.pathname,
	dataSrc: location.pathname + location.search,
	dataPath: location.pathname,
}

var filterModal = null;

data = typeof data == 'object' ? data : [];
filter = typeof filter != 'undefined' ? filter : null;
vars = typeof vars == 'object' ? vars : {};
methods = typeof methods == 'object' ? methods : {};
components = typeof components == 'object' ? components : {};
urls = typeof urls == 'object' ? urls : { dataSrc: location.pathname + location.search };
search = typeof search == 'function' ? search : function() {};
searchKeywordsFor = typeof searchKeywordsFor != 'undefined' ? searchKeywordsFor : '';
watch = typeof watch == 'object' ? watch : {};
computed = typeof computed == 'object' ? computed : {};

var app = new Vue({
	el: '#main',
	data: {
		data: data,
		filter: filter,
		pagination: {...defPagination},
		noData: false,
		urls: (typeof urls == 'object') ? {...urls} : {...defUrls},
		searchKeywords: null,
		searchKeywordsFor,
		...vars,
	},
	created: async function() {
		this.setData();
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
				// console.log(this[prop]);
				// this.$forceUpdate();
			}
		}
	},
	mounted: function() {
		if(!filterModal) {
			filterModalEl = document.getElementById('filterModal');
			if(filterModalEl) {
				filterModal = new bootstrap.Modal(filterModalEl);
			}
		}
	
	},
	watch: {
		// applyFilter,
		...watch
	},
	computed: {
		...computed
	},
	methods: {
		setData,
		goTo,
		setPage,
		search,
		showFilter,
		applyFilter,
		...methods,
	},
	components: { ...components },
})

function setPagination(data, pgn){
	if(typeof data != 'object') {
		pagination = defPagination;
		return
	}
	pgn.page = data.page ? data.page : 1;
	pgn.pageSize = data.pageSize ? data.pageSize : 10;
	pgn.pages = (data.totalCount && data.pageSize) ? Math.ceil(data.totalCount / data.pageSize) : 1;
	pgn.blockSize = data.blockSize ? data.blockSize : 10;
	pgn.blocks = [];
	middleBlock = Math.ceil(pgn.blockSize / 2);
	if(pgn.pages <= pgn.blockSize) {
		for(i = 1; i <= pgn.pages; i++) {
			pgn.blocks.push(i);
		}
	} else if((pgn.pages > pgn.blockSize) && (pgn.page < middleBlock)) {
		for(i = 1; i <= pgn.blockSize; i++) {
			pgn.blocks.push(i);
		}
	} else if((pgn.pages > pgn.blockSize) && (pgn.page < pgn.pages - middleBlock)) {
		start = pgn.page - middleBlock;
		end = start + pgn.blockSize;;
		for(i = start; i <= end; i++) {
			pgn.blocks.push(i);
		}
	} else {
		start = pgn.pages - pgn.pageSize;
		for(i = start; i <= pgn.pages; i++) {
			pgn.blocks.push(i);
		}	
	}}

async function setData() {
	if(typeof useDummySoure != 'undefined') {
		return;
	}
	
	url = this.urls.dataSrc;
	if(typeof this.urls.dataSrcParams == 'object') {
		queryParam = setQueryParam(this.urls.dataSrcParams);
		if(queryParam != '') {
			separator = (url.indexOf('?') >= 0) ? '&' : '?';
			url += separator + queryParam;				
		}
	}
	
	if(typeof forcePostDataFetch != 'undefined') {					
		if(typeof postDataFetch == 'function') {
			postDataFetch(this.data, this);
			console.log(this.data);
		}
	}

	res = await apiFetchData(url, messages);
	if(res && typeof res == 'object' && typeof res.data != 'undefined') {
		if(typeof postDataFetch == 'function') {
			postDataFetch(res.data, this);
		}
		this.data = res.data;
	}

	if(res && res.meta) {
		setPagination(res.meta, this.pagination);
	}
}

function setPage(page) {
	search = location.search ? location.search.substring(1) : '';
	if(search) {
		searches = search.split('&');
		found = false;
		searches.forEach(function(item, index) {
			items = item.split('=');
			if(items.length != 2 || found) {
				return;
			}
			if(items[0] == 'page') {
				found = true;
				searches[index] = `${items[0]}=${page}`;
			}
		})
		if(!found) {
			searches.unshift(`page=${page}`);
		}	
	} else {
		searches = [`page=${page}`]
	} 
	search = searches.join('&');
	app.urls.dataSrc = `${app.urls.dataPath}?${search}`;
	app.pagination.page = page;
	window.history.pushState({html:document.html}, "", `${app.urls.pathname}?${search}`);
	setData(app);
}

function search() {

}

function showFilter() {
	if(filterModal) {
		filterModal.show();
	}
}

function applyFilter() {
	this.setData();
	filterModal.hide();
}

function goTo(path, event){
	className = event.target.className;
	if(!event.target.dataset.bsToggle)
		window.location.pathname = path;
}
