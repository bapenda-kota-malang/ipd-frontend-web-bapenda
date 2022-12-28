assessments = [
    { id: null, name: '.. Pilih ..' },
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
    '.. Pilih ..',
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

skpds = [
    '.. Pilih ..',
    'Bapenda Kota Malang',
];

npwpdStatuses = [
    'Baru',
    'Disetujui',
    'Ditolak'
];

statusKolektifs = [
    { id: 'null', name: '.. Pilih ..' },
    { id: '1', name: 'Individu' },
    { id: '2', name: 'Masal / Kolektif' },
];

jenisPelayanans = [
    { id: 'null', name: '.. Pilih ..' },
    { id: '01', name: 'Pendaftaran Data Baru' },
    { id: '02', name: 'Mutasi Objek Pajak/Subjek' },
    { id: '03', name: 'Pembetulan SPPT/SKP/STP' },
    { id: '04', name: 'Pembatalan SPPT/SKP' },
    { id: '05', name: 'Salinan SPPT/SKP' },
    { id: '06', name: 'Keberatan Penunjukan WP' },
    { id: '07', name: 'Keberatan Atas Pajak Terhutang' },
    { id: '08', name: 'Pengurangan Atas Besarnya Pajak Terhutang' },
    { id: '09', name: 'Restitusi dan Kompensasi' },
    { id: '10', name: 'Pengurangan Denda Administrasi' },
    { id: '11', name: 'Penentuan Kembali Tanggal Jatuh Tempo' },
    { id: '12', name: 'Penundaan Tanggal Jatuh Tempo SPOP' },
    { id: '13', name: 'Pemberian Informasi PBB' },
    { id: '14', name: 'Pembetulan SK keberatan' },
];

jenisPengurangans = [
    { id: 'null', name: '.. Pilih ..' },
    { id: '1', name: 'Pengurangan Permanen' },
    { id: '2', name: 'Pengurangan PST' },
    { id: '3', name: 'Pengurangan Pengenaan JPB' },
    { id: '4', name: 'Pengurangan Denda Administrasi' },
    { id: '5', name: 'Pengurangan Sebelum SPPT Terbit' },
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
    { id: 'null', name: '.. Pilih ..' },
    { id: '1', name: '1' },
    { id: '2', name: '2' },
    { id: '3', name: '3' },
];

bukuValues = [
    100000,
    500000,
    2000000,
    5000000,
    999999999999999,
];

njopTKPs = [
    { awal: '1995', akhir: '2012', nilai: '6000'},
    { awal: '2013', akhir: '9999', nilai: '10000'},
];

tarifs = [
    { prop: '73', kota: '35', awal: '2015', akhir: '9999', min: '0', max: '1500000000', nilai: 0.055},
    { prop: '73', kota: '35', awal: '2015', akhir: '9999', min: '1500000001', max: '5000000000', nilai: 0.112},
    { prop: '73', kota: '35', awal: '2015', akhir: '9999', min: '5000000001', max: '10000000000', nilai: 0.145},
    { prop: '73', kota: '35', awal: '2015', akhir: '9999', min: '10000000001', max: '999999999999999', nilai: 0.113},
    { prop: '73', kota: '35', awal: '2015', akhir: '9999', min: '0', max: '1000000000', nilai: 0.100},
    { prop: '73', kota: '35', awal: '2015', akhir: '9999', min: '1000000000', max: '999999999999999', nilai: 0.200},
];

pilihAlamats = [
    { id: 'null', name: '.. Pilih Alamat ..' },
];

jenisPerolehans = [
    { id: 'null', name: '.. Pilih ..' },
];

bukuOpts = [
    { id: null, name: '.. Pilih ..' },
    { id: '1', name: '1' },
    { id: '2', name: '1,2' },
    { id: '3', name: '1,2,3' },
    { id: '4', name: '1,2,3,4' },
    { id: '5', name: '1,2,3,4,5' },
    { id: '6', name: '2' },
    { id: '7', name: '2,3' },
    { id: '8', name: '2,3,4' },
    { id: '9', name: '2,3,4,5' },
    { id: '10', name: '3' },
    { id: '11', name: '3,4' },
    { id: '12', name: '3,4,5' },
    { id: '13', name: '4' },
    { id: '14', name: '4,5' },
    { id: '15', name: '5' },
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
    { id: '00', name: 'PPAT' },
    { id: '01', name: 'Dikembalikan PPAT' },
    { id: '02', name: 'STAFF' },
    
    { id: '03', name: 'Dikembalikan STAFF' },
    { id: '04', name: 'KASUBID' },
    { id: '05', name: 'Dikembalikan KASUBID' },
    { id: '06', name: 'KABID' },
    { id: '07', name: 'Dikembalikan KABID' },
    { id: '08', name: 'CETAK' },
    { id: '21', name: 'Batal (Sebelum Bayar)' },

    { id: '10', name: 'LUNAS' },
    { id: '12', name: 'Kurang Bayar' },
    { id: '22', name: 'Batal (restitusi/kompen)' },

    { id: '13', name: 'Validasi' },
    { id: '14', name: 'Kurang Bayar Setelah Validasi' },
    { id: '20', name: 'Batal (Setelah Validasi)' },
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