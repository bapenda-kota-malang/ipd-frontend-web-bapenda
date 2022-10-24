<div class="card mb-4">
	<div class="p-3">
		<div class="row">
			<div class="col-md-6">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Pindah Dati II Keseluruhan Ke Propinsi
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Pindah Kecamatan Keseluruhan ke Dati II
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Pindah Kelurahan Keseluruhan ke Kecamatan
					</label>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Pindah Blok Keseluruhan Ke Kelurahan Lain
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Gabung Beberapa Blok
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Pindah NOP ke Blok Lain
					</label>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-3">
	<div class="p-3">
		<div class="row g-2">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-2 col-md-1 col-lg offset-lg-3 offset-xl-2 mb-1">
						<div class="bg-blue p-2 text-center">Lama</div>
					</div>
				</div>
				<?php 
				$noRtRw = true;
				// $showTahun = true;
				$title = "Parameter Utama";
				include Yii::getAlias('@vwCompPath/bscope/fullarea-inputlist-col2.php');
				?>
				<div class="row g-1">
					<div class="col-md-3 col-xl-2 pt-1">Blok Awal</div>
					<div class="col-2 col-md-1 col-lg-2 col-xl-1 mb-2"><input class="form-control" /></div>
					<div class="col-md-4 col-xl-2 pt-1 text-end">Blok Akhir</div>
					<div class="col-2 col-md-1 col-lg-2 col-xl-1 mb-2"><input class="form-control" /></div>
				</div>
				<div class="row g-1">
					<div class="col-md-3 col-xl-2 pt-1">Urut Awal</div>
					<div class="col-2 col-md-1 col-lg-2 col-xl-1"><input class="form-control" /></div>
					<div class="col-md-4 col-xl-2 pt-1 text-end">Urut Akhir</div>
					<div class="col-2 col-md-1 col-lg-2 col-xl-1"><input class="form-control" /></div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-2 col-md-1 col-lg mb-1">
						<div class="bg-blue p-2 text-center">Baru</div>
					</div>
					<div class="col-md-2 pt-1"></div>
				</div>
				<div class="row g-1">
					<div class="col-md-2 col-xl-1 pt-1 d-lg-none">Propinsi</div>
					<div class="col-2 col-md-1 col-lg-2 col-xl-1"><input class="form-control" /></div>
					<div class="col col-md-7 col-lg mb-2"><input class="form-control" /></div>
					<div class="col-md-2 pt-1 d-none d-lg-inline"></div>
				</div>
				<div class="row g-1">
					<div class="col-md-2 col-xl-1 pt-1 d-lg-none">Dati II</div>
					<div class="col-2 col-md-1 col-lg-2 col-xl-1"><input class="form-control" /></div>
					<div class="col col-md-7 col-lg mb-2"><input class="form-control" /></div>
					<div class="col-md-2 pt-1 d-none d-lg-inline"></div>
				</div>
				<div class="row g-1">
					<div class="col-md-2 col-xl-1 pt-1 d-lg-none">Kecamatan</div>
					<div class="col-2 col-md-1 col-lg-2 col-xl-1"><input class="form-control" /></div>
					<div class="col col-md-7 col-lg mb-2"><input class="form-control" /></div>
					<div class="col-md-2 pt-1 d-none d-lg-inline"></div>
				</div>
				<div class="row g-1">
					<div class="col-md-2 col-xl-1 pt-1 d-lg-none">Kelurahan</div>
					<div class="col-2 col-md-1 col-lg-2 col-xl-1"><input class="form-control" /></div>
					<div class="col col-md-7 col-lg mb-2"><input class="form-control" /></div>
					<div class="col-md-2 pt-1 d-none d-lg-inline"></div>
				</div>
				<div class="row g-1">
					<div class="col-md-2 col-xl-1 pt-1 d-lg-none">Blok</div>
					<div class="col-2 col-lg-2 col-xl-1"><input class="form-control" /></div>
				</div>
			</div>
		</div>
	</div>
</div>
