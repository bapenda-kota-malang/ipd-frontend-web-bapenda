objekPajak = document.getElementById('objekPajak').value;

urls = {
	pathname: '/penetapan/verifikasi-e-sptpd/' + objekPajak,
	dataPath: '/espt',
	dataSrc: '/espt'
}
vars = {
	status: ['Baru', 'Aktif', 'Diblokir', 'Ditolak'],
}
