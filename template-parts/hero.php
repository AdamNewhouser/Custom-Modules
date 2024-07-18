<?php
global $theme_dir, $display_forms;

$product = get_field('product_type');
$hero_title = get_field('hero_title');
$hero_text = get_field('hero_text');
$hero_form_header = get_field('form_headers', 'options');
$mobile_cta = get_field('hero_mobile_cta', 'option'); //blue
$hero_tiles = get_field('hero_tiles');
$background_position = get_field('bg_position') ? get_field('bg_position') : '50% 100%';
if (get_field('page_specific_hero_image') == 'yes') {
	$background_image = get_field('hero_image');
} else {
	$hero_pools = get_field('hero_pools', 'options');
	$number = rand(0, count($hero_pools[$product]));
	$background_image = $hero_pools[$product][$number];
}
?>

<section class="section-hero" style="background-image: url(<?php echo $background_image['sizes']['extra_large']; ?>);background-position:<?php echo $background_position; ?>;">
	<div class="hero-overlay"></div>
	<div class="hero-title-wrap">
		<h1 class="hero-title"><?php echo $hero_title; ?></h1>
		<div class="hero-description"><?php echo $hero_text; ?></div>
	</div>


	<div class="hero-tiles-wrap">
		<?php foreach ($hero_tiles as $tile) : ?>
			<a href="<?php echo $tile['tile_link']; ?>" class="hero-tile" style="background-image: url(<?php echo $tile['tile_image']['sizes']['medium']; ?>);">
				<div class="tile-label"><?php echo $tile['tile_text']; ?></div>
			</a>
		<?php endforeach; ?>
	</div>

	<?php if ($display_forms == 'yes') : ?>
		<div class="hero-form">
			<div class="offer-form"><?php // Add styles to this class globally in forms.scss 
									?>
				<div class="form-text-wrapper">
					<div class="horizontal-line"></div>
					<h2 class="offer-title"><?php echo $hero_form_header['hero_form_header']; ?></h2>
					<div class="offer-text"><?php echo $hero_form_header['hero_form_text']; ?></div>
				</div>
				<?php echo do_shortcode('*insert wpform id*'); ?>
			</div>
			<?php if ($hero_form_header['hero_form_disclaimer']) : ?>
				<div class="hero-disclaimer"><?php echo $hero_form_header['hero_form_disclaimer']; ?></div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if ($mobile_cta['title']) : ?>
		<div class="hero-mobile-cta">
			<div class="mobile-cta-content-wrap">
				<div class="horizontal-line"></div>
				<h2 class="cta-title"><?php echo $mobile_cta['title']; ?></h2>
				<?php if ($mobile_cta['text']) : ?>
					<p class="cta-paragraph"><?php echo $mobile_cta['text']; ?></p>
				<?php endif; ?>
				<?php if ($mobile_cta['button']['text'] && $mobile_cta['button']['link']) : ?>
					<a href="<?php echo $mobile_cta['button']['link']; ?>" class="btn btn-secondary-small"><?php echo $mobile_cta['button']['text']; ?></a>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
</section>