<?php
/**
 * Header Classic
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>
<body>
<?php require_once get_theme_file_path( '/templates/search.php' ); ?>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-xl navbar-light ">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand d-xl-none" href="<?= site_url(); ?>">
            <?php bloginfo('name'); ?>
        </a>
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarClassicCollapse" aria-controls="navbarClassicCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarClassicCollapse">
            <!-- Nav -->
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu_class' => 'navbar-nav',
                'container' => false,
                'alink_class'   => 'nav-link',
                'fallback_cb' => false,
                //'walker' => new WP_Bootstrap_Navwalker()
            ]);
            ?>
            <!-- Brand -->
            <a class="navbar-brand mx-auto d-none d-xl-block" href="<?= site_url(); ?>">
                <?php bloginfo('name'); ?>
            </a>
            <!-- Nav -->
            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="offcanvas" href="#modalSearch">
                        <i class="fe fe-search"></i>
                    </a>
                </li>
                <li class="nav-item ms-lg-n4">
                    <a class="nav-link" href="./account-orders.html">
                        <i class="fe fe-user"></i>
                    </a>
                </li>
                <li class="nav-item ms-lg-n4">
                    <a class="nav-link" href="./account-wishlist.html">
                        <i class="fe fe-heart"></i>
                    </a>
                </li>
                <li class="nav-item ms-lg-n4">
                    <a class="nav-link" data-bs-toggle="offcanvas" href="#modalShoppingCart">
                    <span data-cart-items="2">
                    <i class="fe fe-shopping-cart"></i>
                    </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>