Vue.component('dbkb-fasum-item', {
	template: `
		<table class="w-100" :class="!noMb ? 'mb-2' : ''">
			<colgroup>
				<col style="width:5%" />
				<col style="width:30%" />
				<col style="width:5%" />
				<col style="width:10%" />
				<col style="width:10%" />
				<col style="width:20%" />
				<col style="width:20%" />
			</colgroup>
			<thead v-if="!hideHeader">
				<tr>
					<td style="width:50px">Kode</td>
					<td>Fasilitas</td>
					<td>Satuan</td>
					<td>Status</td>
					<td>Ketergantungan</td>
					<td>Nilai Lama</td>
					<td>Nilai Baru</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input class="form-control" /></td>
					<td><input class="form-control" /></td>
					<td><input class="form-control" /></td>
					<td><input class="form-control" /></td>
					<td><input class="form-control" /></td>
					<td><input class="form-control" /></td>
					<td><input class="form-control" /></td>
				</tr>
			</tbody>
		</table>`,
	props: {
		hideHeader: Boolean,
		noMb: Boolean,
	},
	created: function(){
		// console.log(hideHeader);
	},
	data:function() {
		return {
			data:{},
		}	
	}
});
