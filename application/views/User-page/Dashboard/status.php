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
              <th>Kebutuhan Alat</th>
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
                <td><?php echo $val->kode_dosen; ?></td>
                <td><?php echo $val->tanggal; ?></td>
                <td><?php echo $val->kebutuhan; ?></td>
                <td>
                  <a href="#" class="btn btn-danger" onclick="batalkan(<?php echo $val->id; ?>)">Batalkan</a>
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
        <small>
          <i><br>Data Not Found.</i>
        </small>
        <br>
        <hr>
        <br>
        LAINNYA
        <small>
          <i><br>Data Not Found.</i>
        </small>
      </div>
    </div>
    <div class="col-md-10" style="margin-top: 15px;" id="batal">

      <div class="Heading">
        FEEDBACK PEMBATALAN
      </div>
      <div class="Con-body">
        <form action="<?php echo base_url() ?>cancel_kelas" method="post">
          <input type="hidden" name="id" id="idn" value="">
          <label for="">Please Give US a Feedback</label>
          <textarea name="pesan" id="pesan" class="form-control" style="height:150px;"></textarea>
          <input type="submit" name="submit" value="SUBMIT" class="btn btn-block btn-success" style="margin-top:10px;" onclick="return go()">
          <input type="button" name="button" value="CANCEL" class="btn btn-block btn-danger" style="margin-top:10px;" onclick="cancel()">
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function go(){
    if (document.getElementById('pesan').value == "") {
      document.getElementById('alert_cancel').style.display = "block";
      return false;
    }
  }
  function cancel(){
    var blok = document.getElementById("batal");
    batal.style.display = "none";
  }
  function batalkan(id){
    var blok = document.getElementById("batal");
    var idx = document.getElementById('idn');
    idn.value = id;
    batal.style.display = "block";
  }
</script>
