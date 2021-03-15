<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Technovert_Clean
 */

?>
<footer>
    <div class="bg-footer text-white overflow-hidden">
        <div class="container-box clear-margin-b">
            <div class="row mx-0 py-50">
                <div class="col-md-4 col-lg-4 mb-xs-40">
                    <div class="pr-50 pr-xs-0">
                        <div class="footer-logo mb-20">
                            <img src="https://staging3.technovert.com/wp-content/uploads/technovert_logo.svg" class="w-100" />
                        </div>
                        <p class="footer-text-color font-16 line-height-24 mb-24">
                            Technovert is your digital partner. Our experience brings the
                            right insight, technology and teamwork together to create
                            outstanding digital experiences. Every time.
                        </p>
                        <span class="text-warning font-21 line-height-24">
                            We are hiring
                        </span>

                    </div>
                </div>
                <div class="col-md-8 d-none d-md-block mb-xs-40">
                    <div class="row mb-60">
                        <div class="col-md-4">
                            <p class="text-white mb-10">Services</p>
                            <?php
                            wp_nav_menu(
                            array(
                            'theme_location' => 'menu-1',
                            'menu'        => 'Services',
                            'menu_class' => 'footer-menus',
                            'container' => 'ul'

                            )
                            );
                            ?>
                        </div>
                        <div class="col-md-4">
                            <p class="text-white mb-10">Products</p>
                            <?php
                            wp_nav_menu(
                            array(
                            'theme_location' => 'menu-1',
                            'menu'        => 'Products',
                            'menu_class' => 'footer-menus',
                            'container' => 'ul'

                            )
                            );
                            ?>
                        </div>
                        <div class="col-md-4">
                            <p class="text-white mb-10">About</p>
                            <?php
                            wp_nav_menu(
                            array(
                            'theme_location' => 'menu-1',
                            'menu'        => 'About',
                            'menu_class' => 'footer-menus',
                            'container' => 'ul'

                            )
                            );
                            ?>
                        </div>

                    </div>
                    <p class="mb-10">Locaions</p>
                    <div class="row mb-60 font-14 footer-text-color">
                        <div class="col-md-4 ">
                            <p>6010 W Spring Creek Pkwy, Plano, TX 75024</p>
                            <p>+1 (425) 943-9412</p>
                        </div>
                        <div class="col-md-4">
                            <p>Plot 104 Kavuri Hills Madhapur, Hyderabad  500033</p>
                            <p>+91 40 4025 4293</p>
                        </div>
                        <div class="col-md-4">
                            <p>2211 Elliott Avenue, Suite 200 Seattle, WA 98121</p>
                            <p>+91 40 4025 4293</p>
                        </div>




                    </div>
                    <div>
                        <img src="https://staging3.technovert.com/wp-content/uploads/skyhigh_logo.svg" width="70" class="mr-20">
                        <img src="https://staging3.technovert.com/wp-content/uploads/soc_logo.svg" width="70" class="mr-20">
                        <img src="https://staging3.technovert.com/wp-content/uploads/gdpr_logo.svg" width="70" class="mr-20">
                        <img src="https://staging3.technovert.com/wp-content/uploads/iso_logo.svg" width="70">
                    </div>
                </div>
                <div class="d-block d-md-none">
                    <div class="mb-5">
                        <img src="https://staging3.technovert.com/wp-content/uploads/skyhigh_logo.svg" width="60" class="mr-20">
                        <img src="https://staging3.technovert.com/wp-content/uploads/soc_logo.svg" width="60" class="mr-20">
                        <img src="https://staging3.technovert.com/wp-content/uploads/gdpr_logo.svg" width="60" class="mr-20">
                        <img src="https://staging3.technovert.com/wp-content/uploads/iso_logo.svg" width="60">
                    </div>

                    <div class="accordion" id="accordiongroup">
                        <div class="mb-10 accordion-item">
                            <div class="accordion-header border rounded px-16 py-12" id="services">
                                <div class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#servicesinner" aria-expanded="true" aria-controls="servicesinner">
                                    <p class="text-white font-weight-extra-bold">Products</p>
                                    <img class="width-24 ml-auto" src="https://staging3.technovert.com/wp-content/uploads/chevron-right.svg" />
                                </div>
                            </div>

                            <div id="servicesinner" class="accordion-collapse collapse p-20" aria-labelledby="services" data-bs-parent="#accordiongroup">
                                <div class="accordion-body">
                                    <?php
                                    wp_nav_menu(
                                    array(
                                    'theme_location' => 'menu-1',
                                    'menu'        => 'Services',
                                    'menu_class' => 'footer-menus',
                                    'container' => 'ul'

                                    )
                                    );
                                    ?>
                                </div>

                            </div>
                        </div>
                        <div class="mb-10 accordion-item">
                            <div class="accordion-header border rounded px-16 py-12" id="products">
                                <div class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#productsinner" aria-expanded="true" aria-controls="productsinner">
                                    <p class="text-white font-weight-extra-bold">Products</p>
                                    <img class="width-24 ml-auto" src="https://staging3.technovert.com/wp-content/uploads/chevron-right.svg" />
                                </div>
                            </div>

                            <div id="productsinner" class="accordion-collapse collapse p-20" aria-labelledby="products" data-bs-parent="#accordiongroup">
                                <div class="accordion-body">
                                    <?php
                                    wp_nav_menu(
                                    array(
                                    'theme_location' => 'menu-1',
                                    'menu'        => 'Products',
                                    'menu_class' => 'footer-menus',
                                    'container' => 'ul'

                                    )
                                    );
                                    ?>
                                </div>

                            </div>
                        </div>
                        <div class="mb-10 accordion-item">
                            <div class="accordion-header border rounded px-16 py-12" id="company">
                                <div class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#companyinner" aria-expanded="true" aria-controls="companyinner">
                                    <p class="text-white font-weight-extra-bold">Products</p>
                                    <img class="width-24 ml-auto" src="https://staging3.technovert.com/wp-content/uploads/chevron-right.svg" />
                                </div>
                            </div>

                            <div id="companyinner" class="accordion-collapse collapse p-20" aria-labelledby="company" data-bs-parent="#accordiongroup">
                                <div class="accordion-body">
                                    <?php
                                    wp_nav_menu(
                                    array(
                                    'theme_location' => 'menu-1',
                                    'menu'        => 'About',
                                    'menu_class' => 'footer-menus',
                                    'container' => 'ul'

                                    )
                                    );
                                    ?>
                                </div>

                            </div>
                        </div>
                        <div class="mb-10 accordion-item">
                            <div class="accordion-header border rounded px-16 py-12" id="insight">
                                <div class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#insightinner" aria-expanded="true" aria-controls="insightinner">
                                    <p class="text-white font-weight-extra-bold">Products</p>
                                    <img class="width-24 ml-auto" src="https://staging3.technovert.com/wp-content/uploads/chevron-right.svg" />
                                </div>
                            </div>

                            <div id="insightinner" class="accordion-collapse collapse p-20" aria-labelledby="insight" data-bs-parent="#accordiongroup">
                                <div class="accordion-body">
                                    <div class="mb-30">
                                        <p class="mb-20">Contact</p>
                                        <ul>
                                            <li class="list-group-item bg-transparent p-0 border-0 font-14 footer-text-color">
                                                Plot 104 Kavuri Hills<br />
                                                Madhapur, Hyderabad 500033<br />
                                                +91 40 4025 4293
                                            </li>
                                            <li class="list-group-item bg-transparent border-0 font-14 footer-text-color px-0 py-4">
                                                6010 W Spring Creek Pkwy,<br />
                                                Plano, TX 75024<br />
                                                +1 (425) 943-9412
                                            </li>
                                            <li class="list-group-item bg-transparent p-0 border-0 font-14 footer-text-color">
                                                2211 Elliott Avenue, Suite 200<br />
                                                Seattle, WA 98121<br />
                                                +1 (425) 943-9412
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <div class="mb-10"><span class="footer-text-color text-xs">support@technovert.com</span></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="m-0" />
        <div class="container-box clear-margin-b">
            <div class="row align-items-center mx-0 py-40">
                <div class="col-md-5 col-sm-7 col-12  mb-xs-20">
                    <div>
                        <span class="text-light-gray font-16">© 2020, Technovert Solutions Inc</span>
                    </div>
                </div>
                <div class="col-md-7 col-sm-5 col-12">
                    <div class="row row-cols-sm-1 row-cols-2 row-cols-md-2">
                        <span class="footer-text-color font-16">Privacy Policy</span>
                        <span class="footer-text-color font-16">Terms of use</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
