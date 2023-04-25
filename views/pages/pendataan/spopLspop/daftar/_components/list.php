<?php

use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

// $this->registerJsFile('/vendors/lodash/debounce.min.js', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://cdn.jsdelivr.net/npm/lodash@4.17.21/debounce.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/spop/list.js?v=20221108a');

?>
<table class="table">
	<thead>
		<tr>
			<th>NOP</th>
			<th>Nama OP/WP</th>
			<th>Lokasi</th>
			<th>Nama Pemilik</th>
		</tr>
	</thead>
	<tbody>
		<tr v-for="item in data" @click="goTo(urls.pathname + '/' + item.objekPajakPbb[0].id, $event)" class="pointer">
			<td>
				<template v-if="item.objekPajakPbb.length>0">{{item.objekPajakPbb[0].nop}}</template>
			</td>
			<td>
				<template v-if="item.objekPajakPbb.length>0">{{item.objekPajakPbb[0].nama}}</template>
			</td>
			<td>
				<template v-if="item.objekPajakPbb.length>0">{{item.objekPajakPbb[0].jalan}}</template>
			</td>
			<td>{{item.nama}}</td>
		</tr>
	</tbody>
</table>