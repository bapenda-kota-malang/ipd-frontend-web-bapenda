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
            <?php if (isset($showAdd)) { ?>
                <div class="ms-3">
                    <div class="btn-group">
                        <button data-bs-toggle="dropdown" class="btn bg-blue">
                            <i class="bi bi-plus"></i> Tambah
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="koefisian-reklame/tambah?type=tetap">Masa Pajak Tetap 1 Tahun</a></li>
                            <li><a class="dropdown-item" href="koefisian-reklame/tambah">Masa Pajak Insidentil 1 Tahun</a></li>
                            <li><a class="dropdown-item" href="koefisian-reklame/tambah">Masa Pajak Insidentil 1 Bulan</a></li>
                            <li><a class="dropdown-item" href="koefisian-reklame/tambah">Masa Pajak Insidentil 1 Kali Penyelenggaraan</a></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
            <?php if (isset($titleNav)) echo $titleNav ?>
        </div>
    </div>
</div>
<hr />