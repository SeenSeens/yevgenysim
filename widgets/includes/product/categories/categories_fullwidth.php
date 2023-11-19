<?php
class categories_fullwidth extends WP_Widget {
    public function __construct() {
        parent::__construct( '', esc_html__( ' * Product Categories Full Width', 'storefront' ),
            widget_options :[
                'classname' => '',
                'description' => esc_html__( 'Hiển thị chuyên mục sản phẩm full width', 'storefront' ),
                'customize_selective_refresh' => true,
                'show_instance_in_rest'       => true,
            ]
        );
    }
    public function form( $instance ) {
        $defaults = [
            'number' => ''
        ];
        $number    = isset($instance['number']) ? absint($instance['number']) : 3;
        $instance = wp_parse_args($instance, $defaults);
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_attr_e( ' Số lượng ', 'storefront' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" value="<?php echo esc_attr( $number ); ?>">
        </p>
        <?php
    }
    public function update( $new_instance, $old_instance ) {
        $instance = [];
        $instance['number']    = (int)$new_instance['number'];
        return $instance;
    }
    public function widget( $args, $instance ) {
        extract( $args );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
        ?>
        <!-- CATEGORIES -->
        <section>
            <div class="row gx-0 d-block d-lg-flex flickity flickity-lg-none" data-flickity='{"watchCSS": true}'>
                <?php
                $product_categories = get_terms('product_cat');
                if (!empty($product_categories) && !is_wp_error($product_categories)) :
                    $count = 0; // Biến đếm số lượng chuyên mục đã lấy
                    foreach ($product_categories as $category) :
                        if ($count < $number) : // Giới hạn chỉ lấy 3 chuyên mục
                            // Lấy ID của chuyên mục
                            $category_id = $category->term_id;
                            // Lấy URL ảnh đại diện của chuyên mục sản phẩm
                            $category_image = get_term_meta($category_id, 'thumbnail_id', true);
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
        <?php
    }
}