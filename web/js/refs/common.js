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
    'Kabid',
    'Kasi',
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
    { id: 'null', name: '.. Pilih ..' },
    { id: '1', name: '1' },
    { id: '2', name: '2' },
    { id: '3', name: '3' },
];
pilihAlamats = [
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
];

async function GetValue(data, id) {
    var output = null;

    for (let i = 0; i < data.length; i++) {
        if (data[i]["id"] === id) {
            output = data[i]["name"];
        }
    }
    return output;
};