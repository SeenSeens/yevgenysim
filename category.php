<?php
get_header();
$categories = get_categories();
?>
<!-- BREADCRUMB -->

<nav class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breadcrumb -->
                <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                }
                ?>
            </div>
        </div>
    </div>
</nav>
<!-- CONTENT -->
<section class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                the_archive_title( '<h3 class="mb-7 text-center">', '</h3>' );
                ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            // Lấy bài viết
            if(have_posts() ) :
                while(have_posts() ) :
                    the_post();
                    ?>
            <div class="col-12 col-lg-4">
                <div class="card mb7">
                    <!-- Badge -->
                    <!-- Image -->
                    <?php the_post_thumbnail('thumbnail', [ 'class' => 'card-img-top rounded']); ?>
                    <div class="card-body px-0">
                        <!-- Heading -->
                        <h5 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h5>
                        <p class="mb-0 text-gray-500"><?php the_excerpt(); ?></p>
                        <a class="btn btn-link stretched-link px-0 text-reset" href="<?php the_permalink(); ?>">Read More <i class="fe fe-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            wp_reset_query();
            ?>
        </div>
        <nav aria-label="pagination">
            <ul class="pagination">
                <li><a href=""><span aria-hidden="true">«</span><span class="visuallyhidden">previous set of pages</span></a></li>
                <li><a href=""><span class="visuallyhidden">page </span>1</a></li>
                <li><a href="" aria-current="page"><span class="visuallyhidden">page </span>2</a></li>
                <li><a href=""><span class="visuallyhidden">page </span>3</a></li>
                <li><a href=""><span class="visuallyhidden">page </span>4</a></li>
                <li><a href=""><span class="visuallyhidden">next set of pages</span><span aria-hidden="true">»</span></a></li>
            </ul>
        </nav>
        <?php dev_pagination(); ?>
    </div>
</section>
<?php get_footer(); ?>