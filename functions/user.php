<?php

function register_user($un, $pass){
  $un = escape($un);
  $pass = escape(md5($pass));

  $query = "INSERT INTO users (username, password) VALUES ('$un', '$pass')";
  return run($query);
}

function register_cek_username($un){
  $un = escape($un);

  $query = "SELECT * FROM users WHERE username='$un'";
  global $link;

  if($result = mysqli_query($link, $query)){
    if(mysqli_num_rows($result) != 0) return false;
    else return true;
  }
}

function cek_data($un, $pass){ //mengembanlikan tru atau false ttg keberadaaan datanya

  $un = escape($un);
  $pass = escape(md5($pass));

  $query = "SELECT * FROM users WHERE username='$un' AND password='$pass'";
  global $link;

  if($result = mysqli_query($link, $query)){
    if(mysqli_num_rows($result) != 0) return true;
    else return false;
  }

}

function cek_status($username){
  $un = escape($username);

  $query = "SELECT status FROM users WHERE username='$un'";
  global $link;
  global $status;

  if($result = mysqli_query($link, $query)){
    while ($row = mysqli_fetch_assoc($result)){
      $status = $row['status'];
    }
    return $status;
  }
}

?>
