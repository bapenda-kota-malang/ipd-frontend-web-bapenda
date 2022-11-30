forcePostDataFetch = true;
data = [
	{
		id: 1,
		tanggal: '2022-11-01',
		status: 0,
		spt: {
			periodeAwal: '2022-10-01',
			periodeAkhir: '2022-10-31',
			npwpd: { npwpd: '00112345', objekPajak: { nama: 'Hotel Sanjaya'}},
		}
	},
	{
		id: 2,
		tanggal: '2022-11-01',
		status: 0,
		spt: {
			periodeAwal: '2022-10-01',
			periodeAkhir: '2022-10-31',
			npwpd: { npwpd: '00112662', objekPajak: { nama: 'Warkop Ahsiap'}},
		}
	},
	{
		id: 3,
		tanggal: '2022-11-01',
		status: 0,
		spt: {
			periodeAwal: '2022-10-01',
			periodeAkhir: '2022-10-31',
			npwpd: { npwpd: '00127812', objekPajak: { nama: 'Kafe Localhost'}},
		}
	},
];

urls = {
	pathname: '/penagihan-pemeriksaan/surat-tagihan-pd',
	dataPath: '/stpd',
	dataSrc: '/stpd'
}
vars = {
}

function postDataFetch(data) {
	data.forEach(function (item, idx) {
		data[idx].tanggal = formatDate(new Date(item.tanggal), ['d','m','y'], '/');
		data[idx].periode = formatDate(new Date(item.spt.periodeAwal), ['d','m','y'], '/') + ' s/d ' + formatDate(new Date(item.spt.periodeAkhir), ['d','m','y', '/']);
		data[idx].status = suratPenagihanStatuses[item.status];
	});
}
