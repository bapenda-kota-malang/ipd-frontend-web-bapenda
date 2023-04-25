urls = {
	pathname: '/pendataan/spop-lspop/daftar',
	dataPath: '/objekpajakpbb',
	dataSrc: '/objekpajakpbb'
}
vars = {
	status: ['Baru', 'Aktif', 'Diblokir', 'Ditolak'],
}

function postFetchData(data) {
	data.forEach(function (item, idx) {
		if(item.objekPajakPbb.length > 0) {
			oppbb = item.objekPajakPbb[0];
			item.objekPajakPbb[0].nop = `${oppbb.provinsi_kode}${oppbb.daerah_kode}${oppbb.kecamatan_kode}${oppbb.kelurahan_kode}${oppbb.blok_kode}${oppbb.noUrut}${oppbb.jenisOp}`
		}
		if(item.sspdDetail && item.sspdDetail[0].spt) {
			if(item.sspdDetail[0].spt.periodeAwal) {
				data[idx].sspdDetail[0].spt.periodeAwal = formatDate(new Date(item.sspdDetail[0].spt.periodeAwal), ['d','m','y'], '/')
			}
			if(item.sspdDetail[0].spt.periodeAkhir) {
				data[idx].sspdDetail[0].spt.periodeAkhir = formatDate(new Date(item.sspdDetail[0].spt.periodeAkhir), ['d','m','y'], '/')
			}
		}
	});
}
