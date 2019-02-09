<?php

session_start();

if(isset($_SESSION['username']))
{
    include "config/dbconnect.php";
    $id_peminjaman = intval($_GET['idpjm']);
    $query = "SELECT pjm_lcd_id FROM peminjaman_table WHERE pjm_id=$id_peminjaman";
    $data = mysqli_query($dbc,$query);
    $row = mysqli_fetch_array($data);
    $lcdid = $row['pjm_lcd_id'];
    $query = "UPDATE lcd_table SET lcd_status=1 WHERE lcd_id='$lcdid'";
    $data = mysqli_query($dbc,$query);

    $query = "DELETE FROM peminjaman_table WHERE pjm_id=$id_peminjaman";
    $data = mysqli_query($dbc,$query);

    header('location: /dashboard');

}
else
{
  header('location: /login.php');
}

?>
