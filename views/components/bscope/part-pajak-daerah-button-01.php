<button type="button" class="btn btn-secondary me-2" style="width: 120px" @click="onBack">Kembali</button>
<?php if (!isset($attachView)): ?>
<button data-toggle="modal" data-target="#rejectModal" type="button" class="btn btn-danger me-2" style="width: 120px" @click="onHandleModal">Tolak</button>
<button type="button" class="btn btn-primary" style="width: 120px">Setujui</button>
<?php endif; ?>