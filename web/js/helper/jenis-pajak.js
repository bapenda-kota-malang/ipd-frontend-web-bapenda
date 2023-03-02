objekPajak = document.getElementById('objekPajak').value;
objekPajak_kode = objekPajak.replace('pajak-', '');
if(objekPajak_kode == 'hotel') {
	objekPajak_kode = '01';
} else if(objekPajak_kode == 'resto') {
	objekPajak_kode = '02';
} else if(objekPajak_kode == 'hiburan') {
	objekPajak_kode = '03';
} else if(objekPajak_kode == 'penerangan-jalan') {
	objekPajak_kode = '05';
} else if(objekPajak_kode == 'parkir') {
	objekPajak_kode = '07';
} else if(objekPajak_kode == 'air-tanah') {
	objekPajak_kode = '08';
}
