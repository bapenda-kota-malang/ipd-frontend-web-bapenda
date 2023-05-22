urls = {
	pathname: '/konfigurasi/master/bank-user',
	dataPath: '/paymentpoint',
	dataSrc: '/paymentpoint',
	submit: '/paymentpoint/{id}',
}
vars = {
	selectedIdx: null,
	entryData: {},
	entryFormTitle: 'Entry Form',
}

function cleanData(data) {
	delete data.id;
	data.nama = null;
	data.alamat = null;
	data.telepon = null;
	data.nama_kepala = null;
	data.username = null;
	data.password = null;
}
