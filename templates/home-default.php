<?php
/**
 * Template Name: Home default
 * Template Post Type: page
 */
get_header();
?>
<!-- CATEGORIES -->
<section>
    <div class="row gx-0 d-block d-lg-flex flickity flickity-lg-none" data-flickity='{"watchCSS": true}'>
        <?php
        $product_categories = get_terms('product_cat');
        if (!empty($product_categories) && !is_wp_error($product_categories)) :
            $count = 0; // Biến đếm số lượng chuyên mục đã lấy
            foreach ($product_categories as $category) :
                if ($count < 3) : // Giới hạn chỉ lấy 3 chuyên mục
                    // Lấy ID của chuyên mục
                    $category_id = $category->term_id;
                    // Lấy URL ảnh đại diện của chuyên mục sản phẩm
                    $category_image = get_woocommerce_term_meta($category_id, 'thumbnail_id', true);
                    $image_url = wp_get_attachment_image_url($category_image, 'thumbnail'); // 'full' là kích thước ảnh
        ?>
        <!-- Item -->
        <div class="col-12 col-md-6 col-lg-4 d-flex flex-column bg-cover" style="background-image: url(<?php echo esc_url($image_url); ?>);">
            <div class="card bg-dark-5 bg-hover text-white text-center" style="min-height: 470px;">
                <div class="card-body mt-auto mb-n11 py-8">
                    <!-- Heading -->
                    <h1 class="mb-0 fw-bolder">
                        <?= $category->name ?>
                    </h1>
                </div>
                <div class="card-body mt-auto py-8">
                    <!-- Button -->
                    <a class="btn btn-white stretched-link" href="<?= get_term_link($category) ?>">
                        <?= $category->name ?> <i class="fe fe-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php
                $count++; // Tăng biến đếm sau mỗi lần lấy
                else :
                    break;
                endif;
            endforeach;
        endif;
        ?>
    </div>
</section>
<!-- FEATURES -->
<section class="pt-7">
    <div class="container">
        <div class="row pb-7 border-bottom">
            <div class="col-12 col-md-6 col-lg-3">
                <!-- Item -->
                <div class="d-flex mb-6 mb-lg-0">
                    <!-- Icon -->
                    <i class="fe fe-truck fs-lg text-primary"></i>
                    <!-- Body -->
                    <div class="ms-6">
                        <!-- Heading -->
                        <h6 class="heading-xxs mb-1">
                            MIỄN PHÍ VẬN CHUYỂN
                        </h6>
                        <!-- Text -->
                        <p class="mb-0 fs-sm text-muted">
                            Từ tất cả các đơn hàng trên $100
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <!-- Item -->
                <div class="d-flex mb-6 mb-lg-0">
                    <!-- Icon -->
                    <i class="fe fe-repeat fs-lg text-primary"></i>
                    <!-- Body -->
                    <div class="ms-6">
                        <!-- Heading -->
                        <h6 class="mb-1 heading-xxs">
                            TRẢ LẠI MIỄN PHÍ
                        </h6>
                        <!-- Text -->
                        <p class="mb-0 fs-sm text-muted">
                            Trả lại tiền trong vòng 30 ngày
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <!-- Item -->
                <div class="d-flex mb-6 mb-md-0">
                    <!-- Icon -->
                    <i class="fe fe-lock fs-lg text-primary"></i>
                    <!-- Body -->
                    <div class="ms-6">
                        <!-- Heading -->
                        <h6 class="mb-1 heading-xxs">
                            MUA SẮM AN TOÀN
                        </h6>
                        <!-- Text -->
                        <p class="mb-0 fs-sm text-muted">
                            Bạn đang ở trong tay an toàn
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <!-- Item -->
                <div class="d-flex">
                    <!-- Icon -->
                    <i class="fe fe-tag fs-lg text-primary"></i>
                    <!-- Body -->
                    <div class="ms-6">
                        <!-- Heading -->
                        <h6 class="mb-1 heading-xxs">
                            HƠN 10.000 KIỂU
                        </h6>
                        <!-- Text -->
                        <p class="mb-0 fs-sm text-muted">
                            Chúng tôi có mọi thứ bạn cần
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- BEST PICKS -->
<section class="pt-12">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">
                <!-- Preheading -->
                <h6 class="heading-xxs mb-3 text-gray-400">
                    New Collection
                </h6>
                <!-- Heading -->
                <h2 class="mb-4">Best Picks 2019</h2>
                <!-- Subheading -->
                <p class="mb-10 text-gray-500">
                    Appear, dry there darkness they're seas, dry waters thing fly midst. Beast, above fly brought Very green.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 col-lg-4 d-flex flex-column">
                <!-- Card -->
                <div class="card mb-7 text-white" style="min-height: 400px; background-image: url(assets/img/products/product-1.jpg)">
                    <!-- Background -->
                    <div class="card-bg">
                        <div class="card-bg-img bg-cover" style="background-image: url(assets/img/products/product-1.jpg);"></div>
                    </div>
                    <!-- Body -->
                    <div class="card-body my-auto text-center">
                        <!-- Heading -->
                        <h4 class="mb-0">Bags Collection</h4>
                        <!-- Link -->
                        <a class="btn btn-link stretched-link text-reset" href="shop.html">
                            Shop Now <i class="fe fe-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-8 d-flex flex-column">
                <!-- Card -->
                <div class="card mb-7 text-body" style="min-height: 400px;">
                    <!-- Background -->
                    <div class="card-bg">
                        <div class="card-bg-img bg-cover" style="background-image: url(assets/img/products/product-2.jpg);"></div>
                    </div>
                    <!-- Body -->
                    <div class="card-body my-auto px-md-10 text-center text-md-start">
                        <!-- Circle -->
                        <div class="card-circle card-circle-lg card-circle-end">
                            <strong>save</strong>
                            <span class="fs-4 fw-bold">30%</span>
                        </div>
                        <!-- Heading -->
                        <h4 class="mb-0">Printed men’s Shirts</h4>
                        <!-- Link -->
                        <a class="btn btn-link stretched-link px-0 text-reset" href="shop.html">
                            Shop Now <i class="fe fe-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-8 d-flex flex-column">
                <!-- Card -->
                <div class="card mb-7 mb-md-0 text-body" style="min-height: 400px;">
                    <!-- Background -->
                    <div class="card-bg">
                        <div class="card-bg-img bg-cover" style="background-image: url(assets/img/products/product-3.jpg);"></div>
                    </div>
                    <!-- Body -->
                    <div class="card-body my-auto px-md-10 text-center text-md-start">
                        <!-- Heading -->
                        <h4 class="mb-0">Basic women’s Dresses</h4>
                        <!-- Link -->
                        <a class="btn btn-link stretched-link px-0 text-reset" href="shop.html">
                            Shop Now <i class="fe fe-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 col-lg-4 d-flex flex-column">
                <!-- Card -->
                <div class="card text-white" style="min-height: 400px;">
                    <!-- Background -->
                    <div class="card-bg">
                        <div class="card-bg-img bg-cover" style="background-image: url(assets/img/products/product-4.jpg);"></div>
                    </div>
                    <!-- Body -->
                    <div class="card-body my-auto text-center">
                        <!-- Heading -->
                        <h4 class="mb-0">Sweatshirts</h4>
                        <!-- Link -->
                        <a class="btn btn-link stretched-link text-reset" href="shop.html">
                            Shop Now <i class="fe fe-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- TOP SELLERS -->
<section class="py-12">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <!-- Heading -->
                <h2 class="mb-4 text-center">Top month Sellers</h2>
                <!-- Nav -->
                <div class="nav justify-content-center mb-10">
                    <?php
                    $product_categories = get_terms('product_cat');
                    if (!empty($product_categories) && !is_wp_error($product_categories)) :
                        foreach ($product_categories as $category) :
                    ?>
                    <a class="nav-link" href="#<?php echo esc_html($category->slug); ?>" data-bs-toggle="tab"><?php echo esc_html($category->name); ?></a>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <?php
            foreach ($product_categories as $category) :
                $query_best_sell = new WP_Query([
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'posts_per_page' => 8,
                    'meta_key' => 'total_sales',
                    'orderby' => 'meta_value_num',
                    'order' => 'desc',
                    'relation' => 'AND',
                    'tax_query' => [
                        [
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => $category->slug,

                        ]
                    ],
                ]);
                if($query_best_sell->have_posts()) :

            ?>
            <div class="tab-pane fade show" id="<?php echo esc_html($category->slug); ?>">
                <div class="row">
                    <?php
                    while ($query_best_sell->have_posts()) :
                        $query_best_sell->the_post();
                        global $product;
                    ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <!-- Card -->
                        <div class="card mb-7">
                            <!-- Image -->
                            <div class="card-img">
                                <!-- Image -->
                                <a class="card-img-hover" href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('full', [ 'class' => 'card-img-top']); ?>
                                </a>
                                <!-- Actions -->
                                <div class="card-actions">
                                    <span class="card-action">
                                        <button class="yith-wcqv-button btn btn-xs btn-circle btn-white-primary" data-product_id="<?php echo esc_attr(get_the_ID()); ?>">
                                            <i class="fe fe-eye"></i>
                                        </button>
                                    </span>
                                    <span class="card-action">
                                        <form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
                                            <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                                                <i class="fe fe-shopping-cart"></i>
                                            </button>
                                        </form>
                                    </span>
                                    <span class="card-action">
                                        <a
                                            href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'add_to_wishlist', get_the_ID() ), 'add_to_wishlist' ) ); ?>"
                                            class="btn btn-xs btn-circle btn-white-primary card-action card-action-end add_to_wishlist single_add_to_wishlist"
                                            data-toggle="button"
                                            data-product-id="<?php echo esc_attr(get_the_ID()); ?>">
                                            <i class="fe fe-heart"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <!-- Body -->
                            <div class="card-body px-0">
                                <!-- Category -->
                                <div class="fs-xs">
                                    <a class="text-muted" href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
                                </div>
                                <!-- Title -->
                                <div class="fw-bold">
                                    <a class="text-body" href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </div>
                                <!-- Price -->
                                <div class="fw-bold text-muted">
                                    <?= $product->get_price_html(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php
                endif;
            endforeach;
            ?>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Link  -->
                <div class="mt-7 text-center">
                    <a class="link-underline" href="#!">Discover more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- COUNTDOWN -->
<section class="py-13 bg-cover" style="background-image: url(<?= site_url('/wp-content/uploads/2023/10/cover-4.jpg')?>)">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-12 col-md-8 col-lg-6">
                <!-- Heading -->
                <h3 class="mb-7">
                    Get -50% from <br />Summer Collection
                </h3>
                <!-- Counter -->
                <div class="d-flex mb-9" data-countdown data-date="Dec 31, 2025 00:00:00">
                    <div class="text-center">
                        <div class="fs-1 fw-bolder text-primary" data-days>00</div>
                        <div class="heading-xxs text-muted">Days</div>
                    </div>
                    <div class="px-1 px-md-4">
                        <div class="fs-2 fw-bolder text-primary">:</div>
                    </div>
                    <div class="text-center">
                        <div class="fs-1 fw-bolder text-primary" data-hours>00</div>
                        <div class="heading-xxs text-muted">Hours</div>
                    </div>
                    <div class="px-1 px-md-4">
                        <div class="fs-2 fw-bolder text-primary">:</div>
                    </div>
                    <div class="text-center">
                        <div class="fs-1 fw-bolder text-primary" data-minutes>00</div>
                        <div class="heading-xxs text-muted">Minutes</div>
                    </div>
                    <div class="px-1 px-md-4">
                        <div class="fs-2 fw-bolder text-primary">:</div>
                    </div>
                    <div class="text-center">
                        <div class="fs-1 fw-bolder text-primary" data-seconds>00</div>
                        <div class="heading-xxs text-muted">Seconds</div>
                    </div>
                </div>
                <!-- Button -->
                <a class="btn btn-dark" href="shop.html">
                    Shop Now <i class="fe fe-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>