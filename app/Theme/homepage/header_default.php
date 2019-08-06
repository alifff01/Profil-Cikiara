<!DOCTYPE html>
<html lang="en">
<head>
	<!-- kode meta html -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- judul tab website -->
	<title>HomePage Default</title>

	<!-- link css style -->
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL;?>/bootstrap4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL;?>/css/chatomz.css">
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL;?>/font-awesome5/css/all.min.css">
	<!-- link java script -->

	<script type="text/javascript" src="<?= BASE_URL;?>/j-query/jquery.min.js"></script>
	<script type="text/javascript" src="<?= BASE_URL;?>/bootstrap4.1/js/bootstrap.min.js"></script>

	<link rel="shortcut icon" href="<?= BASE_URL;?>/assets/icon/chatomz.ico">
</head>
<body>
	<div class="container-fluid">
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
			<div class="container">
				
			<a class="navbar-brand" href="<?= BASE_URL;?>">Beranda</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
			  <li class="nav-item">
			    <a class="nav-link" href="#">Menu 1</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#">Menu 2</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#"><i class="fa fa-sign-out"></i>Logout</a>
			  </li>       
			</ul>
			</div>  
			</div>
		</nav>