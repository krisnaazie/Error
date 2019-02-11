<?php require_once "classes/auth.php";
      require_once "templates/header.php";
      require_once "classes/config.php";
 ?>

<br>
  <h1 class="text-center">halaman timeline</h1>
<hr>


<!-- nyapa user -->
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
          <div class="card-body text-center">
            <img src="img/<?php echo $_SESSION['user']['photo'] ?>" alt="" class="img img-responsive rounded-circle mb-3">
            <h2>halloo... <?php echo $_SESSION["user"]["name"] ?> apa kabar?</h2>
              <hr>
            <p>email: <?php echo $_SESSION["user"]["email"] ?></p>
            <a href="profil.php" class="btn btn-primary">Edit Profil</a>
            <a href="logout.php" class="btn btn-primary">logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- tutup nyapa user -->

<!-- tempat berbagi cerita -->
  <div class="container">
    <form class="col-md-7 shadow-lg p-3 mb-5 bg-white rounded" action="classes/proses-upload-cerita.php" method="post">

      <div class="form-groub">
        <label for="judul_cerita">cerita</label>
        <input type="text" name="judul_cerita" value="" class="form-control" placeholder="judul cerita">
      </div>

      <div class="form-groub">
        <p>ceritanya gimana</p>
        <textarea class="form-control" name="deskripsi" rows="8" cols="80" placeholder="gimana ceritanya...? bagikan disini dong"></textarea><br>
      </div>
      <input type="submit" class="btn btn-primary" name="bagikan-cerita" value="upload">
    </form>
  </div>
<!-- tutup tempat berbagi cerita -->

<!-- hasil cerita -->
  <div class="container">
    <?php
        $sql = "SELECT *  FROM cerita";
        $query = mysqli_query($connect_db, $sql);

        while ($cerita = mysqli_fetch_array($query)) {
          // code...
          echo '<h1>'.$cerita['judul'].'</h1>';
        }
     ?>
  </div>
<!-- tutup hasil cerita -->
<?php require_once "templates/footer.php"; ?>
