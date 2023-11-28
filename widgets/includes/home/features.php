<?php
class features extends WP_Widget {
    public function __construct() {
        parent::__construct( '', esc_html__( ' * FEATURES', 'storefront' ),
            widget_options :[
                'classname' => '', // Tên class
                'description' => esc_html__( 'Dịch vụ của chúng tôi', 'storefront' ),
                'customize_selective_refresh' => true,
                'show_instance_in_rest'       => true,
            ]
        );
    }
    public function form( $instance ) { }
    public function update( $new_instance, $old_instance ) { }
    public function widget( $args, $instance ) {
        ?>
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
    }
}