<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>Login</title>
    <?php include 'cdn.html'; ?>
    <style>

      body{
        background: url("img/bg1.jpg") center center fixed;
        background-size: cover;
      }

    </style>
  </head>
  <body>

    <div class="overlayhitam">

      <div class="kotak-form animated fadeIn">
        <form action="proseslogin.php" method="post">
          <?php

            if (isset($_GET["status"])) {
              $status = $_GET["status"];
              if ($status == "logingagal") {
                echo "<div class='notif'>
                        <span class='isinotif'>Username atau Password salah</span>
                      </div>";
              }
              elseif ($status == "haraplogin") {
                echo "<div class='notif'>
                        <span class='isinotif'>Harap login dulu</span>
                      </div>";
              }
            }

          ?>
          <span class="headerlogin">LOGIN</span>
          <input type="text" name="username" placeholder="Username" class="inputku" autocomplete="off">
          <input type="password" name="password" placeholder="Password" class="inputku">
          <button type="submit" class="tombol-submit">LOGIN</button>
          <span class="optionform">Belum mempunyai akun? <a href="register.php">Register</a></span>
        </form>
      </div>

    </div>

    <?php include 'cdnjs.html'; ?>
    <script>

      $(".notif").on("click", function(){
        $(".notif").fadeOut();
      });

    </script>

  </body>
</html>
