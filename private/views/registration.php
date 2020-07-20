<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>What's My Next Movie</title>
	<link rel="stylesheet" href="<?php echo site_url('/css/style.css') ?>" media="all">
	<?php if ($this->section('css')) : ?>
		<?php echo $this->section('css') ?>
	<?php endif; ?>
</head>

<body>
	<div class="registerHomeButton">
		<h2 class="red-text">WMNM</h2>
	</div>
	<div class="registerCard">
		<h1 class="registerTagline">Sign up for <span class="red-text">what's my next movie</span></h1>
		<div class="registerCardContent" style="background: url(<?php echo site_url('img/registerImage.png') ?>);">
			<div class="registerLeft">
				<form action="<?php echo site_url() ?>" method="POST">
					<div class="registerInputs">
						<div class="registerEmailInput">
							<label for="registerEmail">Email<span class="red-text">*</span></label>
							<input type="text" name="email" id="registerEmail" class="inputField">
						</div>
						
						<input type="password" name="password" id="registerPassword" class="inputField">
						<input type="password" name="repeat-password" id="registerRepeatPassword" class="inputField">
						<input type="text" name="username" id="registerUsername" class="inputField">
					</div>
					<div class="registerButtonDiv">
						<input type="submit" value="REGISTER" id="registerSubmit">
					</div>
				</form>
				<div class="registerSmallText">
				<h2><i><span class="red-text">*</span> By clicking Register you agree to the <span class="red-text">Terms and Conditions</span> and <span class="red-text">Privacy Statement</span><i></h2>
				</div>
			</div>
			<div class="registerRight">
				<h2><span class="red-text"><?php echo '2323' ?></span> PEOPLE WERE BEFORE YOU JOIN <span class="red-text">TODAY </span> TO ACCESS</h2>
			</div>
		</div>
	</div>
	<script src="https://kit.fontawesome.com/a82e000026.js"></script>
</body>