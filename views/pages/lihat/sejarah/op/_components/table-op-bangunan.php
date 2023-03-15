<table class="table table-bordered custom">
  <thead class="thead">
    <tr>
      <th scope="col" class="text-center">No</th>
      <th scope="col" class="text-center">JPB</th>
      <th scope="col" class="text-center">Luas Bangunan</th>
      <th scope="col" class="text-center">Nilai Bangunan</th>
      <th scope="col" class="text-center">Tanggal Rekam</th>
      <th scope="col" class="text-center">Nama Perekam</th>
    </tr>
  <tbody>
    <tr v-for="i in 10" :key="i">
      <td v-for="j in 6" :key="j">&nbsp;</td>
    </tr>
  </tbody>
  </thead>
</table>
