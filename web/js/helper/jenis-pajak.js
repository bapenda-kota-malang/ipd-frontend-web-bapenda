objekPajak = document.getElementById('objekPajak').value;
objekPajak_kode = objekPajak.replace('pajak-', '');
if(objekPajak_kode == 'hotel') {
	objekPajak_kode = '01';
} else if(objekPajak_kode == 'resto') {
	objekPajak_kode = '02';
} else if(objekPajak_kode == 'hiburan') {
	objekPajak_kode = '03';
} else if(objekPajak_kode == 'reklame') {
	objekPajak_kode = '04';
} else if(objekPajak_kode == 'penerangan-jalan') {
	objekPajak_kode = '05';
} else if(objekPajak_kode == 'parkir') {
	objekPajak_kode = '07';
} else if(objekPajak_kode == 'air-tanah') {
	objekPajak_kode = '08';
}

jenisKendaraans = [
	{ id: 1, nama: 'Roda 2'},
	{ id: 2, nama: 'Roda 4 atau Lebih'},
]

peruntukanAirs = [
	'NON NIAGA',
	'NIAGA',
	'INDUSTRI',
	'PDAM',
]

jenisAbts = [
	'Mata Air',
	'Bukan Mata Air',
]
