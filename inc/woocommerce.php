<?php

if( !function_exists('remove_parent_theme_action')) :
    function remove_parent_theme_action() {
        // remove_action( 'woocommerce_before_main_content', 'storefront_before_content', 10);
        // remove_action( 'woocommerce_after_main_content', 'storefront_after_content', 10);

        remove_action( 'woocommerce_after_shop_loop', 'storefront_sorting_wrapper', 9 );
        remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
        remove_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
        remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 30 );
        remove_action( 'woocommerce_after_shop_loop', 'storefront_sorting_wrapper_close', 31 );

        remove_action( 'woocommerce_before_shop_loop', 'storefront_sorting_wrapper', 9 );
         remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
        remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
        remove_action( 'woocommerce_before_shop_loop', 'storefront_woocommerce_pagination', 30 );
        remove_action( 'woocommerce_before_shop_loop', 'storefront_sorting_wrapper_close', 31 );

        remove_action('woocommerce_before_shop_loop_item_title',  'woocommerce_template_loop_product_thumbnail', 10);

        remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

        remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6 );

        remove_action('storefront_single_post', 'storefront_post_header', 10);
        remove_action('storefront_single_post', 'storefront_post_content', 30);

    }
    add_action( 'after_setup_theme', 'remove_parent_theme_action' );
endif;


/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs', 20 );
function jk_woocommerce_breadcrumbs() {
    return array(
        'delimiter'   => ' &#47; ',
        'wrap_before' => '<ol class="breadcrumb justify-content-center mb-0 text-center text-white fs-xs">',
        'wrap_after'  => '</ol>',
        'before'      => '',
        'after'       => '',
        'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
    );
}

/**
 * Sale
 */
if( !function_exists('custom_woocommerce_show_product_loop_sale_flash')) :
    function custom_woocommerce_show_product_loop_sale_flash() {
        global $product;
        if( $product->is_on_sale()) :
            echo "<div class='badge bg-dark card-badge card-badge-start text-uppercase'>Sale</div>";
        endif;
    }
    add_action('woocommerce_before_shop_loop_item_title', 'custom_woocommerce_show_product_loop_sale_flash', 10);
endif;

/**
 * Viết lại cách hiển thị thumbnail sản phẩm
 */
if( !function_exists('woocommerce_before_shop_loop_item_title')) :
    function woocommerce_before_shop_loop_item_title(){
        echo "<a href='" . get_the_permalink() . "'>";
        the_post_thumbnail('', [
            'class' => 'card-img-top',
            'loading' => 'lazy'
        ]);
        echo '</a>';
    }
    add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_before_shop_loop_item_title', 10);
endif;


/**
 * Thẻ mở bao bọc cho tiêu đề, giá, đánh giá, xem nhanh, giỏ hàng, yêu thích
 */
/*if( !function_exists('title_price_rating_product_link_open')) :
    function title_price_rating_product_link_open() {
        echo "<div class='card-collapse-parent' style=''>";
        echo "<div class='card-body px-0 bg-white text-center'>"; // Thẻ mở cho tiêu đề, giá, đánh giá
    }
    add_action('woocommerce_shop_loop_item_title','title_price_rating_product_link_open', 5);
endif;*/

/*function woocommerce_template_loop_product_link_close() {
    echo "</div>";
}
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);*/

/**
 * Thẻ đóng bao bọc cho tiêu đề, giá, đánh giá, xem nhanh, giỏ hàng, yêu thích
 */
/*if( !function_exists('title_price_rating_product_link_close')) :
    function title_price_rating_product_link_close() {
        echo "</div>";
    }
    add_action('woocommerce_after_shop_loop_item','title_price_rating_product_link_close', 15);
endif;
*/

/**
 * Sửa lại hiển thị tên sản phẩm
 */
if( !function_exists('custom_woocommerce_template_loop_product_title')) :
    function custom_woocommerce_template_loop_product_title() {
        ?>
        <div class="mb-1 fw-bold">
            <a class="text-body" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>
        <?php
    }
    add_action('woocommerce_shop_loop_item_title', 'custom_woocommerce_template_loop_product_title', 10);
endif;

/**
 * QuickView trang cửa hàng
 */
if( !function_exists('wick_view')) :
    function wick_view() {
        ?>
        <button class="yith-wcqv-button btn btn-xs btn-link btn-circle" data-product_id="<?php echo esc_attr(get_the_ID()); ?>">
            <i class="fe fe-eye"></i>
        </button>
        <?php
    }
    add_action('woocommerce_after_shop_loop_item', 'wick_view', 9);
endif;

/**
 * Quishlist trang cửa hàng
 */
if( !function_exists('whislish')) :
    function whislish() {
        ?>
        <a
                href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'add_to_wishlist', get_the_ID() ), 'add_to_wishlist' ) ); ?>"
                class="btn btn-xs btn-circle add_to_wishlist"
                data-toggle="button"
                data-product-id="<?php echo esc_attr(get_the_ID()); ?>">
            <i class="fe fe-heart"></i>
        </a>
        <?php
    }
    add_action('woocommerce_after_shop_loop_item', 'whislish', 11);
endif;

/**
 * Thay đổi ký hiệu tiền tệ
 */
if( !function_exists('change_existing_currency_symbol')) :
    function change_existing_currency_symbol( $currency_symbol, $currency ) {
        switch( $currency ) {
            case 'VND': $currency_symbol = 'VNĐ'; break;
        }
        return $currency_symbol;
    }
    add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
endif;


/**
 * Ordering
 */
if ( ! function_exists( 'custom_woocommerce_catalog_ordering' ) ) {

    /**
     * Output the product sorting options.
     */
    function custom_woocommerce_catalog_ordering() {
        if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
            return;
        }
        $show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', 'menu_order' ) );
        $catalog_orderby_options = apply_filters(
            'woocommerce_catalog_orderby',
            [
                'menu_order' => __( 'Default sorting', 'woocommerce' ),
                'popularity' => __( 'Sort by popularity', 'woocommerce' ),
                'rating'     => __( 'Sort by average rating', 'woocommerce' ),
                'date'       => __( 'Sort by latest', 'woocommerce' ),
                'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
                'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
            ]
        );

        $default_orderby = wc_get_loop_prop( 'is_search' ) ? 'relevance' : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', '' ) );
        // phpcs:disable WordPress.Security.NonceVerification.Recommended
        $orderby = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : $default_orderby;
        // phpcs:enable WordPress.Security.NonceVerification.Recommended

        if ( wc_get_loop_prop( 'is_search' ) ) {
            $catalog_orderby_options = array_merge( array( 'relevance' => __( 'Relevance', 'woocommerce' ) ), $catalog_orderby_options );

            unset( $catalog_orderby_options['menu_order'] );
        }

        if ( ! $show_default_orderby ) {
            unset( $catalog_orderby_options['menu_order'] );
        }

        if ( ! wc_review_ratings_enabled() ) {
            unset( $catalog_orderby_options['rating'] );
        }

        if ( ! array_key_exists( $orderby, $catalog_orderby_options ) ) {
            $orderby = current( array_keys( $catalog_orderby_options ) );
        }

        wc_get_template(
            'loop/orderby.php',
            array(
                'catalog_orderby_options' => $catalog_orderby_options,
                'orderby'                 => $orderby,
                'show_default_orderby'    => $show_default_orderby,
            )
        );
    }
}