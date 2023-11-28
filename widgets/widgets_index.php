<?php
require_once get_theme_file_path('/widgets/includes/product/categories/categories_fullwidth.php');
require_once get_theme_file_path('/widgets/includes/product/categories/categories_boxed.php');
require_once get_theme_file_path('/widgets/includes/product/categories/categories_slide_owl.php');
require_once get_theme_file_path('/widgets/includes/category/new_post_boxed.php');
require_once get_theme_file_path('/widgets/includes/product/product/new_product_slide.php');
require_once get_theme_file_path('/widgets/includes/product/product/new_product.php');
require_once get_theme_file_path('/widgets/includes/product/product/new_product_slide_2.php');
require_once get_theme_file_path('/widgets/includes/product/product/sellers_product.php');
require_once get_theme_file_path('/widgets/includes/home/features.php');

add_action( 'widgets_init', function() {
    register_widget('categories_fullwidth');
    register_widget('categories_boxed');
    register_widget('categories_slide_owl');
    register_widget('new_post_boxed');
    register_widget('new_product_slide');
    register_widget('new_product_slide_2');
    register_widget('new_product');
    register_widget('sellers_product');
    register_widget('features');
});

require_once get_theme_file_path('/widgets/models/functions.php');