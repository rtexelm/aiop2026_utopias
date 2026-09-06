<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-artist
 *
 * @package WordPress
 * @subpackage AiOP_2026
 * @copyright  AiOP, Laurie Waxman, Ross Mabbett
 * @since 1.0.0
 * @version 1.0.0
 */

require 'utils.php';

get_header();

?>

<?php
wp_reset_query();

$artistsArgs = array(
    'post_type' => 'artists',
    'meta_key' => 'artist_name',
    'orderby' => 'meta_value',
    'order'    => 'ASC',
    'posts_per_page' => -1
);

$artistQuery = new WP_Query($artistsArgs);

$index_letter = ' ';

?>
<div id="fullpage-texture"></div>
<main class="site-content artists artist-listing" id="main-content">
    <h1 class="hidden">Artists</h1>

    <section id="artists" class="content-section-padding">

        <?php
        if ($artistQuery->have_posts()): ?>
            <?php while ($artistQuery->have_posts()): $artistQuery->the_post(); ?>

                <?php if (function_exists('get_field')): ?>
                    <?php

                    $artist_name          = get_field('artist_name');
                    $project_title        = get_field('project_title');



                    $sortable_name = $artist_name;
                    $displayName = $artist_name;
                    $new_index = strtoupper($sortable_name[0]) != $index_letter;

                    /* if ((strtoupper($sortable_name[0]) != $index_letter)): */

                    ?>
                    <div class="artist-container<?php if ($new_index): echo ' new-index';
                                                endif ?>">
                        <?php if ($new_index):
                            echo "<span class='d1 artist-letter'>" . strtoupper($sortable_name[0]) . "</span>";
                        endif;
                        $index_letter = strtoupper($sortable_name[0]);
                        ?>
                        <div class="artist-copy">
                            <a class="container-link" title="view <?php echo $displayName ?>"
                                href="<?php echo the_permalink(); ?>"></a>
                            <h3 class="artist-title">
                                <?php echo $displayName ?>
                            </h3>
                            <h4 class="project-title">
                                <?php echo $project_title ?>
                            </h4>
                        </div>
                        <a class="button secondary" title="view <?php echo $displayName ?>"
                            href="<?php echo the_permalink(); ?>">View
                            project</a>

                        <!-- Superimpose the thumbnail over a circular background -->
                        <div class="list-thumb">
                            <?php the_post_thumbnail('listings-thumb', array('class' => 'list-thumb-image')); ?>
                        </div>


                    </div>
                <?php endif ?>
            <?php endwhile ?>
        <?php endif ?>
    </section>
</main><!-- #primary -->

<?php get_footer(); ?>
