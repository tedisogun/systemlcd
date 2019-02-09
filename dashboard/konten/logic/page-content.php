<?php
$username = $_SESSION['username'];



?>


<!-- Row -->
<br>
<!-- Row -->
<div class="row">
    <div class="col-lg-7 col-md-12">
      <div class="table-responsive">
                <table border="no-border" class="table table-striped">

                  <thead>
                      <tr>
                          <th style="background-color: white;color:red" colspan="4"><center>Mahasiswa yang Belum Mengembalikan LCD</center></th>

                      </tr>
                  </thead>
                    <thead>
                        <tr>
                            <th><center>LCD ID</center></th>
                            <th colspan="2"><center>Peminjam</center></th>
                            <th><center>Waktu</center></th>
                        </tr>
                    </thead>
                    <tbody>

                      <?php
                      $querytpdt = "SELECT peminjaman_table.pjm_id as id, peminjaman_table.pjm_lcd_id as lcd_id, mahasiswa_table.mhs_nama as mahasiswa, DATE_FORMAT(peminjaman_table.pjm_tgl_pinjam, '%H:%i') as waktu FROM peminjaman_table, mahasiswa_table WHERE peminjaman_table.pjm_mhs_nim = mahasiswa_table.mhs_nim AND peminjaman_table.pjm_tgl_kembali IS NULL ORDER BY pjm_tgl_pinjam DESC";
                      $datatpdt  = mysqli_query($dbc,$querytpdt);

                      while($i = mysqli_fetch_array($datatpdt))
                      {


                      ?>
                        <tr>
                            <td> <?php echo $i['lcd_id']; ?> </td>
                            <td colspan="2"><?php echo $i['mahasiswa']; ?></td>
                            <td>
                              <div style="float:left;width:90%;"><?php echo $i['waktu']; ?></div>
                              <div style="float:right;width:10%;"><a title="delete data" href="/dashboard/hapus_data_peminjaman.php?idpjm=<?php echo $i['id']; ?>"><i class="mdi mdi-delete"></i></a></div>
                            </td>
                        </tr>
                        <?php
                      }
                        ?>



                    </tbody>
                </table>
            </div>
    </div>
    <div class="col-lg-5 col-md-12">
        <!-- Column -->
        <a href="<?php
        if($jumlahlcd_tersedia>0)
          echo "?pinjamlcd";
        else
          echo "#";

        ?>"><div class="card card-inverse card-primary">
            <div class="card-body">
                <div class="d-flex">
                    <div class="m-r-20 align-self-center">
                        <h1 class="text-white"><i class="icon-action-redo"></i></h1></div>
                    <div>
                        <h3 class="card-title">Pinjam LCD</h3>
                        <h6 class="card-subtitle">Independence is happiness</h6> </div>
                </div>
                <div class="row">
                    <div class="col-4 align-self-center">
                        <h2 class="text-white"><?php echo "$jumlahlcd_tersedia Tersisa";?></h2>
                    </div>
                    <div class="col-8 align-self-center">
                        <div class="usage chartist-chart" style="height:120px"></div>
                    </div>
                </div>
            </div>
        </div></a>
        <!-- Column -->
        <!-- Column -->
        <a href="?kembalikanlcd"><div class="card card-inverse card-success">
            <div class="card-body">
                <div class="d-flex">
                    <div class="m-r-20 align-self-center">
                        <h1 class="text-white"><i class="icon-action-undo"></i></h1></div>
                    <div>
                        <h3 class="card-title">Kembalikan LCD</h3>
                        <h6 class="card-subtitle">Forget Regret, or life is yours to miss</h6> </div>
                </div>
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="text-white"><?php echo "$jumlahlcd_dipinjam Dipinjam";?></h2>
                    </div>
                    <div class="col-7  text-right">
                        <div class="spark-count" style="height:120px"></div>
                    </div>
                </div>
            </div>
        </div></a>
        <!-- Column -->
    </div>
</div>
<!-- Row -->
