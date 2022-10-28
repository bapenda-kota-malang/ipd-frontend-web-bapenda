id = document.getElementById('id').value;
if(!id)
	id = 0;

data = {...pendaftaran}
urls = {
	dataSrc: '/npwpd/' +id
}
vars = {
	golongans,
	jabatans,
	npwpdStatuses,
	detailObjekPajak: [],
}

function mounted(xthis) {
	if(xthis.data.rekening.objek == '01') {
		xthis.data.detailObjekPajak = xthis.data.detailObjekPajakHotel;
	} else if(xthis.data.rekening.objek == '02') {
		xthis.data.detailObjekPajak = xthis.data.detailObjekPajakResto;
	} else if(xthis.data.rekening.objek == '03') {
		xthis.data.detailObjekPajak = xthis.data.detailObjekPajakHiburan;
	} else if(xthis.data.rekening.objek == '04') {
		xthis.data.detailObjekPajak = xthis.data.detailObjekPajakReklame;
	} else if(xthis.data.rekening.objek == '05') {
		xthis.data.detailObjekPajak = xthis.data.detailObjekPajakPeneranganJalan;
	} else if(xthis.data.rekening.objek == '06') {
		xthis.data.detailObjekPajak = xthis.data.detailObjekPajakHotel;
	} else if(xthis.data.rekening.objek == '07') {
		xthis.data.detailObjekPajak = xthis.data.detailObjekPajakParkir;
	} else if(xthis.data.rekening.objek == '08') {
		xthis.data.detailObjekPajak = xthis.data.detailObjekPajakAirTanah;
	}
}