<?php
class categories_boxed extends WP_Widget {
    public function __construct() {
        parent::__construct( '', esc_html__( ' * Product Categories Boxed', 'storefront' ),
            widget_options :[
                'classname' => '', // Tên class
                'description' => esc_html__( 'Hiển thị chuyên mục sản phẩm boxed', 'storefront' ),
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
        <section class="pt-6">
            <div class="container-fluid px-3 px-md-6">
                <div class="row mx-n3">
                    <?php
                    $product_categories = get_terms('product_cat');
                    if (!empty($product_categories) && !is_wp_error($product_categories)) :
                        $count = 0; // Biến đếm số lượng chuyên mục đã lấy
                        foreach ($product_categories as $category) :
                            if ($count < $number ) { // Giới hạn chỉ lấy 3 chuyên mục
                                // Lấy ID của chuyên mục
                                $category_id = $category->term_id;
                                // Lấy URL ảnh đại diện của chuyên mục sản phẩm
                                $category_image = get_term_meta($category_id, 'thumbnail_id', true);
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
        <?php
    }
}