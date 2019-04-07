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
        PEMINJAMAN RUANGAN - PRAKTIKUM
      </div>
      <div class="Con-body">
        <form class="" action="pinjam_praktikum" method="post">
          <input type="hidden" name="nama" value="<?php echo $id = $this->session->userdata('id'); ?>">
          <input type="hidden" name="kelas" value="<?php echo $id = $this->session->userdata('kelas'); ?>">
          <label for="">Ruangan</label>
          <select class="form-control" name="ruang" required>
            <?php foreach ($kelas as $val): ?>
              <?php if ($val->lab_name != "-"): ?>
                <option value="<?php echo $val->lab_name; ?>"><?php echo $val->nama." - ".$val->lab_name; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
          <label for="">Jam Masuk</label>
          <select class="form-control" name="jam_masuk" required>
            <option value="08:00">08:00</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="12:00">12:00</option>
            <option value="13:00">13:00</option>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
            <option value="16:00">16:00</option>
            <option value="17:00">17:00</option>
            <option value="18:00">18:00</option>
            <option value="19:00">19:00</option>
          </select>
          <label for="">Jumlah Jam</label>
          <br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pinjamruangan" id="inlineRadio1" value="1" required>
            <label class="form-check-label" for="inlineRadio1">1</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pinjamruangan" id="inlineRadio1" value="2" required>
            <label class="form-check-label" for="inlineRadio1">2</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pinjamruangan" id="inlineRadio1" value="3" required>
            <label class="form-check-label" for="inlineRadio1">3</label>
          </div>
          <br>
          <label for="">Mata Kuliah</label>
          <input type="text" name="matakuliah" value="" class="form-control" required>
          <label for="">Kode Dosen</label>
          <select class="form-control" name="kode_dosen" required>
            <?php foreach ($dosen as $val): ?>
              <option value="<?php echo $val->kode; ?>"><?php echo $val->nama_depan." ".$val->nama_belakang." - ".$val->kode; ?></option>
            <?php endforeach; ?>
          </select>
          <label for="">Koordinator Praktikum</label>
          <input type="text" name="koor" value="" class="form-control" required>
          <label for="">Jumlah Assistant</label>
          <input type="text" name="jml_asprak" value="" class="form-control" required>
          <label for="">Tanggal</label>
          <input type="date" name="tanggal" value="" class="form-control" required>
          <label for="">Kebutuhan Alat</label>
          <textarea name="kebutuhan" class="form-control" required></textarea>
          <label for="">Bukti Perizinan</label>
          <input type="file" name="bukti" class="form-control-file" required>
          <input type="submit" name="submit" value="SUBMIT" class="btn btn-block btn-success" style="margin-top:10px;">
        </form>
      </div>
    </div>
  </div>
</div>
