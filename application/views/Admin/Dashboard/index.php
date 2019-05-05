<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    <!--<button class="au-btn au-btn-icon au-btn- -blue">
                                        <i class="zmdi zmdi-plus"></i>add item</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $jml_penjadwalan['total'] ?></h2>
                                                <span>Total Peminjaman</span>
                                            </div>
                                            <div class="overview-chart">
                                                <!-- <canvas id="widgetChart4"></canvas> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $jml_penjadwalan_praktikum['praktikum'] ?></h2>
                                                <span>Peminjaman - Praktikum</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <!-- <canvas id="widgetChart2"></canvas> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $jml_penjadwalan_kelas['kelas'] ?></h2>
                                                <span>Peminjaman - kelas</span>
                                            </div>
                                            <div class="overview-chart">
                                                <!-- <canvas id="widgetChart4"></canvas> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Daftar Peminjaman - Kelas Pengganti</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                              <th>Ruangan</th>
                                              <th>Jam Masuk</th>
                                              <th>Jumlah Jam</th>
                                              <th>Mata Kuliah</th>
                                              <th>Kode Dosen</th>
                                              <th>Tanggal</th>
                                              <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($transaksi_kelas as $value): ?>
                                              <tr>
                                                <td><?php echo $value->kode ?></td>
                                                <td><?php echo $value->jam_masuk ?></td>
                                                <td><?php echo $value->jumlah_jam ?></td>
                                                <td><?php echo $value->matakuliah ?></td>
                                                <td><?php echo $value->kdosen ?></td>
                                                <td><?php echo $value->tanggal ?></td>
                                                <td>
                                                  <form action="<?php echo base_url() ?>respon" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $value->idx ?>" />
                                                    <input type="hidden" name="status" value="kelas" />
                                                    <input type="submit" name="terima" value="Terima" class="btn btn-success" />
                                                    <input type="submit" name="tolak" value="Tolak" class="btn btn-danger" />
                                                  </form>
                                                </td>
                                              </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <div class="col-lg-3">
                                <h2 class="title-1 m-b-25">History Peminjaman</h2>
                                <div class="au-card au-card- -bg-blue au-card-top-countries m-b-40">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <tbody>
                                                    <tr>
                                                        <td>17 Mei 2018</td>
                                                        <td class="text-right">D3MI-41-01</td>
                                                    </tr>
                                                    <tr>
                                                        <td>18 Mei 2018</td>
                                                        <td class="text-right">D3MI-41-01</td>
                                                    </tr>
                                                    <tr>
                                                        <td>19 Mei 2018</td>
                                                        <td class="text-right">D3MI-41-01</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Daftar Peminjaman - Praktikum</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
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
                                              <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($transaksi_praktikum as $value): ?>
                                            <tr>
                                              <td><?php echo $value->kode ?></td>
                                              <td><?php echo $value->jam_masuk ?></td>
                                              <td><?php echo $value->jumlah_jam ?></td>
                                              <td><?php echo $value->matakuliah ?></td>
                                              <td><?php echo $value->kdosen ?></td>
                                              <td><?php echo $value->tanggal ?></td>
                                              <td><?php echo $value->kebutuhan ?></td>
                                              <td>
                                                <a href="<?php echo base_url() ?>gambar/<?php echo $value->bukti ?>"><?php echo $value->bukti ?></a>
                                              </td>
                                              <td>
                                                <form action="<?php echo base_url() ?>respon" method="post">
                                                  <input type="hidden" name="id" value="<?php echo $value->idx ?>" />
                                                  <input type="hidden" name="status" value="praktikum" />
                                                  <input type="submit" name="terima" value="Terima" class="btn btn-success" />
                                                  <input type="submit" name="tolak" value="Tolak" class="btn btn-danger" />
                                                </form>
                                              </td>
                                            </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <div class="col-lg-3">
                                <h2 class="title-1 m-b-25">History Peminjaman</h2>
                                <div class="au-card au-card- -bg-blue au-card-top-countries m-b-40">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <tbody>
                                                  <tr>
                                                      <td>17 Mei 2018</td>
                                                      <td class="text-right">D3MI-41-01</td>
                                                  </tr>
                                                  <tr>
                                                      <td>18 Mei 2018</td>
                                                      <td class="text-right">D3MI-41-01</td>
                                                  </tr>
                                                  <tr>
                                                      <td>19 Mei 2018</td>
                                                      <td class="text-right">D3MI-41-01</td>
                                                  </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 KELAS. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
