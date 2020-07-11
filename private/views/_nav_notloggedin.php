<nav id="navbar">
    <div class="logo">
        <h2 class="logo-text">WMNM</h2>
    </div>
    <div id="navbar-right">
        <ul id="menu-menu" class="navbar-ul">
            <li id="menu-item-8" class="menu-items menu-item"><a href="<?php echo url('home') ?>" <?php if (current_route_is('home')) : ?> class="active" <?php endif ?>>Home</a></li>
            <li id="menu-item-9" class="menu-items menu-item"><a href="#">Sign In</a></li>
            <li id="menu-item-16" class="menu-items menu-item"><a href="#">Sign Up</a></li>
        </ul>
    </div>

    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
</nav>