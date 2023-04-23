urls = {
	pathname: '/pelayanan/verifikasi-data-permohonan',
	dataPath: '/regpermohonan',
	dataSrc: '/regpermohonan',
	dataSrcParams: {
		namaWP_opt: 'left',
	}
}
vars = {
	searchKeywords:null,
	statusKolektifs,
	jenisPelayanans,
	verifikasiPermohonans,
	status: null,
}

searchFieldTarget = 'namaWP';
searchPlaceHolder = 'Cari nama WP...';

function postFetchData(data) {
	data.forEach(function (item, idx) {
		item.tanggalTerima = formatDate(new Date(item.tanggalTerima), ['d','m','y'], '/');

        GetValue(statusKolektifs, item.statusKolektif).then( value => item.statusKolektif = value);
        GetValue(jenisPelayanans, item.bundlePelayanan).then( value => item.jenisPelayanan = value);
		item.noPelayanan = item.tahunPelayanan + item.bundlePelayanan + item.noUrutPelayanan;
		GetValue(verifikasiPermohonans, item.status).then( value => item.statusnama = value);
	});
}
