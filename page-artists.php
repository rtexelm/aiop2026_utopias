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

require 'utils.php';

get_header();

?>

<?php
wp_reset_query();

$artistsArgs = array(
    'post_type' => 'artists',
    'meta_key' => 'sortable_name',
    'orderby' => 'meta_value',
    'order'    => 'ASC',
    'posts_per_page' => -1
);

$artistQuery = new WP_Query($artistsArgs);

$last_letter = ' ';

$hover_bg_sources = array(
    'assets/artist-bg/Artist_Hover-BG_01_400px.png',
    'assets/artist-bg/Artist_Hover-BG_02_400px.png',
    'assets/artist-bg/Artist_Hover-BG_03_400px.png',
    'assets/artist-bg/Artist_Hover-BG_04_400px.png',
    'assets/artist-bg/Artist_Hover-BG_05_400px.png',
);

?>
<div id="artists-background"></div>
<main class="site-content artists artist-listing" id="main-content">
    <h1 class="hidden">Artists</h1>


    <section class="artists">
        <?php
        if ($artistQuery->have_posts()): ?>
        <?php while ($artistQuery->have_posts()): $artistQuery->the_post(); ?>

        <?php if (function_exists('get_field')): ?>
        <?php

                    $first_name            = get_field('first_name');
                    $last_name             = get_field('last_name');
                    $group_name            = get_field('group_name');
                    $additional_names     = get_field('group_artists');
                    $project_title        = get_field('project_title');



                    $sortable_name = $last_name ?: $group_name;
                    $displayName = artistNameFormat($first_name, $sortable_name, $additional_names);

                    // Randomly choose a background image from hover_bg_sources array
                    $random_bg = $hover_bg_sources[array_rand($hover_bg_sources)];
                    ?>
        <div class="artist-container">
            <?php
                        if (($sortable_name[0] != $last_letter)):
                            echo "<span class='d1 artist-letter'>" . $sortable_name[0] . "</span>";
                        endif;
                        $last_letter = $sortable_name[0];
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
            <a class="button pink" title="view <?php echo $displayName ?>" href="<?php echo the_permalink(); ?>">View
                project</a>

            <!-- Superimpose the thumbnail over a circular background -->
            <div class="list-thumb"
                style="background-image: url('<?php bloginfo('template_url'); ?>/<?php echo $random_bg; ?>');">
                <?php the_post_thumbnail('listings-thumb', array('class' => 'list-thumb-image')); ?>
            </div>


        </div>
        <?php endif ?>
        <?php endwhile ?>
        <?php endif ?>
    </section>
</main><!-- #primary -->

<?php get_footer(); ?>