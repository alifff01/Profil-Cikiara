<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Default</title>
  <link rel="stylesheet" type="text/css" href="<?= BASE_URL;?>/css/login_default.css">
    <link rel="shortcut icon" href="<?= BASE_URL; ?>/assets/fav_icon.ico">
</head>
<body>
  <div class="login">
    <h1>Text Here</h1>

    <!-- konfigurasi method from dan link action -->
    <form method="post" action="<?php echo  BASE_URL;?>/home/ceklogin">
      <!-- konfigurasi form username , sesuaikan name dengan project anda -->
      <input type="text" name="" placeholder="Username" autofocus><br>

      <!-- konfigurasi form password , sesuaikan name dengan project anda -->
      <input type="password" name="" placeholder="Password"><br>
      <input type="submit" value="Login">
    </form>
  </div>

</body>
</html>