<div class="card mb-3">
	<div class="card-header h6 mb-0">
		Parameter Utama
	</div>
	<div class="p-3">
		<div class="row">
			<div class="col-lg-6 mb-3">
				<?php 
				$noRtRw = true;
				include Yii::getAlias('@vwCompPath/bscope/fullarea-inputlist-col2.php');
				?>
			</div>
			<div class="col-lg-6 mb-3">
				<div class="row g-md-2">
					<div class="col-md-2 col-xl-4 pt-1 text-xl-end">Blok</div>
					<div class="col-md-2 col-xl-2 mb-2"><input class="form-control" /></div>
				</div>
				<div class="row g-md-2">
					<div class="col-md-2 col-xl-4 pt-1 text-xl-end">Kode ZNT Asal</div>
					<div class="col-md-2 col-xl-2 mb-2"><input class="form-control" /></div>
				</div>
				<div class="row g-md-2">
					<div class="col-md-2 col-xl-4 pt-1 text-xl-end">Kode ZNT Baru</div>
					<div class="col-md-2 col-xl-2 mb-2"><input class="form-control" /></div>
				</div>
				<div class="row g-md-2">
					<div class="col-md-2 col-xl-4 pt-1 text-xl-end">No. Dokumen</div>
					<div class="col-md-3 col-xl-4 mb-2"><input class="form-control" /></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header h6 mb-0">Data</div>
	<div class="p-3">
		<div class="row g-2 mt-2 mb-4">
			<div class="col-md-2 col-xl-1 pt-1">Data</div>
			<div class="col">
				<div class="row">
					<div class="col-6 col-md-4 col-lg-3 col-xl-2">
						<div class="text-center">Nomor Urut</div>
						<div class="row g-1">
							<?php for($i=1; $i<=10; $i++) { ?>
							<div class="col-7">
								<input type="text" class="form-control">
							</div>
							<div class="col-5">
								<input type="text" class="form-control">
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 col-xl-2">
						<div class="text-center">Nomor Urut</div>
						<div class="row g-1">
							<?php for($i=1; $i<=10; $i++) { ?>
							<div class="col-7">
								<input type="text" class="form-control">
							</div>
							<div class="col-5">
								<input type="text" class="form-control">
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 col-xl-2">
						<div class="text-center">Nomor Urut</div>
						<div class="row g-1">
							<?php for($i=1; $i<=10; $i++) { ?>
							<div class="col-7">
								<input type="text" class="form-control">
							</div>
							<div class="col-5">
								<input type="text" class="form-control">
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 col-xl-2">
						<div class="text-center">Nomor Urut</div>
						<div class="row g-1">
							<?php for($i=1; $i<=10; $i++) { ?>
							<div class="col-7">
								<input type="text" class="form-control">
							</div>
							<div class="col-5">
								<input type="text" class="form-control">
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 col-xl-2">
						<div class="text-center">Nomor Urut</div>
						<div class="row g-1">
							<?php for($i=1; $i<=10; $i++) { ?>
							<div class="col-7">
								<input type="text" class="form-control">
							</div>
							<div class="col-5">
								<input type="text" class="form-control">
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 col-xl-2">
						<div class="text-center">Nomor Urut</div>
						<div class="row g-1">
							<?php for($i=1; $i<=10; $i++) { ?>
							<div class="col-7">
								<input type="text" class="form-control">
							</div>
							<div class="col-5">
								<input type="text" class="form-control">
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
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
