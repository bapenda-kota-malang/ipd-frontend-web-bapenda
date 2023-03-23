<div class="row align-items-center g-1 p-2 mb-1">
  <div class="col-12" style="font-weight: 600">Detail Objek Pajak Reklame</div>
  <div class="col-12 p-2">
    <div class="row align-items-center g-1 mb-2">
      <div class="col-2">Judul Reklame</div>
      <div class="col-10">
        <input v-model="data.judulReklame" type="text" class="form-control">
      </div>
    </div>
    <div class="row align-items-center g-1 mb-2">
      <div class="col-2">Produk Reklame</div>
      <div class="col-10">
        <input v-model="data.produkReklame" type="text" class="form-control">
      </div>
    </div>
    <div class="row align-items-center g-2 mb-2">
      <div class="col-2">Nama Penyewa</div>
      <div class="col-3">
        <input v-model="data.namaPenyewa" type="text" class="form-control">
      </div>
      <div class="col-2"></div>
      <div class="col-2 text-end">Alamat Penyewa</div>
      <div class="col-3">
        <input v-model="data.alamatPenyewa" type="text" class="form-control">
      </div>
    </div>
    <div class="row align-items-center g-2 mb-4">
      <div class="col-2">Masa Pajak</div>
      <div class="col-2">
        <input v-model="data.masaPajak" type="text" class="form-control">
      </div>
      <div class="col-1 text-end">Jml Tahun</div>
      <div class="col-1">
        <input v-model="data.jumlahTahun" type="text" class="form-control">
      </div>
      <div class="col-1 text-end">Jml Bulan</div>
      <div class="col-1">
        <input v-model="data.jumlahBulan" type="text" class="form-control">
      </div>
      <div class="col-1 text-end">Jml Minggu</div>
      <div class="col-1">
        <input v-model="data.jumlahMinggu" type="text" class="form-control">
      </div>
      <div class="col-1 text-end">Jml Hari</div>
      <div class="col-1">
        <input v-model="data.jumlahHari" type="text" class="form-control">
      </div>
    </div>
    <div class="row align-items-center g-2 mb-2">
      <div class="col-1" style="font-weight: 600">Jenis Reklame</div>
      <div class="col-1" style="font-weight: 600">Lokasi</div>
      <div class="col-1" style="font-weight: 600">No. Persil</div>
      <div class="col-1" style="font-weight: 600">Jml. Reklame</div>
      <div class="col-1" style="font-weight: 600">Jml. Sisi</div>
      <div class="col-1" style="font-weight: 600">Pjg.</div>
      <div class="col-1" style="font-weight: 600">Lbr.</div>
      <div class="col-1" style="font-weight: 600">Diameter</div>
      <div class="col-1" style="font-weight: 600">Luas</div>
      <div class="col-1" style="font-weight: 600">Pengurang</div>
      <div class="col-1" style="font-weight: 600">Tarif Pajak</div>
      <div class="col-1" style="font-weight: 600">Jml. Pajak</div>
    </div>
    <div class="row align-items-center g-2 mb-2">
      <div class="col-1">
        <input v-model="data.jenisReklame" type="text" class="form-control">
      </div>
      <div class="col-1">
        <input v-model="data.lokasi" type="text" class="form-control">
      </div>
      <div class="col-1">
        <input v-model="data.noPersil" type="text" class="form-control">
      </div>
      <div class="col-1">
        <input v-model="data.jumlahReklame" type="text" class="form-control">
      </div>
      <div class="col-1">
        <input v-model="data.jumlahSisi" type="text" class="form-control">
      </div>
      <div class="col-1">
        <input v-model="data.panjang" type="text" class="form-control">
      </div>
      <div class="col-1">
        <input v-model="data.lebar" type="text" class="form-control">
      </div>
      <div class="col-1">
        <input v-model="data.diameter" type="text" class="form-control">
      </div>
      <div class="col-1">
        <input v-model="data.luas" type="text" class="form-control">
      </div>
      <div class="col-1">
        <select v-model="data.pengurang" class="form-select"></select>
      </div>
      <div class="col-1">
        <input v-model="data.tarifPajak" type="text" class="form-control">
      </div>
      <div class="col-1">
        <input v-model="data.jumlahPajak" type="text" class="form-control">
      </div>
    </div>
  </div>
</div>
