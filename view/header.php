<?php
$login = false;
if(isset($_SESSION['user'])){
  $login = true;
}

?>

<head>
  <title>My Simple Blog</title>
  <link rel="stylesheet" href="view/style.css">
</head>

<h1>My simple Blog</h1>
<div id="menu">
  <a href="index.php">Home</a>

  <?php if($login == true): ?>
    <a href="add.php">Tambah</a>
    <a href="logout.php">Logout</a>
  <?php else: ?>
    <a href="login.php">Login</a>
  <?php endif; ?>
</div>
