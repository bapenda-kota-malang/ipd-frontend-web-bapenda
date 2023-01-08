preSubmit = typeof preSubmit == 'function' ? preSubmit : function(){} ;

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
