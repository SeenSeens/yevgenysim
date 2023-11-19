<?php
class new_product extends WP_Widget {
    public function __construct() {
        parent::__construct( '', esc_html__( ' * New Product', 'storefront' ),
            widget_options :[
                'classname' => '', // Tên class
                'description' => esc_html__( 'Hiển thị sản phẩm mới nhất', 'storefront' ),
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
        <section class="pt-6">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Heading -->
                        <h2 class="mb-10 text-center"><?php if( !empty( $title )) echo $title; ?></h2>
                    </div>
                </div>
                <div class="row">
                    <?php
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
        <?php
    }
}