<?php
require '../conn.php';

$id_penjaga = $_GET["id_penjaga"];
$dataPenjaga = tampil("SELECT * FROM penjaga WHERE id_penjaga = '$id_penjaga'");

if (isset($_POST["submit"])) {
    if ( updatePenjaga($_POST) > 0 ) {
        echo "<script>
            alert('Data Berhasil Di update')
            document.location.href = '../penjaga.php'
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Di Update')
            document.location.href = '../penjaga.php'
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
        <title>Forms Update Penjaga</title>
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
        <script>
        $(function(){
        CKEDITOR.replace('ckeditor1');
        });
        
        </script>
    </head>
    <body>
        <?php foreach ($dataPenjaga as $penjaga): ?>
        <div class="col-lg-6 offset-lg-3 mt-5 mb-5">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Form</strong> Update Penjaga
                </div>
                <div class="card-body card-block">
                    <form action="" method="post" class="form-horizontal" id="formtambah" enctype="multipart/form-data">
                        <!-- Nama Penjaga -->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class="form-control-label">Nama Penjaga</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="nama_penjaga" placeholder="Masukkan Nama..." class="form-control" autocomplete="off" value="<?= $penjaga["nama_penjaga"] ?>" autofocus>
                                <small class="form-text text-muted">Judul Yang Tepat Untuk Buku Anda</small>
                            </div>
                        </div>
                        <!-- Alamat Penjaga -->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class="form-control-label">Alamat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="alamat_penjaga" placeholder="Masukkan Alamat..." class="form-control" autocomplete="off" value="<?= $penjaga["alamat_penjaga"] ?>" autofocus>
                                <small class="form-text text-muted">Alamat Penjaga</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="file-input" class=" form-control-label">Foto Penjaga</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="file-input" name="gambar_penjaga" class="form-control-file">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class="form-control-label">No Telepon</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="noTelp_penjaga" placeholder="Masukkan Telepon..." class="form-control" autocomplete="off" value="<?= $penjaga["noTelp_penjaga"] ?>" autofocus>
                                <small class="form-text text-muted">Telepon Penjaga</small>
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
        <!-- JAVASCRIPT -->
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/ckeditor/ckeditor.js"></script>
    </html>