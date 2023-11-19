<?php
global $post;
get_header();

do_action( 'storefront_single_post_before' );

get_template_part( 'content', 'single' );

do_action( 'storefront_single_post_after' );
get_footer();
?>
