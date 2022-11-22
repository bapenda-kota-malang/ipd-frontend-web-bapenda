data = {...permohonan};
vars = {
    // penerimaanBerkasTemp: [],
	statusKolektifs,
	jenisPelayanans,
	tanggalTerimaTemp: null,
	tanggalSelesaiTemp: null,
	tanggalPermohonanTemp: null,
	options:['test', 'ok'],
}
urls = {
	preSubmit: '/pelayanan/data-permohonan',
	postSubmit: '/pelayanan/data-permohonan',
	submit: '/permohonan/{id}',
	dataSrc: '/permohonan',
}
// refSources = {
// 	rekenings: '/rekening?kodeJenisUsaha=0&kodeJenisUsaha_opt=gt&no_pagination=true',
// 	daerahs: '/daerah?no_pagination=true',
// 	kecamatans: '/kecamatan?daerah_kode=3573',
// }
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function preSubmit(xthis) {
	data = xthis.data
	if(data.tanggalTerima && typeof data.tanggalTerima['getDate'] == 'function') {
		data.tanggalTerima = formatDate(data.tanggalTerima);
	} 
	if(data.tanggalSelesai && typeof data.tanggalSelesai['getDate'] == 'function') {
		data.tanggalSelesai = formatDate(data.tanggalSelesai);
	} 
	if(data.tanggalPermohonan && typeof data.tanggalPermohonan['getDate'] == 'function') {
		data.tanggalPermohonan = formatDate(data.tanggalPermohonan);
	}
	console.log("preSubmit") 
    console.log(data.tanggalTerima)
	console.log(data.penerimaanBerkasTemp)
	data.penerimaanBerkas = data.penerimaanBerkasTemp.toString()
}

function postDataFetch(data, xthis) {
	if(xthis.id) {
		data.tanggalTerima = data.tanggalTerima ? new Date(data.tanggalTerima.substr(0,10)) : null;
		data.tanggalSelesai = data.tanggalSelesai ? new Date(data.tanggalSelesai.substr(0,10)) : null;
		data.tanggalPermohonan = data.tanggalPermohonan ? new Date(data.tanggalPermohonan.substr(0,10)) : null;
	}
	console.log(data.penerimaanBerkas)
	data.penerimaanBerkasTemp = data.penerimaanBerkas.split(",")
}