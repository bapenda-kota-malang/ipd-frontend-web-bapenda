<div id="npwpdSearch" class="modal fade mb-3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>Pilih NPWPD</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="d-flex">
					<div class="pt-1 pe-5">Cari NPWPD</div>
					<div class="w-50">
						<div class="input-group">
							<input v-model="searchKeywords" v-on:keyup="preSearch" class="form-control" />
							<span @click="searchAlt" class="input-group-text px-4 pointer" id="basic-addon2"><i class="bi bi-search"></i></span>
						</div>
					</div>
				</div>
				<hr />
				<table class="table">
					<thead>
						<tr>
							<th>NPWPD</th>
							<th>Nama</th>
							<th>Jenis Usaha</th>
							<th style="width:100px"></th>
						</tr>
					</thead>
					<tbody>
						<tr v-if="npwpdList.length==0">
							<td colspan="3" class="text-center">Data masih kosong</td>
						</tr>
						<tr v-for="item in npwpdList">
							<td>{{item.npwpd}}</td>
							<td>{{item.objekPajak.nama}}</td>
							<td>{{item.rekening.jenisUsaha + ' - ' + item.rekening.nama }}</td>
							<td class="text-end">
								<button @click="pilihNpwpd(item.npwpd)" class="btn bg-blue">Pilih</button>
							</td>
						</tr>
					</tbody>
				</table>
				<?php include Yii::getAlias('@vwCompPath/pagination/pagination.php'); ?>
			</div>
		</div>
	</div>
</div>

