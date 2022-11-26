id = document.getElementById('id').value;
if(!id)
	id = 0;

data = {...stsDetail}
urls = {
	dataSrc: '/sts/' +id
}
vars = {
	stsList: []
}
methods = {
} 

function postDataFetch(data, xthis) {
	data.tanggalSts = formatDate(new Date(data.tanggalSts), ['d', 'm', 'y', '/']);
	data.stsDetail.forEach(function(item, idx) {
		idx = null;
		nominal = item.nominal ? parseInt(item.nominal) : 0;
		// sts
		xthis.stsList.find(function(o, i) {
			if (item.rekening.kode === o.kode) {
				idx = i;
				return true;
			}
		});
		if(!idx) {
			xthis.stsList.push({
				kode: item.rekening.kode,
				nama: item.rekening.nama,
				nominal: nominal,
				sspd: [{
					nomor: item.nomorOutput,
					nominal: nominal
				}]
			});
			xthis.data.stsDetail.push({
				rekening_id: item.rekening.id,
				nominal: nominal,
				sspdDetail_id: [item.id]
			});
		} else {
			xthis.stsList[idx].nominal += nominal;
			xthis.stsList[idx].sspd.push({
				nomor: item.nomorOutput,
				nominal: nominal
			});
			xthis.data.stsDetail[idx].nominal += nominal;
			xthis.data.stsDetail[idx].sspdDetail_id.push(item.id);
		}
		// sumber dana
		xthis.data.sumberDanaSts[0].nominal += nominal;
	})
}
