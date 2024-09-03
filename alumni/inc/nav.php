<!-- ################################ -->
<!-- header & navigation -->
<!-- ################################ -->
<header>
    <div id="btn-burger"><i class="bi bi-list"></i></div>
    <div class="navbar">
        <a class="logo" href="<?php echo home_url('/') ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png">
        </a>
        <div class="nav-left">
            <nav>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu',
                    'items_wrap' => '<ul>%3$s</ul>',
                ));
                ?>
            </nav>
        </div>
        <div class="nav-right">
            <a href="#" class="btn espace-membres">Espace membres</a>
            <a href="#" class="btn devenir-membre">Devenir membre</a>
        </div>
    </div>
    <div id="btn-person-plus"><i class="bi bi-person-plus-fill"></i></i></div>
</header>
<hr>