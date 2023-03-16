<div class="card mb-4">
  <div class="card-header fw-600">
		Jenis Cetakan
	</div>
  <div class="card-body">
    <div class="row justify-content-start align-items-center g-1">
      <div class="col-4 d-flex align-items-center">
        <div class="w-25 ml-2">Buku</div>
        <div class="w-75 mx-2">
          <vueselect v-model="data.buku_id" :options="bukuOpts" :reduce="item => item.id" label="name" code="id" />
        </div>
      </div>
      <div class="col-2 d-flex align-items-center mt-2">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">SPPT</label>
        </div>
      </div>
      <div class="col-2 d-flex align-items-center mt-2">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">STTS</label>
        </div>
      </div>
      <div class="col-2 d-flex align-items-center mt-2">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">DHKP</label>
        </div>
      </div>
      <div class="col-12"><hr></div>
      <div class="col-1"></div>
      <div class="col-2 d-flex align-items-center mt-2">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault2">
          <label class="form-check-label" for="flexRadioDefault2">SPPT/STTS Tunggal</label>
        </div>
      </div>
      <div class="col-2 d-flex align-items-center mt-2">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault2">
          <label class="form-check-label" for="flexRadioDefault2">SPPT/STTS Ganda</label>
        </div>
      </div>
      <div class="col-4"></div>
      <div class="col-3">
				<button type="button" class="btn btn-outline-secondary w-100">Cetak</button>
			</div>
    </div>
  </div>
</div>