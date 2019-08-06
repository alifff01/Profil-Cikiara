<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/css/login_modern.css">

    <title>set your title in here</title>
  </head>
  <!-- setting backgroud disini -->
  <body style="background: url('<?= BASE_URL ?>/assets/img/bg_login1.jpg');">
    <div class="loginbox">
      <!-- setting logo yang akan ditampilkan -->
      <img src="<?= BASE_URL ?>/assets/img/logo.png" class="avatar" alt="your logo">

      <!-- setting nama app atau informasi lainnya -->
      <h1>name your app</h1>
      <!-- 
      form menggunakan method POST 
      sesuaikan action dengan link proses
      -->
      <form method="post" action="#">
        <p>Username</p>
        <!-- setting name untuk username -->
        <input type="text" name="" placeholder="Enter Username">
        <p>Password</p>
        <!-- setting name untuk password -->
        <input type="Password" name="" placeholder="Enter Password">
        <input type="submit" name="" value="Login"><br>
        <!-- setting nama organisasi atau informasi lainnya -->
        <h2>organizer - your place set here</h2>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/bootstrap.min.js"></script>
  </body>
</html>