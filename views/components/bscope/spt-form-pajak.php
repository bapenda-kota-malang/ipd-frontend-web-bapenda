<div v-if="!rekening_objek" class="p-3 text-center" :class="{ 'd-none': !mountedStatus }">
	<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
</div>
<template v-else>
	<?php include Yii::getAlias('@vwCompPath/bscope/spt-form-'.$objekPajak.'.php'); ?>
	<div v-if="arrayDetailStatus" class="mt-2">
		<button @click="addDetail(data, rekening_objek, rekening_rincian)" class="btn bg-blue">
			Tambah Data
		</button>
	</div>
</template>
