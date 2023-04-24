<table class="table table-bordered custom">
  <thead class="thead">
    <tr>
      <th scope="col" class="text-center">No</th>
      <th scope="col" class="text-center">NOP</th>
      <th scope="col" class="text-center">Luas Bumi Beban</th>
      <th scope="col" class="text-center">Luas Bangunan Beban</th>
      <th scope="col" class="text-center">Nilai Bumi Beban</th>
      <th scope="col" class="text-center">Nilai Bangunan Beban</th>
    </tr>
  <tbody>
    <tr v-for="i in 10" :key="i">
      <td v-for="j in 6" :key="j">&nbsp;</td>
    </tr>
  </tbody>
  </thead>
</table>
