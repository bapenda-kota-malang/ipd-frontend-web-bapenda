<div id="npwpdSearch" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>Pilih NPWPD</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
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
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
