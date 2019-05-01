<?php $log = $this->session->flashdata('log_kelas'); ?>
<?php $cancel = $this->session->flashdata('log_kelas_cancel'); ?>

<div class="css-file">
  <?php
    if (isset($css)) {
      echo "<link rel='stylesheet' href='$css' crossorigin='anonymous' />";
    }
  ?>
</div>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10" style="margin-top: 15px;">
      <?php if (isset($log)): ?>
        <div class="Heading" style="background:none;border:none;">
          <div class="alert alert-success" role="alert">
            <center>
              Peminjaman berhasil dilakukan.
            </center>
          </div>
        </div>
      <?php endif; ?>
      <?php if (isset($cancel)): ?>
        <div class="Heading" style="background:none;border:none;">
          <div class="alert alert-warning" role="alert">
            <center>
              Peminjaman berhasil dibatalkan.
            </center>
          </div>
        </div>
      <?php endif; ?>
      <div class="Heading" style="background:none;border:none;display:none;" id="alert_cancel">
        <div class="alert alert-danger" role="alert">
          <center>
            Feedback harus diisi.
          </center>
        </div>
      </div>
      <div class="Heading">
        STATUS PEMINJAMAN
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
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($kelas as $val): ?>
              <tr>
                <td><?php echo $val->ruang; ?></td>
                <td><?php echo $val->jam_masuk; ?></td>
                <td><?php echo $val->jumlah_jam; ?></td>
                <td><?php echo $val->matakuliah; ?></td>
                <td><?php echo $val->kdosen; ?></td>
                <td><?php echo $val->tanggal; ?></td>
                <td><?php echo $val->status; ?></td>
                <td>
                  <a href="#" class="btn btn-danger" onclick="batalkan_kelas(<?php echo $val->t_id; ?>)">Batalkan</a>
                </td>
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
              <td>
                <a href="#" class="btn btn-danger" onclick="batalkan()">Batalkan</a>
              </td>
            </tr> -->
          </tbody>
        </table>
        <br>
        <hr>
        <br>
        PRAKTIKUM
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
              <th>Bukti Peminjaman</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($praktikum as $val): ?>
              <tr>
                <td><?php echo $val->ruang; ?></td>
                <td><?php echo $val->jam_masuk; ?></td>
                <td><?php echo $val->jumlah_jam; ?></td>
                <td><?php echo $val->matakuliah; ?></td>
                <td><?php echo $val->kdosen; ?></td>
                <td><?php echo $val->tanggal; ?></td>
                <td><?php echo $val->kebutuhan; ?></td>
                <td><?php echo $val->bukti; ?></td>
                <td><?php echo $val->status; ?></td>
                <td>
                  <a href="#" class="btn btn-danger" onclick="batalkan_praktikum(<?php echo $val->t_id; ?>)">Batalkan</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <br>
        <hr>
        <br>
        LAINNYA
        <small>
          <i><br>Data Not Found.</i>
        </small>
      </div>
    </div>

    <div class="col-md-10" style="margin-top: 15px;" id="batal_kelas">
      <div class="Heading">
        FEEDBACK PEMBATALAN KELAS
      </div>
      <div class="Con-body">
        <form action="<?php echo base_url() ?>cancel_kelas" method="post">
          <input type="hidden" name="id" id="idx" value="">
          <label for="">Please Give US a Feedback</label>
          <textarea name="pesan" id="pesanx" class="form-control" style="height:150px;"></textarea>
          <input type="submit" name="submit" value="SUBMIT" class="btn btn-block btn-success" style="margin-top:10px;" onclick="return go_kelas()">
          <input type="button" name="button" value="CANCEL" class="btn btn-block btn-danger" style="margin-top:10px;" onclick="cancel_kelas()">
        </form>
      </div>
    </div>

    <div class="col-md-10" style="margin-top: 15px;" id="batal_praktikum">
      <div class="Heading">
        FEEDBACK PEMBATALAN PRAKTIKUM
      </div>
      <div class="Con-body">
        <form action="<?php echo base_url() ?>cancel_praktikum" method="post">
          <input type="hidden" name="id" id="idy" value="">
          <label for="">Please Give US a Feedback</label>
          <textarea name="pesan" id="pesany" class="form-control" style="height:150px;"></textarea>
          <input type="submit" name="submit" value="SUBMIT" class="btn btn-block btn-success" style="margin-top:10px;" onclick="return go_praktikum()">
          <input type="button" name="button" value="CANCEL" class="btn btn-block btn-danger" style="margin-top:10px;" onclick="cancel_kelas()">
        </form>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  function go_kelas(){
    if (document.getElementById('pesanx').value == "") {
      document.getElementById('alert_cancel').style.display = "block";
      return false;
    }
  }

  function go_praktikum(){
    if (document.getElementById('pesany').value == "") {
      document.getElementById('alert_cancel').style.display = "block";
      return false;
    }
  }

  function cancel_kelas(){
    var blokx = document.getElementById("batal_kelas");
    var bloky = document.getElementById("batal_praktikum");
    blokx.style.display = "none";
    bloky.style.display = "none";
  }

  function batalkan_kelas(id){
    var blokx = document.getElementById("batal_kelas");
    var bloky = document.getElementById("batal_praktikum");
    var idx = document.getElementById('idx');
    idx.value = id;
    blokx.style.display = "block";
    bloky.style.display = "none";
  }

  function batalkan_praktikum(id){
    var blokx = document.getElementById("batal_praktikum");
    var bloky = document.getElementById("batal_kelas");
    var idx = document.getElementById('idy');
    idx.value = id;
    blokx.style.display = "block";
    bloky.style.display = "none";
  }

</script>
