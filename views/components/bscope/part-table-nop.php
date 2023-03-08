<div class="row p-2 g-2" style="min-height: 150px; max-height: 550px; overflow-y: scroll;">
  <div v-if="data.nopError" class="col-12 text-center text-danger">{{ data.nopError }}</div>
  <div class="col-12">
    <div class="row align-items-center g-2">
      <div class="col-4 font-weight-bold text-center" style="font-weight: 600;">NOP</div>
      <div class="col-1"></div>
      <div class="col-4 font-weight-bold text-center" style="font-weight: 600;">NOP</div>
      <div class="col-1"></div>
      <div class="col-2 text-center" style="font-weight: 600;">Jumlah Data</div>
    </div>
  </div>
  <div v-for="i in data.rowCounter" :key="i" class="col-12">
    <div class="row p-2">
      <div class="col-4">
        <div class="row justify-content-center align-items-center g-1">
          <div class="col-4 d-flex align-items-center gap-1">
            <input maxlength="5" class="form-control" />
            <label style="font-size: 14px; font-weight: 600">&nbsp;&bull;&nbsp;</label>
          </div>
          <div class="col-4 d-flex align-items-center gap-1">
            <input maxlength="5" class="form-control" />
            <label style="font-size: 14px; font-weight: 600">&nbsp;&minus;&nbsp;</label>
          </div>
          <div class="col-2"><input maxlength="2" class="form-control" /></div>
        </div>
      </div>
      <div class="col-1">
        <div class="d-flex justify-content-center align-items-center">
          <label>s/d</label>
        </div>
      </div>
      <div class="col-4">
        <div class="row justify-content-center align-items-center g-1">
          <div class="col-4 d-flex align-items-center gap-1">
            <input type="text" maxlength="5" class="form-control" />
            <label style="font-size: 14px; font-weight: 600">&nbsp;&bull;&nbsp;</label>
          </div>
          <div class="col-4 d-flex align-items-center gap-1">
            <input type="text" maxlength="5" class="form-control" />
            <label style="font-size: 14px; font-weight: 600">&nbsp;&minus;&nbsp;</label>
          </div>
          <div class="col-2">
            <input type="text" maxlength="2" class="form-control" />
          </div>
        </div>
      </div>
      <div class="col-1"></div>
      <div class="col-2">
        <div class="row justify-content-center align-items-center g-1">
          <div class="col-12"> 
            <input type="text" class="form-control text-end" disabled />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>