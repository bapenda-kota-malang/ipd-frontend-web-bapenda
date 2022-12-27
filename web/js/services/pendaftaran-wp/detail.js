id = document.getElementById('id').value;
if(!id)
	id = 0;

data = {...npwpd}
urls = {
	dataSrc: '/npwpd/' +id
}
vars = {
	golongans,
	jabatans,
	npwpdStatuses,
	detailObjekPajak: [],
}
methods = {
	formatDate,
}

function postDataFetch(data, xthis) {
	data.tanggalNpwpd = data.tanggalNpwpd ? formatDate(new Date(data.tanggalNpwpd),['d','m','y'],'/') : data.tanggalNpwpd;
	data.tanggalPengukuhan = data.tanggalPengukuhan ? formatDate(new Date(data.tanggalPengukuhan),['d','m','y'],'/') : data.tanggalPengukuhan;
	data.tanggalMulaiUsaha = data.tanggalMulaiUsaha ? formatDate(new Date(data.tanggalMulaiUsaha	),['d','m','y'],'/') : data.tanggalMulaiUsaha;
	if(typeof data.pemilik == 'object') {
		xthis.pemilik = data.pemilik;
	}
	if(typeof data.narahubung == 'object') {
		xthis.narahubung = data.narahubung;
	}

	if(data.rekening.objek == '01') {
		xthis.detailObjekPajak = data.detailObjekPajakHotel;
	} else if(data.rekening.objek == '02') {
		xthis.detailObjekPajak = data.detailObjekPajakResto;
	} else if(data.rekening.objek == '03') {
		xthis.detailObjekPajak = data.detailObjekPajakHiburan;
	} else if(data.rekening.objek == '04') {
		xthis.detailObjekPajak = data.detailObjekPajakReklame;
	} else if(data.rekening.objek == '05') {
		xthis.detailObjekPajak = data.detailObjekPajakPeneranganJalan;
	} else if(data.rekening.objek == '06') {
		xthis.detailObjekPajak = data.detailObjekPajakHotel;
	} else if(data.rekening.objek == '07') {
		xthis.detailObjekPajak = data.detailObjekPajakParkir;
	} else if(data.rekening.objek == '08') {
		xthis.detailObjekPajak = data.detailObjekPajakAirTanah;
	} else {
		xthis.detailObjekPajak = [];
	}
	console.log(xthis.detailObjekPajak);
}