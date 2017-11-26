<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>Register</title>
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
        <form action="prosesregister.php" method="post">
          <h1 class="headerlogin">REGISTER</h1>
          <input type="text" name="username" placeholder="Username" class="inputku" autocomplete="off">
          <input type="password" name="password" placeholder="Password" class="inputku" autocomplete="off">
          <input type="text" name="nama" placeholder="Nama Lengkap" class="inputku" autocomplete="off">
          <button type="submit" class="tombol-submit">Register</button>
          <span class="optionform">Sudah mempunyai akun? <a href="login.php">Login</a></span>
        </form>
      </div>

    </div>


    <?php include 'cdnjs.html'; ?>

  </body>
</html>
