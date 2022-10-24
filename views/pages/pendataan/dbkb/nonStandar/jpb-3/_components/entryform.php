<div class="row">
	<div class="col-lg-6">
		<div class="card mb-3">
			<div class="card-header h6 mb-0">Parameter Utama</div>
			<div class="p-3">
				<?php 
				$noKec = true;
				$noKel = true;
				$noRtRw = true;
				include Yii::getAlias('@vwCompPath/bscope/fullarea-inputlist-col2.php');
				?>
				<div class="row g-0 g-md-1">
					<div class="col-md-2 col-lg-2 pt-1">Tahun</div>
					<div class="col-md-3 col-lg-3 col-xxl-2 mb-2"><input class="form-control" /></div>
				</div>
			</div>
			<div class="d-none d-lg-block" style="height:118px"></div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header h6 mb-0">Data</div>
			<div class="p-3">
				<div class="row g-1">
					<div class="col-4 text-center">
						Lebar Bentang
					</div>
					<div class="col-4 ext-center">
						Tinggi Kolom
					</div>
				</div>
				<div class="row g-1">
					<div class="col-4">
						<div class="row g-1">
							<div class="col">
								<div class="p-1 bg-grey-300 text-center">
									Min
								</div>
							</div>
							<div class="col">
								<div class="p-1 bg-grey-300 text-center">
									Max
								</div>
							</div>
						</div>
					</div>
					<div class="col-4">
						<div class="row g-1">
							<div class="col">
								<div class="p-1 bg-grey-300 text-center">
									Min
								</div>
							</div>
							<div class="col">
								<div class="p-1 bg-grey-300 text-center">
									Max
								</div>
							</div>
						</div>
					</div>
					<div class="col-4 p-1 text-center bg-grey-300 text-center">
						Nilai DBKB JPB3
					</div>
				</div>
				<?php for($i=0; $i<6; $i++) { ?>
					<div class="row g-1">
					<div class="col-4">
						<div class="row g-1">
							<div class="col">
								<input class="form-control" />
							</div>
							<div class="col">
								<input class="form-control" />
							</div>
						</div>
					</div>
					<div class="col-4">
						<div class="row g-1">
							<div class="col">
								<input class="form-control" />
							</div>
							<div class="col">
								<input class="form-control" />
							</div>
						</div>
					</div>
					<div class="col-4">
						<input class="form-control" />
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

