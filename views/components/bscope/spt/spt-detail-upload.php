<div v-if="!rekening_objek" class="p-3 text-center">
	<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
</div>
<div v-else>
	<div class="row g-1 mb-3">
		<div class="col-md-3 col-lg-1 pt-1">Lampiran</div>
		<div class="col-md-10 col-xl-8 col-xxl-6 mb-1 pt-1">
			<a :href="'/resources/pdf/' + data.lampiran.replace('.', '___')" target="_blank">Lihat / Download Lampiran SPT</a>
		</div>
	</div>
</div>
