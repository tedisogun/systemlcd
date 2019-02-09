<?php
$username = $_SESSION['username'];
?>

<div class="scroll-sidebar">
    <!-- User profile -->
    <div class="user-profile" style="background: url(../assets/images/background/user-info.jpg) no-repeat;">
        <!-- User profile image -->
        <div class="profile-img"> <img src="../assets/images/admin/<?php echo $username;?>.jpg" alt="user" /> </div>
        <!-- User profile text-->
        <div class="profile-text"> <a href="#" class=" u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?php echo $username;?></a>

        </div>
    </div>
    <!-- End User profile text-->
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
          
            <li> <a class=" waves-effect waves-dark" href="/dashboard" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">DASHBOARD</span></a>
            </li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-minus"></i><span class="hide-menu">Data LCD</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="?tampilkanlcd">Tampilkan Data LCD</a></li>
                    <li><a href="?tambahlcd">Tambah LCD</a></li>
                    <li><a href="?hapuslcd">Hapus LCD</a></li>
                </ul>
            </li>
            <li>
                <a class=" waves-effect waves-dark" href="/dashboard?tampilmahasiswa" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Data Mahasiswa</span></a>

            </li>
            <li class="nav-devider"></li>


        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
<!-- Bottom points-->

<!-- End Bottom points-->
