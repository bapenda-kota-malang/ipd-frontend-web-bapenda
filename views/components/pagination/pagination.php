<template v-if="pagination.pages > 1">
	<hr />
	<div class="d-flex justify-content-center">
		<nav aria-label="Selanjutnya">
		<ul class="pagination">
			<li class="page-item">
				<span class="page-link" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</span>
			</li>
			<li v-for="item in pagination.blocks" class="page-item pointer" :class="item == pagination.page ? 'active' : ''">
				<span v-if="item != pagination.page" class="page-link" @click="setPage(item)">{{item}}</span>
				<span v-else class="page-link">{{item}}</span>
			</li>
			<li class="page-item">
				<span class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</span>
			</li>
		</ul>
		</nav>
	</div>
</template>
