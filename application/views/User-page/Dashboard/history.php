<div class="css-file">
  <?php
    if (isset($css)) {
      echo "<link rel='stylesheet' href='$css' crossorigin='anonymous' />";
    }
  ?>
</div>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-7" style="margin-top: 15px;">

      <div class="Heading">
        HISTORY PEMINJAMAN
      </div>
      <div class="Con-body">
        KELAS PENGGANTI
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Ruangan</th>
              <th>Jam Masuk</th>
              <th>Jumlah Jam</th>
              <th>Mata Kuliah</th>
              <th>Kode Dosen</th>
              <th>Tanggal</th>
              <th>Kebutuhan Alat</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($kelas as $val): ?>
              <tr>
                <td><?php echo $val->ruang; ?></td>
                <td><?php echo $val->jam_masuk; ?></td>
                <td><?php echo $val->jumlah_jam; ?></td>
                <td><?php echo $val->matakuliah; ?></td>
                <td><?php echo $val->kode_dosen; ?></td>
                <td><?php echo $val->tanggal; ?></td>
                <td><?php echo $val->kebutuhan; ?></td>
                <td><?php echo $val->status; ?></td>
              </tr>
            <?php endforeach; ?>
            <!-- <tr>
              <td>B1</td>
              <td>10.30</td>
              <td>3</td>
              <td>Web Dasar</td>
              <td>KVL</td>
              <td>29 April 2018</td>
              <td>-</td>
            </tr> -->
          </tbody>
        </table>
        <br>
        <hr>
        <br>
        PRAKTIKUM
        <div style="overflow:scroll;">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Ruangan</th>
                <th>Jam Masuk</th>
                <th>Jumlah Jam</th>
                <th>Mata Kuliah</th>
                <th>Kode Dosen</th>
                <th>Koordinator Praktikum</th>
                <th>Jumlah Assistant</th>
                <th>Tanggal</th>
                <th>Kebutuhan Alat</th>
                <th>Bukti Perizinan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($praktikum as $val): ?>
                <tr>
                  <td><?php echo $val->ruang; ?></td>
                  <td><?php echo $val->jam_masuk; ?></td>
                  <td><?php echo $val->jumlah_jam; ?></td>
                  <td><?php echo $val->matakuliah; ?></td>
                  <td><?php echo $val->kode_dosen; ?></td>
                  <td><?php echo $val->koor; ?></td>
                  <td><?php echo $val->jml_asprak; ?></td>
                  <td><?php echo $val->tanggal; ?></td>
                  <td><?php echo $val->kebutuhan; ?></td>
                  <td><?php echo $val->bukti; ?></td>
                  <td><?php echo $val->status; ?></td>
                </tr>
              <?php endforeach; ?>
              <!-- <tr>
                <td>A3</td>
                <td>16.30</td>
                <td>3</td>
                <td>Alpro</td>
                <td>MKL</td>
                <td>Sinta</td>
                <td>5</td>
                <td>17 Mei 2019</td>
                <td>Komputer</td>
              </tr> -->
            </tbody>
          </table>
        </div>
        <br>
        <hr>
        <br>
        LAINNYA
        <small>
          <i><br>Data Not Found.</i>
        </small>
      </div>
    </div>
    <div class="col-3" style="margin-top: 15px;">

      <div class="Heading">
        FEEDBACK
      </div>
      <div class="Con-body">
        <label for="">Give us a Feedback</label>
        <form class="" method="post">
          <textarea name="feedback" class="form-control" style="width:100%;height:200px;"></textarea>
          <input type="submit" name="submit" value="SUBMIT" class="btn btn-block btn-success" style="margin:5px 0">
        </form>
      </div>

    </div>
  </div>
</div>
