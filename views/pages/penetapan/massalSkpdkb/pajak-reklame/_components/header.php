<div class="d-flex">
    <div class="me-auto">
        <h5 class="my-2">
            <i class="bi bi-person"></i> <strong><?= isset($action) ? $action : '' ?></strong>
            <?= isset($scope) ? $scope : '' ?>
        </h5>
    </div>
    <div>
        <div class="d-flex">
            <div class="ms-auto">
                <input v-model="searchKeywords" @change="search" class="form-control" placeholder="Cari..." style="width:400px" />
                <!-- v-model="urls.dataSrcParams.searchKeywords" -->
            </div>
            <?php if (isset($showFilter)) { ?>
                <div class="ms-2">
                    <button @click="showFilter" class="btn bg-info">
                        <i class="bi bi-sliders"></i> Filter
                    </button>
                </div>
            <?php } ?>
            <div class="ms-3">
                <a href="#!" class="btn bg-blue rounded-pill " @click="doSalin">
                    Salin dan Tetapkan
                </a>
            </div>
        </div>
    </div>
</div>
<hr />