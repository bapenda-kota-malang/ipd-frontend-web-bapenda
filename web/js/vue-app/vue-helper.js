urls = typeof urls == 'object' ? urls : { pathname: location.pathname, dataSrc: location.pathname + location.search, dataPath: location.pathname };
data = typeof data == 'object' ? data : [];
vars = typeof vars == 'object' ? vars : {};
computed = typeof computed == 'object' ? computed : {};
watch = typeof search == 'object' ? watch : {};
methods = typeof methods == 'object' ? methods : {};
components = typeof components == 'object' ? components : {};
refSources = typeof refSources == 'object' ? refSources : {};

created = typeof created == 'function' ? created : function(){};
mounted = typeof mounted == 'function' ? mounted : function(){};
postFetchData = typeof postFetchData == 'function' ? postFetchData : function(){};
postFetchDataErr = typeof postFetchDataErr == 'function' ? postFetchDataErr : function(){};

appEl = typeof appEl == 'undefined' ? '#main' : appEl;

function goTo(path, event){
	if(!event.target.dataset.bsToggle)
		window.location.pathname = path;
}

async function checkRefSources() {
	// sources for refs that need to fetch data
	if(typeof this.refSources === 'object') {
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
	}	
}

async function refreshSelect(selectedOption, srcRef, url, targetRef, srcFieldName, srcIdx) {
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
}
