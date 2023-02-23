<div class="card mb-3">
	<div class="card-body">
		<div class="row mb-2">
			<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">
				No Pelayanan
			</div>
			<div class="xc-md-6 xc-lg-5 xc-xl-4">
				<div class="row g-1">
					<div class="col-4"><input class="form-control" /></div>
					<div class="col-4"><input class="form-control" /></div>
					<div class="col-3"><input class="form-control" /></div>
				</div>
			</div>
		</div>
		<div class="row mb-2">
			<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">
				Jenis Pelayanan
			</div>
			<div class="xc-md-14 xc-lg-12 xc-xl-10">
				<select class="form-control">
					<option value="">...</option>
				</select>
			</div>
		</div>
		<div class="row mb-2">
			<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">
				Jenis Pengurangan
			</div>
			<div class="xc-md-14 xc-lg-12 xc-xl-10">
				<select class="form-control">
					<option value="">...</option>
				</select>
			</div>
		</div>
	</div>
</div>

<div class="card mb-3">
	<div class="card-body">
		<div class="row mb-2">
			<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">
				SK Pengurangan Atas
			</div>
			<div class="xc-md pt-1">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
					<label class="form-check-label" for="inlineRadio1">SPPT</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
					<label class="form-check-label" for="inlineRadio2">SKP SPOP</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
					<label class="form-check-label" for="inlineRadio3">SKP Kurang Byar</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
					<label class="form-check-label" for="inlineRadio3">Denda Administrasi</label>
				</div>
			</div>
		</div>
		<div class="row mb-2">
			<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">
				Nomor SK
			</div>
			<div class="xc-md-8 xc-lg-7 xc-xl-6">
				<div class="row g-1">
					<div class="col-3"><input class="form-control" /></div>
					<div class="col-9"><input class="form-control" /></div>
				</div>
			</div>
			<div class="xc-md-5 xc-lg-3 xc-xl-2 pt-1 text-lg-end">
				Tanggal
			</div>
			<div class="xc-md-5 xc-lg-4 xc-xl-3">
				<input class="form-control">
			</div>
		</div>
		<div class="row mb-2">
			<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">
				Nomor UHP
			</div>
			<div class="xc-md-8 xc-lg-7 xc-xl-6">
				<div class="row g-1">
					<div class="col-3"><input class="form-control" /></div>
					<div class="col-9"><input class="form-control" /></div>
				</div>
			</div>
			<div class="xc-md-5 xc-lg-3 xc-xl-2 pt-1 text-lg-end">
				Tanggal
			</div>
			<div class="xc-md-5 xc-lg-4 xc-xl-3">
				<input class="form-control">
			</div>
		</div>
	</div>
</div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<button class="nav-link active" id="permanen-tab" data-bs-toggle="tab" data-bs-target="#permanen-tab-pane" type="button" role="tab" aria-controls="permanen-tab-pane" aria-selected="true">Permanen</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="pst-tab" data-bs-toggle="tab" data-bs-target="#pst-tab-pane" type="button" role="tab" aria-controls="pst-tab-pane" aria-selected="false">PST/Sebelum SPPT</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="jpb-tab" data-bs-toggle="tab" data-bs-target="#jpb-tab-pane" type="button" role="tab" aria-controls="jpb-tab-pane" aria-selected="false">Pengenaan JPB</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="administrasi-tab" data-bs-toggle="tab" data-bs-target="#administrasi-tab-pane" type="button" role="tab" aria-controls="administrasi-tab-pane" aria-selected="false">Denda Administrasi</button>
	</li>
</ul>
<div class="tab-content border border-top-0 p-3" id="myTabContent">
	<div class="tab-pane fade show active" id="permanen-tab-pane" role="tabpanel" aria-labelledby="permanen-tab" tabindex="0">
		<table class="table">
			<thead>
				<tr>
					<th class="bg-blue text-center" rowspan="2">NOP</th>
					<th class="bg-blue text-center" rowspan="2">Tahun Pengurangan</th>
					<th class="bg-blue text-center" rowspan="2">Status Permohonan</th>
					<th class="bg-blue text-center" colspan="2">% Pengurangan</th>
				</tr>
				<tr>
					<th class="bg-blue text-center">Pengajuan</th>
					<th class="bg-blue text-center">Disetujui</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
	<div class="tab-pane fade" id="pst-tab-pane" role="tabpanel" aria-labelledby="pst-tab" tabindex="0">
		<table class="table">
			<thead>
				<tr>
					<th class="bg-blue text-center" rowspan="2">NOP</th>
					<th class="bg-blue text-center" rowspan="2">Tahun</th>
					<th class="bg-blue text-center" rowspan="2">Status Permohonan</th>
					<th class="bg-blue text-center" colspan="2">% Pengurangan</th>
				</tr>
				<tr>
					<th class="bg-blue text-center">Pengajuan</th>
					<th class="bg-blue text-center">Disetujui</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
	<div class="tab-pane fade" id="jpb-tab-pane" role="tabpanel" aria-labelledby="jpb-tab" tabindex="0">
		<div class="row">
			<div class="xc-md-5 xc-lg-4 xc-xl-3">NOP</div>
			<div class="col-md mb-2"><input class="form-control"></div>
		</div>
		<div class="row">
			<div class="xc-md-5 xc-lg-4 xc-xl-3">Tahun Pengurangan</div>
			<div class="col-md mb-2"><input class="form-control"></div>
		</div>
		<div class="row">
			<div class="xc-md-5 xc-lg-4 xc-xl-3">% Pengurangan</div>
			<div class="col-md mb-2"><input class="form-control"></div>
		</div>
	</div>
	<div class="tab-pane fade" id="administrasi-tab-pane" role="tabpanel" aria-labelledby="administrasi-tab" tabindex="0">
		<table class="table">
			<thead>
				<tr>
					<th class="bg-blue text-center">NOP</th>
					<th class="bg-blue text-center">Tahun</th>
					<th class="bg-blue text-center">Pokok Pajak</th>
					<th class="bg-blue text-center">Denda Adm.</th>
					<th class="bg-blue text-center">% Pengurangan Diajukan</th>
					<th class="bg-blue text-center">Status</th>
					<th class="bg-blue text-center">% Pengurangan Disetujui</th>
					<th class="bg-blue text-center">Denda Setelah Pengurangan</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
</div>