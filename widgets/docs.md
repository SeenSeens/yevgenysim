<h1>Class Widget</h1>
# Tạo class widget
class ten_widget extends WP_Widget {
    public function __construct() { }
    public function form( $instance ) { }
    public function update( $new_instance, $old_instance ) { }
    public function widget( $args, $instance ) { }
}

# Construct()
parent::__construct( '', esc_html__( ' * Tên của widget', 'textdomain' ),
    widget_options :[
        'classname' => '', // Tên class 
        'description' => esc_html__( 'Mô tả chức năng của widgt', 'textdomain' ),
        'customize_selective_refresh' => true,
        'show_instance_in_rest'       => true,
    ]
);

# form
$defaults = [ 'key' => 'value']; // Khai báo 1 mảng các fiels input

$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'textdomain' ); // text

$number    = isset($instance['number']) ? absint($instance['number']) : 3; // number

$instance = wp_parse_args($instance, $defaults);

### Đoạn mã sau được dùng để hiện thị giao diện widget ở trang admin
<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( ' Tiêu đề ', 'textdomain' ); ?></label> // 

<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

<select name="<?= $this->get_field_id('categories'); ?>" id="<?= $this->get_field_id('categories'); ?>" style='width:50%;margin-left:5px'>

<option value="">Bất kỳ</option>
<?php
$all_categories = get_categories( [
    'taxonomy'     => '',
    'orderby'      => '',
    'show_count'   => 0,
    'pad_counts'   => 0,
    'hierarchical' => 1,
    'title_li'     => '',
    'hide_empty'   => 0
] );
foreach ($all_categories as $cat) {
    $sl = "";
    if ($cat->term_id == $categories) {
        $sl = "selected";
    }
    echo "<option value=\"" . $cat->term_id . "\" $sl>" . $cat->name . "</option>";
}
?>
</select>

<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" value="<?php echo esc_attr( $number ); ?>">

# update
$instance = [];

$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

$instance['categories'] = $_POST[$this->get_field_id('categories')];

$instance['number']    = (int)$new_instance['number'];

return $instance;

# widget
extract( $args );

$title = $instance['title'];

$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;

echo $args['before_widget'];
Code hiển thi tại đây
<?php if( !empty( $title )) echo $title; ?>
echo $args['after_widget'];