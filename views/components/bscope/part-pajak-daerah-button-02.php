<button type="button" class="btn btn-secondary me-2" style="width: 120px" @click="onBack">Kembali</button>
<?php if (!isset($attachView)): ?>
<button type="button" class="btn btn-primary" style="width: 120px" @click="onSave">Simpan</button>
<?php endif; ?>