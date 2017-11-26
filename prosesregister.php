<?php

  include 'koneksi.php';

  $username = htmlentities($_POST["username"]);
  $password = htmlentities(md5($_POST["password"]));
  $nama     = htmlentities($_POST["nama"]);

  $sql   = "INSERT INTO users(username, password, nama) VALUES ('$username', '$password', '$nama')";
  $query = mysqli_query($connect, $sql);

  if (!$query) {
    header("Location: register.php?status=registergagal");
  }
  else {
    header("Location: login.php?status=registerberhasil");
  }

?>
