<?php
// Fields - Global;
global $theme_dir;

// Fields - Local;
$selector = get_field('product_line_selector');
$products = $selector['products'];
?>

<?php if ($product_selector) : ?>

    <div class="section-product-line-selector">
        <div class="container">
            <div class="row">
                <div class="slider-column">
                    <div class="slider-wrap">
                        <div class="product-line-slider">
                            <?php foreach ($products as $product) : ?>
                                <div class="product-slide-container">
                                    <div class="product-card-wrap">
                                        <div class="product-card-image lazyload" data-bg="<?php echo $product['image']['sizes']['large']; ?>" role="img" aria-label="<?php echo $product['image']['alt']; ?>"></div>
                                        <h3 class="product-card-title"><?php echo $product['product_title']; ?></h3>
                                        <p class="product-card-text"><?php echo $product['product_text_1']; ?></p>
                                        <a href="<?php echo $product['main_button']['link_to']; ?>" class="btn btn-secondary"><?php echo $product['main_button']['text']; ?></a>
                                        <div class="fade"></div>
                                    </div>
                                    <div class="swipe-more-wrap">
                                        <i class="far fa-long-arrow-alt-left"></i>
                                        <div class="swipe-text">Swipe for More</div>
                                        <i class="far fa-long-arrow-alt-right"></i>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="content-column">
                    <div class="product-line-content-wrap">
                        <div class="section-label"><?php echo $selector['section_label']; ?></div>
                        <h2 class="section-title"><?php echo $selector['section_title']; ?></h2>
                        <p class="section-text"><?php echo $selector['section_text']; ?></p>
                        <div class="slider-buttons">
                            <button class="slick-next"><i class="fal fa-arrow-circle-left" aria-hidden="true" title="Previous Arrow"></i></button>
                            <button class="slick-prev"><i class="fal fa-arrow-circle-right" aria-hidden="true" title="Next Arrow"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="background-block"></div>
    </div>

<?php endif; ?>