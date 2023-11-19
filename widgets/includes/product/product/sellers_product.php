<?php
class sellers_product extends WP_Widget {
    public function __construct() {
        parent::__construct( '', esc_html__( ' * Seller Product', 'storefront' ),
            widget_options :[
                'classname' => '', // Tên class
                'description' => esc_html__( 'Hiển thị sản phẩm best seller', 'storefront' ),
                'customize_selective_refresh' => true,
                'show_instance_in_rest'       => true,
            ]
        );
    }
    public function form( $instance ) {
        $defaults = [
            'preheading' => '',
            'title' => '',
            'number' => ''
        ];
        $preheading = ! empty( $instance['preheading'] ) ? $instance['preheading'] : esc_html__( '', 'storefront' );
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'storefront' );
        $number    = isset($instance['number']) ? absint($instance['number']) : 8;
        $instance = wp_parse_args($instance, $defaults);
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'preheading ' ) ); ?>"><?php esc_attr_e( ' Tiêu đề ở top', 'storefront' ); ?>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'preheading ' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'preheading' ) ); ?>" type="text" value="<?php echo esc_attr( $preheading  ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( ' Tiêu đề ', 'storefront' ); ?>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( ' Số lượng sản phẩm ', 'storefront' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" value="<?php echo esc_attr( $number ); ?>">
        </p>
        <?php
    }
    public function update( $new_instance, $old_instance ) {
        $instance = [];
        $instance['preheading'] = ( ! empty( $new_instance['preheading'] ) ) ? sanitize_text_field( $new_instance['preheading'] ) : '';
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['number']    = (int)$new_instance['number'];
        return $instance;
    }
    public function widget( $args, $instance ) {
        extract( $args );
        $preheading = $instance['preheading'];
        $title = $instance['title'];
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 8;
        $query_best_sell = query_best_sell( $number );
        ?>
        <!-- TOP SELLERS -->
        <section class="py-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                        <!-- Preheading -->
                        <h6 class="heading-xxs mb-3 text-center text-gray-400">
                            <?php if( !empty( $preheading )) echo $preheading; ?>
                        </h6>
                        <!-- Heading -->
                        <h2 class="mb-10 text-center"><?php if( !empty( $title )) echo $title; ?></h2>
                    </div>
                </div>
                <div class="row">
                    <?php
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
        <?php
    }
}