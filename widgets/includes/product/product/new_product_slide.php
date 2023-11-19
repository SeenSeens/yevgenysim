<?php
class new_product_slide extends WP_Widget {
    public function __construct() {
        parent::__construct( '', esc_html__( ' * New Product Slider', 'storefront' ),
            widget_options :[
                'classname' => '', // Tên class
                'description' => esc_html__( 'Hiển thị sản phẩm mới nhất dạng slider', 'storefront' ),
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
        $number    = isset($instance['number']) ? absint($instance['number']) : -1;
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
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : -1;
        $query_new_product = query_new_product( $number );
        ?>
        <section class="py-6">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Heading -->
                        <h2 class="mb-10 text-center"><?php if( !empty( $title )) echo $title; ?></h2>
                    </div>
                </div>
            </div>
            <div class="flickity-page-dots-progress" data-flickity='{"pageDots": true}'>
                <?php
                if($query_new_product->have_posts()) :
                    while ($query_new_product->have_posts()) :
                        $query_new_product->the_post();
                        global $product;
                    ?>
                    <!-- Item -->
                    <div class="col px-4" style="max-width: 300px;">
                        <div class="card">
                            <!-- Image -->
                            <div class="card-img">
                                <!-- Action -->
                                <a
                                        href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'add_to_wishlist', get_the_ID() ), 'add_to_wishlist' ) ); ?>"
                                        class="btn btn-xs btn-circle btn-white-primary card-action card-action-end add_to_wishlist single_add_to_wishlist"
                                        data-toggle="button"
                                        data-product-id="<?php echo esc_attr(get_the_ID()); ?>">
                                    <i class="fe fe-heart"></i>
                                </a>
                                <!-- Button -->
                                <?php echo do_shortcode('[yith_quick_view product_id=' . get_the_ID() .']'); ?>
                                <!-- Image -->
                                <?php the_post_thumbnail('full', [ 'class' => 'card-img-top img-fluid']); ?>
                            </div>
                            <!-- Body -->
                            <div class="card-body fw-bold text-center">
                                <a class="text-body" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <br>
                                <span class="text-muted"><?= $product->get_price_html(); ?></span>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                endif;
//                endforeach;
                ?>
            </div>
        </section>
        <?php
    }
}