<div class="card mb-3">
  <div class="card-header">Wajib Pajak / Objek Pajak</div>
  <div class="p-3">
    <div class="row g-1">
      <div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">
        NPWPD
      </div>
      <div class="col-md-4 col-lg-3 col-xl-2 mb-2">
        <input v-model="data.npwpd.npwpd" class="form-control" />
      </div>
      <div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1 text-md-end pe-md-2">
        Tanggal
      </div>
      <div class="xc-md-4 xc-xl-3 mb-2">
        <input :value="data.npwpd.tanggalNpwpd" class="form-control" />
      </div>
    </div>
    <div class="row g-1">
      <div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">
        Jenis Pajak
      </div>
      <div class="xc-4 xc-lg-2 xc-xl-2 mb-2">
        <input v-model="data.rekening.kode" class="form-control" />
      </div>
      <div class="col col-lg-8 col-xl-7 mb-2">
        <input v-model="data.rekening.jenisUsaha" class="form-control" disabled />
      </div>
    </div>
    <div class="row g-1">
      <div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">
        Nama
      </div>
      <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4 mb-2">
        <input v-model="data.objekPajak.nama" class="form-control" />
      </div>
    </div>
    <div class="row g-1">
      <div class="xc-17 xc-md-4 xc-lg-3 xc-xl-2 pt-2 pt-md-1">
        Alamat
      </div>
      <div class="xc-3 pt-2 d-md-none">
        RT/RW
      </div>
      <div class="xc xc-lg-10 mb-2">
        <input v-model="data.objekPajak.alamat" class="form-control" />
      </div>
      <div class="xc-md-2 xc-xl-2 pt-1 d-none d-md-inline-block pe-2 text-end">
        RT/RW
      </div>
      <div class="xc-3 xc-lg-2 xc-xl-2 mb-2">
        <input v-model="data.objekPajak.rtRw" class="form-control" />
      </div>
    </div>
    <div class="row g-1">
      <div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">
        Kelurahan
      </div>
      <div class="xc-md-6 col-lg-7 col-xl-6">
        <input v-model="data.objekPajak.kelurahan.nama" class="form-control" />
      </div>
    </div>
  </div>
</div>

<div class="card mb-3">
  <div class="card-header">Estimasi Perhitungan</div>
  <div class="p-3">
    <!-- <div v-if="!rekening_objek" class="p-3 text-center">
			<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
		</div>
		<div v-else> -->
    <div class="row g-1">
      <div class="xc-md-4 xc-lg-2 pt-1">Nomor SPT</div>
      <div class="xc-md-6 xc-lg-4 mb-2"><input value="otomatis" class="form-control" /></div>
      <div class="xc-md-4 xc-lg-3 pt-1 text-md-end pe-md-2">Billing</div>
      <div class="xc-md-6 xc-lg-4 mb-2"><input value="otomatis" class="form-control" /></div>
      <div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-2">Virtual Account</div>
      <div class="xc-md-6 xc-lg-4 xc-lg-3 mb-3"><input value="otomatis" class="form-control" /></div>
    </div>
    <div class="row g-1">
      <div class="xc-md-4 xc-lg-2 pt-1">Periode Awal</div>
      <div class="xc-md-6 xc-lg-4 mb-2"><input v-model="data.periodeAwal" class="form-control" /></div>
      <div class="xc-md-4 xc-lg-3 pt-1 text-md-end pe-2">Periode Awal</div>
      <div class="xc-md-6 xc-lg-4 mb-2"><input v-model="data.periodeAkhir" class="form-control" /></div>
      <div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-2">Jatuh Tempo</div>
      <div class="xc-md-6 xc-lg-4 xc-lg-3 mb-3"><input v-model="data.jatuhTempo" class="form-control" /></div>
    </div>
    <div class="row g-1">
      <div class="xc-md-4 xc-lg-2 pt-1">Subtotal E-Tax</div>
      <div class="xc-md-6 xc-lg-4 mb-2"><input class="form-control" /></div>
      <div class="xc-md-4 xc-lg-3 pt-1 text-md-end pe-2">E-Tax</div>
      <div class="xc-md-6 xc-lg-4 mb-2"><input class="form-control" /></div>
      <div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-2">Total E-Tax</div>
      <div class="xc-md-6 xc-lg-4 xc-lg-3 mb-3"><input class="form-control" /></div>
    </div>
    <div class="row g-1">
      <div class="xc-md-4 xc-lg-2 pt-1">Potensi</div>
      <div class="xc-md-6 xc-lg-4 mb-2"><input v-model="data.omset" class="form-control" /></div>
      <div class="xc-md-4 xc-lg-3 pt-1 text-md-end pe-2">Tarif Pajak (%)</div>
      <div class="xc-md-6 xc-lg-4 mb-2"><input v-model="data.tarifPajak.tarifPersen" class="form-control" /></div>
      <div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-2">Jumlah</div>
      <div class="xc-md-6 xc-lg-4 xc-lg-3 mb-3"><input v-model="data.jumlahPajak" class="form-control" /></div>
    </div>
    <div class="row g-1 mt-2">
      <div class="xc-md-4 xc-lg-2 pt-1">Keterangan</div>
      <div class="xc-md xc-lg-14 xc-lg-12 xc-lg-10 mb-2">
        <textarea class="form-control"></textarea>
      </div>
    </div>
    <!-- </div> -->
  </div>
</div>