<?php

/**
 * The template for schdule page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#schedule
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
?>


<?php
$friday     = get_field('friday_schedule');
$saturday   = get_field('saturday_schedule');
$sunday     = get_field('sunday_schedule');
?>
<div id="fullpage-texture"></div>
<main class="schedule" id="main-content">

    <h1 class="hidden">Schedule</h1>

    <!-- Friday -->

    <div class="day content-section-padding" id="friday">


        <div class="day-nav">
            <a class="button lemon-lime down-arrow" href="#saturday">Saturday</a>
            <a class="button lemon-lime down-arrow" href="#sunday">Sunday</a>
        </div>

        <div class="day-header">
            <h2 class="h1">Friday</h2>
        </div>

        <div class="public-program">
            <h3 class="fest-header">Public Programming</h3>
            <div class="pp-container">
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
            </div>
        </div>

        <div class="project-schedule">
            <h3 class="fest-header">
                Avenue A to Third Avenue
            </h3>

            <?php
            if ($fridayQuery->have_posts()):
                while ($fridayQuery->have_posts()):
                    $fridayQuery->the_post();

                    if (function_exists('get_field')):

                        $artist_name             = get_field('artist_name');
                        $project_title        = get_field('project_title');
                        $friday_location     = get_field('friday_location');
                        $f_start             = get_field('friday_start');
                        $f_end                 = get_field('friday_end');
                        $friday_location2     = get_field('friday_location2');
                        $f_start2             = get_field('friday_start2');
                        $f_end2             = get_field('friday_end2');

                        // $fri_final = scheduleFormat($f_start, $f_end);

                        // If there is a first set of times
                        if ($f_start && $f_end && $friday_location) {
                            $fridaySchedule[] = [
                                'start_time' => $f_start,
                                'end_time'   => $f_end,
                                'name'       => $artist_name,
                                'project'    => $project_title,
                                'location'   => $friday_location,
                                'link'       => get_permalink(),
                                'post_id'    => get_the_ID(),
                            ];
                        }

                        // If there is a second set of times
                        if ($f_start2 && $f_end2 && $friday_location2) {
                            $fridaySchedule[] = [
                                'start_time' => $f_start2,
                                'end_time'   => $f_end2,
                                'name'       => $artist_name,
                                'project'    => $project_title,
                                'location'   => $friday_location2,
                                'link'       => get_permalink(),
                                'post_id'    => get_the_ID(),
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
                    <a class="button secondary" title="view <?php echo $artist['name']; ?>"
                        href="<?php echo $artist['link']; ?>">View project</a>

                    <!-- Superimpose the thumbnail over a circular background -->
                    <div class="schedule-thumb">
                        <?php echo get_the_post_thumbnail($artist['post_id'], 'listings-thumb', array('class' => 'sched-thumb-image')); ?>
                    </div>
                </div>

            <?php
            endforeach;
            ?>

            <!-- <div class="listing-container"> -->
            <!--     <?php echo $friday; ?> -->
            <!-- </div> -->


        </div>

    </div>

    <!-- Saturday -->

    <div class="day content-section-padding" id="saturday">

        <div class="day-nav">
            <a class="button lemon-lime up-arrow" href="#friday">Friday</a>
            <a class="button lemon-lime down-arrow" href="#sunday">Sunday</a>
        </div>

        <article class="day-header">
            <h2 class="h1">Saturday</h2>
        </article>

        <div class="project-schedule">
            <h3 class="fest-header">5th Ave – 8th Ave, 14th St </h3>

            <?php
            if ($saturdayQuery->have_posts()):
                while ($saturdayQuery->have_posts()):
                    $saturdayQuery->the_post();

                    if (function_exists('get_field')):

                        $artist_name             = get_field('artist_name');
                        $project_title        = get_field('project_title');
                        $saturday_location     = get_field('saturday_location');
                        $sat_start             = get_field('saturday_start');
                        $sat_end                 = get_field('saturday_end');
                        $saturday_location2     = get_field('saturday_location2');
                        $sat_start2             = get_field('saturday_start2');
                        $sat_end2             = get_field('saturday_end2');

                        // $fri_final = scheduleFormat($sat_start, $sat_end);

                        // If there is a first set of times
                        if ($sat_start && $sat_end && $saturday_location) {
                            $saturdaySchedule[] = [
                                'start_time' => $sat_start,
                                'end_time'   => $sat_end,
                                'name'       => $artist_name,
                                'project'    => $project_title,
                                'location'   => $saturday_location,
                                'link'       => get_permalink(),
                                'post_id'    => get_the_ID(),
                            ];
                        }

                        // If there is a second set of times
                        if ($sat_start2 && $sat_end2 && $saturday_location2) {
                            $saturdaySchedule[] = [
                                'start_time' => $sat_start2,
                                'end_time'   => $sat_end2,
                                'name'       => $artist_name,
                                'project'    => $project_title,
                                'location'   => $saturday_location2,
                                'link'       => get_permalink(),
                                'post_id'    => get_the_ID(),
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
            foreach ($saturdaySchedule as $artist) :

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
                    <a class="button secondary" title="view <?php echo $artist['name']; ?>"
                        href="<?php echo $artist['link']; ?>">View project</a>

                    <!-- Superimpose the thumbnail over a circular background -->
                    <div class="schedule-thumb">
                        <?php echo get_the_post_thumbnail($artist['post_id'], 'listings-thumb', array('class' => 'sched-thumb-image')); ?>
                    </div>
                </div>

            <?php
            endforeach;
            ?>

        </div>
    </div>

    <!-- Sunday -->

    <div class="day content-section-padding" id="sunday">

        <div class="day-nav">
            <a class="button lemon-lime up-arrow" href="#friday">Friday</a>
            <a class="button lemon-lime up-arrow" href="#saturday">Saturday</a>
        </div>

        <article class="day-header">
            <h2 class="h1">Sunday</h2>
        </article>


        <div class="project-schedule">
            <h3 class="fest-header">
                8th Ave – 11th Ave, 14th St
            </h3>

            <?php
            if ($sundayQuery->have_posts()):
                while ($sundayQuery->have_posts()):
                    $sundayQuery->the_post();

                    if (function_exists('get_field')):

                        $artist_name             = get_field('artist_name');
                        $project_title        = get_field('project_title');
                        $sunday_location     = get_field('sunday_location');
                        $sun_start             = get_field('sunday_start');
                        $sun_end                 = get_field('sunday_end');
                        $sunday_location2     = get_field('sunday_location2');
                        $sun_start2             = get_field('sunday_start2');
                        $sun_end2             = get_field('sunday_end2');

                        // $fri_final = scheduleFormat($sun_start, $sun_end);

                        // If there is a first set of times
                        if ($sun_start && $sun_end && $sunday_location) {
                            $sundaySchedule[] = [
                                'start_time' => $sun_start,
                                'end_time'   => $sun_end,
                                'name'       => $artist_name,
                                'project'    => $project_title,
                                'location'   => $sunday_location,
                                'link'       => get_permalink(),
                                'post_id'    => get_the_ID(),
                            ];
                        }

                        // If there is a second set of times
                        if ($sun_start2 && $sun_end2 && $sunday_location2) {
                            $sundaySchedule[] = [
                                'start_time' => $sun_start2,
                                'end_time'   => $sun_end2,
                                'name'       => $artist_name,
                                'project'    => $project_title,
                                'location'   => $sunday_location2,
                                'link'       => get_permalink(),
                                'post_id'    => get_the_ID(),
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
            foreach ($sundaySchedule as $artist) :

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
                    <a class="button secondary" title="view <?php echo $artist['name']; ?>"
                        href="<?php echo $artist['link']; ?>">View project</a>

                    <!-- Superimpose the thumbnail over a circular background -->
                    <div class="schedule-thumb">
                        <?php echo get_the_post_thumbnail($artist['post_id'], 'listings-thumb', array('class' => 'sched-thumb-image')); ?>
                    </div>
                </div>

            <?php
            endforeach;
            ?>

        </div>
    </div>


    <div id="map-link" class="content-section-padding">

        <div id="map-frame"></div>

        <a id="map-image-link" href="https://www.google.com/maps/d/viewer?mid=1gkK3HpRrjv_6naqJKo7ZWmPTSOh2mP4&usp=sharing">
            <img src="<?php bloginfo('template_url'); ?>/assets/schedule/map-link-image.png" alt="Image of google maps focusing on 14th street" id="map-image" />
        </a>

        <div id="map-copy">
            <h2 id="map-title" class="h1">Looking for a map?</h2>
            <a class="button bright-green" title="Map link button" href="https://www.google.com/maps/d/viewer?mid=1gkK3HpRrjv_6naqJKo7ZWmPTSOh2mP4&usp=sharing">View Google map</a>
        </div>
    </div>



</main><!-- #primary -->

<?php get_footer(); ?>
