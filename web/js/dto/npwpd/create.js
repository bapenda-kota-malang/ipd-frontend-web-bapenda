pendaftaran = {
	jenisPajak: 'SA',
	golongan: 0,
	npwp: '',
	nomor: 0,
	// nomorRegistrasi: null,
	isNomorRegistrasiAuto: true,
	npwpd: '',
	tanggalPengukuhan: '',
	tanggalNpwpd: '',
	rekening_id: 0,
	tanggalMulaiUsaha: '',
	luasBangunan: '',
	jamBukaUsaha: '',
	jamTutupUsaha: '',
	pengunjung: '',
	omsetOp: '',
	genset: null,
	airTanah: null,
	objekPajak:{
		nama: '',
		nop: '',
		alamat: '',
		rtRw: '',
		kecamatan_id: 0,
		kelurahan_id: 0,
		telp: ''
	}, 
	detailObjekPajak:[], 
	pemilik:[], 
	narahubung:[], 
}

format = function(date) {
	const day = date.getDate();
	const month = date.getMonth() + 1;
	const year = date.getFullYear();

	return `${day}/${month}/${year}`;
}

/*
"objekPajak": [
	{
		"nama": "kos kosan mantap",
		"nop": "xxxxx.xxxx.xxxx",
		"alamat": "jl manggar",
		"rtRw": "01/02",
		"kecamatan_id": 1,
		"kelurahan_id": 2,
		"telp": "081945667882"
	}
],
"detail_op": [
	{
		"jumlahOp": "5",
		"unitOp": "KAMAR",
		"tarifOp": "2000000",
		"notes": "test test kamar e mas"
	}
]
"pemilik": [
	{
		"nama": "Alfa Bravo",
		"nik": "1234567890",
		"alamat": "jl manggar",
		"rtRw": "01/02",
		"kecamatan_id": 1,
		"kelurahan_id": 2,
		"telp": "081945667882"
	}
],
"narahubung": [
	{
		"nama": "Doe",
		"nik": "1234567890",
		"alamat": "jl manggar",
		"rtRw": "01/02",
		"kecamatan_id": 1,
		"kelurahan_id": 2,
		"telp": "081945667882"
	}
],
*/
