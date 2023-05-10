var urls = typeof urls == 'object' ? urls : { pathname: location.pathname, dataSrc: location.pathname + location.search, dataParams: {}, dataPath: location.pathname };
var vars = typeof vars == 'object' ? vars : {};
var computed = typeof computed == 'object' ? computed : {};
var watch = typeof search == 'object' ? watch : {};
var methods = typeof methods == 'object' ? methods : {};
var components = typeof components == 'object' ? components : {};
var refSources = typeof refSources == 'object' ? refSources : {};

var created = typeof created == 'function' ? created : function(){};
var postCreated = typeof postCreated == 'function' ? postCreated : function(){};
var mounted = typeof mounted == 'function' ? mounted : function(){};
var postFetchData = typeof postFetchData == 'function' ? postFetchData : function(){};
var postFetchDataErr = typeof postFetchDataErr == 'function' ? postFetchDataErr : function(){};
var postCheckRefSources = typeof postCheckRefSources == 'function' ? postCheckRefSources : function(){};

appEl = typeof appEl == 'undefined' ? '#main' : appEl;

function goTo(path, event){
	className = event.target.className;
	if(!event.target.dataset.bsToggle)
		window.location.pathname = path;
}

async function checkRefSources() {
	for (const prop in this.refSources) {
		if(typeof this[prop] != 'object')
			continue;
		res = await apiFetchData(this.refSources[prop], messages);
		if(!res) {
			console.error('failed to fetch "' + this.refSources[prop] + '"');
			continue;
		}
		this[prop] = typeof res.data != 'undefined' ? res.data : [];
	}
	this.postCheckRefSources();
}

async function refreshSelect(selectedOption, srcRef, url, targetRef, srcFieldName, srcIdx) {
	if((typeof srcFieldName == 'undefined') || (srcFieldName == "")) {
		srcFieldName = 'id';
	}
	if((typeof srcIdx == 'undefined') || (srcIdx == "")) {
		srcIdx = 'id';
	}
	targetRef.splice(0, targetRef.length);
	src = null;
	for (var i=0; i < srcRef.length; i++) {
		if (srcRef[i][srcIdx] == selectedOption) {
			src = srcRef[i];
			break
		}
	}
	if(!src) {
		return;
	}
	res = await apiFetch(url.replace('{' + srcFieldName + '}', src[srcFieldName]))
	res.data.data.forEach(function(item)  {
		targetRef.push(item);		
	});
}
