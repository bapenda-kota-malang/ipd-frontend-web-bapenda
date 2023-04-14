urls = {
  pathname: "/jaminanbongkar",
  dataPath: "/jaminanbongkar",
  dataSrc: "/jaminanbongkar",
};
vars = {};

function getJenisMasa(item) {
  const isType = false
  if (isType) return item.tipeReklame || '-'
} 

async function getUser(id) {
  let resUser = await apiFetch('/user/' + id, 'GET');
  if (resUser.success) {
    const resUserData = resUser.data?.data
    return resUserData
  }
  return null
}

async function postDataFetch(data, xthis) {
  let currentUserEl = document.getElementById('currentUser')
  let theUser = null
  if (currentUserEl) {
    theUser = await getUser(Number(currentUserEl.value))
  }
  data?.forEach(async (item) => {
    if (item?.createBy_user_id) {
      if (currentUserEl && Number(item.createBy_user_id) === Number(currentUserEl.value)) {
        item.namaUser = theUser?.name
      } else {
        let theUserByItem = await getUser(Number(item.createBy_user_id))
        item.namaUser = theUserByItem?.name
      }
    }
    if (item.spt?.jenisMasaPajakReklame) {
      item.jenisMasa = jenisMasa[Number(item.spt?.jenisMasaPajakReklame)]
    }
    if (item.spt_Id) {
      let resSkpd = await apiFetch('/skpd/' + item.spt_Id, 'GET');
      if (resSkpd.success) {
        const resSkpdData = resSkpd.data?.data
        item.namaWp = resSkpdData?.npwpd?.nama
        item.namaRekening = resSkpdData?.rekening?.nama || '-'
      }
    }
  })
  await new Promise((resolve) => setTimeout(resolve, 1000))
  xthis.$forceUpdate()
}