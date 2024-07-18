<?php
// Fields - Global
global $theme_dir;

// Fields - Local
$locations = get_field('locations', 'option');
$logo = get_field('company_logo_white', 'option');
$socials = get_field('social_media', 'option');
?>


<div class="section-footer">
    <!-- Image rendered in stylesheet -->
    <?php if ($locations) : ?>
        <div class="parallax"></div>
    <?php endif; ?>
    <div class="container">
        <?php if ($locations) : ?>
            <div class="row locations-row">
                <div class="col-sm-12 col-m-9 col-lg-9 locations-col">
                    <div class="locations-wrapper">
                        <div class="arrow-up"></div>
                        <div class="row">
                            <?php
                            $count = 0;
                            foreach ($locations as $location) :
                                if ($count === 0) :
                                    $classes = 'left selected';
                                else :
                                    $classes = 'right';
                                endif;
                            ?>
                                <div class=" col-md-6 no-gutters">
                                    <div class="individual-location <?php echo $classes; ?>">
                                        <h5 class="location-heading"><?php echo $location['country']; ?></h5>
                                        <div class="top">
                                            <p class="sub-heading"><?php echo $location['name']; ?></p>
                                            <p><?php echo $location['address']; ?></p>
                                        </div>
                                        <div class="bottom">
                                            <p class="sub-heading">Contact&nbsp;Sales</p>
                                            <a href="tel:<?php echo $location['phone_number']; ?>"><i class="fas fa-mobile-alt"></i><?php echo $location['phone_number']; ?></a><br />
                                            <a href="mailto:<?php echo $location['email']; ?>">
                                                <i class="fal fa-paper-plane"></i><?php echo $location['email']; ?>
                                            </a><br />
                                        </div>
                                        <a href="<?php echo $location['link_to']; ?>" class="view-location">View This Location <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <?php $count++; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row justify-around top-row">
            <div class="col col-12">
                <?php wp_nav_menu(array('theme_location' => 'footer', 'container' => '', 'menu_id' => 'menu-footer', 'menu_class' => 'footer-menu')); ?>
            </div>
        </div>
        <div class="row bottom-row">
            <div class="col col-5 col-m-12 left-col">
                <a href="/" aria-current="page" class="logo-wrap for-footer w-inline-block w--current">
                    <img class="logo for-dark lazyload" data-src="<?php echo $logo['sizes']['large']; ?>">
                </a>
            </div>
            <div class="col col-7 col-m-12 right-col">
                <div class="social-media-links-wrap for-footer">
                    <?php foreach ($socials as $social) : ?>
                        <a href="<?php echo $social['link']; ?>" class="social-link <?php echo $social['name']; ?>"><i class="<?php echo $social['fa_icon']; ?>"></i></a>
                    <?php endforeach; ?>
                </div>
                <div class="footer-credits">Copyright © 2022
                    <a href="#" class="footer-link credits">Machitech</a>.
                    All Rights Reserved.<br>
                    <em>Machine models and specifications are subject to change without notice.</em>
                </div>
            </div>
        </div>
    </div>
</div>