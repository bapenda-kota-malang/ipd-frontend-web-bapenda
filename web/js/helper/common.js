function cleanArrayString(data){
	for (const prop in data) {
		data[prop] = '';
	}
}

function applyErrMessage(messageSrc, messageTarget, dataErr) {
	if(typeof messageSrc == 'string') {
		messageTarget.show = true;
		messageTarget.content = messageSrc;
	} else {
		for (const prop in messageSrc) {
			if(typeof dataErr[prop] != undefined) {
				dataErr[prop] = messageSrc[prop].errMessage;
			}
		}
	}
}

function goTo(path) {
	window.location.href = path;
}

function strCutRight(str, length) {
	return str.substring(str.length - length, str.length);
}

function getQueryParam(param) {
    let uri = window.location.href.split('?');
    if(uri.length < 2)
		return '';

	let result = '';
	let vars = uri[1].split('&');
	for(let i = 0; i < vars.length; i++) {
		let pair = vars[i].split('=');
        if(pair[0] == param) {
            result = pair[1];
            break;
        }
	}
	return result;
}
