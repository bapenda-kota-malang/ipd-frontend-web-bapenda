<div class="modal" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="false">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rejectModalLabel">Alasan Penolakan</h5>
        <span style="font-size: 32px; cursor: pointer" data-target="#rejectModal" @click="onHandleModalClose">&times;</span>
      </div>
      <div class="modal-body">
        <div class="row align-items-center g-0 mb-3">
          <div class="col-12">
            <textarea v-model="data.alasanPenolakan" rows="5" class="form-control"></textarea>
          </div>
          <div class="col-12">
            <span v-if="data.errors.alasanPenolakan" class="text-danger">{{ data.errors.alasanPenolakan }}</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="width: 120px" data-target="#rejectModal" @click="onHandleModalClose">Close</button>
        <button type="button" class="btn btn-primary" style="width: 120px" @click="onReject">Simpan</button>
      </div>
    </div>
  </div>
</div>
