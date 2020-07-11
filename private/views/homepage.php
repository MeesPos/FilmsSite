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
	<?php if ($this->section('nav_notloggedin')) : ?>
		<?php echo $this->section('nav_notloggedin') ?>
	<?php else : ?>
		<?php echo $this->fetch('_nav_notloggedin') ?>
	<?php endif ?>

	<header id="homeheader" style="background: url(<?php echo site_url('/img/homeback.png') ?>);">
		<div class="home-intro">
			<div class="home-information">
				<h1>What's my next Movie</h1>
				<div class="homedesc">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod incidunt ex sapiente repellat autem. Voluptatem,
						tenetur qui, explicabo sit dolor voluptas adipisci, delectus dolores illum porro possimus excepturi
						odit numquam!</p>
				</div>
				<a href="">
					<button>Get Started</button>
				</a>
			</div>
		</div>
	</header>

	<script src="<?php echo site_url('/js/nav.js') ?>"></script>
</body>