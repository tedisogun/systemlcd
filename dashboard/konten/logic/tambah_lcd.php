<?php

 $pesan="GAGAL MENYIMPAN - Anda Harus Melengkapi Semua FORM";
 $succes=false;
if(isset($_POST['submit']))
{
  if(!empty($_POST['merk']) && !empty($_POST['type']) && !empty($_POST['password']) && !empty($_FILES['gambar']['tmp_name']))
  {

              $user_username = $_SESSION['username'];
              $user_password = mysqli_real_escape_string($dbc,trim($_POST['password']));
              $query = "SELECT *FROM admin_table WHERE adm_username ='$user_username' AND adm_password='$user_password'";
              $data = mysqli_query($dbc,$query) or die("query gagal");

              if(mysqli_num_rows($data)==1)
              {
                $query_count_row = "SELECT lcd_id FROM lcd_table ORDER BY lcd_id DESC LIMIT 1";
                $data = mysqli_query($dbc,$query_count_row) ;
                $row = mysqli_fetch_array($data);
                $jumlah =((int) substr($row['lcd_id'], -1) )+1;
                $lcd_id = "LCD00$jumlah";
                $lcd_merk = mysqli_real_escape_string($dbc,trim($_POST['merk']));
                $lcd_type = mysqli_real_escape_string($dbc,trim($_POST['type']));
                $user_file = $_FILES['gambar']['type'];
                $lcd_image_type = substr_replace($user_file,'',0,6);
                $lcd_image_name = "$lcd_id.$lcd_image_type";
                $path_image = "/var/www/pinjamlcd/assets/images/lcd/$lcd_image_name";

                $query_simpan = "INSERT INTO lcd_table VALUES('$lcd_id','$lcd_merk','$lcd_type','$lcd_image_name','$user_username',1)";
                $data = mysqli_query($dbc,$query_simpan);
                move_uploaded_file($_FILES['gambar']['tmp_name'],$path_image);
                $succes=true;
              }
              else{
                $pesan ="Password Salah";
              }
              mysqli_close($dbc);


  }
  else
  {
      $pesan = "Lengkapi Semua Form";
  }
}



if($succes===true)
{
?>
<br>
<br>
<div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body ">
                              Data LCD Berhasil Ditambahkan
                                <a href="/dashboard"><button type="button" class="btn waves-effect waves-light btn-success">Kembali ke Dashboard</button></a>
                          </div>
                      </div>
                  </div>
              </div>

<?php

}
else {



?>
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Unit LCD ke Sistem</h4>
                <h6 class="card-subtitle">Data LCD bisa di cek <a href="http://pinjamlcd.site/dashboard/?tampilkanlcd">halaman data LCD </a></h6>

                <form enctype="multipart/form-data" class="m-t-40" novalidate method="post" action="?tambahlcd">
                  <div class="form-control-feedback"><small><code><?php echo $pesan;?></code>  </small></div>
                    <div class="form-group">
                        <h5>Merk LCD <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="merk" class="form-control" value="<?php echo $_POST['merk'];?>"> </div>

                    </div>
                    <div class="form-group">
                        <h5>Type LCD <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="type" class="form-control" value="<?php echo $_POST['type'];?>"> </div>
                    </div>
                      <div class="form-group">

                          <div class="card">
                              <div class="card-body">
                                  <h4 class="card-title">Gambar LCD</h4>
                                  <input type="file" accept="image/*" name="gambar" id="input-file-max-fs" class="dropify" data-max-file-size="1M" />
                              </div>
                          </div>

                      </div>
                    <div class="form-group">
                        <h5>Password Admin<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" name="password" class="form-control"> </div>
                    </div>

                    <div class="text-xs-right">
                        <button type="submit" name="submit" class="btn btn-info">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
