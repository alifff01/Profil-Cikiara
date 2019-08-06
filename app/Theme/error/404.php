<!DOCTYPE html>
<html>
<head>
	<title>Error 404</title>
	<style type="text/css">
		#error{
			border: 1px solid #ccc;
			box-sizing: border-box;
			width: 500px;
			text-align: center;
			position: absolute;
			top: 40%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 20px;
		}
		#error .judul{
			font-size: 120px;
			font-family: tahoma;
			font-weight: bold;
			color: #ccc;
		}
		#error h3, h5{
			font-family: arial;
			margin: 10px;
			color: #aaa;
		}
		a{
			text-decoration: none;
		}
	</style>
</head>
<body>
<div id=error>
	<span class="judul">404</span>
	<h3>Ooops, Halaman tidak tersedia</h3>
	<h5>Anda bisa Akses Home Page Website ini <a href="<?= BASE_URL ?>">klik Disini!</a></h5>
</div>
</body>
</html>