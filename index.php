<?php
require_once "core/init.php";
$super_user = $login = false;

if(isset($_SESSION['user'])){
  $login = true;
  if(cek_status($_SESSION['user']) == 1){
    $super_user = true;
  }
}

$articles = tampilkan();

require_once "view/header.php";
?>

<?php while ($row = mysqli_fetch_assoc($articles )): ?>
  <div class="each_article">
    <h3><a href="single.php?id= <?= $row['id']; ?>"> <?= $row['judul'] ?> </a></h3>
    <p>
      <?= excerpt($row['isi']);?>
    </p>
    <p class="waktu"> <?= $row['waktu']; ?> </p>
    <p class="tag"> Tag : <?= $row['tag']; ?></p>

    <?php if($login == true): ?>
      <a href="edit.php?id= <?= $row['id']; ?>">Edit</a>1
      <?php if($super_user == true): ?>
        <a href="delete.php?id= <?= $row['id']; ?>">Delete</a>
      <?php endif; ?>
  <?php endif; ?>
  </div>
<?php endwhile; ?>

<?php
require_once 'view/footer.php';
?>
