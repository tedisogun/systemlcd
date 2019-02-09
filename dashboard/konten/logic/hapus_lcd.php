<?php

  $hapus_berhasil = false;
  $hapus_pesan="";
  if(isset($_POST['submit']))
  {

      if(!empty($_POST['lcd_id']) && !empty($_POST['password']))
      {
        $user_hapus_password = mysqli_real_escape_string($dbc,trim($_POST['password']));

        $query_cek_pass = "SELECT adm_password FROM admin_table WHERE adm_username='$adm_username' AND adm_password='$user_hapus_password'";
        $queryhapuslcd = mysqli_query($dbc,$query_cek_pass);

        if(mysqli_num_rows($queryhapuslcd)==1)
        {
            $lcd_hapus_now = mysqli_real_escape_string($dbc,trim($_POST['lcd_id']));
            $queryhpsdta_peminjaman = "DELETE FROM peminjaman_table WHERE pjm_lcd_id ='$lcd_hapus_now'";
            $resulthapus = mysqli_query($dbc,$queryhpsdta_peminjaman);
            $query_hapus_table_lcd = "DELETE FROM lcd_table WHERE lcd_id = '$lcd_hapus_now'";
            $resulthapus = mysqli_query($dbc,$query_hapus_table_lcd);
            $hapus_berhasil = true;
        }
        else {
          $hapus_pesan ="Password SALAH";
        }

      }
      else {
        $hapus_pesan="Jangan Lupa Memasukan Password";
      }




  }


  if($hapus_berhasil==true)
  {


    ?>


              <div class="row">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-body ">
                                <?php
                                $lcddddd= $_POST['lcd_id'];
                                echo "$lcddddd SUDAH BERHASIL DIHAPUS";
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


<form  class="m-t-40" novalidate method="post" action="?hapuslcd">
  <div class="form-control-feedback"><small><code><?php echo $pesan;?></code>  </small></div>
  <div class="form-group">
    <span class="text-danger"><?php echo $hapus_pesan; ?></span></h5>
  <h5 class="m-t-30">Pilih LCD yang Ingin Dihapus</h5>
  <select class="select2" name="lcd_id" style="width: 100%">

      <?php
      $query = "SELECT lcd_id,lcd_merk,lcd_type FROM lcd_table WHERE lcd_status = 1";
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
  <div class="form-group">
      <h5>Password Admin<span class="text-danger">*</span></h5>
      <div class="controls">
          <input type="password" name="password" class="form-control"> </div>
  </div>
  <div class="text-xs-right">
      <button type="submit" name="submit" class="btn btn-info">Hapus LCD</button>
  </div>
</form>
<?php
}
mysqli_close($dbc);
?>
