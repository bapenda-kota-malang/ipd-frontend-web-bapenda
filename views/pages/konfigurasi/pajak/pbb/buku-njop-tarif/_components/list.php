<?php

// use yii\web\View;
// use app\assets\VueAppEntryFormAsset;

// VueAppEntryFormAsset::register($this);

// $this->registerJsFile('@web/js/helper/dummy.js?v=20221108a');
// $this->registerJsFile('@web/js/services/dummy/entryform.js?v=20221108b');

?>
<nav>
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
		<button class="nav-link fw-600 active" id="nav-buku-tab" data-bs-toggle="tab" data-bs-target="#nav-buku" type="button" role="tab">Daftar Buku</button>
		<button class="nav-link fw-600" id="nav-njoptkp-tab" data-bs-toggle="tab" data-bs-target="#nav-njoptkp" type="button" role="tab">NJOPTKP</button>
		<button class="nav-link fw-600" id="nav-tarif-tab" data-bs-toggle="tab" data-bs-target="#nav-tarif" type="button" role="tab">Tarif</button>
	</div>
</nav>
<div class="tab-content card p-3 border-top-0" id="nav-tabContent">
	<div class="tab-pane fade show active" id="nav-buku" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
		<table class="table fit-form-control">
			<thead>
				<tr>
					<th colspan="2" class="text-center">Tahun</th>
					<th rowspan="2" class="text-center" style="width:80px;">Buku</th>
					<th colspan="2" class="text-center">Nilai NJOP</th>
				</tr>
				<tr>
					<th class="text-center" style="width:150px">Awal</th>
					<th class="text-center" style="width:150px">Akhir</th>
					<th class="text-center">Min</th>
					<th class="text-center">Max</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i = 0; $i < 10; $i++) { ?>
				<tr>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="tab-pane fade" id="nav-njoptkp" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
		<table class="table fit-form-control">
			<thead>
				<tr>
					<th rowspan="2" class="text-center" style="width:150px;">Prop</th>
					<th rowspan="2" class="text-center" style="width:150px;">Kota</th>
					<th colspan="2" class="text-center">Tahun</th>
					<th rowspan="2" class="text-center">Nilai x 1.000</th>
				</tr>
				<tr>
					<th class="text-center" style="width:150px">Awal</th>
					<th class="text-center" style="width:150px">Akhir</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i = 0; $i < 10; $i++) { ?>
				<tr>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="tab-pane fade" id="nav-tarif" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
		<table class="table fit-form-control">
			<thead>
				<tr>
					<th rowspan="2" class="text-center" style="width:150px;">Prop</th>
					<th rowspan="2" class="text-center" style="width:150px;">Kota</th>
					<th colspan="2" class="text-center">Tahun</th>
					<th colspan="2" class="text-center">Nilai NJOP</th>
					<th rowspan="2" class="text-center">Nilai %</th>
				</tr>
				<tr>
					<th class="text-center" style="width:150px">Awal</th>
					<th class="text-center" style="width:150px">Akhir</th>
					<th class="text-center">Min</th>
					<th class="text-center">Max</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i = 0; $i < 10; $i++) { ?>
				<tr>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>