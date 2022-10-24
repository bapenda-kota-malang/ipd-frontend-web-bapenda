<div class="row">
	<div class="col-lg-6">
		<div class="card mb-3">
			<div class="card-header h6 mb-0">Parameter Utama</div>
			<div class="p-3">
				<?php 
				$noRtRw = true;
				include Yii::getAlias('@vwCompPath/bscope/fullarea-inputlist-col2.php');
				?>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header h6 mb-0">Data</div>
			<div class="p-3">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Daftar OP dgn nilai Individu
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Rincian Perhitungan Penilaian
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Laporan Transaksi Jual Beli
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						Surat keterngan NJOP
					</label>
				</div>
				<div class="d-none d-lg-block" style="height:55px"></div>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="p-3">
		<div class="row g-1">
			<div class="col-lg-5">
				<div class="row g-1">
					<div class="col-lg-2 pt-1">NOP Awal</div>
					<div class="col-lg">
						<div class="row g-1">
							<div class="col-3"><input type="text" class="form-control"></div>
							<div class="col-4"><input type="text" class="form-control"></div>
							<div class="col-1"><input type="text" class="form-control mb-2"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="row g-1">
					<div class="col-lg-2 pt-1">NOP Akhir</div>
					<div class="col-lg">
						<div class="row g-1">
							<div class="col-3"><input type="text" class="form-control"></div>
							<div class="col-4"><input type="text" class="form-control"></div>
							<div class="col-1"><input type="text" class="form-control"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br />
		<div class="mb-1">Surat keterangan NJOP</div>
		<div class="row">
			<div class="col-3 col-lg-1">No</div>
			<div class="col-3"><input type="text" class="form-control mb-2"></div>
		</div>
		<div class="row">
			<div class="col-3 col-lg-1">Tanggal</div>
			<div class="col-3"><input type="text" class="form-control"></div>
		</div>
	</div>
</div>