assessments = [
    { id: null, name: '.. Pilih ..'},
    { id: 'SA', name: 'Self Assesmen' },
    { id: 'OA', name: 'Operator Assesmen' },
];

golongans = [
    '.. Pilih ..',
    'Orang Pribadi',
    'Badan',
];

jabatans = [
    '.. Pilih ..',
    'Kaban',
    'Kabid',
    'Kasubid',
    'Staff',
];

golongansPegawai = [
    '.. Pilih ..' ,
    'Golongan I',
    'Golongan II',
    'Golongan III',
    'Golongan IV',
];

pangkats = [
    '.. Pilih ..',
    'A',
    'B',
    'C',
    'D',
];

skpds =[
    '.. Pilih ..',
    'Bapenda Kota Malang',
];

npwpdStatuses = [
    'Baru',
    'Disetujui',
    'Ditolak'
];

statusKolektifs = [
    { id: 'null', name: '.. Pilih ..'},
    { id: '1', name: 'Individu' },
    { id: '2', name: 'Masal / Kolektif' },
];

jenisPelayanans = [
    { id: 'null', name: '.. Pilih ..'},
    { id: '0001', name: 'Pendaftaran Baru' },
    { id: '0002', name: 'Mutasi Objek Pajak / Subjek' },
    { id: '0003', name: 'Pengurangan' },
];

buku2s = [
    { id: '1', name: '1,2,3,4,5' },
    { id: '2', name: '6,7,8' },
    { id: '3', name: '9,10' },
];

pilihanLaporans = [
    { id: '1', name: 'Laporan Tunggakan' },
    { id: '2', name: 'Laporan Himpunan' },
];

bukus = [
    { id: 'null', name: '.. Pilih ..'},
    { id: '1', name: '1' },
    { id: '2', name: '2' },
    { id: '3', name: '3' },
];

pilihAlamats = [
    { id: 'null', name: '.. Pilih Alamat ..'},
];

jenisPerolehans = [
    { id: 'null', name: '.. Pilih ..'},
    { id: '01', name: 'Jual Beli' },
    { id: '02', name: 'Tukar Menukar' },
    { id: '03', name: 'Hibah' },
    { id: '04', name: 'Hibah Wasiat' },
    { id: '05', name: 'Waris' },
    { id: '06', name: 'Pemasukan dalam perseroan / badan hukum lainnya' },
    { id: '07', name: 'Pemisahan hak yang menyebabkan peralihan' },
    { id: '08', name: 'Penunjukan pemberian dalam lelang' },
    { id: '09', name: 'Pelaksanaan putusan hakim yang mempunyai kekuatan hukum tetap' },
    { id: '10', name: 'Penggabungan Usaha' },
    { id: '11', name: 'Pelebaran Usaha' },
    { id: '12', name: 'Pemekaran Usaha' },
    { id: '13', name: 'Hadiah' },
    { id: '14', name: 'Perolehan hak rumah sederhana sehat dan HSS melalui KPR bersubsidi' },
    { id: '15', name: 'Pemberian hak baru' },
    { id: '16', name: 'Pemberian hak baru sebagai kelanjutan pelepasan hak' },
    { id: '17', name: 'Pemberian hak baru diluar pelepasan hak' },
    { id: '22', name: 'Jenis Baru' },
];

verifikasiValidasiBphtb = [
    { id: '00', name: 'Baru' },
    { id: '01', name: 'Disetujui PPAT' },
    { id: '02', name: 'Ditolak PPAT' },
    { id: '03', name: 'Diverifikasi Staff' },
    { id: '04', name: 'Ditolak Staff' },
    { id: '05', name: 'Dikembalikan Staff' },
    { id: '06', name: 'Diverifikasi Kasubid' },
    { id: '07', name: 'Ditolak Kasubid' },
    { id: '08', name: 'Diverifikasi Kabid' },
    { id: '09', name: 'Ditolak Kabid' },
    { id: '10', name: 'Pembayaran' },
    { id: '11', name: 'Divalidasi Operator' },
    { id: '12', name: 'Kurang Bayar' },
    { id: '13', name: 'Batal' },
    { id: '14', name: 'Divalidasi Kasubid' },
    { id: '15', name: 'Divalidasi Kabid' },
]

async function GetValue(data, id) {
    var output = null;
  
    for (let i = 0; i < data.length; i++) {
      if (data[i]["id"] === id) {
        output = data[i]["name"];
      }
    }
    return output;
};