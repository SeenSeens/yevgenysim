<?php
/**
 * Lấy ra bài viết mới nhất
 * @param $number
 * @return WP_Query
 */
function query_new_post( $number ) {
    return new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => $number,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);
}

/**
 * Lấy ra sản phẩm mới nhất
 * @param $number
 * @return WC_Product_Query
 */
function wc_query_new_product( $number ) {
    return new WC_Product_Query([
        'taxonomy' => 'product_cat',
        'post_type' => 'product',
        'posts_per_page' => $number,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);
}

/**
 * Lấy ra sản phẩm mới nhất
 * @param $number
 * @return WP_Query
 */
function query_new_product( $number ) {
    return new WP_Query([
        'taxonomy' => 'product_cat',
        'post_type' => 'product',
        'posts_per_page' => $number,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);
}

/**
 * Lấy ra sản phẩm best seller
 * @param $number
 * @return WP_Query
 */
function query_best_sell( $number ) {
    return new WP_Query([
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => $number,
        'meta_key' => 'total_sales',
        'orderby' => 'meta_value_num',
        'order' => 'desc',
    ]);
}

/**
 * Lấy ra danh mục sản phẩm
 * @return false|string
 */
function query_category_product() {
    $categories = get_categories([
        'taxonomy' => 'product_cat',
        'post_type' => 'product',

    ]);
    $category_data = [];
    foreach ($categories as $category) :
        $category_data[] = [
            'name' => $category->name,
            'slug' => $category->slug,
            'link' => get_category_link($category)
        ];
    endforeach;
    return json_encode($category_data);
}

function get_product_categories($product) {
    $categories = get_the_terms($product->get_id(), 'product_cat');
    $category_slugs = array();

    if ($categories && !is_wp_error($categories)) {
        foreach ($categories as $category) {
            $category_slugs[] = $category->slug;
        }
    }

    return implode(' ', $category_slugs);
}