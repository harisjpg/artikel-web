<?php include "config/koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog Post - Photo Perfect</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin" />
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;600;700&amp;display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;600;700&amp;display=swap" media="print" onload="this.media='all'" />
  <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;600;700&amp;display=swap" />
  </noscript>
  <link href="frontend/css/bootstrap.min.css?ver=1.2.0" rel="stylesheet">
  <link href="frontend/css/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet">
  <link href="frontend/css/main.css?ver=1.2.0" rel="stylesheet">
</head>

<body id="top">
  <div class="page">
    <header>
      <div class="pp-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container"><a href="index"><img src="frontend/images/favicon.png" alt="Logo"></a><a class="navbar-brand" href="index">Photo Perfect</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="artikel">Artikel</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <div class="page-content">
      <div class="container">
        <?php
        include 'config/koneksi.php';

        $idartikel = $_GET['id'];
        $sql = $conn->query("SELECT * FROM tb_artikel WHERE id_artikel = '$idartikel'");
        $print = $sql->fetch_object();
        ?>
        <div class="pp-section pp-container-readable">
          <div class="pp-post"><a class="h3"><?php echo $print->judul_artikel; ?></a>
            <div class="pp-post-meta mt-2">
              <ul>
                <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i><span><?php echo $print->tanggal; ?></span></li>
                <li><i class="fa fa-tags" aria-hidden="true"></i><span><span><?php echo $print->kategori; ?></span></a></span></li>
                <li><i class="fa fa-user-circle" aria-hidden="true"></i><a href="">Author: <?php echo $print->author; ?></a></li>
              </ul>
            </div><img class="img-fluid mt-3" src="assets/img/artikel/<?php echo $print->gambar_artikel; ?>" alt="Blog Image" />
          </div>
          <div class="pp-blog-details">
            <p><?php echo $print->isi_artikel; ?></p>
          </div>
        </div>
        <div class="pp-section"></div>
      </div>
    </div>
  </div>
  <footer class="pp-footer">
    <div class="container py-5">
      <div class="row text-center">
        <div class="col-md-12"><a class="pp-facebook btn btn-link" href="#"><i class="fab fa-facebook-f fa-2x " aria-hidden="true"></i></a><a class="pp-twitter btn btn-link " href="#"><i class="fab fa-twitter fa-2x " aria-hidden="true"></i></a><a class="pp-youtube btn btn-link" href="#"><i class="fab fa-youtube fa-2x" aria-hidden="true"></i></a><a class="pp-instagram btn btn-link" href="#"><i class="fab fa-instagram fa-2x " aria-hidden="true"></i></a></div>
        <div class="col-md-12">
          <p class="mt-3">Copyright &copy; Haris. All rights reserved.<br>Design - <a class="credit" href="https://templateflip.com" target="_blank">TemplateFlip</a></p>
        </div>
      </div>
    </div>
  </footer>
  <script src="frontend/scripts/jquery.min.js?ver=1.2.0"></script>
  <script src="frontend/scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
  <script src="frontend/scripts/main.js?ver=1.2.0"></script>
</body>

</html>