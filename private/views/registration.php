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
		<a href="<?php echo url('/') ?>">
			<h2 class="red-text">WMNM</h2>
		</a>
	</div>
	<div class="registerCardContainer">
		<div class="registerCard">
			<h1 class="registerTagline">SIGN UP FOR <span class="red-text">WHAT'S MY NEXT MOVIE</span></h1>
			<div class="registerCardBackground" style="background: url(<?php echo site_url('img/registerImage.png') ?>);">
				<div class="registerCardContent">
					<div class="registerLeft">
						<form action="<?php echo site_url() ?>" method="POST">
							<div class="registerInputs">
								<div class="registerEmailInput">
									<label for="registerEmail">Email <span class="red-text asterisk">*</span></label>
									<input type="text" name="email" id="registerEmail" class="inputField" placeholder="Enter your email">
								</div>
								<div class="registerPasswordInput">
									<label for="registerPassword">Password <span class="red-text asterisk">*</span></label>
									<input type="password" name="password" id="registerPassword" class="inputField" placeholder="Enter your password">
								</div>
								<div class="registerRepeatPasswordInput">
									<label for="registerRepeatPassword">Repeat Password <span class="red-text asterisk">*</span></label>
									<input type="password" name="repeat-password" id="registerRepeatPassword" class="inputField" placeholder="Repeat your password">
								</div>
								<div class="registerUsernameInput">
									<label for="registerUsername">Username <span class="red-text asterisk">*</span></label>
									<input type="text" name="username" id="registerUsername" class="inputField" placeholder="Enter your username">
								</div>
							</div>
							<div class="registerButtonDiv">
								<input type="submit" value="REGISTER" id="registerSubmit">
							</div>
						</form>
						<div class="registerSmallText">
							<h3><i><span class="red-text asterisk">*</span> By clicking register you agree to the <span class="red-text">Terms and Conditions</span> and <span class="red-text">Privacy Statement</span></i></h3>
							<p>Already have an account? <a href="<?php echo url() ?>" class="red-text">Sign in</a></p>
						</div>
					</div>
					<div class="registerRight">
						<h2><span class="red-text"><?php echo '2323' ?></span> PEOPLE WERE BEFORE YOU JOIN <span class="red-text">TODAY </span> TO ACCESS:</h2>
						<ul class="registerList">
							<li>Up-to-date advanced movie search system</li>
							<li>Original movie swipe system</li>
							<li>Advanced information about movies</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://kit.fontawesome.com/a82e000026.js"></script>
</body>