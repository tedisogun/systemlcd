<div class="col-12">
      <div class="card">
          <div class="card-body">
              <h4 style="text-align:center" class="card-title"></h4>
              <div class="table-responsive">
                  <table border="no-border" class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="4"><center><h4><strong>TABEL DATA LCD<strong></h4></center></th>
                        </tr>
                    </thead>
                      <thead>
                          <tr style="background-color: white;color:red">
                              <th>Foto</th>
                              <th>Kode</th>
                              <th>Merk</th>
                              <th>Type</th>
                          </tr>
                      </thead>
                      <tbody>

                        <?php
                        $querylcd_data = "SELECT *FROM lcd_table";
                        $data = mysqli_query($dbc,$querylcd_data);

                        while ($row = mysqli_fetch_array($data))
                        {
                          $lcd_id = $row['lcd_id'];
                          $lcd_merk = $row['lcd_merk'];
                          $lcd_type = $row['lcd_type'];
                          $lcd_gambar = $row['lcd_gambar'];
                          $data_tabel_lcd = "<tr>
                              <td> <a href=\"/assets/images/lcd/$lcd_gambar\"><img height=\"60\" src=\"/assets/images/lcd/$lcd_gambar\"> </a>   </td>
                              <td>$lcd_id</td>
                              <td>$lcd_merk</td>
                              <td>$lcd_type</td>
                          </tr>";
                          echo $data_tabel_lcd;
                        }
                        ?>






                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
