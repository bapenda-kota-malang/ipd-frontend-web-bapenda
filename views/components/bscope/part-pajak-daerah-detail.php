<div class="p-3 mb-4">
  <div class="row align-items-center g-3 mb-3">
    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Periode Awal</div>
      <datepicker v-model="data.periodeAwal" type="date" format="DD-MM-YYYY" />
    </div>

    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Periode Akhir</div>
      <datepicker v-model="data.periodeAkhir" type="date" format="DD-MM-YYYY" />
    </div>

    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Jatuh Tempo</div>
      <datepicker v-model="data.jatuhTempo" type="date" format="DD-MM-YYYY" />
    </div>
  </div>

  <div class="row align-items-center g-3 mb-3">
    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Sub Total E-Tax</div>
      <input type="text" class="form-control w-50" disabled>
    </div>

    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Tax E-Tax</div>
      <input type="text" class="form-control w-50" disabled>
    </div>

    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Total E-Tax</div>
      <input type="text" class="form-control w-50" disabled>
    </div>
  </div>

  <div class="row align-items-center g-3 mb-3">
    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Potensi</div>
      <input type="text" class="form-control w-50" disabled>
    </div>

    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Jumlah Pajak</div>
      <input type="text" class="form-control w-50" disabled>
    </div>

    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Denda/Kenaikan</div>
      <input type="text" class="form-control w-50" disabled>
    </div>
  </div>
</div>
