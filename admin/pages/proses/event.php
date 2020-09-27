<?php
$action = $_GET['action'];
if ($action == 'add') {
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $judul_pengumuman = $_POST['judul_pengumuman'];
    $penulis_pengumuman = $_POST['penulis_pengumuman'];
    $tanggal_terbit_pengumuman = $_POST['tanggal_terbit_pengumuman'];
    $deskripsi_pengumuman = $_POST['deskripsi_pengumuman'];
    $kategori_pengumuman = $_POST['kategori_pengumuman'];
    $foto_pendukung_pengumuman_satu = $_FILES['foto_pendukung_pengumuman_satu']['name'];
    $foto_pendukung_pengumuman_dua = $_FILES['foto_pendukung_pengumuman_dua']['name'];
    $pelaksanaan_kegiatan_pengumuman = $_POST['pelaksanaan_kegiatan_pengumuman'];
    $status_pengumuman = $_POST['status_pengumuman'];
    $sql = "INSERT INTO pengumuman(judul_pengumuman,penulis_pengumuman,tanggal_terbit_pengumuman,deskripsi_pengumuman,kategori_pengumuman ,pelaksanaan_kegiatan_pengumuman,status_pengumuman)VALUE('$judul_pengumuman','$penulis_pengumuman','$tanggal_terbit_pengumuman','$deskripsi_pengumuman','$kategori_pengumuman','$pelaksanaan_kegiatan_pengumuman','$status_pengumuman')";
    $simpan = mysqli_query($connect, $sql);
    // periska query apakah ada error
    if (!$simpan) {
        die ("Query gagal dijalankan: " . mysqli_errno($connect) .
            " - " . mysqli_error($connect));
    } else {
        $id = mysqli_insert_id($connect);
        if ($foto_pendukung_pengumuman_satu != "") {
            $ekstensi_diperbolehkan = array('png', 'jpg','jpeg'); //ekstensi file gambar yang bisa diupload
            $x = explode('.', $foto_pendukung_pengumuman_satu); //memisahkan nama file dengan ekstensi yang diupload
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['foto_pendukung_pengumuman_satu']['tmp_name'];
            $angka_acak = rand(1, 999);
            $nama_gambar_baru_1 = $angka_acak . '-' . $foto_pendukung_pengumuman_satu; //menggabungkan angka acak dengan nama file sebenarnya
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                move_uploaded_file($file_tmp, '../upload/gambar-event/' . $nama_gambar_baru_1); //memindah file gambar ke folder gambar
                // jalankan query UPDATE untuk menambah data ke database
                $sql = "UPDATE pengumuman SET foto_pendukung_pengumuman_satu='$nama_gambar_baru_1' WHERE id_pengumuman='$id'";
                $simpan = mysqli_query($connect, $sql);
                // periska query apakah ada error
                if (!$simpan) {
                    die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                        " - " . mysqli_error($connect));
                } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    if ($foto_pendukung_pengumuman_dua != "") {
                        $ekstensi_diperbolehkan = array('png', 'jpg','jpeg'); //ekstensi file gambar yang bisa diupload
                        $x = explode('.', $foto_pendukung_pengumuman_dua); //memisahkan nama file dengan ekstensi yang diupload
                        $ekstensi = strtolower(end($x));
                        $file_tmp = $_FILES['foto_pendukung_pengumuman_dua']['tmp_name'];
                        $angka_acak = rand(1, 999);
                        $nama_gambar_baru_2 = $angka_acak . '-' . $foto_pendukung_pengumuman_dua; //menggabungkan angka acak dengan nama file sebenarnya
                        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                            move_uploaded_file($file_tmp, '../upload/gambar-event/' . $nama_gambar_baru_2); //memindah file gambar ke folder gambar
                            // jalankan query UPDATE untuk menambah data ke database
                            $sql = "UPDATE pengumuman SET foto_pendukung_pengumuman_dua='$nama_gambar_baru_2' WHERE id_pengumuman='$id'";
                            $simpan = mysqli_query($connect, $sql);
                            // periska query apakah ada error
                            if (!$simpan) {
                                die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                                    " - " . mysqli_error($connect));
                            } else {
                                //tampil alert dan akan redirect ke halaman index.php
                                //silahkan ganti index.php sesuai halaman yang akan dituju
                                header('location: ../list-event.php?data=event');
                                echo "<script>alert('Data berhasil ditambah.');window.location='../list-event.php?data=event';</script>";
                            }
                        } else {
                            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../list-event.php?data=event';</script>";
                        }
                    }
                }
            } else {
                //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../list-event.php?data=event';</script>";
            }
        }
    }
} else {
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../list-event.php?data=event';</script>";
}
if ($action == 'edit') {
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $id = $_POST['id_pengumuman'];
    $judul_pengumuman = $_POST['judul_pengumuman'];
    $penulis_pengumuman = $_POST['penulis_pengumuman'];
    $tanggal_terbit_pengumuman = $_POST['tanggal_terbit_pengumuman'];
    $deskripsi_pengumuman = $_POST['deskripsi_pengumuman'];
    $kategori_pengumuman = $_POST['kategori_pengumuman'];
    $foto_pendukung_pengumuman_satu = $_FILES['foto_pendukung_pengumuman_satu']['name'];
    $foto_pendukung_pengumuman_dua = $_FILES['foto_pendukung_pengumuman_dua']['name'];
    $pelaksanaan_kegiatan_pengumuman = $_POST['pelaksanaan_kegiatan_pengumuman'];
    $status_pengumuman = $_POST['status_pengumuman'];
    $sql = "UPDATE pengumuman SET judul_pengumuman='$judul_pengumuman',penulis_pengumuman='$penulis_pengumuman',tanggal_terbit_pengumuman='$tanggal_terbit_pengumuman ',deskripsi_pengumuman='$deskripsi_pengumuman ',kategori_pengumuman='$kategori_pengumuman',pelaksanaan_kegiatan_pengumuman='$pelaksanaan_kegiatan_pengumuman',status_pengumuman='$status_pengumuman' WHERE id_pengumuman='$id'";
    $simpan = mysqli_query($connect, $sql);
    // periska query apakah ada error
    if (!$simpan) {
        die ("Query gagal dijalankan: " . mysqli_errno($connect) .
            " - " . mysqli_error($connect));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        if ($foto_pendukung_pengumuman_satu != "") {
            $ekstensi_diperbolehkan = array('png', 'jpg','jpeg'); //ekstensi file gambar yang bisa diupload
            $x = explode('.', $foto_pendukung_pengumuman_satu); //memisahkan nama file dengan ekstensi yang diupload
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['foto_pendukung_pengumuman_satu']['tmp_name'];
            $angka_acak = rand(1, 999);
            $nama_gambar_baru_1 = $angka_acak . '-' . $foto_pendukung_pengumuman_satu; //menggabungkan angka acak dengan nama file sebenarnya
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                move_uploaded_file($file_tmp, '../upload/gambar-event/' . $nama_gambar_baru_1); //memindah file gambar ke folder gambar
                // jalankan query UPDATE untuk menambah data ke database
                $sql = "UPDATE pengumuman SET foto_pendukung_pengumuman_satu='$nama_gambar_baru_1' WHERE id_pengumuman='$id'";
                $simpan = mysqli_query($connect, $sql);
                // periska query apakah ada error
                if (!$simpan) {
                    die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                        " - " . mysqli_error($connect));
                } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    if ($foto_pendukung_pengumuman_dua != "") {
                        $ekstensi_diperbolehkan = array('png', 'jpg','jpeg'); //ekstensi file gambar yang bisa diupload
                        $x = explode('.', $foto_pendukung_pengumuman_dua); //memisahkan nama file dengan ekstensi yang diupload
                        $ekstensi = strtolower(end($x));
                        $file_tmp = $_FILES['foto_pendukung_pengumuman_dua']['tmp_name'];
                        $angka_acak = rand(1, 999);
                        $nama_gambar_baru_2 = $angka_acak . '-' . $foto_pendukung_pengumuman_dua; //menggabungkan angka acak dengan nama file sebenarnya
                        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                            move_uploaded_file($file_tmp, '../upload/gambar-event/' . $nama_gambar_baru_2); //memindah file gambar ke folder gambar
                            // jalankan query UPDATE untuk menambah data ke database
                            $sql = "UPDATE pengumuman SET foto_pendukung_pengumuman_dua='$nama_gambar_baru_2' WHERE id_pengumuman='$id'";
                            $simpan = mysqli_query($connect, $sql);
                            // periska query apakah ada error
                            if (!$simpan) {
                                die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                                    " - " . mysqli_error($connect));
                            } else {
                                header('location: ../list-event.php?data=event');
                                echo "<script>alert('Data berhasil ditambah dan Gambar Null.');window.location='../list-event.php?data=event';</script>";
                            }
                        }
                    } else {
                        //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../list-event.php?data=event';</script>";
                    }
                }
            }
        } else {
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../list-event.php?data=event';</script>";
        }
    }
}
if ($action == 'delete') {
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $id = $_GET['id'];
    $sql = "DELETE FROM pengumuman WHERE id_pengumuman='$id'";
    $simpan = mysqli_query($connect, $sql);
    if ($simpan == true) {
        header('location: ../list-event.php?data=event');
        echo "<script>alert('Berhasil dihapus');window.location='../list-event.php?data=event';</script>";
    } else {
        echo "<script>alert('Gagal menghapus.');window.location='../list-event.php?data=event';</script>";
    }
}