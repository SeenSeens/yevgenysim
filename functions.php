<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {

        wp_enqueue_style('libs', get_stylesheet_directory_uri() . '/assets/css/libs.bundle.css', [], '3.0.0', 'all');
        wp_enqueue_style('theme', get_stylesheet_directory_uri() . '/assets/css/theme.bundle.css', [], '5.1.3', 'all');
        wp_enqueue_style('carousel', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', [], '2.3.4', 'all');
        wp_enqueue_style('fontawesome', get_stylesheet_directory_uri() . '/assets/css/all.min.css', [], '6.4.2', 'all');
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'storefront-gutenberg-blocks' ) );

        wp_enqueue_script('angularjs', get_stylesheet_directory_uri() . '/assets/js/angular.min.js', [], '1.8.2', true);
        wp_enqueue_script('vendor', get_stylesheet_directory_uri() . '/assets/js/vendor.bundle.js', ['jquery'], '1.0', true);
        wp_enqueue_script('theme', get_stylesheet_directory_uri() . '/assets/js/theme.bundle.js', ['jquery'], '1.0', true);
        wp_enqueue_script('carousel', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', ['jquery'], '2.3.4', true);
        wp_enqueue_script('fontawesome', get_stylesheet_directory_uri() . '/assets/js/all.min.js', ['jquery'], '6.4.2', true);
        wp_enqueue_script('isotope', get_stylesheet_directory_uri() . '/assets/js/isotope.pkgd.min.js', ['jquery'], '3.0.6', true);
        wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', ['jquery'], '1.0', true);
        wp_enqueue_script('angular-app', get_stylesheet_directory_uri() . '/assets/js/angular-app.js', ['angularjs'], '1.0', true);
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

/**
 * Disable block widget
 */
function widget_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'widget_theme_support' );

/**
 * Thay đổi cấu trúc HTML của nút "Quick View"
 */
function custom_modify_quick_view_button($button, $label, $product_id) {
    global $product;
    $product_id = $product->get_id();
    $button = '<button class="yith-wcqv-button btn btn-xs w-100 btn-dark card-btn" data-product_id="' . esc_attr( $product_id ) . '"><i class="fe fe-eye me-2 mb-1"></i>' . $label . '</button>';
    return $button;
}
add_filter('yith_add_quick_view_button_html', 'custom_modify_quick_view_button', 10, 3);

function custom_modify_wishlist_button($button, $product_id, $icon, $label) {
    ob_start();
    $url = esc_url(wp_nonce_url(add_query_arg('add_to_wishlist', $product_id), 'add_to_wishlist'));
    ?>
    <a href="<?php echo $url; ?>" class="btn btn-xs btn-circle btn-white-primary card-action card-action-end" data-toggle="button" data-product-id="<?php echo esc_attr($product_id); ?>">
        <i class="fe fe-heart"></i>
    </a>
    <?php
    $button = ob_get_clean();
    return $button;
}
add_filter('yith_wcwl_add_to_wishlist_html', 'custom_modify_wishlist_button', 10, 4);

/**
 * Thêm class cho thẻ a trong Menu WordPress
 */

add_filter('nav_menu_link_attributes', 'wpshare247_add_link_atts', 1, 3);
function wpshare247_add_link_atts($classes, $item, $args)
{
    if (isset($args->alink_class)) {
        $classes['class'] = $args->alink_class;
    }
    return $classes;
}

require_once get_theme_file_path( '/custom-walker.php' );

/**
 * Search autocomplete
 */
add_action('wp_ajax_Post_filters', 'Post_filters');
add_action('wp_ajax_nopriv_Post_filters', 'Post_filters');
function Post_filters()
{
    if (isset($_POST['data'])) {
        $data = $_POST['data']; // nhận dữ liệu từ client
        // <!-- Heading -->
        echo '<p>Search Results:</p>';
        $getposts = new WP_query();
        $getposts->query('post_status=publish&showposts=10&s=' . $data);
        global $wp_query;
        $wp_query->in_the_loop = true;
        while ($getposts->have_posts()) : $getposts->the_post();
            ?>
            <!-- Items -->
            <div class="row align-items-center position-relative mb-5">
                <div class="col-4 col-md-3">
                    <!-- Image -->
                    <?php the_post_thumbnail('full', [ 'class' => 'img-fluid']); ?>
                </div>
                <div class="col position-static">
                    <!-- Text -->
                    <p class="mb-0 fw-bold">
                        <a class="stretched-link text-body" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <br>
                        <span class="text-muted">$129.00</span>
                    </p>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
        <!-- Button -->
        <a class="btn btn-link px-0 text-reset" href="<?= site_url('/cua-hang') ?>">
            View All <i class="fe fe-arrow-right ms-2"></i>
        </a>
        <?php
        die();
    }
}

/**
 * Tạo widget
 */
function widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Trang chủ', 'storefront' ),
            'id'            => 'home',
            'description'   => esc_html__( 'Add widgets here.', 'storefront' ),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        )
    );
}
add_action( 'widgets_init', 'widgets_init' );
require_once get_theme_file_path( '/widgets/widgets_index.php' );

/**
 * Woocommerce
 */

require_once get_theme_file_path('/inc/woocommerce.php');

/**
 * Hàm lấy ra chuyên mục
 */
if( !function_exists( 'dev_get_category' ) ) {
    function dev_get_category( $category_id ) {
        $categories = get_term( $category_id, 'category' );
        if ( !empty( $categories ) && !is_wp_error( $categories )) {
            $category = $categories;
            $category_name = $category->name;
            $category_link = get_category_link($category->term_id);
            return [
                'id' => $category_id,
                'name' => $category_name,
                'link' => $category_link
            ];
        }
        return false;
    }
}

/**
 * Phân trang
 */
if( !function_exists( 'dev_pagination' )) {
    function dev_pagination() {
        global $wp_query;

        $total_pages = $wp_query->max_num_pages;
        $current_page = max(1, get_query_var('paged'));

        $pagination_args = array(
            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format'       => '',
            'total'        => $total_pages,
            'current'      => $current_page,
            'show_all'     => false,
            'end_size'     => 1,
            'mid_size'     => 2,
            'prev_next'    => true,
            'prev_text'    => __('&laquo;'),
            'next_text'    => __('&raquo;'),
            'type'         => 'array',
            'add_args'     => false,
            'add_fragment' => ''
        );

        $paginate_links = paginate_links($pagination_args);

        if ($paginate_links) {
            echo '<nav id="post-navigation" class="navigation pagination mt-4 justify-content-center" role="navigation" aria-label="Post Navigation">';
            echo '<div class="nav-links">';
            echo '<ul class="page-numbers">';
            echo '<li>';
            foreach ($paginate_links as $link) {
                $link = str_replace('<a', '<a class="page-numbers"', $link);
                echo $link;
            }
            echo '</li>';
            echo '</ul>';
            echo '</div>';
            echo '</nav>';
        }
    }
}

/**
 * Remove "Category:", "Tag:", "Author:" from the_archive_title
 */
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});

/**
 * Breadcrumb
 */

function breadcrumb_single() {
    ?>
    <nav class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Breadcrumb -->
                    <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <?php
}
add_action('storefront_single_post_before', 'breadcrumb_single', 5);

function custom_storefront_post_header() {
    ?>
    <!-- HEADER -->
    <header class="container">
        <div class="row">
            <div class="col-12 text-center">
                <!-- Heading -->
                <h3 class="mb-3"><?php the_title(); ?></h3>
                <!-- Subheading -->
                <p class="mb-0 text-muted">
                    By <?php the_author() ?> / <?php the_modified_date('F d, Y') ?>
                </p>
            </div>
        </div>
    </header>
    <?php
}
add_action('storefront_single_post', 'custom_storefront_post_header', 10);

function custom_storefront_post_image() {
    ?>
    <!-- Image -->
    <section class="pt-10">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Image -->
                    <?php the_post_thumbnail('medium', [ 'class' => 'img-fluid rounded']); ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
add_action('storefront_single_post', 'custom_storefront_post_image', 20);

function custom_storefront_post_content() {
    ?>
    <!-- Content -->
    <section class="pt-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 fs-lg text-gray-500">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
add_action('storefront_single_post', 'custom_storefront_post_content', 30);

function bai_viet_lien_quan() {
    global $post;
    $categories = get_the_category($post->ID);
    if ($categories) :
        $category_ids = [];
        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
        $query = new WP_Query( [
            'category__in' => $category_ids,
            'post__not_in' => [ $post->ID ],
            'posts_per_page'=> 3, // Số bài viết bạn muốn hiển thị.
            'caller_get_posts'=>1
        ] );
    ?>
    <!-- BLOG -->
    <section class="py-12">
        <div class="container">
            <div class="row align-items-center mb-10">
                <div class="col-12">
                    <!-- Heading -->
                    <h2 class="mb-4 mb-sm-0 text-center">Latest in Blog</h2>
                </div>
            </div>
            <div class="row">
                <?php
                if( $query->have_posts() ) :
                    while ($query->have_posts()) :
                        $query->the_post();
                ?>
                <div class="col-12 col-md-4">
                    <!-- Card -->
                    <div class="card mb-7 mb-md-0">
                        <!-- Image -->
                        <?php the_post_thumbnail('thumbnail', [ 'class' => 'card-img-top rounded']); ?>
                        <!-- Badge -->
                        <div class="badge bg-white text-body card-badge card-badge-start text-uppercase">
                            <time datetime="<?php the_modified_date('Y m d'); ?>">
                                <?php the_modified_date('F d'); ?>
                            </time>
                        </div>
                        <!-- Body -->
                        <div class="card-body px-0 py-7">
                            <!-- Heading -->
                            <h6 class="mb-3"> <?php the_title(); ?> </h6>
                            <!-- Text -->
                            <p class="mb-2"> <?php the_excerpt(); ?></p>
                            <!-- Link -->
                            <a class="btn btn-link px-0 text-body" href="<?php the_permalink(); ?>">
                                Read more <i class="fe fe-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </section>
    <?php
    endif;
}
add_action('storefront_single_post_after', 'bai_viet_lien_quan', 5);

function add_active_class($classes, $item) {
    if (in_array('current-menu-item nav-link', $classes)) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_active_class', 10, 2);



/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    require_once get_theme_file_path( '/inc/bootstrap_5_wp_nav_menu_walker.php');
    //require_once get_theme_file_path('/inc/class-wp-bootstrap-navwalker.php');
}
add_action( 'after_setup_theme', 'register_navwalker' );