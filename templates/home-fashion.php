<?php
/**
 * Template Name: Home fashion
 * Template Post Type: page
 */
get_header();
?>
<!-- TOP SELLERS -->
<section class="py-12">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <!-- Preheading -->
                <h6 class="heading-xxs mb-3 text-center text-gray-400">
                    Top selling
                </h6>
                <!-- Heading -->
                <h2 class="mb-10 text-center">Top wekeend Sellers</h2>
            </div>
        </div>
        <div class="row">
            <?php
            $query_best_sell = new WP_Query([
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => 8,
                'meta_key' => 'total_sales',
                'orderby' => 'meta_value_num',
                'order' => 'desc',
            ]);
            if($query_best_sell->have_posts()) :
                while ($query_best_sell->have_posts()) :
                    $query_best_sell->the_post();
                    global $product;
                    // Lấy danh sách chuyên mục sản phẩm của sản phẩm hiện tại
                    $product_categories = wp_get_post_terms(get_the_ID(), 'product_cat');
                    //$product_categories = wc_get_product_category_list($product->get_id());
                    ?>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                        <!-- Card -->
                        <div class="card mb-7" data-toggle="card-collapse">
                            <!-- Image -->
                            <div class="card-img" data-flickity='{"draggable": false}' id="productOneImg">
                                <a class="d-block w-100" href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('full', [ 'class' => 'card-img-top']); ?>
                                </a>
                            </div>
                            <!-- Collapse -->
                            <div class="card-collapse-parent">
                                <!-- Body -->
                                <div class="card-body px-0 pb-0 bg-white">
                                    <div class="row gx-0">
                                        <div class="col">
                                            <!-- Title -->
                                            <a class="d-block fw-bold text-body" href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                            <!-- Category -->
                                            <?php if (!empty($product_categories)) : ?>
                                                <a class="fs-xs text-muted" href="<?= esc_url(get_term_link($product_categories[0])); ?>">
                                                    <?php echo esc_html($product_categories[0]->name); ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Price -->
                                            <div class="fs-sm fw-bold text-muted">
                                                <?= $product->get_price_html(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Footer -->
                                <div class="card-collapse collapse">
                                    <div class="card-footer px-0 bg-white">

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
                    <a class="link-underline" href="<?= site_url('/cua-hang') ?>">Discover more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- NEW ARRIVAL -->
<section class="container py-12 border-bottom">
    <div class="row">
        <div class="col-12">
            <!-- Heading -->
            <h2 class="mb-10 text-center">New Arrivals</h2>
            <!-- Slider-->
            <div class="flickity-buttons-lg flickity-buttons-offset px-lg-12" data-flickity='{"prevNextButtons": true}'>
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
                        // Lấy danh sách chuyên mục sản phẩm của sản phẩm hiện tại
                        $product_categories = wp_get_post_terms(get_the_ID(), 'product_cat');
                        ?>
                        <!-- Card -->
                        <div class="col-12 col-md-4 mb-10 px-4">
                            <div class="card">
                                <!-- Image -->
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('full', [ 'class' => 'card-img-top' ]); ?>
                                </a>
                                <!-- Body -->
                                <div class="card-body px-0">
                                    <div class="d-flex">
                                        <!-- Caption -->
                                        <div class="me-auto">
                                            <!-- Heading -->
                                            <div class="fw-bold">
                                                <a class="text-body" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </div>
                                            <!-- Text -->
                                            <?php if (!empty($product_categories)) : ?>
                                                <div class="fs-sm">
                                                    <a class="text-muted" href="<?= esc_url(get_term_link($product_categories[0])); ?>">
                                                        <?= esc_html($product_categories[0]->name); ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <!-- Price -->
                                        <div class="fs-sm fw-bold text-muted">
                                            <?= $product->get_price_html(); ?>
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
            <!-- Button -->
            <div class="text-center">
                <a class="btn btn-dark" href="<?= site_url('/cua-hang') ?>">
                    Shop Now <i class="fe fe-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
