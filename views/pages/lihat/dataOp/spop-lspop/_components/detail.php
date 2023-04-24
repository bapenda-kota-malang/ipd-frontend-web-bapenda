<?php

use yii\web\View;
use app\assets\VueAppDetailAsset;

VueAppDetailAsset::register($this);


?>

<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<button class="nav-link active" id="spop-lsop-tab" data-bs-toggle="tab" data-bs-target="#spop-lsop" type="button" role="tab" aria-controls="spop-lsop" aria-selected="true">SPOP/LSOP</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="rincian-bangunan-tab" data-bs-toggle="tab" data-bs-target="#rincian-bangunan" type="button" role="tab" aria-controls="rincian-bangunan" aria-selected="false">Rincian Bangunan</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="identitas-pendata-tab" data-bs-toggle="tab" data-bs-target="#identitas-pendata" type="button" role="tab" aria-controls="identitas-pendata" aria-selected="false">Identitas Pendata</button>
	</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="spop-lsop" role="tabpanel" aria-labelledby="spop-lsop-tab">
		<div class="row my-4">
			<div class="col-md-6">
				<div class="row mb-3">
					<label class="col-sm-2 col-form-label">NOP</label>
					<div class="col-sm-10">
						<?php
						include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
						?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row mb-3">
					<label class="col-sm-2 col-form-label">No. Formulir</label>
					<div class="col-sm-10">
						<input type="number" name="" id="" class="form-control">
					</div>
				</div>
			</div>

			<!-- Data Letak Objek Pajak -->
			<div class="col-md-12">
				<div class="card mb-4">
					<div class="card-header fw-600">Data Letak Objek Pajak</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Nama Jalan</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Kelurahan</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Blok/Kav/No.</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">RT</div>
									<div class="xc-lg-2 mb-2">
										<input class="form-control" disabled />
									</div>
									<div class="xc-lg-1 xc-xl-4 pt-1">RW</div>
									<div class="xc-lg-2 mb-2">
										<input class="form-control" disabled />
									</div>
									<div class="xc-lg-1 xc-xl-4 pt-1">No. Persil</div>
									<div class="xc-lg-3 mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Data subjek pajak -->
			<div class="col-md-12">
				<div class="card mb-4">
					<div class="card-header fw-600">Data Subjek Pajak</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Nomor KTP</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Nama WP</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Jalan WP</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Blok/Kav/No</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Kelurahan</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Kode POS</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>

							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Pekerjaan</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Status WP</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">NPWP</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">RT</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
									<div class="xc-lg-1 xc-xl-4 pt-1">RW</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Kabupaten</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Data Bumi -->
			<div class="col-md-12">
				<div class="card mb-4">
					<div class="card-header fw-600">Data Bumi</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 pt-1">Luas Bumi</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 pt-1">Kode ZNT</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 pt-1">Jenis Bumi</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Data Bangunan -->
			<div class="col-md-12">
				<div class="card mb-4">
					<div class="card-header fw-600">Data Bangunan</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 pt-1">Jumlah Bangunan</div>
									<div class="xc-lg-6 mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Data Identitas Pendata -->
			<div class="col-md-12">
				<div class="card mb-4">
					<div class="card-header fw-600">Data Identitas Pendata</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 pt-1">Tanggal Pendataan</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 pt-1">NIP Pendata</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>

							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 pt-1">Tanggal Pemeriksaan</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 pt-1">NIP Pemeriksa</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>

							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 pt-1">Tanggal Perekaman</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 pt-1">NIP Perekam</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="rincian-bangunan" role="tabpanel" aria-labelledby="rincian-bangunan-tab">
		<div class="row my-4">
			<!-- Data rincian Bangunan -->
			<div class="col-md-12">
				<div class="card mb-4">
					<div class="card-header fw-600">Rincian Data Bangunan</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">No. Bangunan</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Luas Bangunan</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Jumlah Lantai</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Tahun Direnovasi</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Tahun Dibangun</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Kondisi</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Daya Listrik</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">No. Formulir</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Kode JPB</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Kontruksi</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Atap</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Dinding</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Lantai</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Langit-Langit</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Data Fasilitas Bangunan -->
			<div class="col-md-12">
				<div class="card mb-4">
					<div class="card-header fw-600">Fasilitas Bangunan</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md">
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Jumlah AC</div>
									<div class="xc-lg-2 xc-xl-4 pt-1">AC Split</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
									<div class="xc-lg-2 xc-xl-4 pt-1">AC Window</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Luas Kolam Renang (M2)</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Finishing Kolam</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Jumlah Lapangan Tenis</div>
									<div class="xc-lg mb-2">
										<table>
											<thead>
												<tr class="text-center">
													<th>+ Lampu</th>
													<th></th>
													<th>- Lampu</th>
												</tr>
											</thead>
											<tbody class="text-center">
												<tr>
													<td><input type="text" class="form-control"></td>
													<td>Beton</td>
													<td><input type="text" class="form-control"></td>
												</tr>
												<tr>
													<td><input type="text" class="form-control"></td>
													<td>Aspal</td>
													<td><input type="text" class="form-control"></td>
												</tr>
												<tr>
													<td><input type="text" class="form-control"></td>
													<td>Tanah Liat / Rumput</td>
													<td><input type="text" class="form-control"></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Panjang Pagar (M)</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Bahan Pagar</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Jumlah PBAX</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">AC Central</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">Luas Perkerasan Halaman (M2)</div>
									<div class="xc-lg mb-2">
										<table class="">
											<tbody>
												<tr class="">
													<td><input type="text" class="form-control" disabled></td>
													<td>Ringan</td>
													<td><input type="text" class="form-control" disabled></td>
													<td>Berat</td>
												</tr>
												<tr class="">
													<td><input type="text" class="form-control" disabled></td>
													<td>Sedang</td>
													<td><input type="text" class="form-control" disabled></td>
													<td>Dengan Penutup Lantai</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-1 xc-xl-4 pt-1">
										<table>
											<tbody>
												<tr>
													<td>&nbsp;</td>
												</tr>
												<tr>
													<td>Penumpang</td>
												</tr>
												<tr>
													<td>Kapsul</td>
												</tr>
												<tr>
													<td>Barang</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="xc-lg mb-2">
										<table class="">
											<thead>
												<tr class="text-center">
													<th>Jumlah Lift</th>
													<th></th>
													<th>Jumlah Tangga Berjalan</th>
												</tr>
											</thead>
											<tbody class="text-center">
												<tr class="">

													<td><input type="text" class="form-control" disabled></td>
													<td>Lbr <= 0,80 M</td>
													<td><input type="text" class="form-control" disabled></td>
												</tr>
												<tr class="">
													<td><input type="text" class="form-control" disabled></td>
													<td>Lbr > 0,80 M</td>
													<td><input type="text" class="form-control" disabled></td>
												</tr>
												<tr class="">
													<td><input type="text" class="form-control" disabled></td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="row">
										<div class="xc-lg-1 xc-xl-4 pt-1">Pemadam Kebakaran</div>
										<div class="xc-lg mb-2">
											<table class="">
												<tbody class="text-center">
													<tr class="">
														<td>Hydrant</td>
														<td><input type="text" class="form-control" disabled></td>
														<td>Sprinkler</td>
														<td><input type="text" class="form-control" disabled></td>
													</tr>
													<tr class="">
														<td>F. Alarm</td>
														<td><input type="text" class="form-control" disabled></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="xc-lg-1 xc-xl-4 pt-1">Kedalaman Sumur Artesis (M)</div>
										<div class="xc-lg mb-2">
											<input class="form-control" disabled />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="tab-pane" id="identitas-pendata" role="tabpanel" aria-labelledby="identitas-pendata-tab">
		<div class="row my-4">
			<!-- Data Nilai Bangunan -->
			<div class="col-md-12">
				<div class="card mb-4">
					<div class="card-header fw-600">Nilai Bangunan</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Nilai Sistem</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 xc-xl-4 pt-1">Nilai Bangunan</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Identitas Pendata -->
			<div class="col-md-12">
				<div class="card mb-4">
					<div class="card-header fw-600">Identitas Pendata</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 pt-1">Tanggal Pendataan</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 pt-1">NIP Pendata</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>

							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 pt-1">Tanggal Pemeriksaan</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 pt-1">NIP Pemeriksa</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>

							<div class="col-md">
								<div class="row">
									<div class="xc-lg-5 pt-1">Tanggal Perekaman</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
								<div class="row">
									<div class="xc-lg-5 pt-1">NIP Perekam</div>
									<div class="xc-lg mb-2">
										<input class="form-control" disabled />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>