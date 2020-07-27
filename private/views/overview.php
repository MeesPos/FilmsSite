<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overview - WMNM</title>
    <link rel="stylesheet" href="<?php echo site_url('/css/style.css') ?>" media="all">
    <?php if ($this->section('css')) : ?>
        <?php echo $this->section('css') ?>
    <?php endif; ?>
    <script src="https://kit.fontawesome.com/a82e000026.js"></script>
</head>

<body>
    <?php if ($this->section('nav_loggedin')) : ?>
        <?php echo $this->section('nav_loggedin') ?>
    <?php else : ?>
        <?php echo $this->fetch('_nav_loggedin') ?>
    <?php endif ?>
</body>

</html>