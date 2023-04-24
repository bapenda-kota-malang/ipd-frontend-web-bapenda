let pathArrays = (location.pathname).split('/')
let id = pathArrays.pop()
if(!id) id = 0;

data = {
  loading: true,
  npwpd: null,
  nomor: null,
  detailJambong: [],
  detailReklame: []
}

urls = {
  dataSrc: '/jaminanbongkar/' + id,
};

async function postFetchData(dataExternal) {
  const data = this.data
  const item = dataExternal
  const itemMap = {}
  data.nomor = item.nomor
  data.detailJambong = item.detailJambong
  data.loading = true
  if (item.spt_Id) {
    let resSkpd = await apiFetch('/skpd/' + item.spt_Id, 'GET');
    if (resSkpd.success) {
      const resSkpdData = resSkpd.data?.data
      itemMap.npwpd = resSkpdData?.npwpd?.npwpd || '-'
      itemMap.namaWp = resSkpdData?.npwpd?.nama
      itemMap.alamatWp = resSkpdData?.npwpd?.pemilik?.length > 0 ? resSkpdData?.npwpd?.pemilik[0]?.alamat : ''
      itemMap.namaRekening = resSkpdData?.rekening?.nama || '-'
      itemMap.detailReklame = resSkpdData?.detailSptReklame
      itemMap.detailReklame?.forEach((element, idx) => {
          Object.assign(data.detailJambong[idx], element)
      })
    }
  }
  if (item.spt?.jenisMasaPajakReklame) {
    data.jenisMasa = jenisMasa[Number(item.spt?.jenisMasaPajakReklame)]
  }
  if (document.getElementById('jenisReklame')) {
    document.getElementById('jenisReklame').value = data.jenisMasa 
  }
  if (document.getElementById('batasTanggal')) {
    document.getElementById('batasTanggal').value = dateFormat(new Date(item.TanggalBatas), ['d', 'm', 'y', '/'])
  }
  if (document.getElementById('tanggal')) {
    document.getElementById('tanggal').value = dateFormat(new Date(item.tanggal), ['d', 'm', 'y', '/'])
  }
  if (document.getElementById('skpd')) {
    document.getElementById('skpd').value = item?.spt?.NomorSpt
  }
  if (document.getElementById('tanggalSkpd')) {
    document.getElementById('tanggalSkpd').value = dateFormat(new Date(item?.spt?.tanggalSpt), ['d', 'm', 'y', '/'])
  }
  if (document.getElementById('tahunSkpd')) {
    const tgl = new Date(item?.spt?.tanggalSpt)
    document.getElementById('tahunSkpd').value = tgl.getFullYear()
  }
  if (document.getElementById('npwpd')) {
    document.getElementById('npwpd').value = itemMap.npwpd
  }
  if (document.getElementById('namaWp')) {
    document.getElementById('namaWp').value = itemMap.namaWp
  }
  if (document.getElementById('alamatWp')) {
    document.getElementById('alamatWp').value = itemMap.alamatWp
  }
  if (document.getElementById('biayaPemutusan')) {
    document.getElementById('biayaPemutusan').value = item.biayaPemutusan
  }
  if (document.getElementById('nominal')) {
    document.getElementById('nominal').value = item.nominal
  }
  if (document.querySelector('input[name="inlineRadioOptions"]')) {
    if (itemMap.detailReklame?.length > 0) {
      const detail = itemMap.detailReklame[0]
      let dimensi = 'persegi-panjang'
      if (detail?.diameter > 0) {
        dimensi = 'lingkaran'
      } else if (Number(detail?.panjang) === Number(detail?.lebar)) {
        dimensi = 'persegi'
      }
      const radios = document.querySelectorAll('input[name="inlineRadioOptions"]')
      for (let j = 0; j < radios.length; j++) {
        const element = radios[j];
        element.checked = false
        if (dimensi === element.value) {
          element.checked = true
          break
        }
      }
    }
  }
  await new Promise((resolve) => setTimeout(resolve, 500))
  data.loading = false
  this.$forceUpdate()
}