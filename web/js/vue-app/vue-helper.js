urls = typeof urls == 'object' ? urls : { pathname: location.pathname, dataSrc: location.pathname + location.search, dataPath: location.pathname };
data = typeof data == 'object' ? data : [];
vars = typeof vars == 'object' ? vars : {};
methods = typeof methods == 'object' ? methods : {};
watch = typeof watch == 'object' ? watch : {};
computed = typeof computed == 'object' ? computed : {};
components = typeof components == 'object' ? components : {};

created = typeof created == 'function' ? created : function(){};
mounted = typeof mounted == 'function' ? mounted : function(){};

function goTo(path, event){
	if(!event.target.dataset.bsToggle)
		window.location.pathname = path;
}
