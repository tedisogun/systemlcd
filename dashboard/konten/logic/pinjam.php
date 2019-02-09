<?php

$pesan="";
$data_valid = false;
$data_valid_message;
if(isset($_POST['submit']))
{
    if( !empty($_POST['jk']) && !empty($_POST['lcd_id']) &&!empty($_POST['nim']) && !empty($_POST['nama']) && !empty($_POST['number']) && !empty($_POST['alamat']) && !empty($_POST['jurusan_id']))
    {

            if((strlen($_POST['nim'])==10) && (strlen($_POST['number'])==12))
            {
               $user_lcd_pjm = mysqli_real_escape_string($dbc,trim($_POST['lcd_id']));
               $user_nim = mysqli_real_escape_string($dbc,trim($_POST['nim']));
               $user_nama = mysqli_real_escape_string($dbc,trim($_POST['nama']));
               $user_jk = (int)mysqli_real_escape_string($dbc,trim($_POST['jk']));
               if($user_jk==2)
               {
                 $user_jk =0;
               }
               $user_number = mysqli_real_escape_string($dbc,trim($_POST['number']));
               $user_alamat = mysqli_real_escape_string($dbc,trim($_POST['alamat']));
               $user_jurusan = mysqli_real_escape_string($dbc,trim($_POST['jurusan_id']));

                    $query_cek_nim = "SELECT *FROM mahasiswa_table WHERE mhs_nim='$user_nim'";
                    $result_cek_nim = mysqli_query($dbc,$query_cek_nim) or die("Gagal Query Cek Nim");

                     if(mysqli_num_rows($result_cek_nim) == 1)
                     {
                        $query_cek_peminjaman = "SELECT*FROM peminjaman_table WHERE pjm_mhs_nim='$user_nim' AND pjm_tgl_kembali IS NULL";
                        $resultcp = mysqli_query($dbc,$query_cek_peminjaman) or die("Error Query cek Peminjaman");
                        if(mysqli_num_rows($resultcp)==1)
                        {
                          $data_valid_message = "Gagal, Mahasiswa NIM: $user_nim dengan Nama $user_nama harus mengembalikan Peminjaman Sebelumnya Sebelum Meminjam Kembali";
                        }
                        else
                        {
                        $query_peminjaman = "INSERT INTO peminjaman_table(pjm_lcd_id,pjm_mhs_nim,pjm_adm_username,pjm_tgl_pinjam) VALUES ('$user_lcd_pjm','$user_nim','$adm_username',NOW())";
                        $done = mysqli_query($dbc,$query_peminjaman) or die("Gagal Query Data Peminjaman");
                        $query_lcd = "UPDATE lcd_table SET lcd_status=0 WHERE lcd_id='$user_lcd_pjm'";
                        $pmj_succesdb = mysqli_query($dbc,$query_lcd);
                      }
                     }
                     else
                     {
                        $query_simpan_mhs = "INSERT INTO mahasiswa_table VALUES('$user_nim','$user_nama',$user_jk,'$user_alamat','$user_number','$user_jurusan')";
                        $done_save_mhs = mysqli_query($dbc,$query_simpan_mhs) or die("Gagal Query Simpan Data Mahasiswa");
                        $query_peminjaman = "INSERT INTO peminjaman_table(pjm_lcd_id,pjm_mhs_nim,pjm_adm_username,pjm_tgl_pinjam) VALUES ('$user_lcd_pjm','$user_nim','$adm_username',NOW())";
                        $done = mysqli_query($dbc,$query_peminjaman) or die("Gagal Query Data Peminjaman");
                        $query_lcd = "UPDATE lcd_table SET lcd_status=0 WHERE lcd_id='$user_lcd_pjm'";
                        $pmj_succesdb = mysqli_query($dbc,$query_lcd);

                     }

                     $data_valid = true;


            }
            else
            {
                $pesan = "Gagal ~ nim harus tepat 10 digit dan nomor telephon harus tepat 12 digit";
            }


    }
    else
    {
      $pesan = "Lengkapi Semua Kolom";
    }
}


if($data_valid==true)
{
?>
<br>
<br>
<div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body ">
                            <?php
                              if(empty($data_valid_message))
                                echo "Peminjaman Telah Berhasil Dilakukan";
                              else
                                echo $data_valid_message;
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Unit LCD ke Sistem</h4>
                <h6 class="card-subtitle">Data LCD bisa di cek <a href="http://reactiveraven.github.io/jqBootstrapValidation/">halaman data LCD </a></h6>

                <form  class="m-t-40" novalidate method="post" action="?pinjamlcd">
                  <div class="form-control-feedback"><small><code><?php echo $pesan;?></code>  </small></div>
                  <div class="form-group">
                  <h5 class="m-t-30">Pilih LCD</h5>
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
                        <h5>NIM<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" maxlength="10"  name="nim" class="form-control" placeholder="nim" value="<?php echo $_POST['nim'];?>"> </div>
                       </div>
                        <div class="form-group">
                        <h5>Nama <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="nama" class="form-control" value="<?php echo $_POST['nama'];?>"> </div>
                        </div>
                        <div class="form-group">
                        <h5>Jenis Kelamin <span class="text-danger">*</span></h5>
                        <select  class="select2" name="jk" style="width: 100%">
                          <option value="1">Laki-laki</option>
                          <option value="2">Perempuan</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <h5>No Telp <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="number" maxlength="12" class="form-control" value="<?php echo $_POST['number'];?>"> </div>
                        </div>
                        <div class="form-group">
                        <h5>Alamat <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="alamat" class="form-control" value="<?php echo $_POST['alamat'];?>"> </div>
                        </div>


                        <div class="form-group">
                        <h5 class="m-t-30">Pilih Jurusan</h5>
                        <select class="select2" name="jurusan_id" style="width: 100%">

                            <?php
                            for($i=1;$i<=7;$i++)
                            {
                                $query_fk = "SELECT fakultas_id,fakultas_nama FROM fakultas_table WHERE no=$i";
                                $hasil = mysqli_query($dbc,$query_fk);
                                $row   = mysqli_fetch_array($hasil);
                                echo "<optgroup label=\"".$row['fakultas_nama']."\">";
                                $query_jr = "SELECT jurusan_id,jurusan_nama FROM jurusan_table WHERE jurusan_fakultas_id='".$row['fakultas_id']."'";
                                $result = mysqli_query($dbc,$query_jr);
                                while($row=mysqli_fetch_array($result))
                                {
                                  echo "<option value=\"".$row['jurusan_id']."\">".$row['jurusan_nama']."</option>";
                                }

                                echo "  </optgroup>";
                          }

                            ?>







                        </select></div>

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

    mysqli_close($dbc);
?>
