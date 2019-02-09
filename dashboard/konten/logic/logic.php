<?php

    $query_count_row = "SELECT COUNT(*) AS jumlah FROM lcd_table where lcd_status=1";
    $data = mysqli_query($dbc,$query_count_row) ;
    $row = mysqli_fetch_array($data);
    $jumlahlcd_tersedia =((int) $row['jumlah']);
    $query_count_row = "SELECT COUNT(*) AS jumlah FROM lcd_table where lcd_status=0";
    $data = mysqli_query($dbc,$query_count_row) ;
    $row = mysqli_fetch_array($data);
    $jumlahlcd_dipinjam = ((int) $row['jumlah']);

    if(isset($_GET['pinjamlcd']) && $jumlahlcd_tersedia>0)
    {
          include "pinjam.php";
    }
    else if(isset($_GET['kembalikanlcd']) && $jumlahlcd_dipinjam>0)
    {
        include "kembali.php";
    }
    else if(isset($_GET['tampilkanlcd']))
    {
            include "tampil_lcd.php";
    }

    else if(isset($_GET['tambahlcd']))
    {
            include "tambah_lcd.php";
    }
    else if(isset($_GET['hapuslcd']) && $jumlahlcd_tersedia>0)
    {
         include "hapus_lcd.php";
    }
    else if(isset($_GET['tampilmahasiswa']))
    {
        include "tampil_mahasiswa.php";
    }
    else if(isset($_GET['editmahasiswa']))
    {
        include "edit_mahasiswa.php";
    }

    else
    {
        include "page-content.php";
    }

?>