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

	<section id="movies">
		<?php
		$arrayCount = 0;
		foreach ($popMovies as $row) {
			if (is_array($row) && !empty($row)) {
				foreach ($row as $movieArray) {
					?> <a href="#" class="movielist homeMovie-<?php echo $arrayCount ?>">
					<p class="votescoreHome"><?php echo $movieArray['vote_average']?></p>
					<img src="https://image.tmdb.org/t/p/original<?php echo $movieArray['poster_path'] ?>" alt="Movie poster of <?php echo $movieArray['title'] ?>"><?php
					?><p class="homeTitle"><?php echo $movieArray['title']; ?></p><?php

					

					$filmCat = $movieArray['genre_ids'];

					$genreLists;
						foreach ($genreLists as $row) {
							foreach ($row as $genre) {
								if ($filmCat === $genre['id']) {
									echo $genre['name'];
								}		
							}
						}
						
					if ($arrayCount >= 4) {
						break;
					}
					$arrayCount += 1;	
					?> </a> <?php
				}
			}
		}
		?>
	</section></a>

	<section id="aboutus">
		<h2>The services</h2>
		<div id="services">
			<div class="service service1">
				<center><img class="homeImg" src="<?php echo site_url('/img/filter.png') ?>" alt="Filter Icon"></center>
				<h3>Filter Streaming platforms</h3>
				<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
				Nam magnam, doloremque doloribus optio porro rem iste voluptatem 
				commodi cumque tenetur praesentium in voluptate nobis minus eaque 
				aspernatur debitis est. A!</p>
			</div>

			<div class="service service2">
				<center><img class="homeImg" src="<?php echo site_url('/img/swipe.png') ?>" alt="Swipe Icon"></center>
				<h3>Swipe to your show</h3>
				<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
				Nam magnam, doloremque doloribus optio porro rem iste voluptatem 
				commodi cumque tenetur praesentium in voluptate nobis minus eaque 
				aspernatur debitis est. A!</p>
			</div>

			<div class="service service3">
				<center><img class="homeImg" src="<?php echo site_url('/img/puzzle.png') ?>" alt="Advanced Filter Icon"></center>
				<h3>Advanced filter system</h3>
				<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
				Nam magnam, doloremque doloribus optio porro rem iste voluptatem 
				commodi cumque tenetur praesentium in voluptate nobis minus eaque 
				aspernatur debitis est. A!</p>
			</div>
		</div>
	</section>

	<?php if ($this->section('footer')) : ?>
		<?php echo $this->section('footer') ?>
	<?php else : ?>
		<?php echo $this->fetch('_footer') ?>
	<?php endif ?>

	<script src="<?php echo site_url('/js/nav.js') ?>"></script>
	<script src="https://kit.fontawesome.com/a82e000026.js"></script>
</body>