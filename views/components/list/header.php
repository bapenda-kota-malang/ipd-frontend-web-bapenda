<?php
if(!isset($showSearch))
	$showSearch = true;

$searcPlaceHolder = isset($searcPlaceHolder) ? $searcPlaceHolder : 'Cari...';
?>

<div class="d-flex">
	<div class="me-auto">
		<h5 class="my-2">
			<i class="bi bi-person"></i> <strong><?= isset($action) ? $action : '' ?></strong>
			<?= isset($scope) ? $scope : '' ?>
		</h5>
	</div>
	<div>
		<div class="d-flex">
			<?php if($showSearch) { ?>
			<div class="ms-auto">
				<input v-model="searchKeywords"  @change="search" class="form-control" :placeholder="searchPlaceHolder" style="width:400px" />
				<!-- v-model="urls.dataSrcParams.searchKeywords" -->
			</div>
			<?php } ?>
			<?php if(isset($showFilter)) { ?>
			<div class="ms-2">
				<button @click="showFilter" class="btn bg-info">
					<i class="bi bi-sliders"></i> Filter
				</button>
			</div>
			<?php } ?>
			<?php if(isset($showAdd)) { ?>
			<div class="ms-3">
				<?php if(!isset($addAsModal) || !$addAsModal) { ?>
				<a href="<?= $addUrl ?>" class="btn bg-blue">
					<i class="bi bi-plus"></i> Tambah
				</a>
				<?php } else { ?>
				<button @click="<?= isset($addOnClick) ? $addOnClick : 'showEntry()' ?>" class="btn bg-blue">
					<i class="bi bi-plus"></i> Tambah
				</button>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if(isset($titleNav)) echo $titleNav ?>
		</div>
	</div>
</div>
<hr />
