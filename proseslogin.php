<?php

  include 'koneksi.php';

  $username = $_POST["username"];
  $password = md5($_POST["password"]);

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $query = mysqli_query($connect, $sql);
  $hasil = mysqli_num_rows($query);

  if ($hasil > 0) {
    $user = mysqli_fetch_array($query);
    session_start();
    $_SESSION['username'] = $user['nama'];
    header("Location: index.php");
  }
  else {
    header("Location: login.php?status=logingagal");
  }

?>
