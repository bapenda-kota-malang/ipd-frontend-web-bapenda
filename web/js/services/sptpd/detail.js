id = document.getElementById('id').value;
if(!id)
	id = 0;

data = {...npwpd}
urls = {
	dataSrc: '/espt/' +id
}
vars = {
	rekening_objek: null,
	payload: {

	},
	golongans,
	jabatans,
}
methods = {
	approveRequest: function() { approveRequest(this) },
	rejectRequest: function() { rejectRequest(this) },
	formatDate,
} 

function postDataFetch(data, xthis) {
	// console.log(data)
	if(data.verifyStatus != 'baru') {
		xthis.hideApproval = true;
	}
	xthis.rekening_objek = data.rekening.objek;
	data.createdAt = new Date(data.createdAt);
	if(data.rekening.objek == '01') {
		data.dataDetails = data.detailEsptHotel;
	} else if(data.rekening.objek == '02') {
		data.dataDetails = data.detailEsptResto;
	} else if(data.rekening.objek == '03') {
		data.dataDetails = data.detailEsptHiburan;
	} else if(data.rekening.objek == '05') {
		data.dataDetails = data.detailEsptPpj;
	} else if(data.rekening.objek == '07') {
		data.dataDetails = data.detailEsptParkir;
	} else if(data.rekening.objek == '08') {
		data.dataDetails = data.detailEsptAirtanah;
	} 
}
