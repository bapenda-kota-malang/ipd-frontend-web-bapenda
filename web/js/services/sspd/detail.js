id = document.getElementById('id').value;
if(!id)
	id = 0;

data = {...sspdDetail}
urls = {
	dataSrc: '/sspd/' +id
}
vars = {
}
methods = {
} 

function postDataFetch(data, xthis) {
	if(data.sspdDetail) {
		data.sspdDetail.forEach(function (item, idx) {
			if(item.spt) {
				if(item.spt.jatuhTempo) {
					data.sspdDetail[0].spt.jatuhTempo = formatDate(new Date(data.sspdDetail[0].spt.jatuhTempo), ['d','m','y'], '/')
				}
			}
		});
	}
}
