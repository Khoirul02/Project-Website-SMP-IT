 <?php
$data = $_GET['data'];
if ($data == 'event') {
    $title_status = '';
    $title = 'Pengumuman';
} elseif ($data == 'account') {
    $title_status = '';
    $title = 'Akun';
} elseif ($data == 'galeri') {
    $title_status = '';
    $title = 'Galeri';
} elseif ($data == 'home') {
    $title_status = '';
    $title = 'Beranda';
}elseif($data == 'materi'){
    $title_status = '';
    $title = 'Materi';
}elseif($data == 'pelajaran'){
    $title_status = '';
    $title = 'Mata Pelajaran';
}
?>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Data
                <?php echo $title_status; ?>
                <?php echo $title ?></h2>
            <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel
                mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">List</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data <?php echo $title ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
