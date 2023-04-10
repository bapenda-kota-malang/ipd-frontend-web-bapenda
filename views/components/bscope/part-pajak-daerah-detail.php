<div class="p-2 mb-2">
  <div class="row align-items-center g-3 mb-3">
    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Periode Awal</div>
      <input v-model="data.periodeAwal" type="text" class="form-control w-50" disabled>
    </div>

    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Periode Akhir</div>
      <input v-model="data.periodeAkhir" type="text" class="form-control w-50" disabled>
    </div>

    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Jatuh Tempo</div>
      <input v-model="data.jatuhTempo" type="text" class="form-control w-50" disabled>
    </div>
  </div>

  <div class="row align-items-center g-3 mb-3">
    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Sub Total E-Tax</div>
      <input v-model="data.subTotalTax" type="text" class="form-control w-50" disabled>
    </div>

    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Tax E-Tax</div>
      <input v-model="data.tax" type="text" class="form-control w-50" disabled>
    </div>

    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Total E-Tax</div>
      <input v-model="data.totalTax" type="text" class="form-control w-50" disabled>
    </div>
  </div>

  <div class="row align-items-center g-3 mb-3">
    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Potensi</div>
      <input v-model="data.potensi" type="text" class="form-control w-50" disabled>
    </div>

    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Jumlah Pajak</div>
      <input v-model="data.jumlahPajak" type="text" class="form-control w-50" disabled>
    </div>

    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Denda/Kenaikan</div>
      <input v-model="data.denda" type="text" class="form-control w-50" disabled>
    </div>
  </div>
</div>
