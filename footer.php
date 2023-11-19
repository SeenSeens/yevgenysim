
  <footer class="bg-dark bg-cover" style="background-image: url(<?= site_url('/wp-content/themes/storefront-child/assets/img/patterns/pattern-2.svg') ?>)">
    <div class="py-12 border-bottom border-gray-700">
        <div class="container">
          <?php
          /**
           * Functions hooked in to storefront_footer action
           *
           * @hooked storefront_footer_widgets - 10
           * @hooked storefront_credit         - 20
           */
          //do_action( 'storefront_footer' );
          ?>
            <div class="row">
                <div class="col-12 col-md-3">
                    <h4 class="mb-6 text-white"><?php bloginfo('name'); ?></h4>
                    <ul class="list-unstyled list-inline mb-7 mb-md-0">
                        <li class="list-inline-item">
                            <a href="#!" class="text-gray-350">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="text-gray-350">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="text-gray-350">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="text-gray-350">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="text-gray-350">
                                <i class="fab fa-medium"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm">
                    <!-- Heading -->
                    <h6 class="heading-xxs mb-4 text-white">Support</h6>
                    <ul class="list-unstyled mb-7 mb-sm-0">
                        <li>
                            <a class="text-gray-300" href="./contact-us.html">Contact Us</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="./faq.html">FAQs</a>
                        </li>
                        <li>
                            <a class="text-gray-300" data-bs-toggle="modal" href="#modalSizeChart">Size Guide</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="./shipping-and-returns.html">Shipping & Returns</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm">
                    <!-- Heading -->
                    <h6 class="heading-xxs mb-4 text-white">
                        Shop
                    </h6>
                    <!-- Links -->
                    <ul class="list-unstyled mb-7 mb-sm-0">
                        <li>
                            <a class="text-gray-300" href="./shop.html">Men's Shopping</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="./shop.html">Women's Shopping</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="./shop.html">Kids' Shopping</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="./shop.html">Discounts</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm">
                    <!-- Heading -->
                    <h6 class="heading-xxs mb-4 text-white">
                        Company
                    </h6>
                    <!-- Links -->
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a class="text-gray-300" href="./about.html">Our Story</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="#!">Careers</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="#!">Terms & Conditions</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="#!">Privacy & Cookie policy</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm">
                    <!-- Heading -->
                    <h6 class="heading-xxs mb-4 text-white">
                        Contact
                    </h6>
                    <!-- Links -->
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a class="text-gray-300" href="#!">1-202-555-0105</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="#!">1-202-555-0106</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="#!">help@shopper.com</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
          <div class="container">
              <div class="row">
                  <div class="col">
                      <!-- Copyright -->
                      <p class="mb-3 mb-md-0 fs-xxs text-muted">
                          © <?= the_date('Y')?> All rights reserved. Designed by Unvab.
                      </p>
                  </div>
                  <div class="col-auto">
                      <!-- Payment methods -->
                      <img class="footer-payment" src="<?= site_url('/wp-content/themes/storefront-child/assets/img/payment/mastercard.svg'); ?>">
                      <img class="footer-payment" src="<?= site_url('/wp-content/themes/storefront-child/assets/img/payment/visa.svg'); ?>">
                      <img class="footer-payment" src="<?= site_url('/wp-content/themes/storefront-child/assets/img/payment/amex.svg'); ?>">
                      <img class="footer-payment" src="<?= site_url('/wp-content/themes/storefront-child/assets/img/payment/paypal.svg'); ?>">
                      <img class="footer-payment" src="<?= site_url('/wp-content/themes/storefront-child/assets/img/payment/maestro.svg'); ?>">
                      <img class="footer-payment" src="<?= site_url('/wp-content/themes/storefront-child/assets/img/payment/klarna.svg'); ?>">

                  </div>
              </div>
          </div>
      </div>
  </footer>

  <?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <?php require_once get_theme_file_path( '/templates/script_search_autocomplete.php' ); ?>
</body>
</html>
