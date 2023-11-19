<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php require_once get_theme_file_path( '/templates/search.php' ); ?>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
            <?php bloginfo('name'); ?>
        </a>
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Nav -->
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                'menu_class' => 'navbar-nav mx-auto',
                'container' => false,
                'alink_class'   => 'nav-link',
                'fallback_cb' => 'bootstrap_5_wp_nav_menu_walker::fallback',
                'walker' => new bootstrap_5_wp_nav_menu_walker()
                //'walker' => new WP_Bootstrap_Navwalker(),
            ]);
            ?>
            <!-- Nav -->
            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="offcanvas" href="#modalSearch">
                        <i class="fe fe-search"></i>
                    </a>
                </li>
                <li class="nav-item ms-lg-n4">
                    <a class="nav-link" href="<?= site_url('/tai-khoan'); ?>">
                        <i class="fe fe-user"></i>
                    </a>
                </li>
                <li class="nav-item ms-lg-n4">
                    <a class="nav-link" href="<?= site_url('/wishlist'); ?>">
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