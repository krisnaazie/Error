<?php require_once "templates/header.php"; ?>
<?php

 require_once("classes/config.php");

 if(isset($_POST['login'])){

   $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
   $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

   $sql = "SELECT * FROM users WHERE username=:username or email=:email";
   $stmt = $connect_db->prepare($sql);

   //bind parameter ke HttpQueryString
   $params = array(
     ":username" => $username,
     ":email" => $username
   );

   $stmt->execute($params);

   $user = $stmt->fetch(PDO::FETCH_ASSOC);

   //jika user terdaftar
   if($user){
     //verifikasi password
     if(password_verify($password, $user["password"])){
       //buat session
       session_start();
       $_SESSION["user"] = $user;
       //login sukses, alihkan ke halaman timeline
       header("location: timeline.php");
     }
   }
 }
?>
<!-- content -->

  <div class="container">
    <div class="jumbotron">
      <form class="" action="" method="post">
        <div class="form-group">
          <label for="username">username atau email</label>
          <input type="text" name="username" value="" class="form-control" placeholder="username atau emails">
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" value="" class="form-control" placeholder="password">
        </div>

        <div class="form-group">
          <input type="submit" name="login" value="masuk" class="btn btn-success btn-block">
        </div>

      </form>
    </div>
  </div>

<!-- tutup content -->
<?php require_once "templates/footer.php"; ?>
