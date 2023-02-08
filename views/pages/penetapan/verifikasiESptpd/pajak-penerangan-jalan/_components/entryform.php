<?php include __DIR__ . '/../../_components/entryform_reg.php' ?>

<?php
$data = [
	['Sosial', '&nbsp;', '&nbsp;', '0%', '&nbsp;'],
	['Rumah Tangga', '&nbsp;', '&nbsp;', '7%', '&nbsp;'],
	['Bisnis', '&nbsp;', '&nbsp;', '5%', '&nbsp;'],
	['Industri', '&nbsp;', '&nbsp;', '3%', '&nbsp;'],
	['Pemerintah', '&nbsp;', '&nbsp;', '0%', '&nbsp;'],
]
?>

<div class="card mb-4">
	<div class="card-header">Data Detail Objek Pajak</div>
	<div class="card-body">
		<?php foreach ($data as $item) { ?>
			<strong class=""> <?= $item[0] ?> </strong>
			<table class="table table-bordered mt-1">
				<thead>
					<tr>
						<th style="width:25%">Jumlah Pelanggan</th>
						<th style="width:25%">Jumlah Rekening</th>
						<th style="width:25%">Tarif</th>
						<th style="width:25%">Jumlah</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td> <?= $item[1] ?> </td>
						<td> <?= $item[2] ?> </td>
						<td> <?= $item[3] ?> </td>
						<td> <?= $item[4] ?> </td>
					</tr>
				</tbody>
			</table>
		<?php } ?>

		<strong class=""> Lain-lain </strong>
		<table class="table table-bordered mt-1">
			<thead>
				<tr>
					<th style="width:25%">Jumlah Pelanggan</th>
					<th style="width:25%">Jumlah Rekening</th>
					<th style="width:50%">Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
				</tr>
			</tbody>
		</table>

		<div>
			<div class="row g-1">
				<div class="xc-md-4 xc-lg-2 pt-1">&nbsp;</div>
				<div class="xc-md-6 xc-lg-4 mb-2">&nbsp;</div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-md-end pe-md-2">&nbsp;</div>
				<div class="xc-md-6 xc-lg-4 mb-2">&nbsp;</div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-2"><strong>Jumlah Pajak</strong></div>
				<div class="xc-md-6 xc-lg-4 xc-lg-3 mb-3"><input value="Rp. " class="form-control" /></div>
			</div>
		</div>
	</div>
</div>

<?php include __DIR__ . '/../../_components/entryform_rwyt.php' ?>
<?php include __DIR__ . '/../../_components/entryform_lamp.php' ?>