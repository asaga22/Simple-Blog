<?php
require_once "core/init.php";

if(isset($_SESSION['user'])){
  header('Location: index.php');
}else{

$error = '';

if(isset($_POST['submit'])){
  $un = $_POST['username'];
  $pass = $_POST['password'];

  if (!empty(trim($un)) && !empty(trim($pass))) {

    if(register_cek_username($un)){
      if(register_user($un, $pass)){
        $_SESSION['user'] = $un;
        header('Location: index.php');
      } else{
        $error = 'ada masalah saat daftar';
      }
    }else{
      $error = 'username yang didaftarkan sudah digunakan';
    }
  }else{
    $error = 'username dan password wajib diisi!';
  }
}

require_once "view/header.php";
?>

<form action="" method="post">
  <label for="username">username</label><br>
  <input type="text" name="username" value=""><br><br>

  <label for="password">password</label><br>
  <input name="password" name="password" value=""><br><br>

  <div id="error"> <?=$error ?> </div><br>

  <input type="submit" name="submit" value="register">
</form>

<?php require_once 'view/footer.php'; ?>

<?php } ?>
