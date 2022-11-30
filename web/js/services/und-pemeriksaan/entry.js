forcePostDataFetch = true;

id = document.getElementById('id').value;
if(!id)
	id = 0;

data = {...undPemeriksaanCreate}
urls = {
	dataSrc: '/skpd/' +id
}
vars = {
	stpd_id: null,
	spList: [
		{
			id: 1,
			nomor: '213-22-1102',
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
			nomor: '213-22-1101',
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
			nomor: '213-22-1100',
			tanggal: '2022-11-01',
			status: 0,
			spt: {
				periodeAwal: '2022-10-01',
				periodeAkhir: '2022-10-31',
				npwpd: { npwpd: '00127812', objekPajak: { nama: 'Kafe Localhost'}},
			}
		},
	],
}
methods = {
	searchNomorSurat,
	pilihStpd,
} 
components = {
	datepicker: DatePicker,
}
stpdSearchModal = null;

function postDataFetch(data, xthis) {
}

function searchNomorSurat() {
	if(!stpdSearchModal) {
		stpdSearchModal = new bootstrap.Modal(document.getElementById('stpdSearch'))
	}
	// res = await apiFetchData('/npwpd', messages);
	// if(!res) {
	// 	console.error('failed to fetch "npwpd"');
	// } else {
	// 	app.npwpdList = typeof res.data != 'undefined' ? res.data : [];
	// }
	stpdSearchModal.show();
}

function pilihStpd(id) {
	app.stpd_id = id;
	// await checkNpwpd(npwpd, app);
	stpdSearchModal.hide();
}