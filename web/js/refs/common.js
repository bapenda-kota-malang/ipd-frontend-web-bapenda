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
    'Kabid',
    'Kasi',
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

async function GetValue(data, id) {
    var output = null;
  
    for (let i = 0; i < data.length; i++) {
      if (data[i]["id"] === id) {
        output = data[i]["name"];
      }
    }
    return output;
};