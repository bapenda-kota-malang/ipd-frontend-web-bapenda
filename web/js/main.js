async function apiFetch(url, method, data) {
	methodFixed = typeof method == 'string' ? method : 'GET';
	options = {
		method: method,
		headers: { 'Content-Type': 'application/json' },
	}
	if(methodFixed != 'GET') {
		dataString = typeof data == 'object' ? JSON.stringify(data) : '';
		options.body = dataString
	}
	
	return await fetch('/api' + url, options)
		.then(function (resp) {
			if(resp.status == 200) {
				return resp.json()
					.then(function(data) {
						return { success: true, data: data }
					});
			} else {
				return resp.json()
					.then(function(data) {
							if(data.message != undefined) {
								return { success: false, message: data.message, realMessage: null }
							} else {
								return { success: false, message: "terjadi kesalahan pada proses", realMessage: null}
							}
						})
					.catch(function(err) {
							return { success: false, message: "terjadi kesalahan pada proses", realMessage: err}
						})
			}
		})
		.catch(function(err) {
			return { success: false, message: err}
		});

}


async function apiFetchData(path, messages) {
	res = await apiFetch(path)
	if(res.success) {
		return res.data;
	} else {
		if(typeof messages === 'array') {
			messages.push('gagal mengambil data');
		}
		return null;
	}
}

function cleanArrayString(data){
	for (const prop in data) {
		data[prop] = '';
	}
}

function applyErrMessage(message, xThis, dataErr) {
	if(typeof message == 'string') {
		xThis.showMessage = true;
		xThis.message = message;
	} else {
		for (const prop in message) {
			if(typeof dataErr[prop] != undefined) {
				dataErr[prop] = message[prop].errMessage;
			}
		}
	}
}

function goTo(path) {
	window.location.href = path;
}