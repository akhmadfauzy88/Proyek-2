

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
        <table border="1" class="jadwal-ruangan">
          <tr>
            <td>RUANGAN / JAM</td>
            <td>08.00</td>
            <td>09.00</td>
            <td>10.00</td>
            <td>11.00</td>
            <td>12.00</td>
            <td>13.00</td>
            <td>14.00</td>
            <td>15.00</td>
            <td>16.00</td>
            <td>17.00</td>
            <td>18.00</td>
            <td>19.00</td>
            <td>20.00</td>
          </tr>
          <tr>
            <td>A1</td>
            <td class="A108">MI-41-01</td>
            <td class="A108">MI-41-01</td>
            <td class="A108">MI-41-01</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>A2</td>
            <td></td>
            <td></td>
            <td></td>
            <td class="A111">MI-41-01</td>
            <td class="A111">MI-41-01</td>
            <td class="A111">MI-41-01</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>A3</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="A112">MI-41-01</td>
            <td class="A112">MI-41-01</td>
            <td class="A112">MI-41-01</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>A4</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="A111">MI-41-01</td>
            <td class="A111">MI-41-01</td>
            <td class="A111">MI-41-01</td>
            <td></td>
          </tr>
          <tr>
            <td>B1</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="A108">MI-41-01</td>
            <td class="A108">MI-41-01</td>
            <td class="A108">MI-41-01</td>
          </tr>
          <tr>
            <td>B2</td>
            <td></td>
            <td></td>
            <td></td>
            <td class="A108">MI-41-01</td>
            <td class="A108">MI-41-01</td>
            <td class="A108">MI-41-01</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>B3</td>
            <td class="A108">MI-41-01</td>
            <td class="A108">MI-41-01</td>
            <td class="A108">MI-41-01</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>B4</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="A111">MI-41-01</td>
            <td class="A111">MI-41-01</td>
            <td class="A111">MI-41-01</td>
            <td></td>
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
