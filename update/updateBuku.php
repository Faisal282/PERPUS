<?php
require '../conn.php';
$dataGenre = tampil("SELECT * FROM genre");
$id_buku = $_GET["id_buku"];
$dataBuku = tampil("SELECT * FROM buku INNER JOIN genre
ON buku.id_genre = genre.id_genre WHERE id_buku = '$id_buku'"); // menampilkan nama genre dari id
if (isset($_POST["submit"])) {
if (updateBuku($_POST) > 0) {
echo '<script>alert("Data Berhasil Diupdate")
document.location.href = "../index.php"
</script>';
} else {
echo '<script>alert("data gagal Diupdate")
document.location.href = "../index.php"
</script>';
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
    <title>Forms Update Buku</title>
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
        <?php foreach ($dataBuku as $buku): ?>
        <div class="col-lg-6 offset-lg-3 mt-5 mb-5">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Form</strong> update
                </div>
                <div class="card-body card-block">
                    <form action="" method="post" class="form-horizontal" id="formtambah" enctype="multipart/form-data">
                        <!-- JUDUL BUKU -->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class="form-control-label">Judul Buku</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="judul_buku" placeholder="Masukkan Judul..." class="form-control" autocomplete="off" value="<?= $buku["judul_buku"] ?>" autofocus>
                                <small class="form-text text-muted">Judul Yang Tepat Untuk Buku Anda</small>
                            </div>
                        </div>
                        <!-- PENERBIT -->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class="form-control-label">PENERBIT</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="penerbit" placeholder="Masukkan Penerbit..." class="form-control" autocomplete="off" value="<?= $buku["penerbit"] ?>">
                                <small class="form-text text-muted">Penerbit Yang tertera Di BUKU</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="file-input" class=" form-control-label">Gambar Buku</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="file-input" name="gambar_buku" class="form-control-file">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class="form-control-label">GENRE</label>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <select name="id_genre" id="select" class="form-control">
                                    <option value="<?= $buku['id_genre'] ?>"><?= $buku['genre'] ?></option>
                                    <?php foreach ($dataGenre as $genre): ?>
                                    <option value="<?= $genre["id_genre"] ?>" ><?= $genre["genre"] ?></option>
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
            <?php endforeach ?>
        </body>
        <!-- JAVASCRIPT -->
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/ckeditor/ckeditor.js"></script>
    </html>