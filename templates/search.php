<?php
$product_categories = get_terms('product_cat');
?>
<!-- Search -->
<div class="offcanvas offcanvas-end" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- Close -->
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
        <i class="fe fe-x" aria-hidden="true"></i>
    </button>
    <!-- Header-->
    <div class="offcanvas-header lh-fixed fs-lg">
        <strong class="mx-auto">Search Products</strong>
    </div>
    <!-- Body: Form -->
    <?php
    if (!empty($product_categories) && !is_wp_error($product_categories)) :
    ?>
    <div class="offcanvas-body">
        <form>
            <div class="form-group">
                <label class="visually-hidden" for="modalSearchCategories">Categories:</label>
                <select class="form-select" id="modalSearchCategories">
                    <option selected>All Categories</option>
                    <?php foreach ($product_categories as $category) : ?>
                    <option><?php echo esc_html($category->name); ?></option>
                    <?php endforeach;    ?>
                </select>
            </div>
            <div class="input-group input-group-merge">
                <input class="form-control search-ajax" type="search" placeholder="Search" name="s">
                <div class="input-group-append">
                    <button class="btn btn-outline-border" type="button">
                        <i class="fe fe-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Body: Results (add `.d-none` to disable it) -->
    <div class="offcanvas-body border-top fs-sm" id="load-data">
    </div>
    <?php endif; ?>
</div>