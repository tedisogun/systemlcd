<?php


function editData($dbc)
{
 ?>
 <?php


 if(isset($_POST['submit']))
 {
   $mhs_nim = $_GET['id'];
   $mhs_nama = $_POST['nama'];
   $mhs_alamat = $_POST['alamat'];
   $mhs_telepon = $_POST['number'];
   $mhs_jurusan = $_POST['jurusan_id'];
   $mhs_kelamin   = ((int)$_POST['jk'])==1?1:0;
   $query = "UPDATE mahasiswa_table SET mhs_nama='$mhs_nama',mhs_alamat='$mhs_alamat',mhs_tlp='$mhs_telepon',mhs_kelamin=$mhs_kelamin,mhs_jurusan_id='$mhs_jurusan' WHERE mhs_nim='$mhs_nim' ";
   $gogogogog = mysqli_query($dbc,$query);
   $horeee = "Mahasiswa Dengan Nim: $mhs_nim berhasil di edit";
   lihatData($dbc,$horeee);


 }
 else
 {
   $mhs_nim = $_GET['id'];
   $query = "SELECT *FROM mahasiswa_table WHERE mhs_nim='$mhs_nim'";
   $data = mysqli_query($dbc,$query);
   $row  = mysqli_fetch_array($data);
   $mhs_nama = $row['mhs_nama'];
   $mhs_alamat = $row['mhs_alamat'];
   $mhs_telepon = $row['mhs_tlp'];


 ?>


 <div class="row">
     <div class="col-12">
         <div class="card">
             <div class="card-body">
                 <h4 class="card-title">Edit Data Mahasiswa</h4>

                 <form  class="m-t-40" novalidate method="post" action="?tampilmahasiswa&act=editmahasiswa&id=<?php echo $mhs_nim;?>">

                     <div class="form-group">
                         <h5>NIM<span class="text-danger">*</span></h5>
                         <div class="controls">
                             <input type="text" maxlength="10" value="<?php echo $mhs_nim;?>" name="nim" class="form-control" placeholder="nim" value="<?php echo $_POST['nim'];?>" disabled> </div>
                        </div>
                         <div class="form-group">
                         <h5>Nama <span class="text-danger">*</span></h5>
                         <div class="controls">
                             <input type="text" name="nama" class="form-control" value="<?php echo $mhs_nama;?>"> </div>
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
                             <input type="text" name="number" maxlength="12" class="form-control" value="<?php echo $mhs_telepon;?>"> </div>
                         </div>
                         <div class="form-group">
                         <h5>Alamat <span class="text-danger">*</span></h5>
                         <div class="controls">
                             <input type="text" name="alamat" class="form-control" value="<?php echo $mhs_alamat;?>"> </div>
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
 ?>




<?php
}



  function lihatData($dbc,$pesan)
  {
    ?>
    <div class="col-12">
          <div class="card">
              <div class="card-body">
                <p style="color:red"><?php echo $pesan;?></p>
                  <h4 style="text-align:center" class="card-title"></h4>
                  <div class="table-responsive">
                      <table border="no-border" class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="7"><center><h4><strong>TABEL DATA MAHASISWA<strong></h4></center></th>
                            </tr>
                        </thead>
                          <thead>
                              <tr style="background-color: white;color:red; ">
                                  <th>NIM</th>
                                  <th>Nama</th>
                                  <th>Kelamin</th>
                                  <th>Alamat</th>
                                  <th>No Telepon</th>
                                  <th>Jurusan </th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>

                      <?php
                      $query = "SELECT *FROM mahasiswa_table";
                      $data = mysqli_query($dbc,$query);

                      while($row=mysqli_fetch_array($data))
                      {
                        $mhs_nim = $row['mhs_nim'];
                        $mhs_nama = $row['mhs_nama'];
                        $mhs_kelamin = $row['mhs_kelamin']==1 ? "Laki-laki":"Perempuan";
                        $mhs_alamat = $row['mhs_alamat'];
                        $mhs_telepon = $row['mhs_tlp'];
                        $mhs_jurusan = $row['mhs_jurusan_id'];



                      ?>

                        <tr style="font-size:14px">
                          <td><?php echo $mhs_nim;  ?></td>
                          <td><?php echo $mhs_nama;  ?></td>
                          <td><?php echo $mhs_kelamin;  ?></td>
                          <td><?php echo $mhs_alamat;  ?></td>
                          <td><?php echo $mhs_telepon;  ?></td>
                          <td><?php echo $mhs_jurusan;  ?></td>
                          <td>
                              <div style="float:left;width:50%;"><a href="?tampilmahasiswa&act=editmahasiswa&id=<?php echo $mhs_nim; ?>" title="delete data"><i class="mdi mdi-lead-pencil"></i></a></div>
                              <div style="float:right;width:50%;"><a href="?tampilmahasiswa&act=deletemahasiswa&id=<?php echo $mhs_nim; ?>" title="delete data"><i class="mdi mdi-delete"></i></a></div>

                          </td>
                        </tr>

                        <?php
                        }
?>




                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
<?php
  }


    function hapusData($dbc)
    {

      $mahasiswa_nim = $_GET['id'];
      $ququery = "SELECT*FROM peminjaman_table WHERE pjm_mhs_nim='$mahasiswa_nim' AND pjm_tgl_kembali IS NULL";
      $hapushapus = mysqli_query($dbc,$ququery);

    if(mysqli_num_rows($hapushapus)==1)
    {
      $pesanxxx = "Hapus Gagal, Mahasiswa Nim: $mahasiswa_nim Masih Belum Menyelesaikan Peminjaman";
      lihatData($dbc,$pesanxxx);

    }
    else
    {
        $query112 = "DELETE FROM peminjaman_table WHERE pjm_mhs_nim='$mahasiswa_nim'";
        $go = mysqli_query($dbc,$query112);
        $query212 = "DELETE FROM mahasiswa_table WHERE mhs_nim='$mahasiswa_nim'";
        $go = mysqli_query($dbc,$query212);
        $pesanxxx ="Hapus Berhasil, Mahasiswa Nim: $mahasiswa_nim sudah dihapus";
        lihatData($dbc,$pesanxxx);
    }

    }




?>



<?php

    if(isset($_GET['act']))
    {
      if($_GET['act']=='editmahasiswa')
      {
          editData($dbc);
      }else if($_GET['act']=='deletemahasiswa')
      {
          hapusData($dbc);
      }


    }else
    {
        lihatData($dbc,"");
    }

?>
