<div class="p-3">
  <div class="row align-items-center g-3 mb-3">
    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Periode Awal</div>
      <input type="text" class="form-control w-50" disabled>
    </div>
    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Periode Akhir</div>
      <input type="text" class="form-control w-50" disabled>
    </div>
    <div class="col-4 d-flex justify-content-start align-items-center">
      <div class="text-start w-25 me-1">Jatuh Tempo</div>
      <input type="text" class="form-control w-50" disabled>
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
  <div class="row align-items-center g-3 my-2">
    <div class="col-12">Detail Objek Pajak Hotel</div>
    <div class="col-12">
      <table class="table table-bordered custom">
        <thead class="thead">
          <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Golongan Kamar</th>
            <th scope="col" class="text-center">Tarif</th>
            <th scope="col" class="text-center">Jumlah Kamar</th>
            <th scope="col" class="text-center">Jumlah Kamar Yang Laku</th>
          </tr>
        <tbody>
          <tr v-for="i in 3" :key="i">
            <td v-for="j in 5" :key="j">&nbsp;</td>
          </tr>
        </tbody>
        </thead>
      </table>
    </div>
  </div>
</div>