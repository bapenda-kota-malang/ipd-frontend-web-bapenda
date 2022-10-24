<div class="row">
	<div class="col-lg-6">
		<div class="card mb-3">
			<div class="card-header h6 mb-0">Parameter Utama</div>
			<div class="p-3">
				<div class="row g-0 g-md-1">
					<div class="col-md-2 col-lg-2 pt-1">Tahun</div>
					<div class="col-3 col-md-3 col-lg-2 col-xxl-1"><input class="form-control" /></div>
					<div class="col mb-2"><input class="form-control" /></div>
				</div>
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
				<div class="row">
					<div class="col-5 col-xl-4">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
							<label class="form-check-label" for="flexCheckChecked">
								Penilaian masal
							</label>
						</div>
					</div>
					<div class="col-6">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
							<label class="form-check-label" for="flexCheckChecked">
								Penetapan NJOPTKP Masal
							</label>
						</div>
					</div>
				</div>
				<hr>
				<div class="row g-1">
					<div class="col-7">
						<div class="p-1 bg-grey-300 text-center">
							<div class="row g-1">
								<div class="col">Jumlah Record</div>
								<div class="col">Record Ke</div>
							</div>
						</div>
					</div>
					<div class="col-5">
						<div class="p-1 bg-grey-300 text-center">
							Nilai Baru
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="col-7">
						<div class="row g-1">
							<div class="col"><input type="text" class="form-control"></div>
							<div class="col"><input type="text" class="form-control"></div>
						</div>
					</div>
					<div class="col-5">
						<div class="row g-1">
							<div class="col-4"><input type="text" class="form-control"></div>
							<div class="col-6"><input type="text" class="form-control"></div>
							<div class="col-2"><input type="text" class="form-control"></div>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="col-7">
						<div class="row g-1">
							<div class="col"><input type="text" class="form-control"></div>
							<div class="col"><input type="text" class="form-control"></div>
						</div>
					</div>
					<div class="col-5">
						<input type="text" class="form-control">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
