<?php

/**
 * The template for schdule page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#schedule
 *
 * @package WordPress
 * @subpackage AiOP_2025
 * @copyright  AiOP, Laurie Waxman, Ross Mabbett
 * @since 1.0.0
 * @version 1.0.0
 */

require 'utils.php';

get_header();

?>

<?php
// wp_reset_query();

// $fridayArtistArgs = array(
//     'post_type' => 'artists',
//     'meta_query' => array(
//         'start' => array(
//             'key' => 'friday_start',
//             'compare' => 'EXISTS',
//         ),
//         'end' => array(
//             'key' => 'friday_end',
//             'compare' => 'EXISTS',
//         ),
//     ),
//     // 'meta_key' => 'friday_end',
//     'orderby' => 'start end',
//     'order'    => 'ASC',
//     'posts_per_page' => -1
// );
// $fridayQuery = new WP_Query($fridayArtistArgs);
// $fridaySchedule = [];

// $saturdayArtistArgs = array(
//     'post_type' => 'artists',
//     'meta_query' => array(
//         'start' => array(
//             'key' => 'saturday_start',
//             'compare' => 'EXISTS',
//         ),
//         'end' => array(
//             'key' => 'saturday_end',
//             'compare' => 'EXISTS',
//         ),
//     ),
//     'orderby' => 'start end',
//     'order'    => 'ASC',
//     'posts_per_page' => -1
// );
// $saturdayQuery = new WP_Query($saturdayArtistArgs);
// $saturdaySchedule = [];

// $sundayArtistArgs = array(
//     'post_type' => 'artists',
//     'meta_query' => array(
//         'start' => array(
//             'key' => 'sunday_start',
//             'compare' => 'EXISTS',
//         ),
//         'end' => array(
//             'key' => 'sunday_end',
//             'compare' => 'EXISTS',
//         ),
//     ),
//     'orderby' => 'start end',
//     'order'    => 'ASC',
//     'posts_per_page' => -1
// );
// $sundayQuery = new WP_Query($sundayArtistArgs);
// $sundaySchedule = [];
?>
<?php
// if ($fridayQuery->have_posts()):
//     while ($fridayQuery->have_posts()):
//         $fridayQuery->the_post();

//         if (function_exists('get_field')):

//             $first_name             = get_field('first_name');
//             $last_name             = get_field('last_name');
//             $group_name         = get_field('group_name');
//             $additional_artists = get_field('group_artists');
//             $project_title        = get_field('project_title');
//             $friday_location     = get_field('friday_location');
//             $f_start             = get_field('friday_start');
//             $f_end                 = get_field('friday_end');
//             $friday_location2     = get_field('friday_location2');
//             $f_start2             = get_field('friday_start2');
//             $f_end2             = get_field('friday_end2');

//             $sortable_name = $last_name ?: $group_name;

//             // Randomly choose a background image from hover_bg_sources array
//             $random_bg = $hover_bg_sources[array_rand($hover_bg_sources)];

//             $displayName = artistNameFormat($first_name, $sortable_name, $additional_artists);
//             // $fri_final = scheduleFormat($f_start, $f_end);

//             // If there is a first set of times
//             if ($f_start && $f_end && $friday_location) {
//                 $fridaySchedule[] = [
//                     'start_time' => $f_start,
//                     'end_time'   => $f_end,
//                     'name'       => $displayName,
//                     'project'    => $project_title,
//                     'location'   => $friday_location,
//                     'link'       => get_permalink(),
//                     'post_id'    => get_the_ID(),
//                     'thumb_bg'   => $random_bg,
//                 ];
//             }

//             // If there is a second set of times
//             if ($f_start2 && $f_end2 && $friday_location2) {
//                 $fridaySchedule[] = [
//                     'start_time' => $f_start2,
//                     'end_time'   => $f_end2,
//                     'name'       => $displayName,
//                     'project'    => $project_title,
//                     'location'   => $friday_location2,
//                     'link'       => get_permalink(),
//                     'post_id'    => get_the_ID(),
//                     'thumb_bg'   => $random_bg,
//                 ];
//             }

//         endif;

//     endwhile;
// endif;
// // SORT THE ARRAY by start_time
// usort($fridaySchedule, function ($a, $b) {
//     return strtotime($a['start_time']) - strtotime($b['start_time']);
// });

// // RENDER the sorted artist containers
// foreach ($fridaySchedule as $artist) :
// 
?>
<?php
// endforeach; 
?>

<!-- <article class="public-program">
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
            </article> -->

<?php
$friday     = get_field('friday_schedule');
$saturday   = get_field('saturday_schedule');
$sunday     = get_field('sunday_schedule');
?>
<div id="fullpage-texture"></div>
<main class="schedule" id="main-content">
    <h1 class="hidden">Schedule</h1>


    <div class="title">
        <svg width="1129" height="200" viewBox="0 0 1129 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g opacity="0.3" clip-path="url(#clip0_524_2445)">
                <path
                    d="M19.3197 138.775C20.1361 136.054 22.0408 135.238 24.2177 136.599C36.7347 143.673 51.7007 148.843 62.0408 149.66C70.7483 149.66 76.4626 145.578 76.4626 139.32C76.4626 123.265 0 124.082 0 64.7618C0 28.2992 27.483 4.08154 68.8435 4.08154C88.1633 4.08154 112.653 11.9727 129.796 23.6734C131.973 25.0339 132.789 27.2108 131.973 28.5713L114.83 66.9387C114.014 69.6598 112.109 70.4761 109.932 69.1156C96.5986 61.4965 81.0884 55.7822 71.5646 54.9659C63.1293 54.9659 57.6871 58.7754 57.6871 64.7618C57.6871 80.8162 134.694 79.7278 134.694 139.592C134.694 175.782 106.667 200 64.7619 200C41.9048 200 17.9592 192.925 4.35374 182.041C2.17687 180.408 1.36054 178.503 2.17687 177.143L19.3197 138.775Z"
                    fill="#3BA4CA" />
                <path
                    d="M146.681 154.214C146.681 108.944 149.961 74.0853 152.338 50.555C156.205 17.4866 169.61 8.24927 200.601 8.24927H272.982C269.703 91.0563 266.423 111.908 236.935 111.908C222.341 111.908 213.104 103.273 213.104 89.5668C213.104 77.6513 220.251 68.1132 233.956 68.1132C246.76 68.1132 254.508 76.1619 254.508 88.9653C254.508 100.881 247.948 107.44 241.103 110.705C255.396 108.027 260.766 96.1118 260.766 75.2597C260.766 51.7294 254.508 47.8626 227.397 47.8626H215.782C197.608 47.8626 195.532 49.352 193.14 64.8479C191.049 78.2528 188.672 104.762 188.672 136.04C188.672 153.312 193.741 156.592 228.285 156.592C262.828 156.592 267.898 153.312 272.08 122.635H272.682L275.661 195.918H185.707C155.918 195.918 146.681 182.814 146.681 154.214Z"
                    fill="#3BA4CA" />
                <path
                    d="M453.921 195.918H394.501C390.505 195.918 388.4 193.097 388.156 190.047C388.156 186.753 390.276 183.473 394.501 183.473C394.501 183.473 407.19 183.244 407.19 173.133V103.144C398.74 98.6752 383.931 93.0469 373.606 93.0469C363.28 93.0469 348.242 98.9187 341.196 103.144V172.904C341.196 184.175 353.412 183.244 353.412 183.244C357.881 183.244 359.986 186.767 359.986 190.061C359.757 193.111 357.866 195.933 353.412 195.933H294.465C290.469 195.933 288.593 193.111 288.593 190.061C288.593 186.767 290.713 183.244 294.465 183.487C294.465 183.487 303.86 182.542 303.86 173.147V30.3329C303.86 20.7089 295.639 20.7089 295.639 20.7089C291.171 20.7089 289.295 17.1858 289.538 13.8918C290.011 10.8414 291.887 8.02002 295.639 8.02002H353.656C358.124 8.02002 360 10.8414 360 13.8918C360 17.1858 357.881 20.4654 353.656 20.7089C353.656 20.7089 341.21 20.0071 341.21 31.049V80.8449C348.486 77.0927 362.578 71.6792 373.863 71.6792C385.836 71.6792 398.296 76.3766 407.218 80.8449V30.3329C407.218 20.2363 395.704 20.7089 395.704 20.7089C390.304 20.7089 388.185 17.4149 388.657 14.1353C388.887 11.0848 391.479 8.03434 395.704 8.03434H452.302C457.702 8.03434 459.821 10.8557 459.821 13.9062C459.821 17.2001 456.771 20.7232 452.302 20.7232C452.302 20.7232 444.311 20.0215 444.311 30.8199L444.54 172.918C444.54 182.786 453.935 183.258 453.935 183.258C458.16 183.258 460.509 186.309 460.752 189.359C461.225 192.653 459.105 195.933 453.935 195.933L453.921 195.918Z"
                    fill="#3BA4CA" />
                <path
                    d="M507.24 61.2962C492.703 61.2962 488.392 66.6811 488.392 85.5282V92.2593H533.892V105.722H488.392V117.838C488.392 136.413 492.703 142.07 507.24 142.07H531.199C545.736 142.07 550.047 136.685 550.047 117.838H563.509V170.34C563.509 185.149 557.58 195.918 537.129 195.918H501.855C482.463 195.918 474.93 188.385 474.93 168.994V34.3717C474.93 15.2525 482.463 7.44727 501.855 7.44727H539.277C557.852 7.44727 563.509 15.2525 563.509 32.7534V84.182H550.047C550.047 66.6811 545.736 61.2962 531.199 61.2962H507.24Z"
                    fill="#3BA4CA" />
                <path
                    d="M587.583 9.45215H619.019C641.131 9.45215 729.309 9.45215 729.309 102.155C729.309 194.859 647.533 195.918 629.946 195.918H587.583V9.45215Z"
                    fill="#3BA4CA" />
                <path
                    d="M817.487 44.7405V149.001C817.487 164.64 820.093 172.46 822.7 175.066L801.848 195.918H762.75L741.898 175.066C744.504 172.46 747.111 164.64 747.111 149.001V44.7405C747.111 29.1014 745.808 23.8884 740.594 18.6753L745.808 8.24927H780.996L786.208 18.6753C780.995 23.8884 778.389 29.1014 778.389 44.7405V154.214C778.389 165.943 780.996 175.066 787.512 175.066C794.028 175.066 796.635 165.943 796.635 154.214V44.7405C796.635 29.1014 794.028 23.8884 788.815 18.6753L794.028 8.24927H818.79L824.003 18.6753C818.79 23.8884 817.487 29.1014 817.487 44.7405Z"
                    fill="#3BA4CA" />
                <path
                    d="M841.332 7.44727H904.06V146.466H956.047V195.918H841.318V7.44727H841.332ZM940.236 173.319V166.531H876.935V30.0466H869.588V173.305H940.236V173.319Z"
                    fill="#3BA4CA" />
                <path
                    d="M1057.07 195.918H968.908C968.908 142.313 973.806 128.707 1007.55 119.728V84.3537C973.806 75.3742 968.908 62.0408 968.908 8.16327H1065.78C1098.7 8.16327 1112.58 3.53742 1118.57 0C1118.57 65.3061 1105.51 70.7483 1105.51 92.517C1098.98 84.3537 1089.72 78.9116 1070.68 78.9116H1030.95V94.1497H1034.21C1053.26 94.1497 1061.97 90.8844 1069.04 82.7211C1069.04 84.898 1075.03 90.8843 1075.03 101.769C1075.03 112.653 1068.5 116.463 1068.5 121.361C1061.43 113.741 1053.26 110.476 1034.21 110.476H1030.95V125.17H1083.19C1104.96 125.17 1106.6 108.844 1114.76 97.9592C1114.76 117.007 1128.36 118.095 1128.36 199.728C1117.48 197.551 1089.72 195.918 1057.07 195.918Z"
                    fill="#3BA4CA" />
            </g>
            <defs>
                <clipPath id="clip0_524_2445">
                    <rect width="1128.36" height="200" fill="white" />
                </clipPath>
            </defs>
        </svg>
    </div>

    <section class="schedule-container">


        <!-- Friday -->

        <div class="day" id="friday">

            <div class="day-nav">
                <a class="button brightpurple down-arrow" href="#saturday">Saturday</a>
                <a class="button brightpurple down-arrow" href="#sunday">Sunday</a>
            </div>

            <div class="day-header">
                <h3 class="bold">Friday</h3>
            </div>

            <div class="project-schedule">
                <h2 class="fest-header">Plummer Park</h2>

                <div class="listing-container">
                    <?php echo $friday; ?>
                </div>


            </div>

        </div>

        <!-- Saturday -->

        <div class="day" id="saturday">

            <div class="day-nav">
                <a class="button brightpurple up-arrow" href="#friday">Friday</a>
                <a class="button brightpurple down-arrow" href="#sunday">Sunday</a>
            </div>

            <article class="day-header">
                <h3 class="bold">Saturday</h3>
            </article>

            <div class="project-schedule">
                <h2 class="fest-header">West Hollywood Park</h2>

                <div class="listing-container">
                    <?php echo $saturday; ?>
                </div>
            </div>
        </div>

        <!-- Sunday -->

        <div class="day" id="sunday">

            <div class="day-nav">
                <a class="button brightpurple up-arrow" href="#friday">Friday</a>
                <a class="button brightpurple up-arrow" href="#saturday">Saturday</a>
            </div>

            <article class="day-header">
                <h3 class="bold">Sunday</h3>
            </article>


            <div class="project-schedule">
                <div class="fest-header">
                    <h2>
                        Sunset Boulevard
                    </h2>
                    <h3>
                        From N Sherbourne Drive to N Doheny Drive
                    </h3>
                </div>

                <div class="listing-container">
                    <?php echo $sunday; ?>
                </div>
            </div>
        </div>

    </section>
    <div class="positioner">
        <svg id="map-pin" width="94" height="147" viewBox="0 0 94 147" fill="none" xmlns="http://www.w3.org/2000/svg">
            <ellipse opacity="0.5" cx="47.1217" cy="140.434" rx="42.1613" ry="6.5102"
                fill="url(#paint0_radial_306_630)" />
            <path
                d="M40.9016 0.279402C62.2889 -1.90398 82.6244 8.80499 90.679 29.0426C98.1343 47.7756 91.7493 62.1908 83.6641 79.1258C73.6645 100.085 60.6254 119.907 47.3905 138.909C46.5343 139.092 46.1368 138.169 45.6597 137.661C41.5131 133.209 35.1404 121.901 31.5992 116.249C21.5753 100.244 0.726091 65.7564 0.0288769 47.5188C-0.845699 24.7431 18.2665 2.5851 40.9016 0.279402ZM42.718 25.9418C34.0578 27.1956 26.3762 36.5223 25.7524 45.054C24.462 62.7719 44.8341 74.8936 59.341 64.576C77.9824 51.3106 66.6863 22.468 42.718 25.9357V25.9418Z"
                fill="url(#paint1_linear_306_630)" />
            <g style="mix-blend-mode:screen">
                <path
                    d="M42.62 25.7122C66.8295 22.1893 78.2484 51.491 59.4147 64.9676C44.7642 75.4494 24.1818 63.1285 25.4794 45.1349C26.1096 36.4674 33.8643 26.9922 42.62 25.7184V25.7122Z"
                    fill="#D2EFF5" />
            </g>
            <defs>
                <radialGradient id="paint0_radial_306_630" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse"
                    gradientTransform="translate(47.1217 140.434) scale(42.1613 6.5102)">
                    <stop stop-color="#0B0050" />
                    <stop offset="1" stop-color="#0A008E" stop-opacity="0" />
                </radialGradient>
                <linearGradient id="paint1_linear_306_630" x1="51.7716" y1="-2.97381e-07" x2="47.1215" y2="138.884"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#AE2BFF" />
                    <stop offset="1" stop-color="#7B7BFF" />
                </linearGradient>
            </defs>
        </svg>
    </div>
</main><!-- #primary -->

<?php get_footer(); ?>