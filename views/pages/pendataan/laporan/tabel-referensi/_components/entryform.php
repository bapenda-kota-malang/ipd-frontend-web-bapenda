<div class="row g-3">
	<div class="col-lg-6">
		<?php 
		$noRtRw = true;
		$showTahun = true;
		$title = "Parameter Utama";
		include Yii::getAlias('@vwCompPath/bscope/fullarea-inputblock-col2.php');
		?>		
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header h6 mb-0">
				Jenis Laporan Tabel Referensi
			</div>
			<div class="p-3">
				<div class="form-check mb-2">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Laporan Tabel Wilayah Kelurahan
					</label>
				</div>
				<div class="form-check mb-2">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Laporan Tabel ZNT
					</label>
				</div>
				<div class="form-check mb-2">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Laporan Tabel Pemekaran
					</label>
				</div>
				<div style="height:102px"></div>
			</div>
		</div>
	</div>
</div>
