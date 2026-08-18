<?php

/**
 *
 * Template Post Type: artist, artists
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

$thisId = $post->ID;
$args = array(
	'p'	=> $thisId,
	'post_type' => 'artists',
	'posts_per_page' => 1
);
$artistQuery = new WP_Query($args);

$all_posts = new WP_Query(array(
	'post_type' => 'artists',
	'meta_key' => 'sortable_name',
	'orderby' => 'meta_value',
	'order'	=> 'ASC',
	'posts_per_page' => -1
));

$hover_bg_sources = array(
	'assets/artist-bg/Artist_Hover-BG_01_400px.png',
	'assets/artist-bg/Artist_Hover-BG_02_400px.png',
	'assets/artist-bg/Artist_Hover-BG_03_400px.png',
	'assets/artist-bg/Artist_Hover-BG_04_400px.png',
	'assets/artist-bg/Artist_Hover-BG_05_400px.png',
);

foreach ($all_posts->posts as $key => $value) {
	if ($value->ID == $post->ID) {

		$nextID = $all_posts->posts[$key + 1]->ID ?? null;
		$prevID = $all_posts->posts[$key - 1]->ID ?? null;
	}
}
?>

<?php while ($artistQuery->have_posts()): $artistQuery->the_post(); ?>
<?php if (function_exists('get_field')): ?>
<?php
		global $thisID;

		$is_group				= get_field('is_group', $thisID);
		$first_name				 = get_field('first_name', $thisID);
		$last_name 				= get_field('last_name', $thisID);
		$group_name 			= get_field('group_name', $thisID);
		$additional_names 		= get_field('group_artists', $thisID);
		$artist_1_bio			= get_field('artist_bio', $thisID);
		$artist_1_link			= get_field('artist_weblink', $thisID);
		$artist_2_bio			= get_field('artist_2_bio', $thisID);
		$artist_2_link			= get_field('artist_2_weblink', $thisID);
		$artist_3_bio			= get_field('artist_3_bio', $thisID);
		$artist_3_link			= get_field('artist_3_weblink', $thisID);
		$project_title			= get_field('project_title', $thisID);
		$project_description	= get_field('project_description', $thisID);
		$project_schedule		= get_field('project_schedule', $thisID);
		$project_location		= get_field('project_location', $thisID);
		$project_image			= get_field('project_image', $thisID);
		$project_link			= get_field('project_website', $thisID);
		$friday_start			= get_field('friday_start', $thisID);
		$friday_end				= get_field('friday_end', $thisID);
		$friday_location		= get_field('friday_location', $thisID);
		$friday_start2			= get_field('friday_start2', $thisID);
		$friday_end2			= get_field('friday_end2', $thisID);
		$friday_location2		= get_field('friday_location2', $thisID);
		$saturday_start			= get_field('saturday_start', $thisID);
		$saturday_end			= get_field('saturday_end', $thisID);
		$saturday_location		= get_field('saturday_location', $thisID);
		$saturday_start2		= get_field('saturday_start2', $thisID);
		$saturday_end2			= get_field('saturday_end2', $thisID);
		$saturday_location2		= get_field('saturday_location2', $thisID);
		$sunday_start			= get_field('sunday_start', $thisID);
		$sunday_end				= get_field('sunday_end', $thisID);
		$sunday_location		= get_field('sunday_location', $thisID);
		$sunday_start2			= get_field('sunday_start2', $thisID);
		$sunday_end2			= get_field('sunday_end2', $thisID);
		$sunday_location2		= get_field('sunday_location2', $thisID);

		$sortable_name = $last_name ?: $group_name;
		$displayName = artistNameFormat($first_name, $sortable_name, $additional_names);

		$fri_final = scheduleFormat($friday_start, $friday_end);
		$sat_final = scheduleFormat($saturday_start, $saturday_end);
		$sun_final = scheduleFormat($sunday_start, $sunday_end);
		$fri_final2 = scheduleFormat($friday_start2, $friday_end2);
		$sat_final2 = scheduleFormat($saturday_start2, $saturday_end2);
		$sun_final2 = scheduleFormat($sunday_start2, $sunday_end2);

		$random_bg = $hover_bg_sources[array_rand($hover_bg_sources)];

		?>
<div id="project-background"></div>
<main class="artist-single" id="main-content">


    <h1 class="hidden"><?php echo $displayName ?></h1>

    <section class="project-img"
        style="background-image: url('<?php bloginfo('template_url'); ?>/<?php echo $random_bg; ?>');">

        <div class="image-mask">
            <img src="<?php echo esc_url($project_image['url']); ?>" class="feature-img"
                alt="\<?php echo esc_attr($project_image['alt']); ?>" />
        </div>


    </section>


    <div class="project-info-grid">

        <section class="left info-area">

            <h2 class="h1 project-title"><?php echo $project_title ?></h2>

            <h3 class="h2 project-artists"><?php echo $displayName ?></h3>

            <?php if ($friday_location): ?>
            <div class="performances">
                <div class="day">
                    <h4>Friday</h4>
                    <p class="time"><?php echo $fri_final ?></p>
                    <p class="location"><?php echo $friday_location ?></p>
                </div>
                <?php if ($friday_location2): ?>
                <div class="day performance2">
                    <p class="time"><?php echo $fri_final2 ?></p>
                    <p class="location"><?php echo $friday_location2 ?></p>
                </div>
                <?php endif ?>
            </div>
            <?php endif ?>

            <?php if ($saturday_location): ?>
            <div class="performances">
                <div class="day">
                    <h4>Saturday</h4>
                    <p class="time"><?php echo $sat_final ?></p>
                    <p class="location"><?php echo $saturday_location ?></p>
                </div>
                <?php if ($saturday_location2): ?>
                <div class="day performance2">
                    <p class="time"><?php echo $sat_final2 ?></p>
                    <p class="location"><?php echo $saturday_location2 ?></p>
                </div>
                <?php endif ?>
            </div>
            <?php endif ?>

            <?php if ($sunday_location): ?>
            <div class="performances">
                <div class="day">
                    <h4>Sunday</h4>
                    <p class="time"><?php echo $sun_final ?></p>
                    <p class="location"><?php echo $sunday_location ?></p>
                </div>
                <?php if ($sunday_location2): ?>
                <div class="day performance2">
                    <p class="time"><?php echo $sun_final2 ?></p>
                    <p class="location"><?php echo $sunday_location2 ?></p>
                </div>
                <?php endif ?>
            </div>
            <?php endif ?>

        </section>

        <section class="right info-area">

            <div class="project">

                <?php echo "<p class='p1'>" . $project_description . "</p>" ?>
                <?php
						if ($project_link) {
							echo "<a class='button transparent' target='blank' href='" . esc_url($project_link['url']) . "'>" . esc_attr($project_link['title']) . "</a>";
						}
						?>

            </div>

            <section class="bios p2">
                <?php

						if ($artist_1_bio) {
							echo "<p class='bio'>" . $artist_1_bio . "</p>";
						}
						if ($artist_1_link) {
							echo "<a target='blank' class='button pink' href='" . esc_url($artist_1_link['url']) . "'>" . esc_attr($artist_1_link['title']) . "</a>";
						}
						if ($artist_2_bio) {
							echo "<p class='bio'>" . $artist_2_bio . "</p>";
						}
						if ($artist_2_link) {
							echo "<a target='blank' class='button pink' href='" . esc_url($artist_2_link['url']) . "'>" . esc_attr($artist_2_link['title']) . "</a>";
						}
						if ($artist_3_bio) {
							echo "<p class='bio'>" . $artist_3_bio . "</p>";
						}
						if ($artist_3_link) {
							echo "<a target='blank' class='button pink' href='" . esc_url($artist_3_link['url']) . "'>" . esc_attr($artist_3_link['title']) . "</a>";
						}

						?>
            </section>
        </section>
    </div>

</main>

<nav class="artist-nav">
    <div class="arrow prev">
        <?php if ($prevID): ?>
        <a href="<?= get_the_permalink($prevID) ?>" rel="prev">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.8571 4L19 11M19 11L11.8571 18M19 11H3" stroke="white" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
        <?php endif; ?>
    </div>
    <div class="arrow next">
        <?php if ($nextID): ?>
        <a href="<?= get_the_permalink($nextID) ?>" rel="next">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.8571 4L19 11M19 11L11.8571 18M19 11H3" stroke="white" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
        <?php endif; ?>
    </div>

</nav>

<?php endif ?>
<?php endwhile ?>


<?php get_footer(); ?>