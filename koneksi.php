<?php

  $host = "localhost";
  $user = "root";
  $pass = "";
  $db   = "pelabuhan";

  $connect = mysqli_connect($host, $user, $pass, $db);

  if (!$connect) {
    die("cant connect to database!");
  }

?>
