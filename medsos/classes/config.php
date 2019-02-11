<?php
  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "mystory";

  try{
    //membuat koneki PDO
    $connect_db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
  }catch(PDOException $e){
    //menujukan jika error
    die("Terjadi Masalah: ". $e->getMassage());
  }
 ?>
