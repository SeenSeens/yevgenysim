<?php
class new_post_boxed extends WP_Widget {
    public function __construct() {
        parent::__construct( '', esc_html__( ' * New Post', 'storefront' ),
            widget_options :[
                'classname' => '', // Tên class
                'description' => esc_html__( 'Bài viết mới nhất', 'storefront' ),
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
        $number    = isset($instance['number']) ? absint($instance['number']) : 3;
        $instance = wp_parse_args($instance, $defaults);
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( ' Tiêu đề ', 'storefront' ); ?></label>
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
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
        $query_new_post = query_new_post( $number );
        ?>
        <!-- BLOG -->
        <section class="py-6 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Heading -->
                        <h2 class="mb-10 text-center"><?php if( !empty( $title )) echo $title; ?></h2>
                    </div>
                </div>
                <div class="row">
                    <?php

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
        <?php
    }
}