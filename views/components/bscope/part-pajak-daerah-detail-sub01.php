<div class="row align-items-center g-3 my-2">
  <div class="col-12">Detail Objek Pajak Hotel</div>
  <div class="col-12">
    <table class="table table-bordered custom">
      <thead class="thead">
        <tr>
          <th scope="col" class="text-center">No</th>
          <th scope="col" class="text-center">Golongan Kamar</th>
          <th scope="col" class="text-center">Tarif</th>
          <th scope="col" class="text-center">Jumlah Kamar</th>
          <th scope="col" class="text-center">Jumlah Kamar Yang Laku</th>
        </tr>
      <tbody>
        <tr v-for="i in 3" :key="i">
          <td v-for="j in 5" :key="j">&nbsp;</td>
        </tr>
      </tbody>
      </thead>
    </table>
  </div>
</div>
