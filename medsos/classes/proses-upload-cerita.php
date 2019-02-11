<?php
  require_once "config.php";
  require_once "auth.php";

  //ngecek tombolnya diklick apa blom?
  if(isset($_POST['bagikan_cerita'])){

    //ambil data dari cerita
    $judul_cerita = filter_input(INPUT_POST, 'judul', FILTER_SANITIZE_STRING);
    $deskripsi = filter_input(INPUT_POST, 'deskripsi', FILTER_SANITIZE_STRING );

    //buat query
    $sql = "INSERT INTO cerita (judul, deskripsi) VALUE('$judul_cerita', '$deskripsi')";
    $query_cerita = mysqli_query($connect_db, $sql);

    //ngecek query
    if ($query_cerita) {
      //kalo berhasil kasih tanda alert success
      echo '<div class="alert alert-success">berhasil menambahkan cerita</div>';
    }else {
      //kalo gagal kasi tanda alert danger
      echo '<div class"alert alert-danger">gagal menambahkan cerita</div>';
    }

  }else{
    die("akses dilarang...");
  }

 ?>
