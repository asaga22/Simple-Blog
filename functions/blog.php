<?php

//fungsi namppilin seluruh data
function tampilkan(){
  global $link;

  $query = "SELECT * FROM blog";
  $result = mysqli_query($link, $query) or die('gagal menampilkan data');

  return $result;
}

//fungsi tambah data
function tambah_data($judul, $konten, $tag){
  $judul = escape($judul);
  $konten = escape($konten);
  $tag = escape($tag);

  $query = "INSERT INTO blog (judul, isi, tag) VALUES ('$judul', '$konten', '$tag')";
  return run($query);
}

//fungsi edit data
function edit_data($judul, $konten, $tag, $id){
  $judul = escape($judul);
  $konten = escape($konten);
  $tag = escape($tag);

  $query = "UPDATE blog SET judul='$judul', isi='$konten', tag='$tag'
            WHERE id=$id";
  return run($query);
}

//fungsi hapus_data
function hapus_data($id){
  $query = "DELETE FROM blog WHERE id=$id";
  return run($query);
}

//fungsi nampilin data spesifik berdasarkan id
function tampilkan_per_id($id){
  global $link;

  $query = "SELECT * FROM blog WHERE id=$id   ";
  $result = mysqli_query($link, $query) or die('gagal menampilkan data');

  return $result;
}

//buat validasi ngejalanin query
function run($query){
  global $link;
  if (mysqli_query($link, $query)) return true;
  else return false;
}

function excerpt($string){
  $string = substr($string, 0 , 10);
  return $string . "...";
}

//escape $string
function escape($data){
  global $link;
  return mysqli_real_escape_string($link, $data);
}

?>
