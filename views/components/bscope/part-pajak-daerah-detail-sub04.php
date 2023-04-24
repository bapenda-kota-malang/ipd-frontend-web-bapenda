<div class="row align-items-center g-1 p-2 mb-1">
  <div class="col-12" style="font-weight: 600">Detail Objek Pajak Parkir</div>
  <div class="col-12">
    <table class="table table-bordered custom">
      <thead class="thead" style="background: #B9B9B9">
        <tr>
          <th scope="col" class="text-center" style="width: 5%">No</th>
          <th scope="col" class="text-center">Jenis Kendaraan</th>
          <th scope="col" class="text-center">Kapasitas</th>
          <th scope="col" class="text-center">Tarif</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="i in 1" :key="i">
          <td v-for="j in 4" :key="j">&nbsp;</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
