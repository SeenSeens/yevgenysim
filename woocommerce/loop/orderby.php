<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form class="dropdown-menu" method="get">
    <div class="card">
        <div class="card-body">
            <!-- Form group -->
            <div class="form-group-overflow">
                <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
                <div class="form-check form-check-text mb-3">
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) . '?' . http_build_query( array( 'orderby' => $id ) ) ); ?>" class="orderby-link text-black <?php echo esc_attr( $id === $orderby ? 'selected' : '' ); ?>">
                        <?php echo esc_html( $name ); ?>
                    </a>
                </div>
                <?php endforeach; ?>
                <input type="hidden" name="paged" value="1" />
                <?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
            </div>
        </div>
    </div>
</form>