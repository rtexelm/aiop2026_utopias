<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-artist
 *
 * @package WordPress
 * @subpackage AiOP_2025
 * @copyright  AiOP, Laurie Waxman, Ross Mabbett
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();

?>

<?php
wp_reset_query();

?>

<img src="<?php bloginfo('template_url'); ?>/assets/Grid-Home.svg" id="background-grid" alt="grid" class="background-img">

<main class="site-content maps">

	<h1 class="hidden">Maps</h1>

	<?php while (have_posts()) : the_post(); ?>

		<div class="partner popwalk">
			<img src="<?php bloginfo('template_url'); ?>/assets/Partners_popwalk-logo.png" alt="Popwalk logo" class="logo">
			<p class="h2">Popwalk</p>
			<img src="<?php bloginfo('template_url'); ?>/assets/map_popwalk.png" alt="Popwalk app screenshot" class="map">
			<div class="links">
				<a href="https://www.popwalkapp.com/embed/map?mapId=7ed3b2d0-a489-11eb-b504-0b6ba140ded4" target="_blank" class="button primary">Interactive map</a>
				<a href="http://www.popwalkapp.com/" target="_blank" class="button secondary">Website</a>
			</div>
		</div>

		<div class="partner pollinate">
			<img src="<?php bloginfo('template_url'); ?>/assets/Partners_pollinate-logomark.png" alt="Pollinate logo" class="logo">
			<p class="h2">Pollinate</p>
			<img src="<?php bloginfo('template_url'); ?>/assets/map_pollinate.png" alt="Pollinate app screenshot" class="map">
			<div class="links">
				<a href="https://events.pollinate.co/#/exhibition/168" target="_blank" class="button primary">Interactive map</a>
				<a href="https://www.pollinate.co/" target="_blank" class="button secondary">Website</a>
			</div>
		</div>

	<?php endwhile; // end of the loop. 
	?>
</main><!-- #primary -->

<?php get_footer(); ?>