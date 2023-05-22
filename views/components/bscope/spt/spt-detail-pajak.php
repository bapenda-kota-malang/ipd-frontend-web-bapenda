<div v-if="!rekening_objek" class="p-3 text-center" :class="{ 'd-none': !mountedStatus }">
	<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
</div>
<template v-else>
	<?php include Yii::getAlias('@vwCompPath/bscope/spt/spt-detail-'.$objekPajak.'.php'); ?>
</template>
