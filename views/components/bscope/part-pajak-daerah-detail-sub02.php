<div class="row align-items-center g-1 p-2 mb-1">
  <div class="col-12">Detail Objek Pajak Resto</div>
  <div class="col-12">
    <table class="table table-bordered custom">
      <thead class="thead">
        <tr>
          <th scope="col" class="text-center" style="width: 5%">No</th>
          <th scope="col" class="text-center">Jumlah Meja</th>
          <th scope="col" class="text-center">Jumlah Kursi</th>
          <th scope="col" class="text-center">Tarif Minuman</th>
          <th scope="col" class="text-center">Tarif Makanan</th>
          <th scope="col" class="text-center">Jumlah Pengunjung</th>
        </tr>
      <tbody>
        <tr v-for="i in 1" :key="i">
          <td v-for="j in 6" :key="j">&nbsp;</td>
        </tr>
      </tbody>
      </thead>
    </table>
  </div>
</div>
