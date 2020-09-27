<ul class="navbar-nav flex-column">
    <li class="nav-divider">
        Menu
    </li>
    <li class="nav-item">
        <?php
        if ($_SESSION['status_pengguna'] == 'petugas') {
            $status_login = 'Petugas';
        } else {
            $status_login = 'Admin';
        }
        ?>
        <a class="nav-link active" href="../pages/dashboard.php?data=home"><i
                    class="fa fa-fw fa-user-circle"></i><?php echo $status_login ?><span
                    class="badge badge-success">6</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
           data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-book"></i>List Data</a>
        <div id="submenu-2" class="collapse submenu" style="">
            <ul class="nav flex-column">
                <?php
                if ($_SESSION['status_pengguna'] == 'admin') {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="list-event.php?data=event">Daftar Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-user.php?data=account">Daftar Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-galeri.php?data=galeri">Daftar Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-materi.php?data=materi">Daftar Materi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-pelajaran.php?data=pelajaran">Daftar Pelajaran</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="list-event.php?data=event">Daftar Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-galeri.php?data=galeri">Daftar Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-materi.php?data=materi">Daftar Materi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-pelajaran.php?data=pelajaran">Daftar Pelajaran</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
           data-target="#submenu-3" aria-controls="submenu-3"><i class="fa fa-plus"></i>Tambah Data</a>
        <div id="submenu-3" class="collapse submenu" style="">
            <ul class="nav flex-column">
                <?php
                if ($_SESSION['status_pengguna'] == 'admin') {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="form-user.php?action=add&data=account">Tambah Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form-event.php?action=add&data=event">Tambah Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form-galeri.php?action=add&data=galeri">Tambah Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form-materi.php?action=add&data=materi">Tambah Materi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form-pelajaran.php?action=add&data=pelajaran">Tambah Pelajaran</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="form-event.php?action=add&data=event">Tambah Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form-galeri.php?action=add&data=galeri">Tambah Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form-materi.php?action=add&data=materi">Tambah Materi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form-pelajaran.php?action=add&data=pelajaran">Tambah Pelajaran</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </li>
</ul>