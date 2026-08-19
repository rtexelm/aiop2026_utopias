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

<main class="site-content partners" id="main-content">
    <div id="fullpage-texture"></div>

    <h1 class="hidden">PARTNERS</h1>

    <?php while (have_posts()) : the_post(); ?>

    <div class="partner_images popwalk">
    </div>
    <div class="partner popwalk">
        <img src="<?php bloginfo('template_url'); ?>/assets/about/Partners_popwalk-logo.png" alt="Popwalk logo"
            class="logo">
        <p class="h2">Popwalk</p>
        <p class=""><?php the_field('partners_popwalk'); ?></p>
        <div class="links">
            <a href=" https://sitessetforknowledge.org/2020/10/16/art-in-odd-places-popwalk/"
                class="button primary">Festival map</a>
            <a href="http://www.popwalkapp.com/" class="button secondary">View website</a>
        </div>
    </div>

    <div class="partner_images pollinate">
        <img src="<?php bloginfo('template_url'); ?>/assets/about/Partners-Mockup_Pollinate-2.png"
            alt="Pollinate app sreenshot" class="sreenshot img_pollinate">
    </div>
    <div class="partner pollinate">
        <img src="<?php bloginfo('template_url'); ?>/assets/about/Partners_pollinate-logomark.png" alt="Pollinate logo"
            class="logo">
        <p class="h2">Pollinate</p>
        <p class=""><?php the_field('partners_pollinate'); ?></p>
        <div class="links">
            <a href="https://events.pollinate.co/#/exhibition/168" class="button primary">Festival map</a>
            <a href="https://www.pollinate.co/" class="button secondary">View website</a>
        </div>
    </div>

    </section>

    <?php endwhile; // end of the loop. 
    ?>
</main><!-- #primary -->

<?php get_footer(); ?>