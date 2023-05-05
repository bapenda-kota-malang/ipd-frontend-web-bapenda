var data = typeof data == 'object' ? data : [];
var filter = typeof filter != 'undefined' ? filter : null;
var searchFieldTarget = typeof searchFieldTarget != 'undefined' ? searchFieldTarget : 'nama';
var searchPlaceHolder = typeof searchPlaceHolder != 'undefined' ? searchPlaceHolder : 'Cari...';

defPagination = {
	page: 1,
	pageSize: 10,
	pages: 0,
	blockSize: 10,
	blocks: [],
}

defUrls = {
	pathname: location.pathname,
	dataSrc: location.pathname + location.search,
	dataPath: location.pathname,
}

const messages = [];

async function getList() {
	if(typeof useDummySoure != 'undefined') {
		return;
	}

	url = this.urls.dataSrc;
	urlParamStatus = (url.indexOf('?') >= 0) ? true : false;

	dataSrcParams = typeof this.urls.dataSrcParams == 'object' ? this.urls.dataSrcParams : {};  
	queryParams = setQueryParam(dataSrcParams);
	if(queryParams != '') {
		url += (urlParamStatus ? '&' : '?') + queryParams;	
		urlParamStatus = true;
	}

	filter = typeof this.filter == 'object' ? this.filter : {};  
	queryParams = setQueryParam(filter);
	if(queryParams != '') {
		url += (urlParamStatus ? '&' : '?') + queryParams;	
		urlParamStatus = true;
		window.history.pushState({html:document.html}, "", `${this.urls.pathname}?${queryParams}`);
	}

	searches = [];
	search = location.search ? location.search.substring(1) : '';
	if(search) {
		searches = search.split('&');
		pagination = this.pagination;
		myQueryParam = '';
		searches.forEach(function(item, index) {
			items = item.split('=');
			if(items.length != 2) {
				return;
			}
			if(items[0] == 'page') {
				pagination.page = items[1];
			} else if(items[0] == this.searchFieldTarget) {
				this.searchKeywords = items[1];
			}
		})
		url += (urlParamStatus ? '&' : '?') + search;
	}

	res = await apiFetchData(url, messages);
	if(res && typeof res == 'object' && typeof res.data != 'undefined') {
		this.postFetchData(res.data);
		this.data = res.data;
	}

	if(res && res.meta) {
		setPagination(res.meta, this.pagination);
	}
}

function setPage(page) {
	searches = [];
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

function search() {
	window.history.pushState({html:document.html}, "", `${this.urls.pathname}?${this.searchFieldTarget}=${this.searchKeywords}`);
	this.getList();
}

function showFilter() {
	if(filterModal) {
		filterModal.show();
	}
}

function applyFilter() {
	this.getList();
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
