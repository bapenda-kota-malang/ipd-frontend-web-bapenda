methods = {
  onClickAttach,
  onClickView,
  onHandleAttach,
  onHandleModal,
  onHandleModalClose,
  onAfterSearchText,
  onSearchText,
  onSave: () => {},
  onBack: () => window.location.href = '/pengurangan/pajak-daerah',
  onAccept: () => {},
  onReject: () => {}
}

async function mounted(xthis) {
  await new Promise((resolve) => setTimeout(resolve, 150))
  const data = xthis.data
  let pathArrays = (location.pathname).split('/')
  let id = pathArrays.pop()
  let res = await apiFetch('/pengurangan/' + id, 'GET')
  if (res.success) {
    const dataServer = res.data?.data
    data.skpd = dataServer.spt_id
    onSearchByCode(xthis, false)
    data.tanggal = dateFormat(new Date(dataServer.tanggalPengajuan), ['d', 'm', 'y', '/'])
    data.namaPemohon = dataServer.namaPemohon
    data.alamatPemohon = dataServer.alamatPemohon
    data.telpPemohon = dataServer.telpPemohon
    data.alasanPengurangan = dataServer.alasanPengurangan
    data.keterangan = dataServer.keteranganPetugas
    data.verifikatorPetugas = dataServer.petugas?.name
    data.tanggalVerifikasiPetugas = dateFormat(new Date(dataServer.tanggalVerifPetugas), ['d', 'm', 'y', '/'])
    data.fotoKtp = dataServer.fotoKtp
    data.suratPermohonan = dataServer.suratPermohonan
    data.laporanKeuangan = dataServer.laporanKeuangan
    data.dokumenLainnya = dataServer.dokumenLainnya
    xthis.$forceUpdate()
  }
}
