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
    
	<form action="<?php echo site_url('backgroundChange') ?>" method="post">
        <input type="text" name="registrationMovieID" id="movieID">
        <input type="submit" value="Change registration background">

    </form>
	<script src="<?php echo site_url('/js/nav.js'); ?>"></script>

	<script src="https://kit.fontawesome.com/a82e000026.js"></script>
</body>