<?php require_once "classes/auth.php";
      require_once "templates/header.php";
?>
<br>
<div class="container">
  <h1>halaman profil</h1>
  <hr>
  <ul>
    <li>username: <?php echo $_SESSION['user']['name']; ?></li>
    <li>email: <?php echo $_SESSION['user']['email']; ?></li>
  </ul>
</div>

<?php require_once "templates/footer.php" ?>
