data = {...penyerahan};
vars = {
}
urls = {
	preSubmit: '/pelayanan/data-permohonan',
	postSubmit: '/pelayanan/data-permohonan',
	submit: '/permohonan/{id}/status',
	dataSrc: '/permohonan',
}
components = {
	datepicker: DatePicker,
}

function preSubmit(xthis) {
	data = xthis.data
	if(data.tanggalPenyerahan && typeof data.tanggalPenyerahan['getDate'] == 'function') {
		data.tanggalPenyerahan = formatDate(data.tanggalPenyerahan);
	} 
	data.seksiBerkas = data.seksiBerkas.toString()
	console.log("preSubmit") 
}

function postDataFetch(data, xthis) {
	console.log(data)
	if(xthis.id) {
		data.tanggalPenyerahan = data.permohonanDetail.tanggalPenyerahan ? new Date(data.permohonanDetail.tanggalPenyerahan.substr(0,10)) : null;
	}
	data.catatanPenyerahan = data.permohonanDetail.catatan != null ? data.permohonanDetail.catatan : "INI CATATAN PENYERAHAN"
	data.namaPenerima = data.namaPenerima != null ? data.namaPenerima : "WAJIB PAJAK"
	data.statusSelesai = data.permohonanDetail.statusSelesai != null ? data.permohonanDetail.statusSelesai : 2
	data.seksiBerkas = data.permohonanDetail.seksiBerkas != null ? data.permohonanDetail.seksiBerkas : 80
	data.nipPenyerah = data.permohonanDetail.nip != null ? data.permohonanDetail.nip : sessionStorage.getItem("nip")
	data.noSuratPermohonan = data.permohonan.noSuratPermohonan
}

