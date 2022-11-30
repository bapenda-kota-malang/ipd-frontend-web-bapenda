forcePostDataFetch = true;
data = [
	{
		id: 1,
		tanggal: '2022-11-01',
		tanggalPemeriksaan: '2022-11-05',
		status: 0,
		suratPemberitahuan: {
			nomor: '122-021-011',
			spt: {
				periodeAwal: '2022-10-01',
				periodeAkhir: '2022-10-31',
				npwpd: { npwpd: '00112345', objekPajak: { nama: 'Hotel Sanjaya'}},
			}	
		}
	},
	{
		id: 2,
		tanggal: '2022-11-01',
		tanggalPemeriksaan: '2022-11-06',
		status: 0,
		suratPemberitahuan: {
			nomor: '312-021-551',
			spt: {
				periodeAwal: '2022-10-01',
				periodeAkhir: '2022-10-31',
				npwpd: { npwpd: '00112662', objekPajak: { nama: 'Warkop Ahsiap'}},
			}				
		}
	},
	{
		id: 3,
		tanggal: '2022-11-01',
		tanggalPemeriksaan: '2022-11-07',
		status: 0,
		suratPemberitahuan: {
			nomor: '122-991-011',
			spt: {
				periodeAwal: '2022-10-01',
				periodeAkhir: '2022-10-31',
				npwpd: { npwpd: '00127812', objekPajak: { nama: 'Kafe Localhost'}},
			}				
		}
	},
];

urls = {
	pathname: '/penagihan-pemeriksaan/und-pemeriksaan',
	dataPath: '/stpd',
	dataSrc: '/stpd'
}
vars = {
}

function postDataFetch(data) {
	data.forEach(function (item, idx) {
		data[idx].tanggalPemeriksaan = formatDate(new Date(item.tanggalPemeriksaan), ['d','m','y'], '/');
		data[idx].status = suratPenagihanStatuses[item.status];
	});
}
