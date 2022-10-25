<hr />
<div class="row">
	<div class="col">
		<?php if(isset($showBack)) { ?>
		<a href="<?= $backUrl ?>" class="btn bg-grey-300">
			<i class="bi bi-x-chevron-left"></i> Kembali
		</a>
		<?php } ?>
	</div>
	<div class="col text-end">
		<?php if(isset($showCancel)) { ?>
		<a href="<?= $cancelUrl ?>" class="btn bg-danger ms-2">
			<i class="bi bi-x-lg"></i> Batal
		</a>
		<?php } ?>
		<?php if(isset($showApproval)) { ?>
		<button @click="rejectRequest" v-if="hideApproval != true" class="btn bg-danger ms-2">
			<i class="bi bi-x-lg"></i> Tolak
		</button>
		<button @click="approveRequest" v-if="hideApproval != true" class="btn bg-blue ms-2">
			<i class="bi bi-check-lg"></i> Terima
		</button>
		<?php } ?>
		<?php if(isset($showEdit)) { ?>
		<a href="<?= $editUrl ?>" class="btn bg-blue ms-2">
			<i class="bi bi-pencil"></i> Edit
		</a>
		<?php } ?>
		<?php if(isset($showOK)) { ?>
		<button @click="saveData" class="btn bg-blue ms-2">
			<i class="bi bi-check-lg"></i> Simpan
		</button>
		<?php } ?>
	</div>
</div>