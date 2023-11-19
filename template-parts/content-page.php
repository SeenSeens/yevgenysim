<div class="row row-cols-1">
    <div class="col">
        <?php the_title( '<h3 class="mb-10 text-center">', '</h3>' ); ?>
    </div>
</div>
<div class="row">
    <?php
    the_content();

    wp_link_pages(
        array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'storefront' ),
            'after'  => '</div>',
        )
    );
    ?>
</div>

<?php if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer">
        <?php
        edit_post_link(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'storefront' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->
<?php endif; ?>

