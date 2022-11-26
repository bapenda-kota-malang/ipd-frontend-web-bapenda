data = {...penyerahan};
vars = {
}
urls = {
	preSubmit: '/pelayanan/data-permohonan',
	postSubmit: '/pelayanan/data-permohonan',
	submit: '/permohonan/{id}',
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
	console.log("preSubmit") 
}

function postDataFetch(data, xthis) {
	console.log(data)
	if(xthis.id) {
		data.tanggalPenyerahan = data.tanggalPenyerahan ? new Date(data.tanggalPenyerahan.substr(0,10)) : null;
	}
	data.catatanPenyerahan = data.catatanPenyerahan ? data.catatanPenyerahan : "INI CATATAN PENYERAHAN"
	data.namaPenerima = data.namaPenerima ? data.namaPenerima : "WAJIB PAJAK"
	data.statusSelesai = data.statusSelesai ? data.statusSelesai : 2
	data.seksiBerkas = data.seksiBerkas ? data.seksiBerkas : 80
	data.nipPenyerah = sessionStorage.getItem("nip")
	// console.log(data.penerimaanBerkas)
	// data.penerimaanBerkasTemp = data.penerimaanBerkas.split(",")
	// data.noPelayanan = data.tahunPelayanan + data.bundlePelayanan + data.noUrutPelayanan
	// GetValue(jenisPelayanans, data.bundlePelayanan).then( value => data.jenisPelayanan = value);
}

