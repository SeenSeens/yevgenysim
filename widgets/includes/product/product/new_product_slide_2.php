<?php
class new_product_slide_2 extends WP_Widget {
    public function __construct() {
        parent::__construct( '', esc_html__( ' * New Product Slider 2', 'storefront' ),
            widget_options :[
                'classname' => '', // Tên class
                'description' => esc_html__( 'Hiển thị sản phẩm mới nhất dạng slider 2', 'storefront' ),
                'customize_selective_refresh' => true,
                'show_instance_in_rest'       => true,
            ]
        );
    }
    public function form( $instance ) {
        $defaults = [
            'title' => '',
            'number' => ''
        ];
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'storefront' );
        $number    = isset($instance['number']) ? absint($instance['number']) : 8;
        $instance = wp_parse_args($instance, $defaults);
        ?>
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
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['number']    = (int)$new_instance['number'];
        return $instance;
    }
    public function widget( $args, $instance ) {
        extract( $args );
        $title = $instance['title'];
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 8;
        $query_new_product = query_new_product( $number );
        ?>
        <!-- NEW ARRIVAL -->
        <section class="container py-6 border-bottom">
            <div class="row">
                <div class="col-12">
                    <!-- Heading -->
                    <h2 class="mb-10 text-center"><?php if( !empty( $title )) echo $title; ?></h2>
                    <!-- Slider-->
                    <div class="flickity-buttons-lg flickity-buttons-offset px-lg-12" data-flickity='{"prevNextButtons": true}'>
                        <?php
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
        <?php
    }
}