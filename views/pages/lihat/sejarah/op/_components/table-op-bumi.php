<table class="table table-bordered custom">
  <thead class="thead">
    <tr>
      <th scope="col" class="text-center">No</th>
      <th scope="col" class="text-center">Luas Bumi</th>
      <th scope="col" class="text-center">Nilai Bumi</th>
      <th scope="col" class="text-center">Kode ZNT</th>
      <th scope="col" class="text-center">Jenis Penggunaan Tanah</th>
    </tr>
  <tbody>
    <tr v-for="i in 10" :key="i">
      <td v-for="j in 5" :key="j">&nbsp;</td>
    </tr>
  </tbody>
  </thead>
</table>
