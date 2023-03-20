data = { ...regionData, ...regionErrors };

refSources = {
  imageUrl: '/static/img/',
  submitCetak: '/{id}/cetak'
}

methods = {
  getList: () => {},
  onChangedRegion
}

components = {
  datepicker: DatePicker
}

async function onChangedRegion(menu, event) {
  if (menu === 'province') {
    await regionMethods.onChangedProvinceParent(this, event)
  }
  if (menu === 'city') {
    await regionMethods.onChangedCityParent(this, event)
  }
  if (menu === 'district') {
    await regionMethods.onChangedSubdistrictParent(this, event)
  }
  if (menu === 'village') {
    await regionMethods.onChangedVillageParent(this, event)
  }
  this.$forceUpdate()
}
