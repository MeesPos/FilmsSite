<nav id="navbar">
    <div class="logo">
        <h2 class="logo-text" style="margin-left: 0;">WMNM</h2>
    </div>
    <div id="navbar-right">
        <ul id="menu-menu" class="navbar-ul" style="width: 60vw!important; margin-bottom: -10px!important">
            <li id="menu-item-8" class="menu-items menu-item"><a href=" <?php echo url('overview') ?>" <?php if (current_route_is('overview')) : ?> class="active" <?php endif ?>>Home</a></li>
            <li id="menu-item-9" class="menu-items menu-item"><a href="#" <?php if (current_route_is('#')) : ?> class="active" <?php endif ?>>Films</a></li>
            <li id="menu-item-16" class="menu-items menu-item"><a href="#" <?php if (current_route_is('#')) : ?> class="active" <?php endif; ?>>Series</a></li>
            <li id="menu-item-17" class="menu-items menu-item"><a href="#" <?php if (current_route_is('#')) : ?> class="active" <?php endif; ?>>Swipe</a></li>
            <li id="menu-item-18" class="menu-items menu-item"><a href="#"><i class="fas fa-search"></i></a></li>
            <li id="menu-item-19" class="menu-items menu-item"><a href="#" <?php if (current_route_is('#')) : ?> class="active" <?php endif; ?>><button class="pro">WMNM PRO</button></a></li>
            <div class="profile">
                <!-- <li id="menu-item-18" class="menu-items menu-item"><a href="#"><i class="far fa-envelope"></i></a></li> -->
                <!-- <li id="menu-item-18" class="menu-items menu-item"><a href="#"><i class="fas fa-bell"></i></a></li> -->
                <!-- Image profile picture -->
                <div class="personstats">
                    <!-- Level -->
                    <!-- XP -->
                    <!-- User name -->
                </div>
            </div>
        </ul>
    </div>

    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
</nav>