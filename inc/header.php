<!DOCTYPE HTML>
<html>
<head>
<title><?=$config['site']['shopName'] ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>

<!-- FileUpload CSS -->
<link rel="stylesheet" href="../css/bootstrap-fileupload.min.css" />
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">

<script type="text/javascript" src="../js/jquery1.min.js"></script>
<!-- start menu -->
<link href="../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!--start slider -->
    <link rel="stylesheet" href="../css/fwslider.css" media="all">
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/css3-mediaqueries.js"></script>
    <script src="../js/fwslider.js"></script>
<!--end slider -->
<script src="../js/jquery.easydropdown.js"></script>
</head>
<body>
    <div class="header-top">
		 <div class="wrap">
			 <div class="cssmenu">
				<ul>
					<li><a href="login.php">Entrar</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="header-bottom">
			<div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" alt=""/></a>
				</div>
				<div class="menu">
							<ul class="megamenu skyblue">
			  <li class="active grid"><a href="index.php">Inicio</a></li>
				<li><a class="color6" href="pages/other.php">Localização</a></li>
				<li><a class="color7" href="pages/contact.php">Contato</a></li>
			</ul>
			</div>
		</div>
		 <div class="header-bottom-right">
				 <div class="search">
				<input type="text" name="s" class="textbox" value="Pesquisar" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"> </div>
		 </div>
		</div>
		 <div class="clear"></div>
		 </div>
	</div>
