<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

?>

<table class="table custom">
	<thead>
		<tr>
			<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>Title</th>
			<th style="width:90px"></th>
		</tr>
	<tbody>
		<tr v-for="item in 5">
			<td><input type="checkbox" /></td>
			<td>lorem</td>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Aksi
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Detail</a></li>
						<li><a class="dropdown-item" href="#">Edit</a></li>
						<li><a class="dropdown-item" href="#">Hapus</a></li>
					</ul>
				</div>
			</td>
		</tr>
	</tbody>
	</thead>
</table>