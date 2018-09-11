<?php 
require '../conn.php';

$id_peminjam = $_GET["id_peminjam"];
$dataKelas = tampil("SELECT * FROM kelas");
$dataPeminjam = tampil("SELECT * FROM peminjam INNER JOIN kelas ON peminjam.id_kelas = kelas.id_kelas WHERE id_peminjam = '$id_peminjam'");

if (isset($_POST["submit"])) {
    if ( updatePeminjam($_POST) > 0 ) {
        echo "<script>
            alert('Berhasil Mengupdate Data')
            document.location.href = '../peminjam.php'
        </script>";
    } else {
        echo "<script>
            alert('Gagal Mengupdate Data')
            document.location.href = '../peminjam.php'
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <!-- Title Page-->
    <title>Forms Update Peminjam</title>
    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">
    <!-- CSS SHAKE -->
    <link rel="stylesheet" type="text/css" href="http://csshake.surge.sh/csshake-slow.min.css">
    </head>
    <body>
        <?php foreach ($dataPeminjam as $peminjam): ?>
       <div class="col-lg-6 offset-lg-3 mt-5 mb-5">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Form</strong> Update Peminjam
                </div>
                <div class="card-body card-block">
                    <form action="" method="post" class="form-horizontal" id="formtambah" enctype="multipart/form-data">
                        <!-- JUDUL BUKU -->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class="form-control-label">Nama Peminjam</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="nama_peminjam" placeholder="Masukkan Judul..." class="form-control" autocomplete="off" value="<?= $peminjam["nama_peminjam"] ?>" autofocus>
                                <small class="form-text text-muted">Silahkan Isi Nama Peminjam</small>
                            </div>
                        </div>
                        <!-- PENERBIT -->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class="form-control-label">Alamat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="alamat_peminjam" placeholder="Masukkan Judul..." class="form-control" autocomplete="off" value="<?= $peminjam['alamat_peminjam'] ?>" autofocus>
                                <small class="form-text text-muted">Silahkan Masukkan Alamat Peminjam</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class="form-control-label">Telp</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="noTelp_peminjam" placeholder="Masukkan Judul..." class="form-control" autocomplete="off" value="<?= $peminjam['noTelp_peminjam'] ?>" autofocus>
                                <small class="form-text text-muted">Silahkan Masukkan Telepon peminjam</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="file-input" class=" form-control-label">Gambar Peminjam</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="file-input" name="foto_peminjam" class="form-control-file">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class="form-control-label">Kelas</label>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <select name="id_kelas" id="select" class="form-control">
                                        <option value="<?= $peminjam['id_kelas'] ?>"><?= $peminjam['nama_kelas'] . " (TERPILIH)" ?></option>
                                    <?php foreach ($dataKelas as $kelas): ?>
                                        <option value="<?= $kelas["id_kelas"] ?>" ><?= $kelas["nama_kelas"] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" name="submit">
                            <i class="fa fa-dot-circle-o"></i> Update
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm" onclick="reset()">
                            <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </body>
    <script>
    $(function(){
    CKEDITOR.replace('ckeditor1');
    });
    
    </script>
</html>