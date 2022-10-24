<div class="row">
	<div class="col-lg-6">
		<div class="card mb-3">
			<div class="card-header h6 mb-0">Parameter Utama</div>
			<div class="p-3">
				<?php 
				$noRtRw = true;
				include Yii::getAlias('@vwCompPath/bscope/fullarea-inputlist-col2.php');
				?>
				<div class="row g-md-2">
					<div class="col-md-6">
						<div class="row g-md-2">
							<div class="col-md-4 col-lg-6 col-xl-4 pt-1 mb-1">Tahun</div>
							<div class="col-md-6 col-lg-5 mb-2"><input class="form-control" /></div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row g-md-2">
							<div class="col-md-4 col-lg-6 col-xl-5 pt-1 mb-1 text-md-end">No. Dokumen</div>
							<div class="col-md-6 col-lg mb-2"><input class="form-control" /></div>
						</div>
					</div>
				</div>
				<div class="d-none d-lg-block" style="height:20px"></div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card mb-3">
			<div class="card-header h6 mb-0">
				Data
			</div>
			<div class="p-3">
				<div class="row g-1">
					<div class="col-3 col-md-3 col-lg-6 col-xl-5">
						<div class="p-1 bg-grey-300 text-center">
							Kode ZNT
						</div>
					</div>
					<div class="col-3 col-md-5 col-lg-4 col-xl-3">
						<div class="p-1 bg-grey-300 text-center">
							NIR
						</div>
					</div>
				</div>
				<?php for($i=0;$i<6;$i++) { ?>
				<div class="row g-1">
					<div class="col-3 col-md-3 col-lg-6 col-xl-5">
						<input class="form-control" />
					</div>
					<div class="col-3 col-md-5 col-lg-4 col-xl-3">
						<input class="form-control" />
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="p-3">
		<div class="row g-md-2">
			<div class="col-md-6 col-lg-5 col-xl-4">
				<div class="row g-md-2">
					<div class="col-md-5 col-xl-4 pt-1 mb-1">Tgl. Pendataan</div>
					<div class="col-md-6 col-lg-5 mb-2"><input class="form-control" /></div>
				</div>
			</div>
			<div class="col-md-6 col-lg-5 col-xl-5">
				<div class="row g-md-2">
					<div class="col-md-6 col-xl-4 pt-1 mb-1 text-md-end">Tgl. Pemeriksaan</div>
					<div class="col-md-6 col-lg-5 col-xl-4 mb-2"><input class="form-control" /></div>
				</div>
			</div>
		</div>
		<div class="row g-md-2">
			<div class="col-md-6 col-lg-5 col-xl-4">
				<div class="row g-md-2">
					<div class="col-md-5 col-xl-4 pt-1 mb-1">NIP Pendata</div>
					<div class="col-md-6 col-lg-5 mb-2"><input class="form-control" /></div>
				</div>
			</div>
			<div class="col-md-6 col-lg-5 col-xl-5">
				<div class="row g-md-2">
					<div class="col-md-6 col-xl-4 pt-1 mb-1 text-md-end">NIP Pemeriksa</div>
					<div class="col-md-6 col-lg-5 col-xl-4 mb-2"><input class="form-control" /></div>
				</div>
			</div>
		</div>
	</div>
</div>
