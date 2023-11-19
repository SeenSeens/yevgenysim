<?php
class categories_slide_owl extends WP_Widget {
    public function __construct() {
        parent::__construct( '', esc_html__( ' * Product Categories Slider', 'storefront' ),
            widget_options :[
                'classname' => '', // Tên class
                'description' => esc_html__( 'Hiển thị chuyên mục sản phẩm dạng slider owl', 'storefront' ),
                'customize_selective_refresh' => true,
                'show_instance_in_rest'       => true,
            ]
        );
    }
    public function form( $instance ) {
        $defaults = [
            'title' => '',
        ];
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'storefront' );
        $instance = wp_parse_args($instance, $defaults);
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( ' Tiêu đề ', 'storefront' ); ?>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }
    public function update( $new_instance, $old_instance ) {
        $instance = [];
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        return $instance;
    }
    public function widget( $args, $instance ) {
        extract( $args );
        $title = $instance['title'];
        ?>
        <!-- CATEGORIES -->
        <section class="py-6">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-4 text-center"><?php if( !empty( $title )) echo $title; ?></h2>
                        <div class="owl-carousel owl-theme">
                            <?php
                            $product_categories = get_terms('product_cat');
                            if (!empty($product_categories) && !is_wp_error($product_categories)) :
                                foreach ($product_categories as $category) :
                                    $category_id = $category->term_id;
                                    $category_image = get_term_meta($category_id, 'thumbnail_id', true);
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
        <?php
    }
}
?>