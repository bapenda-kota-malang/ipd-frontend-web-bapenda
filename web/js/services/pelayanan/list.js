urls = {
	pathname: '/pelayanan/data-permohonan',
	dataPath: '/permohonan',
	dataSrc: '/permohonan',
	dataSrcParams: {
		namaWP_opt: 'left',
	}
}
vars = {
	statusKolektifs,
	jenisPelayanans,
	verifikasiPermohonans,
	status: null,
}
watch = {
}
methods = {
	hapusItem,
}

searchFieldTarget = 'namaWP';
searchPlaceHolder = 'Cari nama WP...';

async function hapusItem(id) {
	res = await apiFetch('/permohonan/' + id, "DELETE");
	if(!res) {
		console.error('failed to delete "permohonan"');
	} else {
		this.$forceUpdate();
		window.location.reload();
	}
}

function postFetchData(data) {
	data.forEach(function (item, idx) {
		item.tanggalTerima = formatDate(new Date(item.tanggalTerima), ['d','m','y'], '/');
		item.tanggalPermohonan = formatDate(new Date(item.tanggalPermohonan), ['d','m','y'], '/');
		item.tanggalSelesai = formatDate(new Date(item.tanggalSelesai), ['d','m','y'], '/');

        GetValue(statusKolektifs, item.statusKolektif).then( value => item.statusKolektif = value);
        GetValue(jenisPelayanans, item.bundlePelayanan).then( value => item.jenisPelayanan = value);
		item.noPelayanan = item.tahunPelayanan + item.bundlePelayanan + item.noUrutPelayanan;
		GetValue(verifikasiPermohonans, item.status).then( value => item.status = value);
	});
}
