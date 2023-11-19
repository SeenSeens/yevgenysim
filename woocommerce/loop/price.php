<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$regular_price = $product->get_regular_price();
$sale_price = $product->get_sale_price();
echo '<div class="mb-1 fw-bold text-muted">';
if ( $product->is_on_sale() && $regular_price > $sale_price ) {
    // Giá giảm giá hiển thị với lớp CSS và định dạng tùy chỉnh
    echo '<span class="text-primary">' . wc_price( $sale_price ) . '</span>';
    // Giá gốc hiển thị với lớp CSS và định dạng tùy chỉnh
    echo '<span class="fs-xs text-gray-350 text-decoration-line-through">' . wc_price( $regular_price ) . '</span>';
} else {
    // Nếu không có giảm giá hoặc giá giảm giá lớn hơn giá gốc, hiển thị giá bình thường
    echo $product->get_price_html();
}
echo '</div>';