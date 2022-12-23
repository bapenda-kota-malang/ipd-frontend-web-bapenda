<div class="card mb-4">
	<div class="card-header fw-600">Formulir</div>
	<div class="card-body">
		<div class="row g-0">
			<div class="col-lg">
				<div class="row g-1">
					<div class="col-md-2 col-lg-3 pt-1">NOP</div>
					<div class="col mb-2"><?php include Yii::getAlias('@vwCompPath/bscope/nop-input.php'); ?></div>
				</div>
			</div>
			<div class="col-lg">
				<div class="row g-1">
					<div class="col-md-2 col-lg-3 pt-1 pe-lg-2 text-lg-end">Nomor Formulir</div>
					<div class="col-md-6 col-xl-4 mb-2">
						<div class="row g-1">
							<div class="col-3">
								<input class="form-control" />
							</div>
							<div class="col-3">
								<input class="form-control" />
							</div>
							<div class="col-2">
								<input class="form-control" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">Rincian Data Bangunan</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1">No. Bangunan</div>
					<div class="xc-md mb-2">
						<input class="form-control" />
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1">Jenis Bangunan</div>
					<div class="xc-md mb-2">
						<select class="form-select">
							<option value="">...</option>
						</select>
					</div>
				</div>
				<div class="row g-1">
					<div class="col">
						<div class="row g-1">
							<div class="xc-md-12 xc-xl-10 pt-1">Luas Bangunan</div>
							<div class="xc-md mb-2">
								<input class="form-control" />
							</div>
						</div>
					</div>
					<div class="col">
						<div class="row g-1">
							<div class="xc-md-12 xc-xl-10 pt-1 pe-2 text-end">Jml Lantai</div>
							<div class="xc-md mb-2">
								<input class="form-control" />
							</div>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="col">
						<div class="row g-1">
							<div class="xc-md-12 xc-xl-10 pt-1">Thn Dibangun</div>
							<div class="xc-md mb-2">
								<input class="form-control" />
							</div>
						</div>
					</div>
					<div class="col">
						<div class="row g-1">
							<div class="xc-md-12 xc-xl-10 pt-1 pe-2 text-end">Thn Renovasi</div>
							<div class="xc-md mb-2">
								<input class="form-control" />
							</div>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1">Kondisi Bangunan</div>
					<div class="xc-md mb-2">
						<div class="d-flex">
							<select class="form-select">
								<option value="">...</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1 pe-lg-2 text-lg-end">Konstruksi</div>
					<div class="xc-md mb-2">
						<select class="form-select">
							<option value="">...</option>
						</select>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1 pe-lg-2 text-lg-end">Atap</div>
					<div class="xc-md mb-2">
						<select class="form-select">
							<option value="">...</option>
						</select>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1 pe-lg-2 text-lg-end">Dinding</div>
					<div class="xc-md mb-2">
						<select class="form-select">
							<option value="">...</option>
						</select>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1 pe-lg-2 text-lg-end">Lantai</div>
					<div class="xc-md mb-2">
						<select class="form-select">
							<option value="">...</option>
						</select>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1 pe-lg-2 text-lg-end">Langit-langit</div>
					<div class="xc-md mb-2">
						<select class="form-select">
							<option value="">...</option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card mb-4">
	<div class="card-header fw-600">Fasilitas</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1">Daya Listrik</div>
					<div class="xc-md-7 xc-lg-6 xc-xl-5 mb-2">
						<div class="input-group">
							<input class="form-control">
							<span class="input-group-text">watt</span>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1">Jumlah AC</div>
					<div class="xc-md-7 xc-lg-6 xc-xl-5 mb-2">
						<div class="input-group">
							<input class="form-control">
							<span class="input-group-text">Split</span>
						</div>
					</div>
					<div class="xc-md-7 xc-lg-6 xc-xl-5 mb-2">
						<div class="input-group">
							<input class="form-control">
							<span class="input-group-text">Window</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1 pe-lg-2 text-lg-end">AC Sentral</div>
					<div class="xc-md-7 xc-lg-6 xc-xl-5 mb-2">
						<select class="form-select">
							<option value="">Tidk Ada</option>
							<option value="">Ada</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row g-1">
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1">Luas Kolam Renang</div>
					<div class="xc-md-7 xc-lg-6 xc-xl-5 mb-2">
						<div class="input-group">
							<input class="form-control">
							<span class="input-group-text">m²</span>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1">Finishing Kolam</div>
					<div class="xc-md xc-lg-12 xc-xl-11 mb-2">
						<select class="form-select">
							<option value="">Tidk Ada</option>
							<option value="">Ada</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1 pe-2 text-lg-end">Luas Perkerasan</div>
					<div class="xc-md mb-2">
						<div class="row g-1">
							<div class="xc-lg mb-2">
								<div class="input-group">
									<input class="form-control">
									<span class="input-group-text w-50">Ringan</span>
								</div>
							</div>
							<div class="xc-lg mb-2">
								<div class="input-group">
									<input class="form-control">
									<span class="input-group-text w-50">Sedang</span>
								</div>
							</div>
						</div>
						<div class="row g-1">
							<div class="xc-lg mb-2">
								<div class="input-group">
									<input class="form-control">
									<span class="input-group-text w-50">Berat</span>
								</div>
							</div>
							<div class="xc-lg mb-2">
								<div class="input-group">
									<input class="form-control">
									<span class="input-group-text">Penutup Lantai</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row g-1">
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1 border-right">Jml Lapangan Tenis</div>
					<div class="xc-md mb-2 pe-3">
						<table class="table fit-form-control">
							<thead>
								<tr>
									<td class="text-center p-1" style="width:40%; background-color:#e9ecef">Jenis</td>
									<td class="text-center p-1" style="width:30%; background-color:#e9ecef">+Lampu</td>
									<td class="text-center p-1x" style="width:30%; background-color:#e9ecef">-Lampu</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Beton</td>
									<td><input class="form-control"></td>
									<td><input class="form-control"></td>
								</tr>
								<tr>
									<td>Aspal</td>
									<td><input class="form-control"></td>
									<td><input class="form-control"></td>
								</tr>
								<tr>
									<td>Tanah Liat / Rumput</td>
									<td><input class="form-control"></td>
									<td><input class="form-control"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="col">
						<div class="row g-1">
							<div class="xc-md-12 xc-xl-10 pe-2 text-lg-end">
								Elevator<br />
								(Lift)
							</div>
							<div class="xc">
								<div class="input-group">
									<input class="form-control">
									<span class="input-group-text w-50">Ringan</span>
								</div>
								<div class="input-group">
									<input class="form-control">
									<span class="input-group-text w-50">Ringan</span>
								</div>
								<div class="input-group">
									<input class="form-control">
									<span class="input-group-text w-50">Ringan</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
					<div class="row g-1">
							<div class="xc-md-9 xc-xl-8 pe-2 text-lg-end">
								Eskalator<br />
								(Tangga Berjalan)
							</div>
							<div class="xc">
								<div class="input-group">
									<input class="form-control">
									<span class="input-group-text w-50">lbr<=0,0m</span>
								</div>
								<div class="input-group">
									<input class="form-control">
									<span class="input-group-text w-50">lbr>0,8m</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row g-1">
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1">Panjang Pagar</div>
					<div class="xc-md-7 xc-xl-6 xc-xxl-5 mb-2">
						<div class="input-group">
							<input class="form-control">
							<span class="input-group-text w-50">m</span>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1">Bahan</div>
					<div class="xc-md mb-2">
						<select class="form-select">
							<option value="">...</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1 pe-lg-2 text-md-end">Pemadam Kebakaran</div>
					<div class="xc-md mb-2">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" v-model="entryData.wajibPajakOpt" id="hydrant" value="qq">
							<label class="form-check-label" for="hydrant">Tidak ada hyrant</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" v-model="entryData.wajibPajakOpt" id="sprinkler" value="qq">
							<label class="form-check-label" for="sprinkler">Tidak ada sprinkler</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" v-model="entryData.wajibPajakOpt" id="fireAlarm" value="qq">
							<label class="form-check-label" for="fireAlarm">Tidak ada fire alarm</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row g-1">
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1">Jumlah PABX</div>
					<div class="xc-md-7 xc-xl-6 mb-2">
						<input class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-7 xc-xl-6 pt-1 pe-lg-2 text-md-end">Kedalaman Sumur Artesis</div>
					<div class="xc-md-7 xc-xl-6 mb-2">
						<div class="input-group">
							<input class="form-control">
							<span class="input-group-text w-50">m</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
