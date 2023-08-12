<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>404</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
<!-- font link css -->
	<link rel="stylesheet" href="assets/css/font-style.css">
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="assets/css/erorr-page.css" />
	

</head>

<body>
	<div class="printErore">
		<?php if (!empty($_SESSION['error'])) : ?>
			<h3 class="session-alert"><?= $_SESSION['error'] ?></h3>
		<?php unset($_SESSION['error']);endif; ?>
	</div>
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<div></div>
				<h1>404</h1>
			</div>
			<h2>Erorr to request</h2>
            <p class="font-p">درخواست شما نامعتبر است لطفا با کلیک روی گزینه زیر به صفحه پیش فرض وارد شوید.</p>
			<a href="index.php">home page</a>
		</div>
	</div>

</body>

</html>
