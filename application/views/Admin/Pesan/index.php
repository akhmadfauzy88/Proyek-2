<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Pesan Masuk</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Ruangan</th>
                                      <th>Pengirim</th>
                                      <th>Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($pesan as $value): ?>
                                    <tr>
                                      <td><?php echo $value->id; ?></td>
                                      <td><?php echo $value->kode; ?></td>
                                      <td><?php echo $value->email; ?></td>
                                      <td><?php echo $value->pesan; ?></td>
                                    </tr>
                                  <?php endforeach; ?>
                                </tbody>
                            </table>
                          </div>
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
