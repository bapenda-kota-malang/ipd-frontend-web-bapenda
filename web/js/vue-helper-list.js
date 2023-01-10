var defPagination = {
	page: 1,
	pageSize: 10,
	pages: 0,
	blockSize: 10,
	blocks: [],
}

searchKeywordsFor = typeof searchKeywordsFor != 'undefined' ? searchKeywordsFor : '';
search = typeof search == 'function' ? search : function() {};
filterModal = null;
confirmDelModal = null;

async function getList() {
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

function initPagination() {
	search = location.search ? location.search.substring(1) : '';
	if(search) {
		searches = search.split('&');
		found = false;
		page = null;
		searches.forEach(function(item, index) {
			items = item.split('=');
			if(items.length != 2 || found) {
				return;
			}
			if(items[0] == 'page') {
				found = true;
				page = items[1];
			}
		})
		this.setPage(page);
	}
}

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
	this.urls.dataSrc = `${this.urls.dataPath}?${search}`;
	this.pagination.page = page;
	window.history.pushState({html:document.html}, "", `${this.urls.pathname}?${search}`);
	this.getList();
}

function setSearch() {

}

function showFilter() {
	filterModal.show();
}

function applyFilter() {
	this.setData();
	filterModal.hide();
}

function showDel(idx) {
	this.selectedData_id = this.data[idx].id;
	this.entryData = this.data[idx];
	confirmDelModal.show();
}

async function submitDel() {
	res = await apiFetch(urls.submit.replace('{id}', this.selectedData_id), 'DELETE');
	if(res.success) {
		confirmDelModal.hide();
		this.getList();
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
