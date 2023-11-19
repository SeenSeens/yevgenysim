<?php
/**
 * Template Name: Home boxed
 * Template Post Type: page
 */
get_header();
?>
<section class="pt-12">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Heading -->
                <h2 class="mb-10 text-center">New Arrivals</h2>
            </div>
        </div>
        <div class="row">
            <?php
            $query_new_product = new WP_Query([
                'post_type' => 'product',
                'posts_per_page' => 8,
                'orderby' => 'date',
                'order' => 'DESC',
            ]);
            if($query_new_product->have_posts()) :
                while ($query_new_product->have_posts()) :
                    $query_new_product->the_post();
                    global $product;
                    ?>
                    <div class="col-6 col-md-3 col-lg-3">
                        <!-- Card -->
                        <div class="card mb-7" data-toggle="card-collapse">
                            <!-- Image -->
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full', [ 'class' => 'card-img-top']); ?>
                            </a>
                            <!-- Collapse -->
                            <div class="card-collapse-parent">
                                <!-- Body -->
                                <div class="card-body px-0 bg-white text-center">
                                    <!-- Heading -->
                                    <div class="mb-1 fw-bold">
                                        <a class="text-body" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </div>
                                    <!-- Price -->
                                    <div class="mb-1 fw-bold text-muted">
                                        <?php echo $product->get_price_html(); ?>
                                    </div>
                                    <!-- Rating -->
                                </div>
                                <!-- Footer -->
                                <div class="card-collapse collapse">
                                    <div class="card-footer px-0 pt-0 bg-white text-center">
                                        <button class="yith-wcqv-button btn btn-xs btn-link btn-circle" data-product_id="<?php echo esc_attr(get_the_ID()); ?>">
                                            <i class="fe fe-eye"></i>
                                        </button>
                                        <form class="btn btn-xs btn-link btn-circle" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
                                            <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="btn btn-xs btn-link btn-circle" data-toggle="button">
                                                <i class="fe fe-shopping-cart"></i>
                                            </button>
                                        </form>
                                        <a
                                            href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'add_to_wishlist', get_the_ID() ), 'add_to_wishlist' ) ); ?>"
                                            class="btn btn-xs btn-circle add_to_wishlist"
                                            data-toggle="button"
                                            data-product-id="<?php echo esc_attr(get_the_ID()); ?>">
                                            <i class="fe fe-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            endif;
            ?>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Link  -->
                <div class="mt-7 text-center">
                    <a class="link-underline" href="shop.html">Discover more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
