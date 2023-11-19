<?php
/**
 * Template Name: Home classic
 * Template Post Type: page
 */
get_header();
//<!-- SLIDER -->
echo do_shortcode('[smartslider3 slider="2"]');
?>
<!-- CATEGORIES -->
<section class="pt-6">
    <div class="container-fluid px-3 px-md-6">
        <div class="row mx-n3">
        	<?php
        	$product_categories = get_terms('product_cat');
        	if (!empty($product_categories) && !is_wp_error($product_categories)) :
        		$count = 0; // Biến đếm số lượng chuyên mục đã lấy
		        foreach ($product_categories as $category) :
		        	if ($count < 3) { // Giới hạn chỉ lấy 3 chuyên mục
		        	// Lấy ID của chuyên mục
        			$category_id = $category->term_id;
        			// Lấy URL ảnh đại diện của chuyên mục sản phẩm
        			$category_image = get_woocommerce_term_meta($category_id, 'thumbnail_id', true);
        			$image_url = wp_get_attachment_image_url($category_image, 'thumbnail'); // 'full' là kích thước ảnh
		            ?>
		            <div class="col-12 col-sm-4 d-flex flex-column px-3">
		                <!-- Card-->
		                <div class="card card-xl mb-3 mb-sm-0" style="min-height: 280px">
		                    <!-- Background -->
		                    <div class="card-bg">
		                        <div class="card-bg-img bg-cover" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>
		                    </div>
		                    <!-- Body -->
		                    <div class="card-body my-auto">
		                        <!-- Heading -->
		                        <h5 class="mb-0"><?= $category->name ?></h5>
		                        <!-- Link -->
		                        <a class="btn btn-link stretched-link px-0 text-reset" href="<?= get_term_link($category) ?>">
		                        Shop Now <i class="fe fe-arrow-right ms-2"></i>
		                        </a>
		                    </div>
		                </div>
		            </div>
		            <?php
            		$count++; // Tăng biến đếm sau mỗi lần lấy
            		} else {
            			break; // Thoát khỏi vòng lặp sau khi lấy đủ 3 chuyên mục
        			}
		        endforeach;
		    endif;
        	?>
        </div>
    </div>
</section>
<!-- CATEGORIES -->
<section class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4 text-center">Danh mục sản phẩm</h2>
                <div class="owl-carousel owl-theme">
				    <?php
				    $product_categories = get_terms('product_cat');
				    if (!empty($product_categories) && !is_wp_error($product_categories)) :
				        foreach ($product_categories as $category) :
				            $category_id = $category->term_id;
				            $category_image = get_woocommerce_term_meta($category_id, 'thumbnail_id', true);
				            $image_url = wp_get_attachment_image_url($category_image, 'full');
				            ?>
				            <div class="col px-4">
				                <div class="card">
				                    <img class="card-img-top" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>">
				                    <div class="card-body py-4 px-0 text-center">
				                        <a class="stretched-link text-body" href="<?php echo esc_url(get_term_link($category)); ?>">
				                            <h6>
				                            	<?php echo esc_html($category->name); ?> <small>(<?php echo esc_html($category->count); ?>)</small>
				                            </h6>
				                        </a>
				                    </div>
				                </div>
				            </div>
				            <?php
				        endforeach;
				    endif;
				    ?>
				</div>
            </div>
        </div>
    </div>
</section>
<!-- PRODUCTS -->
<section class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <!-- Card -->
            <div class="card card-lg">
                <!-- Circle -->
                <div class="card-circle card-circle-lg card-circle-end">
                    <strong class="fs-xs text-decoration-line-through opacity-80">$99.00</strong>
                    <span class="fs-6 fw-bold">$59.00</span>
                </div>
                <!-- Image -->
                <img class="card-img-top" src="http://yevgenysim.local/wp-content/uploads/2023/10/product-30.jpg" alt="...">
                <!-- Body -->
                <div class="card-body position-relative mx-6 mx-lg-11 mt-n11 bg-white text-center">
                    <!-- Heading -->
                    <h4 class="mb-0">Cropped Trousers</h4>
                    <!-- Link -->
                    <a class="btn btn-link stretched-link px-0 text-reset" href="shop.html">
                        Shop Now <i class="fe fe-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <!-- Card -->
            <div class="card card-lg">
                <!-- Circle -->
                <div class="card-circle card-circle-lg card-circle-end">
                    <strong class="fs-xs text-decoration-line-through opacity-80">$99.00</strong>
                    <span class="fs-6 fw-bold">$59.00</span>
                </div>
                <!-- Image -->
                <img class="card-img-top" src="http://yevgenysim.local/wp-content/uploads/2023/10/product-31.jpg" alt="...">
                <!-- Body -->
                <div class="card-body position-relative mx-6 mx-lg-11 mt-n11 bg-white text-center">
                    <!-- Heading -->
                    <h4 class="mb-0">Leather Sneakers</h4>
                    <!-- Link -->
                    <a class="btn btn-link stretched-link px-0 text-reset" href="shop.html">
                        Shop Now <i class="fe fe-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Heading -->
                <h2 class="mb-10 text-center">Sản phẩm mới</h2>
            </div>
        </div>
    </div>
    <div class="flickity-page-dots-progress" data-flickity='{"pageDots": true}'>
        <?php
        $query = new WC_Product_Query([
            'post_type' => 'product',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
        ]);
        $products = $query->get_products();
        foreach ($products as $product) :
            $product_id = $product->get_id();
            $product_title = $product->get_name();
            $product_price = $product->get_price();
            $product_image = $product->get_image();
            $product_permalink = $product->get_permalink();
        ?>
        <!-- Item -->
        <div class="col px-4" style="max-width: 300px;">
            <div class="card">
                <!-- Image -->
                <div class="card-img">
                    <!-- Action -->
                    <a
                        href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'add_to_wishlist', $product_id ), 'add_to_wishlist' ) ); ?>"
                        class="btn btn-xs btn-circle btn-white-primary card-action card-action-end add_to_wishlist single_add_to_wishlist"
                        data-toggle="button"
                        data-product-id="<?php echo esc_attr($product_id); ?>">
                        <i class="fe fe-heart"></i>
                    </a>
                    <!-- Button -->
                    <?php echo do_shortcode('[yith_quick_view product_id=' . $product_id .']'); ?>
                    <!-- Image -->
                    <?php echo $product_image; ?>
                </div>
                <!-- Body -->
                <div class="card-body fw-bold text-center">
                    <a class="text-body" href="<?= $product_permalink; ?>"><?= $product_title; ?></a> <br>
                    <span class="text-muted"><?= $product_price; ?></span>
                </div>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</section>

<section class="pb-12">
    <div class="container">
        <?php
        $popular_products = new WC_Product_Query([
            'post_type'      => 'product',
            'posts_per_page' => 3, // Số lượng sản phẩm bạn muốn lấy
            'meta_key'       => 'total_sales', // Sắp xếp theo tổng số lượng đã bán
            'orderby'        => 'meta_value_num',
            'order'          => 'desc', // Sắp xếp giảm dần để lấy sản phẩm bán chạy nhất
        ]);
        $products = $popular_products->get_products();
        $query_popular_products = new WP_Query([
            'post_type'      => 'product',
            'posts_per_page' => 3, // Số lượng sản phẩm bạn muốn lấy
            'meta_key'       => 'total_sales', // Sắp xếp theo tổng số lượng đã bán
            'orderby'        => 'meta_value_num',
            'order'          => 'desc', // Sắp xếp giảm dần để lấy sản phẩm bán chạy nhất
        ]);
        ?>
        <div class="row position-relative align-items-center">
            <div class="col-md-7 col-lg-5 offset-lg-1">
                <!-- Slider -->
                <div class="d-none d-md-block" data-flickity='{"fade": true, "asNavFor": "#sliderArrivals", "draggable": false}'>
                    <?php
                    while ($query_popular_products->have_posts()) :
                        $query_popular_products->the_post();
                        /*global $product;
                        $product_title = $product->get_name();
                        $product_price = $product->get_price(); // $product->get_price_html();
                        $product_image = $product->get_image();
                        $product_permalink = get_permalink();
                        $product_sale_price = $product->get_sale_price();*/
                    ?>
                    <!-- Item -->
                    <div class="w-100">
                        <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
                    </div>
                    <?php
                    endwhile;
                    ?>
                </div>
            </div>
            <div class="col-md-5 col-lg-4 offset-lg-1 position-static">
                <!-- Preheading -->
                <h6 class="heading-xxs text-center text-gray-400">
                    Perfect summer
                </h6>
                <!-- Heading -->
                <h3 class="mb-10 text-center">
                    Summer Days Look
                </h3>
                <!-- Slider -->
                <div class="position-static flickity-buttons-lg" id="sliderArrivals" data-flickity='{"pageDots": true, "prevNextButtons": true}'>
                    <?php
                    foreach ($products as $product) :
                        $product_id = $product->get_id();
                        $product_title = $product->get_name();
                        $product_price = $product->get_price();
                        $product_permalink = $product->get_permalink();
                        $product_sale_price = $product->get_sale_price();
                    ?>
                    <!-- Item -->
                    <div class="col-12 px-4">
                        <!-- Card -->
                        <div class="card">
                            <!-- Image -->
                            <div class="card-img">
                                <!-- Action -->
                                <button class="btn btn-xs btn-circle btn-white-primary card-action card-action-end" data-toggle="button">
                                    <i class="fe fe-heart"></i>
                                </button>
                                <!-- Image -->
                                <?php the_post_thumbnail('full', ['class' => 'card-img-top img-fluid']); ?>
                            </div>
                            <!-- Body -->
                            <div class="card-body fw-bold text-center">
                                <a class="fs-lg text-body" href="<?= $product_permalink; ?>"><?= $product_title; ?></a>
                                <div>
                                    <?php
                                    echo $product->get_price_html();
                                    ?>
<!--                                    <span class="text-gray-350 text-decoration-line-through">--><?php //= $product_price; ?><!--</span>-->
<!--                                    <span class="fs-lg text-primary">--><?php //= $product_sale_price;?><!--</span>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- BLOG -->
<section class="py-12 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Heading -->
                <h2 class="mb-10 text-center">Bài viết mới nhất</h2>
            </div>
        </div>
        <div class="row">
            <?php
            $query_new_post = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC',
            ]);
            if($query_new_post->have_posts()) :
                while ($query_new_post->have_posts()) :
                    $query_new_post->the_post();
            ?>
            <div class="col-12 col-md-4">
                <!-- Card -->
                <div class="card mb-7 shadow shadow-hover lift">
                    <!-- Image -->
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('full', ['class' => 'card-img-top img-fluid']); ?>
                    </a>
                    <!-- Body -->
                    <div class="card-body px-8 py-7">
                        <!-- Time -->
                        <p class="mb-3 fs-xs">
                            <a class="text-muted" href="<?php the_permalink(); ?>"><?php the_modified_date('m/d/Y') ?></a>
                        </p>
                        <!-- Heading -->
                        <h6 class="mb-0">
                            <a class="text-body" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h6>
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
                <!-- Link -->
                <div class="mt-7 text-center">
                    <a class="link-underline" href="<?php echo site_url('/blog'); ?>">Discover more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FEATURES -->
<section class="py-9">
    <div class="container">
        <div class="row">
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
<?php
get_footer('classic');
?>
