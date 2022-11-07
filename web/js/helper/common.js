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

function strRight(str, length) {
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

function storeFileToField(event, data, field, format, errKey) {
	if(!errKey)
		errKey = field;
	this.dataErr[errKey] = null;

	var file = event.target.files[0];
	if(format && !file.type.match(format)) {
		this.dataErr[errKey] = 'harus berformat ' + format;
		return;
	}

	var reader = new FileReader();
	reader.onload = function (readerEvent) {
		data[field] = readerEvent.target.result
	}
	reader.readAsDataURL(file);
}

function formatDate(date) {
	if(!date || typeof date != 'object')
		return '';
	const day = strRight('0' + (date.getDate()), 2);
	const month = strRight('0' + (date.getMonth() + 1), 2);
	const year = date.getFullYear();

	return `${day}/${month}/${year}`;
}

// var from function
dateFormat = function(date) {
	const day = date.getDate();
	const month = date.getMonth() + 1;
	const year = date.getFullYear();

	return `${day}/${month}/${year}`;
}
