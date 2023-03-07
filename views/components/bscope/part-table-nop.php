<div class="card mb-4">
  <div class="card-body">
    <div class="row overflow-auto g-2" style="min-height: 150px; max-height: 500px;">
      <div v-if="data.nopError" class="col-12 text-center text-danger">{{ data.nopError }}</div>
      <div class="col-12">
        <div class="row align-items-center g-2">
          <div class="col-4 font-weight-bold text-center" style="font-weight: 600;">NOP</div>
          <div class="col-4 font-weight-bold text-center" style="font-weight: 600;">NOP</div>
          <div class="col-4 text-center" style="font-weight: 600;">Jumlah Data</div>
        </div>
      </div>
    </div>
  </div>
</div>