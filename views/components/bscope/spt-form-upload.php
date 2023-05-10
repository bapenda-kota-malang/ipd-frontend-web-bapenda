<div v-if="!rekening_objek" class="p-3 text-center">
	<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
</div>
<div v-else>
	<div class="row g-1 mb-3">
		<div class="col-md-3 col-lg-2 pt-1">Lampiran</div>
		<div class="col-md-10 col-xl-8 col-xxl-6 mb-1">
			<input class="form-control" type="file" @change="storeFileToField($event, data.spt, 'lampiran', 'application/pdf')">
			<span class="text-danger" v-if="dataErr['spt.lampiran']">{{dataErr['spt.lampiran']}}</span>
		</div>
	</div>
</div>
