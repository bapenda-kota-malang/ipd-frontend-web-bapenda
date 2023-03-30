/*
spt_id: data.skpd,
namaPemohon: data.namaPemohon,
alamatPemohon: data.alamatPemohon,
telpPemohon: data.telpPemohon,
jenisPengurangan: 0,
alasanPengurangan: data.alasanPengurangan,
keteranganPetugas: data.keterangan,
tanggalPengajuan: "2023-03-17T01:04:36.487Z",
pctPermohonan: 20,
"laporanKeuangan": "{{pdfb64valid}}",
"suratPermohonan": "{{pdfb64valid}}",
"fotoKtp": "{{imgb64valid}}",
"dokumenLainnya": "{{pdfb64valid}}",
*/

const onBack = () => {
  window.location.href = '/pengurangan/pajak-daerah'
}

const onSave = async (url, data) => {
  const dateString = data?.tanggal instanceof Date ? new Date(data.tanggal).toISOString() : null
  console.log(dateString)
}