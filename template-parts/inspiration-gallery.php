<?php
// Fields - Global
global $theme_dir;

// Fields - Local
$galleries_main = get_field( 'galleries_main', 'option' );
$show_custom_gallery = get_field('show_custom_gallery');
$custom_gallery = get_field('custom_page_gallery') ? get_field('custom_page_gallery') : '';

if (is_home() || is_singular('post')) {
	$page_product = 'general';
} else {
	$page_product = get_field('product_type') ? get_field('product_type') : 'general';
}

$gallery_navs = '';
$gallery_tabs = '';
$product_select_set = false;
$counter_galleries = 0;

foreach( $galleries_main as $gallery ) {
    if( $gallery['product_select'] == $page_product && $show_custom_gallery != 'yes') {
        $product_select_set = true;
    }
}

foreach( $galleries_main as $gallery ) {
    $images = $gallery['images'];
    $gallery_slug = preg_replace( '/[^\w]/', '', $gallery['name'] );
    $gallery_nav_active_class = '';
    $gallery_tab_active_class = '';
    $gallery_product_select = $gallery['product_select'];
    $hidden_images = '';
    $counter_hidden_images = 0;
    
    // Set Active Class
    if( ( $counter_galleries == 0 ) && !$product_select_set && $show_custom_gallery != 'yes') {
        $gallery_nav_active_class = ' active';
        $gallery_tab_active_class = ' active';
    }
    elseif( $gallery_product_select == $page_product && $show_custom_gallery != 'yes') {
        $gallery_nav_active_class = ' active';
        $gallery_tab_active_class = ' active';
    }

    // Render excess images in fancybox
    if( sizeof( $images ) > 5 ) {
        foreach( $images as $image ) {
            if( $counter_hidden_images > 4 ) {
                $hidden_images .= '<a href="'. $image['sizes']['extra_large'] .'" class="custom-lightbox" data-product="'. $gallery_product_select .'" data-fancybox="product-gallery-'. $gallery_slug .'" data-caption="'. $image['caption'] .'">Gallery Image link '. $counter_hidden_images .' for Gallery '. $gallery['name'] .'</a>';
            }

            $counter_hidden_images++;
        }
    }

    // Populate Navs
    $gallery_navs .= '<div class="nav-item-wrap"><button class="nav-item btn btn-secondary'. $gallery_nav_active_class .'" id="'. $gallery_slug .'">'. $gallery['name'] .'</button></div>';

    // Populate Tabs
    $gallery_tabs .= '<div class="section-gallery-images-row row '. $gallery_slug . $gallery_tab_active_class .'">';
    $gallery_tabs .= '    <div class="section-gallery-column-1 col col-3 col-md-4">';
    $gallery_tabs .= '        <div class="gallery-image-wrap gallery-image-wrap-1">';
    $gallery_tabs .= '            <a href="'. $images[0]['sizes']['extra_large'] .'" class="custom-lightbox custom-lightbox-trigger" data-product="'. $gallery_product_select .'" data-fancybox="product-gallery-'. $gallery_slug .'" data-caption="'. $images[0]['caption'] .'">';
    $gallery_tabs .= '                <span class="invisible">Image Link 1 for '. $gallery['name'] .' Gallery</span>';
    $gallery_tabs .= '                <div class="custom-lightbox gallery-image" style="background-image:url('. $images[0]['sizes']['large'] .')"></div>';
    $gallery_tabs .= '            </a>';
    $gallery_tabs .= '            <div class="image-overlay">';
    // New caption conditional
    if( $images[0]['caption'] ) {
        $gallery_tabs .= '                <div class="gallery-plus-caption">'. $images[0]['caption'] .'</div>';
    }
    else {
        $gallery_tabs .= '                <div class="gallery-plus"><i class="far fa-plus"></i></div>';
    }
    $gallery_tabs .= '            </div>';
    $gallery_tabs .= '        </div>';
    $gallery_tabs .= '    </div>';
    $gallery_tabs .= '    <div class="section-gallery-column-mid gallery-2 col col-4 col-md-4">';
    $gallery_tabs .= '        <div class="gallery-image-wrap gallery-image-wrap-2">';
    $gallery_tabs .= '            <a href="'. $images[1]['sizes']['extra_large'] .'" class="custom-lightbox custom-lightbox-trigger" data-product="'. $gallery_product_select .'" data-fancybox="product-gallery-'. $gallery_slug .'" data-caption="'. $images[1]['caption'] .'">';
    $gallery_tabs .= '                <span class="invisible">Image Link 2 for '. $gallery['name'] .' Gallery</span>';
    $gallery_tabs .= '                <div class="custom-lightbox gallery-image" style="background-image:url('. $images[1]['sizes']['large'] .')"></div>';
    $gallery_tabs .= '            </a>';
    $gallery_tabs .= '            <div class="image-overlay">';
    // New caption conditional
    if( $images[1]['caption'] ) {
        $gallery_tabs .= '                <div class="gallery-plus-caption">'. $images[1]['caption'] .'</div>';
    }
    else {
        $gallery_tabs .= '                <div class="gallery-plus"><i class="far fa-plus"></i></div>';
    }
    $gallery_tabs .= '            </div>';
    $gallery_tabs .= '        </div>';
    $gallery_tabs .= '        <div class="gallery-image-wrap gallery-image-wrap-3">';
    $gallery_tabs .= '            <a href="'. $images[2]['sizes']['extra_large'] .'" class="custom-lightbox custom-lightbox-trigger" data-product="'. $gallery_product_select .'" data-fancybox="product-gallery-'. $gallery_slug .'" data-caption="'. $images[2]['caption'] .'">';
    $gallery_tabs .= '                <span class="invisible">Image Link 3 for '. $gallery['name'] .' Gallery</span>';
    $gallery_tabs .= '                <div class="custom-lightbox gallery-image" style="background-image:url('. $images[2]['sizes']['large'] .')"></div>';
    $gallery_tabs .= '            </a>';
    $gallery_tabs .= '            <div class="image-overlay">';
    // New caption conditional
    if( $images[2]['caption'] ) {
        $gallery_tabs .= '                <div class="gallery-plus-caption">'. $images[2]['caption'] .'</div>';
    }
    else {
        $gallery_tabs .= '                <div class="gallery-plus"><i class="far fa-plus"></i></div>';
    }
    $gallery_tabs .= '            </div>';
    $gallery_tabs .= '        </div>';
    $gallery_tabs .= '    </div>';
    $gallery_tabs .= '    <div class="section-gallery-column-mid gallery-3 col-12 col-12 col-md-4">';
    $gallery_tabs .= '        <div class="gallery-image-wrap gallery-image-wrap-4">';
    $gallery_tabs .= '            <a href="'. $images[3]['sizes']['extra_large'] .'" class="custom-lightbox custom-lightbox-trigger" data-product="'. $gallery_product_select .'" data-fancybox="product-gallery-'. $gallery_slug .'" data-caption="'. $images[3]['caption'] .'">';
    $gallery_tabs .= '                <span class="invisible">Image Link 4 for '. $gallery['name'] .' Gallery</span>';
    $gallery_tabs .= '                <div class="custom-lightbox gallery-image" style="background-image:url('. $images[3]['sizes']['large'] .')"></div>';
    $gallery_tabs .= '            </a>';
    $gallery_tabs .= '            <div class="image-overlay">';
    // New caption conditional
    if( $images[3]['caption'] ) {
        $gallery_tabs .= '                <div class="gallery-plus-caption">'. $images[3]['caption'] .'</div>';
    }
    else {
        $gallery_tabs .= '                <div class="gallery-plus"><i class="far fa-plus"></i></div>';
    }
    $gallery_tabs .= '            </div>';
    $gallery_tabs .= '        </div>';
    $gallery_tabs .= '        <div class="gallery-image-wrap gallery-image-wrap-5">';
    $gallery_tabs .= '            <a href="'. $images[4]['sizes']['extra_large'] .'" class="custom-lightbox custom-lightbox-trigger" data-product="'. $gallery_product_select .'" data-fancybox="product-gallery-'. $gallery_slug .'" data-caption="'. $images[4]['caption'] .'">';
    $gallery_tabs .= '                <span class="invisible">Image Link 5 for '. $gallery['name'] .' Gallery</span>';
    $gallery_tabs .= '                <div class="custom-lightbox gallery-image" style="background-image:url('. $images[4]['sizes']['large'] .')"></div>';
    $gallery_tabs .= '            </a>';
    $gallery_tabs .= '            <div class="image-overlay">';
    // New caption conditional
    if( $images[4]['caption'] ) {
        $gallery_tabs .= '                <div class="gallery-plus-caption">'. $images[4]['caption'] .'</div>';
    }
    else {
        $gallery_tabs .= '                <div class="gallery-plus"><i class="far fa-plus"></i></div>';
    }
    $gallery_tabs .= '            </div>';
    $gallery_tabs .= '        </div>';
    $gallery_tabs .= '    </div>';
    $gallery_tabs .= '    <div class="section-gallery-hidden">'. $hidden_images .'</div>';
    $gallery_tabs .= '</div>';

    $counter_galleries++;
}

if ($show_custom_gallery == 'yes' && $custom_gallery) { // For adding custom page specific gallery to gallery section
    $images = $custom_gallery['images'];
    $gallery_slug = preg_replace( '/[^\w]/', '', $custom_gallery['name'] );
    $gallery_nav_active_class = '';
    $gallery_tab_active_class = '';
    $gallery_product_select = $gallery_slug;
    $hidden_images = '';
    $counter_hidden_images = 0;

    $gallery_nav_active_class = ' active';
    $gallery_tab_active_class = ' active';

    // Render excess images in fancybox
    if( sizeof( $images ) > 5 ) {
        foreach( $images as $image ) {
            if( $counter_hidden_images > 4 ) {
                $hidden_images .= '<a href="'. $image['sizes']['extra_large'] .'" class="custom-lightbox" data-product="'. $gallery_product_select .'" data-fancybox="product-gallery-'. $gallery_slug .'" data-caption="'. $image['caption'] .'">Gallery Image link '. $counter_hidden_images .' for Gallery '. $custom_gallery['name'] .'</a>';
            }

            $counter_hidden_images++;
        }
    }

    // Populate Navs
    $gallery_navs .= '<div class="nav-item-wrap"><button class="nav-item btn btn-secondary'. $gallery_nav_active_class .'" id="'. $gallery_slug .'">'. $custom_gallery['name'] .'</button></div>';

    // Populate Tabs
    $gallery_tabs .= '<div class="section-gallery-images-row row '. $gallery_slug . $gallery_tab_active_class .'">';
    $gallery_tabs .= '    <div class="section-gallery-column-1 col col-3 col-md-4">';
    $gallery_tabs .= '        <div class="gallery-image-wrap gallery-image-wrap-1">';
    $gallery_tabs .= '            <a href="'. $images[0]['sizes']['extra_large'] .'" class="custom-lightbox custom-lightbox-trigger" data-product="'. $gallery_product_select .'" data-fancybox="product-gallery-'. $gallery_slug .'" data-caption="'. $images[0]['caption'] .'">';
    $gallery_tabs .= '                <span class="invisible">Image Link 1 for '. $gallery['name'] .' Gallery</span>';
    $gallery_tabs .= '                <div class="custom-lightbox gallery-image" style="background-image:url('. $images[0]['sizes']['large'] .')"></div>';
    $gallery_tabs .= '            </a>';
    $gallery_tabs .= '            <div class="image-overlay">';
    // New caption conditional
    if( $images[0]['caption'] ) {
        $gallery_tabs .= '                <div class="gallery-plus-caption">'. $images[0]['caption'] .'</div>';
    }
    else {
        $gallery_tabs .= '                <div class="gallery-plus"><i class="far fa-plus"></i></div>';
    }
    $gallery_tabs .= '            </div>';
    $gallery_tabs .= '        </div>';
    $gallery_tabs .= '    </div>';
    $gallery_tabs .= '    <div class="section-gallery-column-mid gallery-2 col col-4 col-md-4">';
    $gallery_tabs .= '        <div class="gallery-image-wrap gallery-image-wrap-2">';
    $gallery_tabs .= '            <a href="'. $images[1]['sizes']['extra_large'] .'" class="custom-lightbox custom-lightbox-trigger" data-product="'. $gallery_product_select .'" data-fancybox="product-gallery-'. $gallery_slug .'" data-caption="'. $images[1]['caption'] .'">';
    $gallery_tabs .= '                <span class="invisible">Image Link 2 for '. $gallery['name'] .' Gallery</span>';
    $gallery_tabs .= '                <div class="custom-lightbox gallery-image" style="background-image:url('. $images[1]['sizes']['large'] .')"></div>';
    $gallery_tabs .= '            </a>';
    $gallery_tabs .= '            <div class="image-overlay">';
    // New caption conditional
    if( $images[1]['caption'] ) {
        $gallery_tabs .= '                <div class="gallery-plus-caption">'. $images[1]['caption'] .'</div>';
    }
    else {
        $gallery_tabs .= '                <div class="gallery-plus"><i class="far fa-plus"></i></div>';
    }
    $gallery_tabs .= '            </div>';
    $gallery_tabs .= '        </div>';
    $gallery_tabs .= '        <div class="gallery-image-wrap gallery-image-wrap-3">';
    $gallery_tabs .= '            <a href="'. $images[2]['sizes']['extra_large'] .'" class="custom-lightbox custom-lightbox-trigger" data-product="'. $gallery_product_select .'" data-fancybox="product-gallery-'. $gallery_slug .'" data-caption="'. $images[2]['caption'] .'">';
    $gallery_tabs .= '                <span class="invisible">Image Link 3 for '. $gallery['name'] .' Gallery</span>';
    $gallery_tabs .= '                <div class="custom-lightbox gallery-image" style="background-image:url('. $images[2]['sizes']['large'] .')"></div>';
    $gallery_tabs .= '            </a>';
    $gallery_tabs .= '            <div class="image-overlay">';
    // New caption conditional
    if( $images[2]['caption'] ) {
        $gallery_tabs .= '                <div class="gallery-plus-caption">'. $images[2]['caption'] .'</div>';
    }
    else {
        $gallery_tabs .= '                <div class="gallery-plus"><i class="far fa-plus"></i></div>';
    }
    $gallery_tabs .= '            </div>';
    $gallery_tabs .= '        </div>';
    $gallery_tabs .= '    </div>';
    $gallery_tabs .= '    <div class="section-gallery-column-mid gallery-3 col-12 col-12 col-md-4">';
    $gallery_tabs .= '        <div class="gallery-image-wrap gallery-image-wrap-4">';
    $gallery_tabs .= '            <a href="'. $images[3]['sizes']['extra_large'] .'" class="custom-lightbox custom-lightbox-trigger" data-product="'. $gallery_product_select .'" data-fancybox="product-gallery-'. $gallery_slug .'" data-caption="'. $images[3]['caption'] .'">';
    $gallery_tabs .= '                <span class="invisible">Image Link 4 for '. $gallery['name'] .' Gallery</span>';
    $gallery_tabs .= '                <div class="custom-lightbox gallery-image" style="background-image:url('. $images[3]['sizes']['large'] .')"></div>';
    $gallery_tabs .= '            </a>';
    $gallery_tabs .= '            <div class="image-overlay">';
    // New caption conditional
    if( $images[3]['caption'] ) {
        $gallery_tabs .= '                <div class="gallery-plus-caption">'. $images[3]['caption'] .'</div>';
    }
    else {
        $gallery_tabs .= '                <div class="gallery-plus"><i class="far fa-plus"></i></div>';
    }
    $gallery_tabs .= '            </div>';
    $gallery_tabs .= '        </div>';
    $gallery_tabs .= '        <div class="gallery-image-wrap gallery-image-wrap-5">';
    $gallery_tabs .= '            <a href="'. $images[4]['sizes']['extra_large'] .'" class="custom-lightbox custom-lightbox-trigger" data-product="'. $gallery_product_select .'" data-fancybox="product-gallery-'. $gallery_slug .'" data-caption="'. $images[4]['caption'] .'">';
    $gallery_tabs .= '                <span class="invisible">Image Link 5 for '. $gallery['name'] .' Gallery</span>';
    $gallery_tabs .= '                <div class="custom-lightbox gallery-image" style="background-image:url('. $images[4]['sizes']['large'] .')"></div>';
    $gallery_tabs .= '            </a>';
    $gallery_tabs .= '            <div class="image-overlay">';
    // New caption conditional
    if( $images[4]['caption'] ) {
        $gallery_tabs .= '                <div class="gallery-plus-caption">'. $images[4]['caption'] .'</div>';
    }
    else {
        $gallery_tabs .= '                <div class="gallery-plus"><i class="far fa-plus"></i></div>';
    }
    $gallery_tabs .= '            </div>';
    $gallery_tabs .= '        </div>';
    $gallery_tabs .= '    </div>';
    $gallery_tabs .= '    <div class="section-gallery-hidden">'. $hidden_images .'</div>';
    $gallery_tabs .= '</div>';

    $counter_galleries++;
}

?>
<section class="section-gallery <?php echo basename(get_page_template()) == 'page.php' ? 'default-template' : ''; ?>">
    <div class="section-gallery-container container">
        <div class="section-gallery-header-row row">
            <div class="section-gallery-title-container col col-12 col-md-12">
                <div class="section-gallery-title-area">
                    <div class="section-gallery-title-wrap">
                        <div class="horizontal-line"></div>
                        <h1 class="section-gallery-title">Inspiration Gallery</h1>
                    </div>
                    <div class="section-gallery-nav-container col">
                    <div class="section-gallery-nav">
                        <?php echo $gallery_navs; ?>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <?php echo $gallery_tabs; ?>

    </div>
</section>