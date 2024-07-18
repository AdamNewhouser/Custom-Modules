<?php
// Fields - Global
global $theme_dir; // global variable for theme directory

// Fields - Local
$product_selector = get_field('product_selector', 'option'); // acf repeater field
$product_selector_title = get_field('product_selector_title', 'option');
?>

<?php if ($product_selector) : ?>

    <section class="prod-selector-main">
        <div class="container">
            <div class="prod-selector-row row">
                <div class="prod-selector-nav">
                    <div class="horizontal-line"></div>
                    <h2 class="nav-title"><?php echo $product_selector_title; ?></h2>
                    <div class="nav-tabs-slider">
                        <?php foreach ($product_selector as $product) : ?>
                            <div class="nav-slide" rel="Intro Navigation for <?php echo $product['name']; ?>"><?php echo $product['name']; ?></div>
                        <?php endforeach; ?>
                    </div>
                    <img class="nails-illustration" src="<?php echo $theme_dir; ?>/images/nails.png" alt="pencil illustration">
                </div>
                <div class="prod-selector-content-wrap">
                    <div class="prod-selector-slides">
                        <?php foreach ($product_selector as $product) : ?>
                            <div id="prod-<?php echo $product['name']; ?>" class="prod-slide" style="background-position:<?php echo $product['background_position'] ? $product['background_position'] : '0% 0%'; ?>;background-image: url(<?php echo $product['slide_background_image']['sizes']['extra_large']; ?>);">
                                <div class="slide-content-wrap">
                                    <h3 class="prod-slide-title"><?php echo $product['slide_title']; ?></h3>
                                    <p class="prod-slide-paragraph"><?php echo $product['slide_text']; ?></p>
                                    <div class="button-group">
                                        <?php if ($product['button_1']['button_url'] && $product['button_1']['button_text']) : ?>
                                            <a href="<?php echo $product['button_1']['button_url']; ?>" class="btn btn-primary"><?php echo $product['button_1']['button_text']; ?></a>
                                        <?php endif; ?>
                                        <?php if ($product['button_2']['button_url'] && $product['button_2']['button_text']) : ?>
                                            <a href="<?php echo $product['button_2']['button_url']; ?>" class="btn btn-secondary-alt"><?php echo $product['button_2']['button_text']; ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="prod-slide-overlay"></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>