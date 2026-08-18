<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-artist
 *
 * @package WordPress
 * @subpackage AiOP_2024
 * @copyright  AiOP, Laurie Waxman, Ross Mabbett
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();

?>

<?php
wp_reset_query();

$pressArgs = array(
    'post_type' => 'press',
    'meta_key' => 'article_date',
    'orderby' => 'meta_value',
    'order'    => 'DSC',
    'posts_per_page' => 100
);

$pressQuery = new WP_Query($pressArgs);


?>

<div id="press-bg"></div>
<main class="site-content press press-listing">

    <section class="press-posts">
        <h1>Press</h1>
        <?php
        if ($pressQuery->have_posts()): ?>
        <?php while ($pressQuery->have_posts()): $pressQuery->the_post(); ?>

        <?php if (function_exists('get_field')): ?>
        <?php

                    $article_title = get_field('article_title');
                    $article_publication = get_field('article_publication');
                    $article_link = get_field('article_link');
                    $article_date = get_field('article_date');

                    ?>
        <div class="press-container">
            <h3 class="press-publication">
                <?php echo $article_publication ?>
            </h3>
            <p class="press-title">
                <?php echo $article_title  ?>
            </p>
            <p class="press-date">
                <?php echo $article_date ?>
            </p>
            <a href="<?php echo $article_link ?>" target="_blank" class="button beige">Read more</a>
        </div>
        <?php endif ?>
        <?php endwhile ?>
        <?php endif ?>
    </section>
</main><!-- #primary -->

<?php get_footer(); ?>