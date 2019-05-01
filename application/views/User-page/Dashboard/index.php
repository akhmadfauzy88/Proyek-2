

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
        JADWAL PEMINJAMAN <?php echo $_SESSION['kelas']; ?>
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

        <?php
          if (isset($_GET['sub'])) {
            $tanggal = $_GET['tgl'];
          }else {
            $tanggal = date("Y-m-d");
          }
        ?>

        <label>Filter Tanggal : <?php echo $tanggal; ?></label>
        <div class="tanggal" style="margin: 10px 0;display:flex;width:100%;">
          <div style="width:70%;">
            <form action="" method="get">
              <input type="date" name="tgl" class="form-control" />
          </div>
          <div style="width:15%;padding: 0 5px;">
              <input type="submit" name="sub" value="Filter" class="btn btn-block btn-primary">
            </form>
          </div>
          <div style="width:15%;padding: 0 5px;">
            <a href="<?php echo base_url(); ?>" class="btn btn-block btn-danger">Reset Filter</a>
          </div>
        </div>

        <div style="overflow:auto;">
          <table border="1" class="jadwal-ruangan" align="center">
            <tr>
              <td>Jam \ Ruangan</td>
              <td>A1</td>
              <td>A2</td>
              <td>A7</td>
              <td>B1</td>
              <td>B2</td>
              <td>D2</td>
              <td>D3</td>
              <td>D5</td>
              <td>E4</td>
              <td>G2</td>
            </tr>
            <tr>
              <td>08:00</td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "08:00:00" && $value->kode == "A1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "08:00:00" && $value->kode == "A2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "08:00:00" && $value->kode == "A7" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "08:00:00" && $value->kode == "B1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "08:00:00" && $value->kode == "B2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "08:00:00" && $value->kode == "D2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "08:00:00" && $value->kode == "D3" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "08:00:00" && $value->kode == "D5" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "08:00:00" && $value->kode == "E4" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "08:00:00" && $value->kode == "G2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
            </tr>
            <tr>
              <td>09:00</td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "09:00:00" && $value->kode == "A1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "09:00:00" && $value->kode == "A2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "09:00:00" && $value->kode == "A7" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "09:00:00" && $value->kode == "B1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td><td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "09:00:00" && $value->kode == "B2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "09:00:00" && $value->kode == "D2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td><td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "09:00:00" && $value->kode == "D3" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "09:00:00" && $value->kode == "D5" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td><td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "09:00:00" && $value->kode == "E4" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "09:00:00" && $value->kode == "G2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
            </tr>
            <tr>
              <td>10:00</td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "10:00:00" && $value->kode == "A1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "10:00:00" && $value->kode == "A2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "10:00:00" && $value->kode == "A7" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "10:00:00" && $value->kode == "B1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "10:00:00" && $value->kode == "B2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "10:00:00" && $value->kode == "D2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "10:00:00" && $value->kode == "D3" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "10:00:00" && $value->kode == "D5" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "10:00:00" && $value->kode == "E4" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "10:00:00" && $value->kode == "G2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
            </tr>
            <tr>
              <td>11:00</td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "11:00:00" && $value->kode == "A1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "11:00:00" && $value->kode == "A2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "11:00:00" && $value->kode == "A7" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "11:00:00" && $value->kode == "B1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "11:00:00" && $value->kode == "B2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "11:00:00" && $value->kode == "D2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "11:00:00" && $value->kode == "D3" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "11:00:00" && $value->kode == "D5" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "11:00:00" && $value->kode == "E4" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "11:00:00" && $value->kode == "G2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
            </tr>
            <tr>
              <td>12:00</td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "12:00:00" && $value->kode == "A1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "12:00:00" && $value->kode == "A2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "12:00:00" && $value->kode == "A7" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "12:00:00" && $value->kode == "B1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "12:00:00" && $value->kode == "B2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "12:00:00" && $value->kode == "D2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "12:00:00" && $value->kode == "D3" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "12:00:00" && $value->kode == "D5" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "12:00:00" && $value->kode == "E4" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "12:00:00" && $value->kode == "G2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
            </tr>
            <tr>
              <td>13:00</td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "13:00:00" && $value->kode == "A1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "13:00:00" && $value->kode == "A2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "13:00:00" && $value->kode == "A7" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "13:00:00" && $value->kode == "B1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "13:00:00" && $value->kode == "B2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "13:00:00" && $value->kode == "D2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "13:00:00" && $value->kode == "D3" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "13:00:00" && $value->kode == "D5" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "13:00:00" && $value->kode == "E4" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "13:00:00" && $value->kode == "G2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
            </tr>
            <tr>
              <td>14:00</td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "14:00:00" && $value->kode == "A1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "14:00:00" && $value->kode == "A2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "14:00:00" && $value->kode == "A7" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "14:00:00" && $value->kode == "B1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "14:00:00" && $value->kode == "B2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "14:00:00" && $value->kode == "D2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "14:00:00" && $value->kode == "D3" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "14:00:00" && $value->kode == "D5" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "14:00:00" && $value->kode == "E4" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "14:00:00" && $value->kode == "G2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
            </tr>
            <tr>
              <td>15:00</td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "15:00:00" && $value->kode == "A1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "15:00:00" && $value->kode == "A2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "15:00:00" && $value->kode == "A7" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "15:00:00" && $value->kode == "B1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "15:00:00" && $value->kode == "B2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "15:00:00" && $value->kode == "D2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "15:00:00" && $value->kode == "D3" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "15:00:00" && $value->kode == "D5" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "15:00:00" && $value->kode == "E4" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "15:00:00" && $value->kode == "G2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
            </tr>
            <tr>
              <td>16:00</td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "16:00:00" && $value->kode == "A1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "16:00:00" && $value->kode == "A2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "16:00:00" && $value->kode == "A7" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "16:00:00" && $value->kode == "B1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "16:00:00" && $value->kode == "B2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "16:00:00" && $value->kode == "D2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "16:00:00" && $value->kode == "D3" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "16:00:00" && $value->kode == "D5" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "16:00:00" && $value->kode == "E4" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "16:00:00" && $value->kode == "G2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
            </tr>
            <tr>
              <td>17:00</td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "17:00:00" && $value->kode == "A1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "17:00:00" && $value->kode == "A2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "17:00:00" && $value->kode == "A7" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "17:00:00" && $value->kode == "B1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "17:00:00" && $value->kode == "B2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "17:00:00" && $value->kode == "D2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "17:00:00" && $value->kode == "D3" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "17:00:00" && $value->kode == "D5" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "17:00:00" && $value->kode == "E4" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "17:00:00" && $value->kode == "G2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
            </tr>
            <tr>
              <td>18:00</td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "18:00:00" && $value->kode == "A1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "18:00:00" && $value->kode == "A2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "18:00:00" && $value->kode == "A7" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "18:00:00" && $value->kode == "B1" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "18:00:00" && $value->kode == "B2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "18:00:00" && $value->kode == "D2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "18:00:00" && $value->kode == "D3" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "18:00:00" && $value->kode == "D5" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "18:00:00" && $value->kode == "E4" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach ($transaksi as $value): ?>
                  <?php if ($value->jam == "18:00:00" && $value->kode == "G2" && $value->tanggal == $tanggal): ?>
                    <?php echo $value->nama_kelas ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
            </tr>
          </table>
        </div>

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
