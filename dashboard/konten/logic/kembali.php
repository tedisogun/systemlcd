<?php

  if(isset($_POST['submit']))
  {
    //  $querydewaaa  ="SELECT pjm_mhs_nim FROM peminjaman_table WHERE pjm_lcd_id='$user_lcd_kmb' AND pjm_tgl_kembali IS NULL";
      $user_lcd_kmb = mysqli_real_escape_string($dbc,trim($_POST['lcd_id']));
      $query_mengembalikan = "UPDATE peminjaman_table SET pjm_adm_username_kembali='$adm_username',pjm_tgl_kembali= NOW() WHERE pjm_lcd_id='$user_lcd_kmb' AND pjm_tgl_kembali IS NULL";
      $query_lcd = "UPDATE lcd_table SET lcd_status=1 WHERE lcd_id='$user_lcd_kmb'";
      $result1 = mysqli_query($dbc,$query_mengembalikan) or die("Error Query Mengembalikan");
      $result2 = mysqli_query($dbc,$query_lcd) or die("Error Query LCD status");
?>


          <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body ">
                            <?php
                            $kmb_pesan="$user_lcd_kmb sudah berhasil dikembalikan";
                            echo $kmb_pesan;
                            ?>
                                <a href="/dashboard"><button type="button" class="btn waves-effect waves-light btn-success">Kembali ke Dashboard</button></a>
                          </div>
                      </div>
                  </div>
              </div>

<?php

  }
  else
  {

?>


<form  class="m-t-40" novalidate method="post" action="?kembalikanlcd">
  <div class="form-control-feedback"><small><code><?php echo $pesan;?></code>  </small></div>
  <div class="form-group">
  <h5 class="m-t-30">Pilih LCD Dikembalikan</h5>
  <select class="select2" name="lcd_id" style="width: 100%">

      <?php
      $query = "SELECT lcd_id,lcd_merk,lcd_type FROM lcd_table WHERE lcd_status = 0";
      $data  = mysqli_query($dbc,$query);
      while($row=mysqli_fetch_array($data))
      {
          $id = $row['lcd_id'];
          $merk = $row['lcd_merk'];
          $type = $row['lcd_type'];
          $lcd_option = $id."  -- ".$merk." ".$type;
          echo "<option value=\"$id\">$lcd_option</option>";
    }
      ?>

  </select></div>
  <div class="text-xs-right">
      <button type="submit" name="submit" class="btn btn-info">Kembalikan</button>
  </div>
</form>
<?php
}
mysqli_close($dbc);
?>
