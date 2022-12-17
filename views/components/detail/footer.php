<hr />
<div class="d-flex justify-content-center">
	<div>
		<?php if(isset($showBack)) { ?>
		<a href="<?= $backUrl ?>" class="btn bg-grey-300">
			<i class="bi bi-chevron-left"></i> Kembali
		</a>
		<?php } ?>
		<?php if(isset($showCancel)) { ?>
		<a href="<?= $cancelUrl ?>" class="btn bg-danger ms-2">
			<i class="bi bi-x-lg"></i> Batal
		</a>
		<?php } ?>
		<?php if(isset($showApproval)) { ?>
		<button v-if="hideApproval != true" class="btn bg-danger ms-2" data-bs-toggle="modal" data-bs-target="#rejectRequestModal">
			<i class="bi bi-x-lg"></i> Tolak
		</button>
		<button v-if="hideApproval != true" class="btn bg-blue ms-2" data-bs-toggle="modal" data-bs-target="#approveRequestModal">
			<i class="bi bi-check-lg"></i> Terima
		</button>
		<?php } ?>
		<?php if(isset($showOK)) { ?>
		<button @click="submitData" class="btn bg-blue ms-2">
			<i class="bi bi-check-lg"></i> Simpan
		</button>
		<?php } ?>
		<?php if(isset($showEdit)) { ?>
		<a href="<?= isset($editUrl) ? $editUrl : '#' ?>" class="btn bg-blue ms-2">
			<i class="bi bi-pencil"></i> Edit
		</a>
		<?php } ?>
		<?php if(isset($showCetak)) { ?>
		<button @click="submitCetak" class="btn bg-blue ms-2">
			<i class="bi bi-check-lg"></i> Cetak
		</button>
		<?php } ?>
		<?php if(isset($footerNav)) echo $footerNav ?>
	</div>
</div>

<?php if(isset($showApproval)) { ?>
<div id="approveRequestModal" class="modal fade" data-bs-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Terima Permohonan</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Proses akan <strong>MENERIMA</strong> permohonan. Lanjutkan Proses?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button @click="approveRequest" type="button" class="btn btn-primary">Terima</button>
			</div>
		</div>
	</div>
</div>
<div id="rejectRequestModal" class="modal fade" data-bs-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Tolak Permohonan</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Proses akan <strong>MENOLAK</strong> permohonan. Lanjutkan Proses?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button @click="rejectRequest" type="button" class="btn btn-primary">Tolak</button>
			</div>
		</div>
	</div>
</div>
<?php } ?>
