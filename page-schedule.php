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

$fridayArtistArgs = array(
    'post_type' => 'artists',
    'meta_query' => array(
        'start' => array(
            'key' => 'friday_start',
            'compare' => 'EXISTS',
        ),
        'end' => array(
            'key' => 'friday_end',
            'compare' => 'EXISTS',
        ),
    ),
    // 'meta_key' => 'friday_end',
    'orderby' => 'start end',
    'order'    => 'ASC',
    'posts_per_page' => -1
);
$fridayQuery = new WP_Query($fridayArtistArgs);
$fridaySchedule = [];

$saturdayArtistArgs = array(
    'post_type' => 'artists',
    'meta_query' => array(
        'start' => array(
            'key' => 'saturday_start',
            'compare' => 'EXISTS',
        ),
        'end' => array(
            'key' => 'saturday_end',
            'compare' => 'EXISTS',
        ),
    ),
    'orderby' => 'start end',
    'order'    => 'ASC',
    'posts_per_page' => -1
);
$saturdayQuery = new WP_Query($saturdayArtistArgs);
$saturdaySchedule = [];

$sundayArtistArgs = array(
    'post_type' => 'artists',
    'meta_query' => array(
        'start' => array(
            'key' => 'sunday_start',
            'compare' => 'EXISTS',
        ),
        'end' => array(
            'key' => 'sunday_end',
            'compare' => 'EXISTS',
        ),
    ),
    'orderby' => 'start end',
    'order'    => 'ASC',
    'posts_per_page' => -1
);
$sundayQuery = new WP_Query($sundayArtistArgs);
$sundaySchedule = [];

$hover_bg_sources = array(
    'assets/artist-bg/Artist_Hover-BG_01_400px.png',
    'assets/artist-bg/Artist_Hover-BG_02_400px.png',
    'assets/artist-bg/Artist_Hover-BG_03_400px.png',
    'assets/artist-bg/Artist_Hover-BG_04_400px.png',
    'assets/artist-bg/Artist_Hover-BG_05_400px.png',
);

?>
<div id="schedule-background"></div>
<main class="schedule" id="main-content">
    <h1 class="hidden">ARTISTS</h1>

    <section class="artists">


        <!-- Friday -->

        <div class="day" id="friday">

            <div class="day-nav">
                <a class="button primary-orange down-arrow" href="#saturday">Saturday</a>
                <a class="button primary-orange down-arrow" href="#sunday">Sunday</a>
            </div>

            <article class="day-header">
                <h2 class="h1">Friday</h2>
            </article>


            <article class="public-program">
                <h3 class="fest-header">Public Programming</h3>
                <div class="pp-container">
                    <!-- <a href="https://www.eventbrite.com/e/art-in-odd-places-2023-dress-walk-and-talk-tickets-713001214827?aff=oddtdtcreator"
                        class="program-link" target="_blank" title="RSVP for Walk & Talk"></a> -->
                    <h4 class="pp-time">
                        7&ndash;9pm
                    </h4>
                    <div class="pp-title">
                        <h3>In Care Of</h3>
                        <h4>Bureau of General Services: Queer Division, LGBTQIA+ Center<br>
                            208 W 13th Street<br>
                            Room 210
                        </h4>
                    </div>
                    <!-- <a class="button pink" target="_blank" title="RSVP for Walk & Talk"
                        href="https://www.eventbrite.com/e/art-in-odd-places-2023-dress-walk-and-talk-tickets-713001214827?aff=oddtdtcreator">RSVP</a> -->
                </div>
            </article>

            <div class="project-schedule">
                <h3 class="fest-header">Festival &mdash;
                    Avenue A to Third Avenue</h3>
                <?php
                if ($fridayQuery->have_posts()):
                    while ($fridayQuery->have_posts()):
                        $fridayQuery->the_post();

                        if (function_exists('get_field')):

                            $first_name             = get_field('first_name');
                            $last_name             = get_field('last_name');
                            $group_name         = get_field('group_name');
                            $additional_artists = get_field('group_artists');
                            $project_title        = get_field('project_title');
                            $friday_location     = get_field('friday_location');
                            $f_start             = get_field('friday_start');
                            $f_end                 = get_field('friday_end');
                            $friday_location2     = get_field('friday_location2');
                            $f_start2             = get_field('friday_start2');
                            $f_end2             = get_field('friday_end2');

                            $sortable_name = $last_name ?: $group_name;

                            // Randomly choose a background image from hover_bg_sources array
                            $random_bg = $hover_bg_sources[array_rand($hover_bg_sources)];

                            $displayName = artistNameFormat($first_name, $sortable_name, $additional_artists);
                            // $fri_final = scheduleFormat($f_start, $f_end);

                            // If there is a first set of times
                            if ($f_start && $f_end && $friday_location) {
                                $fridaySchedule[] = [
                                    'start_time' => $f_start,
                                    'end_time'   => $f_end,
                                    'name'       => $displayName,
                                    'project'    => $project_title,
                                    'location'   => $friday_location,
                                    'link'       => get_permalink(),
                                    'post_id'    => get_the_ID(),
                                    'thumb_bg'   => $random_bg,
                                ];
                            }

                            // If there is a second set of times
                            if ($f_start2 && $f_end2 && $friday_location2) {
                                $fridaySchedule[] = [
                                    'start_time' => $f_start2,
                                    'end_time'   => $f_end2,
                                    'name'       => $displayName,
                                    'project'    => $project_title,
                                    'location'   => $friday_location2,
                                    'link'       => get_permalink(),
                                    'post_id'    => get_the_ID(),
                                    'thumb_bg'   => $random_bg,
                                ];
                            }

                        endif;

                    endwhile;
                endif;
                // SORT THE ARRAY by start_time
                usort($fridaySchedule, function ($a, $b) {
                    return strtotime($a['start_time']) - strtotime($b['start_time']);
                });

                // RENDER the sorted artist containers
                foreach ($fridaySchedule as $artist) :
                ?>

                <div class="artist-container">
                    <a class="schedule-link" title="view <?php echo $artist['name']; ?>"
                        href="<?php echo $artist['link']; ?>"></a>
                    <h4 class="artist-time">
                        <?php echo scheduleFormat($artist['start_time'], $artist['end_time']); ?>
                    </h4>
                    <h3 class="artist-name"><?php echo $artist['name']; ?></h3>
                    <div class="title-location">
                        <h4 class="artist-title"><?php echo $artist['project']; ?></h4>
                        <p class="location"><?php echo $artist['location']; ?></p>
                    </div>
                    <a class="button pink" title="view <?php echo $artist['name']; ?>"
                        href="<?php echo $artist['link']; ?>">View project</a>

                    <!-- Superimpose the thumbnail over a circular background -->
                    <div class="schedule-thumb"
                        style="background-image: url('<?php bloginfo('template_url'); ?>/<?php echo $artist['thumb_bg']; ?>');">
                        <?php echo get_the_post_thumbnail($artist['post_id'], 'listings-thumb', array('class' => 'sched-thumb-image')); ?>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>

        </div>
        <div class="positioner">
            <div class="schedule-bg-element" id="schedule-bg-element1">
                <img src="<?php bloginfo('template_url'); ?>/assets/Ripple_600px_01.png" />
            </div>
        </div>
        <div class="positioner">
            <div class="schedule-bg-element" id="schedule-bg-element2">
                <img src="<?php bloginfo('template_url'); ?>/assets/Ripple_300px_01.png" />
            </div>
        </div>

        <!-- Saturday -->

        <div class="day" id="saturday">

            <div class="day-nav">
                <a class="button primary-orange up-arrow" href="#friday">Friday</a>
                <a class="button primary-orange down-arrow" href="#sunday">Sunday</a>
            </div>

            <article class="day-header">
                <h2 class="h1">Saturday</h2>
            </article>

            <!-- <article class="public-program">
                <h4>Public Programming</h4>
                <div class="pp-container">
                    <h4 class="pp-time">
                        4-6pm
                    </h4>
                    <div class="pp-title">
                        <h3>Sidewalk Runway</h3>
                        <h4>14th Street between Sixth and Seventh Avenues</h4>
                    </div>
                </div>

                <div class="pp-container">
                    <a href="https://www.eventbrite.com/e/paper-dress-ball-tickets-716624060857?aff=oddtdtcreator"
                        class="program-link" target="_blank" title="Tickets for Paper Dress Ball"></a>
                    <h4 class="pp-time">
                        7-10pm
                    </h4>
                    <div class="pp-title">
                        <h3>Paper Dress Ball</h3>
                        <h4>LGBTQIA+ Center, 208 W 13th Street</h4>
                    </div>
                    <a class="button neon-yellow" target="_blank" title="Tickest for Paper Dress Ball"
                        href="https://www.eventbrite.com/e/paper-dress-ball-tickets-716624060857?aff=oddtdtcreator">Tickets</a>
                </div>
            </article> -->

            <div class="project-schedule">
                <h3 class="fest-header">Festival &mdash;
                    University Place to Seventh Avenue</h3>

                <?php
                if ($saturdayQuery->have_posts()):
                    while ($saturdayQuery->have_posts()):
                        $saturdayQuery->the_post();

                        if (function_exists('get_field')):

                            $first_name             = get_field('first_name');
                            $last_name             = get_field('last_name');
                            $group_name         = get_field('group_name');
                            $additional_artists = get_field('group_artists');
                            $project_title        = get_field('project_title');
                            $saturday_location     = get_field('saturday_location');
                            $sat_start             = get_field('saturday_start');
                            $sat_end             = get_field('saturday_end');
                            $saturday_location2     = get_field('saturday_location2');
                            $sat_start2             = get_field('saturday_start2');
                            $sat_end2             = get_field('saturday_end2');

                            $sortable_name = $last_name ?: $group_name;

                            $displayName = artistNameFormat($first_name, $sortable_name, $additional_artists);

                            // Randomly choose a background image from hover_bg_sources array
                            $random_bg = $hover_bg_sources[array_rand($hover_bg_sources)];

                            // $sat_final = scheduleFormat($sat_start, $sat_end);

                            // If there is a first set of times
                            if ($sat_start && $sat_end && $saturday_location) {
                                $saturdaySchedule[] = [
                                    'start_time' => $sat_start,
                                    'end_time'   => $sat_end,
                                    'name'       => $displayName,
                                    'project'    => $project_title,
                                    'location'   => $saturday_location,
                                    'link'       => get_permalink(),
                                    'post_id'    => get_the_ID(),
                                    'thumb_bg'   => $random_bg,
                                ];
                            }

                            // If there is a second set of times
                            if ($sat_start2 && $sat_end2 && $saturday_location2) {
                                $saturdaySchedule[] = [
                                    'start_time' => $sat_start2,
                                    'end_time'   => $sat_end2,
                                    'name'       => $displayName,
                                    'project'    => $project_title,
                                    'location'   => $saturday_location2,
                                    'link'       => get_permalink(),
                                    'post_id'    => get_the_ID(),
                                    'thumb_bg'   => $random_bg,
                                ];
                            }

                        endif;

                    endwhile;
                endif;
                // SORT THE ARRAY by start_time
                usort($saturdaySchedule, function ($a, $b) {
                    return strtotime($a['start_time']) - strtotime($b['start_time']);
                });

                // RENDER the sorted artist containers
                foreach ($saturdaySchedule as $artist):
                ?>
                <div class="artist-container">
                    <a class="schedule-link" title="view <?php echo $artist['name']; ?>"
                        href="<?php echo $artist['link']; ?>"></a>
                    <h4 class="artist-time">
                        <?php echo scheduleFormat($artist['start_time'], $artist['end_time']); ?>
                    </h4>
                    <h3 class="artist-name"><?php echo $artist['name']; ?></h3>
                    <div class="title-location">
                        <h4 class="artist-title"><?php echo $artist['project']; ?></h4>
                        <p class="location"><?php echo $artist['location']; ?></p>
                    </div>
                    <a class="button pink" title="view <?php echo $artist['name']; ?>"
                        href="<?php echo $artist['link']; ?>">View project</a>

                    <!-- Superimpose the thumbnail over a circular background -->
                    <div class="schedule-thumb"
                        style="background-image: url('<?php bloginfo('template_url'); ?>/<?php echo $artist['thumb_bg']; ?>');">
                        <?php echo get_the_post_thumbnail($artist['post_id'], 'listings-thumb', array('class' => 'sched-thumb-image')); ?>
                    </div>

                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="positioner">
            <div class="schedule-bg-element" id="schedule-bg-element3">
                <img src="<?php bloginfo('template_url'); ?>/assets/Ripple_1200px_01.png" />
            </div>
        </div>
        <!-- Sunday -->

        <div class="day" id="sunday">

            <div class="day-nav">
                <a class="button primary-orange up-arrow" href="#friday">Friday</a>
                <a class="button primary-orange up-arrow" href="#saturday">Saturday</a>
            </div>

            <article class="day-header">
                <h2 class="h1">Sunday</h2>
            </article>

            <!-- <article class="public-program">
                <h3 class="f-weight-700 pp-head">Public Programming</h3>
                <div class="pp-container">
                </div>
            </article> -->

            <div class="project-schedule">
                <h3 class="fest-header">Festival &mdash; Seventh to Eleventh Avenues</h3>

                <?php
                if ($sundayQuery->have_posts()):
                    while ($sundayQuery->have_posts()):
                        $sundayQuery->the_post();
                        if (function_exists('get_field')):


                            $first_name             = get_field('first_name');
                            $last_name             = get_field('last_name');
                            $group_name         = get_field('group_name');
                            $additional_artists = get_field('group_artists');
                            $project_title        = get_field('project_title');
                            $sunday_location     = get_field('sunday_location');
                            $sun_start            = get_field('sunday_start');
                            $sun_end             = get_field('sunday_end');
                            $sunday_location2     = get_field('sunday_location2');
                            $sun_start2            = get_field('sunday_start2');
                            $sun_end2             = get_field('sunday_end2');

                            $sortable_name = $last_name ?: $group_name;

                            $displayName = artistNameFormat($first_name, $sortable_name, $additional_artists);

                            // Randomly choose a background image from hover_bg_sources array
                            $random_bg = $hover_bg_sources[array_rand($hover_bg_sources)];

                            // $sun_final = scheduleFormat($sun_start, $sun_end);
                            // If there is a first set of times
                            if ($sun_start && $sun_end && $sunday_location) {
                                $sundaySchedule[] = [
                                    'start_time' => $sun_start,
                                    'end_time'   => $sun_end,
                                    'name'       => $displayName,
                                    'project'    => $project_title,
                                    'location'   => $sunday_location,
                                    'link'       => get_permalink(),
                                    'post_id'    => get_the_ID(),
                                    'thumb_bg'   => $random_bg,
                                ];
                            }

                            // If there is a second set of times
                            if ($sun_start2 && $sun_end2 && $sunday_location2) {
                                $sundaySchedule[] = [
                                    'start_time' => $sun_start2,
                                    'end_time'   => $sun_end2,
                                    'name'       => $displayName,
                                    'project'    => $project_title,
                                    'location'   => $sunday_location2,
                                    'link'       => get_permalink(),
                                    'post_id'    => get_the_ID(),
                                    'thumb_bg'   => $random_bg,
                                ];
                            }

                        endif;

                    endwhile;
                endif;
                // SORT THE ARRAY by start_time
                usort($sundaySchedule, function ($a, $b) {
                    return strtotime($a['start_time']) - strtotime($b['start_time']);
                });

                // RENDER the sorted artist containers
                foreach ($sundaySchedule as $artist):
                ?>
                <div class="artist-container">
                    <a class="schedule-link" title="view <?php echo $artist['name']; ?>"
                        href="<?php echo $artist['link']; ?>"></a>
                    <h4 class="artist-time">
                        <?php echo scheduleFormat($artist['start_time'], $artist['end_time']); ?>
                    </h4>
                    <h3 class="artist-name"><?php echo $artist['name']; ?></h3>
                    <div class="title-location">
                        <h4 class="artist-title"><?php echo $artist['project']; ?></h4>
                        <p class="location"><?php echo $artist['location']; ?></p>
                    </div>
                    <a class="button pink" title="view <?php echo $artist['name']; ?>"
                        href="<?php echo $artist['link']; ?>">View project</a>

                    <!-- Superimpose the thumbnail over a circular background -->
                    <div class="schedule-thumb"
                        style="background-image: url('<?php bloginfo('template_url'); ?>/<?php echo $artist['thumb_bg']; ?>');">
                        <?php echo get_the_post_thumbnail($artist['post_id'], 'listings-thumb', array('class' => 'sched-thumb-image')); ?>
                    </div>

                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="positioner">
            <div class="schedule-bg-element" id="schedule-bg-element4">
                <img src="<?php bloginfo('template_url'); ?>/assets/Ripple_800px_01.png" />
            </div>
        </div>
        <div class="positioner">
            <div class="schedule-bg-element" id="schedule-bg-element5">
                <img src="<?php bloginfo('template_url'); ?>/assets/Ripple_800px_02.png" />
            </div>
        </div>

    </section>
</main><!-- #primary -->

<?php get_footer(); ?>