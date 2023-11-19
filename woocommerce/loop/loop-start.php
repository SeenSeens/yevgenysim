<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- FILTERS -->
<section class="py-7 border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md">
                <!-- Categories -->
                <?php
                $categories = query_category_product();
                $category_data = json_decode($categories, true);
                if (is_array($category_data) && !empty($category_data)) :
                ?>
                <nav class="nav nav-overflow mb-6 mb-md-0">
                    <?php
                    foreach ($category_data as $category) :
                        $category_name = $category['name'];
                        $category_slug = $category['slug'];
                        $category_link = $category['link'];
                        ?>
                            <a class="nav-link " href="<?= esc_html($category_link)?>"><?= esc_html($category_name); ?></a>
                        <?php
                    endforeach;
                    ?>
                </nav>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-auto text-center">
                <!-- Filter -->
                <a class="text-body" data-bs-toggle="collapse" href="#collapseFilter" role="button">
                    <i class="fe fe-list me-2"></i> Filter
                </a>
                <!-- Sort -->
                <div class="dropdown ms-6">
                    <!-- Toggle -->
                    <a class="dropdown-toggle text-body" data-bs-toggle="dropdown" href="#">Default</a>
                    <?php custom_woocommerce_catalog_ordering() ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FILTERS (collapse) -->
<section class="collapse" id="collapseFilter" ng-app="appFiler">
    <form class="py-7 border-bottom">
        <div class="container" ng-controller="myCtrlFilter">
            <div class="row">
                <div class="col-12 col-md-3">
                    <!-- Heading -->
                    <p class="fs-lg">
                        <strong>Season:</strong>
                    </p>
                    <!-- Form group -->
                    <div class="form-group form-group-overflow mb-md-0">
                        <div class="form-check mb-3" >
                            <input class="form-check-input" id="seasonOne" name="category" type="checkbox" value="Summer">
                            <label class="form-check-label" for="seasonOne">Summer</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="seasonTwo" name="category" type="checkbox" value="Winter">
                            <label class="form-check-label" for="seasonTwo">Winter</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="seasonThree" name="category" type="checkbox" value="Spring & Fall">
                            <label class="form-check-label" for="seasonThree">Spring & Fall</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <!-- Heading -->
                    <p class="fs-lg">
                        <strong>Size:</strong>
                    </p>
                    <!-- Form group -->
                    <div class="form-group form-group-overflow mb-md-0">
                        <div class="form-check form-check-inline form-check-size mb-2">
                            <input class="form-check-input" id="sizeOne" type="checkbox">
                            <label class="form-check-label" for="sizeOne">
                                3XS
                            </label>
                        </div>
                        <div class="form-check form-check-inline form-check-size mb-2">
                            <input class="form-check-input" id="sizeTwo" type="checkbox" disabled>
                            <label class="form-check-label" for="sizeTwo">
                                2XS
                            </label>
                        </div>
                        <div class="form-check form-check-inline form-check-size mb-2">
                            <input class="form-check-input" id="sizeThree" type="checkbox">
                            <label class="form-check-label" for="sizeThree">
                                XS
                            </label>
                        </div>
                        <div class="form-check form-check-inline form-check-size mb-2">
                            <input class="form-check-input" id="sizeFour" type="checkbox">
                            <label class="form-check-label" for="sizeFour">
                                S
                            </label>
                        </div>
                        <div class="form-check form-check-inline form-check-size mb-2">
                            <input class="form-check-input" id="sizeFive" type="checkbox">
                            <label class="form-check-label" for="sizeFive">
                                M
                            </label>
                        </div>
                        <div class="form-check form-check-inline form-check-size mb-2">
                            <input class="form-check-input" id="sizeSix" type="checkbox">
                            <label class="form-check-label" for="sizeSix">
                                L
                            </label>
                        </div>
                        <div class="form-check form-check-inline form-check-size mb-2">
                            <input class="form-check-input" id="sizeSeven" type="checkbox">
                            <label class="form-check-label" for="sizeSeven">
                                XL
                            </label>
                        </div>
                        <div class="form-check form-check-inline form-check-size mb-2">
                            <input class="form-check-input" id="sizeEight" type="checkbox" disabled>
                            <label class="form-check-label" for="sizeEight">
                                2XL
                            </label>
                        </div>
                        <div class="form-check form-check-inline form-check-size mb-2">
                            <input class="form-check-input" id="sizeNine" type="checkbox">
                            <label class="form-check-label" for="sizeNine">
                                3XL
                            </label>
                        </div>
                        <div class="form-check form-check-inline form-check-size mb-2">
                            <input class="form-check-input" id="sizeTen" type="checkbox">
                            <label class="form-check-label" for="sizeTen">
                                4XL
                            </label>
                        </div>
                        <div class="form-check form-check-inline form-check-size mb-2">
                            <input class="form-check-input" id="sizeEleven" type="checkbox">
                            <label class="form-check-label" for="sizeEleven">
                                One Size
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <!-- Heading -->
                    <p class="fs-lg">
                        <strong>Color:</strong>
                    </p>
                    <!-- Form group -->
                    <div  class="form-group form-group-overflow mb-md-0">
                        <form ng-submit="filterProducts()">
                            <div class="form-check form-check-inline form-check-color mb-3" ng-repeat="(id, color) in colors">
                                <input
                                        class="form-check-input"
                                        id="{{ id }}"
                                        type="checkbox"
                                        ng-model="selectedColors[id]"
                                        ng-change="filterProducts()"
                                        style="background-color: {{ color }}"
                                >
                                <label
                                        class="form-check-label"
                                        for="{{ id }}"
                                >
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <!-- Heading -->
                    <p class="fs-lg">
                        <strong>Price:</strong>
                    </p>
                    <!-- Form group-->
                    <div class="form-group form-group-overflow mb-6" id="priceGroup">
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="priceOne" type="checkbox">
                            <label class="form-check-label" for="priceOne">
                                $10.00 - $49.00
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="priceTwo" type="checkbox">
                            <label class="form-check-label" for="priceTwo">
                                $50.00 - $99.00
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="priceThree" type="checkbox">
                            <label class="form-check-label" for="priceThree">
                                $100.00 - $199.00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" id="priceFour" type="checkbox">
                            <label class="form-check-label" for="priceFour">
                                $200.00 and Up
                            </label>
                        </div>
                    </div>
                    <!-- Range -->
                    <div class="d-flex align-items-center">
                        <!-- Input -->
                        <input type="number" class="form-control form-control-xs" placeholder="$10.00" min="10">
                        <!-- Divider -->
                        <div class="text-gray-350 mx-2">‒</div>
                        <!-- Input -->
                        <input type="number" class="form-control form-control-xs" placeholder="$350.00" max="350">
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<!-- CONTENT -->
<section class="py-12" id="product-list">
    <div class="container">
        <div class="row grid" >
