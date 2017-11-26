<?php

  include 'koneksi.php';
  session_start();
  if(!isset($_SESSION["username"])){
    header("Location: login.php?status=haraplogin");
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>Berlabuh - Dimanapun, dan kapanpun, cari tau semua dengan BERLABUH</title>
    <?php include 'cdn.html'; ?>
  </head>
  <body>


    <div class="headerku">

      <div class="navigasi">
        <div class="container">
          <img src="img/logo_putih.png" height="40px">
          <div class="kanan">
            <span class="greeting">Hei, <span class="kapital"><?php echo $_SESSION['username']; ?></span>!</span>
            <a href="logout.php" class="tombol-logout">logout</a>
          </div>
        </div>
      </div>

      <div class="tengah animated fadeIn">
        <div class="ketikan" style="text-align: center; display: block !important;">
          <div id="typed"></div>
        </div><br>
      </div>

      <div class="tengahnd animated fadeIn">
        <p class="yelyel">Dimanapun, dan kapanpun, cari tau semua dengan BERLABUH</p>
        <center>
          <form action="index.php" method="get" style="margin-top: 40px;">
            <input type="text" name="start" placeholder="Dari tanggal" class="inputheader unstyled" onfocus="(this.type='date')">
            <input type="text" name="end" placeholder="Sampai tanggal" class="inputheader unstyled" onfocus="(this.type='date')">
            <button type="submit" class="tombol-cari">CARI</button>
          </form>
        </center>
      </div>

      <div class="footerku">
        Info : berlabuh menggunakan jasa API dari mainAPI.net <a href="https://mainapi.net" class="visit-api">Visit mainapi.net</a>
      </div>

    </div>
    <div>.</div>
    <div style="margin-top: 700px;"></div>
    <?php

      $ch = curl_init();

      if(isset($_GET['start'])){
        $start = $_GET['start'];
        $end   = $_GET['end'];
        curl_setopt($ch, CURLOPT_URL, "https://api.mainapi.net/logistic/v1.0/vessel/schedule?start=" . $start . "&end=" . $end);
      }
      else{
        curl_setopt($ch, CURLOPT_URL, "https://api.mainapi.net/logistic/v1.0/vessel/schedule?start=" . date("Y-m-d") . "&end=" . date("Y-m-d"));
      }
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

      $headers = array();
      $headers[] = "Accept: application/json";
      $headers[] = "Authorization: Bearer 85f202b2d8aa20c289b831f9965b0296";
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      $result = curl_exec($ch);
      if (curl_errno($ch)) {
          echo 'Error:' . curl_error($ch);
      }
      curl_close ($ch);

      $hasil = json_decode($result, true);
      $payloadLength = count($hasil['payload']);
      if ($payloadLength <= 0) {
        echo "<div class='container'>
                <div class='alert alert-danger text-center'>
                  <strong>Maaf, </strong>data yang anda cari tidak ditemukan.
                </div>
              </div>";
      }

      for ($i=1; $i < $payloadLength; $i++) {

    ?>

      <div class="data-box">
        <p>
          <img src="img/ship2.png" class="small-img"><?php echo $hasil['payload'][$i]['vessel_name']; ?>
        </p>
        <p>
          <img src="img/flats.png" class="small-img"><?php echo $hasil['payload'][$i]['shipping_agent']; ?>
        </p>
        <p>
          <img src="img/clock.png" class="small-img">
          <?php echo $hasil['payload'][$i]['eta'] ?>
          <?php
           $originPort = $hasil['payload'][$i]['origin_port'];
           $resultOrigin = explode(" ",$originPort);
           $nextPort = $hasil['payload'][$i]['next_port'];
           $resultNext = explode(" ",$nextPort);
           ?>
          (<?php echo $resultOrigin[2]; ?> - <?php echo $resultNext[2]; ?>)
        </p>
      </div>

      <?php }?>

      <div class="footer">
        <div class="container">
          Made with <img src="img/like.png" height="20px"> by <strong>B2@<span style="color: rgb(241, 196, 15);">DILoHackathonFestival2017</span></strong>
        </div>
      </div>

    <?php include 'cdnjs.html'; ?>
    <script>

      var typed = new Typed('#typed', {
        strings: [' KAPAL?', 'WAKTU?', 'TEMPAT?', 'TUJUAN?', 'BERLABUH AJA!'],
        typeSpeed: 40,
        backSpeed: 70,
        loop: true,
        backDelay: 500,
      });

    </script>

  </body>
</html>
