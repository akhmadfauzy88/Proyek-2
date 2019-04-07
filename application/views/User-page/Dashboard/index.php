

<div class="css-file">
  <?php
    if (isset($css)) {
      echo "<link rel='stylesheet' href='$css' crossorigin='anonymous' />";
    }
  ?>
</div>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-8" style="margin-top: 15px;">

      <div class="Heading">
        JADWAL PEMINJAMAN
      </div>
      <div class="Con-body">
        <form class="" action="<?php echo base_url();?>pinjam" method="post">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pinjamruangan" id="inlineRadio1" value="kelas" required>
            <label class="form-check-label" for="inlineRadio1">Kelas Pengganti</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pinjamruangan" id="inlineRadio1" value="rapat">
            <label class="form-check-label" for="inlineRadio1">Praktikum</label>
          </div>
          <input type="submit" name="submit" value="[+] Pinjam Ruangan" class="btn btn-primary">
        </form>
        <hr>
        <?php foreach ($kelas as $value): ?>
          <?php if ($value->tanggal == date("Y-m-d")): ?>
            <?php for ($i=$value->jumlah_jam; $i >=1 ; $i--): ?>
              <?php echo $value->ruang; ?>
              <?php echo $value->kelas; ?>
              <?php echo $value->jam_masuk; ?>
              <?php echo $value->jumlah_jam; ?>
              <?php echo $value->tanggal; ?>
              <br>
            <?php endfor; ?>
            <br>
          <?php endif; ?>
        <?php endforeach; ?>
        <hr>
        <table border="1" class="jadwal-ruangan">
          <tr>
            <td>Ruangan</td>
            <?php foreach ($kelas as $value): ?>
              <?php if ($value->ruang == "A1" && $value->tanggal == date("Y-m-d")): ?>
                <?php
                  $jam = explode(":", $value->jam_masuk);
                ?>
                <?php for ($i=$value->jumlah_jam; $i >0 ; $i--): ?>
                  <td>
                    <?php
                      echo $jam[0].":".$jam[1];
                      $jam[0]++;
                    ?>
                  </td>
                <?php endfor; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </tr>
          <tr>
            <td>A1</td>
            <?php foreach ($kelas as $value): ?>
              <?php if ($value->ruang == "A1" && $value->tanggal == date("Y-m-d")): ?>
                <?php for ($i=$value->jumlah_jam; $i >0 ; $i--): ?>
                  <td>
                    <?php echo $value->kelas; ?>
                  </td>
                <?php endfor; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </tr>
        </table>

        <br>

        <table border="1" class="jadwal-ruangan">
          <tr>
            <td>Ruangan</td>
            <?php foreach ($kelas as $value): ?>
              <?php if ($value->ruang == "B1" && $value->tanggal == date("Y-m-d")): ?>
                <?php
                  $jam = explode(":", $value->jam_masuk);
                ?>
                <?php for ($i=$value->jumlah_jam; $i >0 ; $i--): ?>
                  <td>
                    <?php
                      echo $jam[0].":".$jam[1];
                      $jam[0]++;
                    ?>
                  </td>
                <?php endfor; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </tr>
          <tr>
            <td>B1</td>
            <?php foreach ($kelas as $value): ?>
              <?php if ($value->ruang == "B1" && $value->tanggal == date("Y-m-d")): ?>
                <?php for ($i=$value->jumlah_jam; $i >0 ; $i--): ?>
                  <td>
                    <?php echo $value->kelas; ?>
                  </td>
                <?php endfor; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </tr>
        </table>
        <hr>
        PERATURAN PEMINJAMAN
        <br>
        <p>1. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>

    </div>
    <div class="col-3" style="margin-top: 15px;">

      <div class="Heading">
        LEGEND
      </div>
      <div class="Con-body">
        <div class="legend-body">
          <div class="box" style="background: #28a745">

          </div>
          <div class="legend">
            Attended
          </div>
          <div class="box" style="background: #6c757d;">

          </div>
          <div class="legend">
            Approved
          </div>
          <div class="box" style="background: #17a2b8;">

          </div>
          <div class="legend">
            Pending
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
