<?php 
$noRtRw = true;
include Yii::getAlias('@vwCompPath/bscope/fullarea-inputblock.php');
?>

<div class="card mb-3">
	<div class="p-3">
		<div class="row g-1">
			<div class="col-4 col-md-3 col-xl-2">Seluruh Kelurahan</div>
			<div class="col mb-2">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" style="width:14px; height:15px; margin-top:2px" id="flexCheckDefault">
					<label class="form-check-label" for="flexCheckDefault">
						Ya
					</label>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-4 col-md-3 col-xl-2 pt-1">Blok Nomor</div>
			<div class="col col-xl-3 mb-2">
				<div class="row g-1">
					<div class="col-4"><input type="text" class="form-control"></div>
					<div class="col-6"><input type="text" class="form-control"></div>
					<div class="col-2"><input type="text" class="form-control"></div>
				</div>
			</div>
			<div class="col-1 text-center pt-2">-</div>
			<div class="col col-xl-3 mb-3">
				<div class="row g-1">
					<div class="col-4"><input type="text" class="form-control"></div>
					<div class="col-6"><input type="text" class="form-control"></div>
					<div class="col-2"><input type="text" class="form-control"></div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-4 col-md-3 col-xl-2">Mode</div>
			<div class="col col-md-2 col-xxl-1">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Kenaikan
					</label>
				</div>
			</div>
			<div class="col-12 col-md-2 col-xxl-1 offset-4 offset-md-0">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Penurunan
					</label>
				</div>
			</div>
			<div class="col-12 col-md-3 col-lg-2 col-xxl-1 offset-4 offset-md-0">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Dari kelas ke Kelas
					</label>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-3">
	<div class="p-3">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-8 col-lg-6 pt-1">Tingkat Kenaikan Kelas</div>
					<div class="col col-lg-3 mb-2"><input type="text" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-8 col-lg-6 pt-1">Kelas Terendah (Maks 50)</div>
					<div class="col col-lg-3 mb-2"><input type="text" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-8 col-lg-6 pt-1">Kelas Tertinggi (Maks 1)</div>
					<div class="col col-lg-3 mb-2"><input type="text" class="form-control"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col col-lg-3 col-xl-2 pt-1">Dari Kelas</div>
					<div class="col col-lg-2 mb-2"><input type="text" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col col-lg-3 col-xl-2 pt-1">Ke Kelas</div>
					<div class="col col-lg-2"><input type="text" class="form-control"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="p-3">
		<div class="row">
			<div class="col-4 col-lg-3 col-xl-2">
				<div class="text-center">Jumlah Record</div>
				<input type="text" class="form-control">
			</div>
			<div class="col-4 col-lg-3 col-xl-2">
				<div class="text-center">Record Ke</div>
				<input type="text" class="form-control">
			</div>
			<div class="col-4 col-lg-3 col-xl-2">
				<div class="text-center">Record</div>
				<input type="text" class="form-control">
			</div>
		</div>
	</div>
</div>