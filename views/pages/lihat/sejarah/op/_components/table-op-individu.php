<table class="table table-bordered custom">
  <thead class="thead">
    <tr>
      <th scope="col" class="text-center">No</th>
      <th scope="col" class="text-center">No. Bangunan</th>
      <th scope="col" class="text-center">Formulir LSOP</th>
      <th scope="col" class="text-center">Nilai Individu</th>
      <th scope="col" class="text-center">Tanggal Penilai</th>
      <th scope="col" class="text-center">Tanggal Rekam</th>
      <th scope="col" class="text-center">Nama Perekam</th>
    </tr>
  <tbody>
    <tr v-for="i in 10" :key="i">
      <td v-for="j in 7" :key="j">&nbsp;</td>
    </tr>
  </tbody>
  </thead>
</table>
