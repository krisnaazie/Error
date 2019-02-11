<?php require_once "templates/header.php"; ?>
<?php

  require_once("classes/config.php");

  if(isset($_POST['register'])){
    //filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING );
    //enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    //menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password)
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    //bind parameter ke query
    $params = array(
      ":name" => $name,
      ":username" => $username,
      ":password" => $password,
      ":email" => $email
    );

    //eksekusi query untuk menyimpan ke db
    $saved = $stmt->execute($params);

    //jika query simpan berhasil, maka user sudah terdaftar
    //maka alikan ke halaman login
    if($saved) header("location: login.php");
  }
 ?>



<br>
  <h1>Halaman register</h1>
<!-- alert jika gagal -->

<!--alert tutup -->


    <div class="container">
      <fieldset>
        <form class="" action="" method="POST">
          <div class="form-group">
            <label for="">nama lengkap mu</label>
            <input type="text" name="name" value="" placeholder="nama lengkap mu" class="form-control"><br>
          </div>

          <div class="form-group">
            <label for="">username</label>
            <input type="text" name="username" value="" placeholder="username" class="form-control"><br>
          </div>

          <div class="form-group">
            <label for="">password</label>
            <input type="password" name="password" value="" placeholder="password" class="form-control"><br>
          </div>

          <div class="form-group">
            <label for="">email</label>
            <input type="email" name="email" value="" placeholder="email" class="form-control"><br>
          </div>

          <input type="submit" name="register" value="Daftar" placeholder="kirim" class="btn btn-success btn-block">
          <input type="reset" name="" value="reset" placeholder="reset" class="btn btn-primary btn-block">
        </form>
      </fieldset>
    </div>


<?php require_once "templates/footer.php" ?>
