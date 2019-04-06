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

      <div class="Heading">
        PEMINJAMAN RUANGAN - KELAS PENGGANTI
      </div>
      <div class="Con-body">
        <form class="" action="pinjam_kelas" method="post">
          <input type="hidden" name="nama" value="<?php echo $id = $this->session->userdata('id'); ?>">
          <label for="">Ruangan</label>
          <select class="form-control" name="ruang">
            <?php foreach ($kelas as $val): ?>
              <?php if ($val->lab_name != "-"): ?>
                <option value="<?php echo $val->lab_name; ?>"><?php echo $val->nama." - ".$val->lab_name; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
          <label for="">Jam Masuk</label>
          <input type="time" name="jam_masuk" value="" class="form-control">
          <label for="">Jumlah Jam</label>
          <br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pinjamruangan" id="inlineRadio1" value="1">
            <label class="form-check-label" for="inlineRadio1">1</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pinjamruangan" id="inlineRadio1" value="2">
            <label class="form-check-label" for="inlineRadio1">2</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pinjamruangan" id="inlineRadio1" value="3">
            <label class="form-check-label" for="inlineRadio1">3</label>
          </div>
          <br>
          <label for="">Mata Kuliah</label>
          <input type="text" name="matakuliah" value="" class="form-control">
          <label for="">Kode Dosen</label>
          <select class="form-control" name="kode_dosen">
            <?php foreach ($dosen as $val): ?>
              <option value="<?php echo $val->kode; ?>"><?php echo $val->nama_depan." ".$val->nama_belakang." - ".$val->kode; ?></option>
            <?php endforeach; ?>
          </select>
          <label for="">Tanggal</label>
          <input type="date" name="tanggal" value="" class="form-control">
          <label for="">Kebutuhan Alat</label>
          <textarea name="kebutuhan" class="form-control"></textarea>
          <input type="submit" name="submit" value="SUBMIT" class="btn btn-block btn-success" style="margin-top:10px;">
        </form>
      </div>
    </div>
  </div>
</div>
