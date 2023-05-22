urls = {
	pathname: '/penetapan/sptpd/' + objekPajak,
	dataPath: '/sptpd',
	dataSrc: '/sptpd',
	dataSrcParams: {
		rekening_objek: objekPajak_kode,
		namaOp_opt: 'left',
	}
}

searchFieldTarget = 'namaOp';
searchPlaceHolder = 'Cari nama OP...';

function postFetchData(data) {
	if(data) {
		data.forEach(function(item, index) {
			data[index].jatuhTempo = formatDate(new Date(item.jatuhTempo.substr(0, 10)), ['d','m','y'], '/');
			data[index].periodeAwal = formatDate(new Date(item.periodeAwal.substr(0, 10)), ['d','m','y'], '/');
			data[index].periodeAkhir = formatDate(new Date(item.periodeAkhir.substr(0, 10)), ['d','m','y'], '/');
			data[index].createdAt = formatDate(new Date(item.createdAt.substr(0, 10)), ['d','m','y'], '/');
		});
	}
}