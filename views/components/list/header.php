<div class="d-flex">
	<div class="me-auto">
	    <h5 class="my-2">
			<i class="bi bi-person"></i> <strong><?= isset($action) ? $action : '' ?></strong>
			<?= isset($scope) ? $scope : '' ?>
		</h5>
	</div>
	<div>
		<div class="d-flex">
			<div class="ms-auto">
				<input v-model="urls.dataSrcParams.searchKeywords" @change="search" class="form-control" placeholder="Cari..." style="width:400px" />
			</div>
			<?php if(isset($showFilter)) { ?>
			<div class="ms-2">
				<button class="btn bg-slate" data-bs-toggle="modal" data-bs-target="#filterModal">
					<i class="bi bi-sliders"></i> Filter
				</button>
			</div>
			<?php } ?>
			<?php if(isset($showAdd)) { ?>
			<div class="ms-3">
				<a href="<?= $addUrl ?>" class="btn bg-blue">
					<i class="bi bi-plus"></i> Tambah
				</a>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<hr />
