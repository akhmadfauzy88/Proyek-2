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
        <label for="">Ruangan</label>
        <select class="form-control" name="">
          <option value="">A1</option>
          <option value="">A2</option>
          <option value="">A3</option>
          <option value="">A4</option>
          <option value="">B1</option>
          <option value="">B2</option>
          <option value="">B3</option>
          <option value="">B4</option>
        </select>
        <label for="">Jam Masuk</label>
        <input type="time" name="" value="" class="form-control">
        <label for="">Jumlah Jam</label>
        <br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="pinjamruangan" id="inlineRadio1" value="kelas">
          <label class="form-check-label" for="inlineRadio1">1</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="pinjamruangan" id="inlineRadio1" value="kelas">
          <label class="form-check-label" for="inlineRadio1">2</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="pinjamruangan" id="inlineRadio1" value="kelas">
          <label class="form-check-label" for="inlineRadio1">3</label>
        </div>
        <label for="">Mata Kuliah</label>
        <input type="text" name="" value="" class="form-control">
        <label for="">Kode Dosen</label>
        <input type="text" name="" value="" class="form-control">
        <label for="">Koordinator Praktikum</label>
        <input type="text" name="" value="" class="form-control">
        <label for="">Jumlah Assistant</label>
        <input type="text" name="" value="" class="form-control">
        <label for="">Tanggal</label>
        <input type="date" name="" value="" class="form-control">
        <label for="">Kebutuhan Alat</label>
        <textarea name="name" class="form-control"></textarea>
        <label for="">Bukti Perizinan</label>
        <input type="file" name="" class="form-control-file">
        <input type="text" name="submit" value="SUBMIT" class="btn btn-block btn-success" style="margin-top:10px;">
      </div>
    </div>
  </div>
</div>
