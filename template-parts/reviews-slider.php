<?php
// Fields - Global
global $theme_dir;

// Fields - Local
$reviews = get_field('product_specific_reviews') == 'yes' ? get_field('reviews') : get_field('reviews', 'option');
$reviews_link = get_field('reviews_section_link', 'option');

if (is_page_template('templates/category.php')) {
    $internal = 'internal';
}
?>

<?php if ($reviews) : ?>

    <section class="section-reviews <?php echo $internal; ?>">
        <div class="container">
            <div class="reviews-top-row row">
                <div class="top-title-column col-12 col-lg-8">
                    <div class="horizontal-line"></div>
                    <h2>What our clients are saying</h2>
                </div>
                <div class="top-link-column col-12 col-lg-4">
                    <a class="reviews-link" href="<?php echo $reviews_link['link']; ?>"><?php echo $reviews_link['text']; ?><i class="fas fa-triangle fa-rotate-90"></i></a>
                    <img class="reviews-quote-img" src="<?php echo $theme_dir; ?>/images/quote-icon.png">
                </div>
            </div>
            <!-- Slick.js slider -->
            <div class="reviews-image-slider col-12 col-lg-7">
                <?php foreach ($reviews as $review) : ?>
                    <div class="reviews-image-column">
                        <div class="reviews-image" style="background-image: url(<?php echo $review['review_image']['url']; ?>);"></div>
                        <a href="<?php echo $review['video']; ?>" class="reviews-video fancybox" data-fancybox><i class="fab fa-youtube"></i></a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="reviews-bottom-row row">
                <div class="reviews-text-column col-12 col-lg-5">
                    <?php foreach ($reviews as $review) : ?>
                        <div class="reviews-text">
                            <p><?php echo $review['text']; ?></p>
                            <ul class="reviews-stars">
                                <li><img class="stars" src="<?php echo $theme_dir; ?>/images/star-icon.svg" alt="blue star"></li>
                                <li><img class="stars" src="<?php echo $theme_dir; ?>/images/star-icon.svg" alt="blue star"></li>
                                <li><img class="stars" src="<?php echo $theme_dir; ?>/images/star-icon.svg" alt="blue star"></li>
                                <li><img class="stars" src="<?php echo $theme_dir; ?>/images/star-icon.svg" alt="blue star"></li>
                                <li><img class="stars" src="<?php echo $theme_dir; ?>/images/star-icon.svg" alt="blue star"></li>
                            </ul>
                            <span><?php echo $review['name']; ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        // Reviews Slider
        $(".reviews-image-slider").slick({
            arrows: false,
            asNavFor: ".reviews-text-column",
            slidesToShow: 1,
            dots: false,
            autoplay: true,
            autoplaySpeed: 6000,
        });

        $(".reviews-text-column").slick({
            arrows: false,
            asNavFor: ".reviews-image-slider",
            slidesToShow: 1,
            dots: false,
            autoplay: true,
            autoplaySpeed: 6000,
        });
    </script>

<?php endif; ?>