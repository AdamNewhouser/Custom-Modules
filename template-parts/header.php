<?php 
// Fields - Global
global $theme_dir;

// Fields - Local
$cta = get_field('mobile_cta', 'option');
$phone_numbers = get_field('phone_numbers', 'option');
$logo = get_field('logo_main', 'option');
?>

<header class="header-main d-block">
    <div class="header-main-container container">
        <div class="header-top-nav-row row">
            <div class="top-nav" role="navigation" aria-label="Secondary Navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'top', 'container' => false, 'menu_class' => 'nav' ) ); ?>
                <a href="tel:<?php echo strip_phone_number( $phone_numbers['phone_1']['number'] ); ?>" class="top-phone"><?php echo $phone_numbers['phone_1']['vanity']; ?> <strong><?php echo $phone_numbers['phone_1']['number']; ?></strong></a>
                <a href="tel:<?php echo strip_phone_number( $phone_numbers['phone_2']['number'] ); ?>" class="top-phone"><?php echo $phone_numbers['phone_2']['vanity']; ?> <strong><?php echo $phone_numbers['phone_2']['number']; ?></strong></a>
            </div>
        </div>
        <div class="header-main-nav-row row">
            <div class="header-col-logo col-2">
                <a href="<?php echo home_url( '/' ); ?>" class="logo site-branding" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> Logo" rel="home" aria-current="page">
                    <img src="<?php echo $logo['sizes']['large']; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?> Logo">
                </a>
            </div>

            <div class="header-col-nav col-10">
                <div class="primary-nav">
                    <?php
                        wp_nav_menu( array( 
                            'theme_location' => 'main-menu',
                            'menu_class' => 'nav'
                        ) ); 
                    ?>
                </div>
                <a href="<?php echo $cta['page_link']; ?>" class="header-cta"><div><?php echo $cta['link_text']; ?></div></a>
                <a class="menu-toggle mburger mburger--tornado" href="#mmenu"><b></b><b></b><b></b><span class="invisible">main nav mobile menu trigger</span></a>
            </div>
        </div>
    </div>
</header>