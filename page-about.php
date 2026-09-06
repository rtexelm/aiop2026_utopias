<?php

/**
 * The template for about page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#about
 * @package WordPress
 * @subpackage AiOP_2026
 * @copyright  AiOP, Laurie Waxman, Ross Mabbett
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();

?>
<?php

$highlight  =   get_field('about_cs_highlight');
$statement  =   get_field('about_cs_statement');
$mission    =   get_field('about_aiop_mission');
$history    =   get_field('about_aiop_history');
$curator_bio =   get_field('about_curator_bio');
$dedication =   get_field('about_dedication');
$thanks     =   get_field('about_thanks');
$volunteers =   get_field('about_volunteers');

?>

<main class="site-content about" id="main-content">

    <div id="fullpage-texture"></div>

    <h1 class="hidden">ABOUT</h1>

    <img id="headline-vector" src="<?php bloginfo('template_url'); ?>/assets/about/headline-vector.svg" alt="" />

    <div class="positioner">
        <img src="<?php bloginfo('template_url'); ?>/assets/parallax/about/ellipse-headline.png" alt="" class="parallax" id="ellipse-headline">
    </div>

    <section id="utopias" class="content-section-padding">


        <h2 class="h1" id="headline-eng">
            What happens when we treat the street not as a corridor of consumption or control...
        </h2>

        <h2 class="h1 espanol" id="headline-esp">
            ¿Qué sucede cuando tratamos la calle no como un corredor de consumo o control...?
        </h2>


        <div id="c-statement">

            <div class="p1">
                <?php echo $highlight ?>
            </div>

            <div class="p1 espanol">
                <?php echo $statement ?>
            </div>

        </div>

    </section>

    <div class="positioner">
        <img src="<?php bloginfo('template_url'); ?>/assets/parallax/pink-dot.svg" alt="" class="parallax ellipse-dot" id="about-ellipse-1">
    </div>


    <section id="mission" class="content-section-padding">

        <h2>Mission</h2>

        <div class="p2">
            <?php echo $mission ?>
        </div>

    </section>

    <div class="positioner">
        <img src="<?php bloginfo('template_url'); ?>/assets/parallax/about/ellipse-lake.png" alt="" class="parallax" id="ellipse-lake">
    </div>

    <section id="history" class="content-section-padding">

        <h2>History</h2>

        <div class="p2">
            <?php echo $history ?>
        </div>

    </section>


    <div class="positioner">
        <img src="<?php bloginfo('template_url'); ?>/assets/parallax/about/ellipse-pink-yellow.png" alt="" class="parallax ellipse-cell" id="ellipse-yellow-pink">
    </div>


    <section id="people" class="content-section-padding">
        <h2>People</h2>

        <div class="p2" id="curator-bio">
            <?php echo $curator_bio ?>
        </div>

        <?php

        wp_reset_query();

        $peopleArgs = array(
            'post_type' => 'staff-credit',
            'meta_query' => array(
                'relation' => 'AND',
                'nothinker' => array(
                    'key' => 'title',
                    'value' => 'thinker',
                    'compare' => '!=',
                ),
                'order' => array(
                    'key' => 'order',
                    'compare' => 'EXISTS',
                ),

            ),
            'meta_key' => 'order',
            'orderby' => 'meta_value_num',
            'order'    => 'ASC',
            'posts_per_page' => -1,
        );

        $thinkerArgs = array(
            'post_type' => 'staff-credit',
            'meta_query' => array(
                'relation' => 'AND',
                'title' => array(
                    'key' => 'title',
                    'value' => 'thinker',
                ),
                'order' => array(
                    'key' => 'order',
                    'compare' => 'EXISTS',
                ),
            ),
            'meta_key' => 'order',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'posts_per_page' => -1,
        );

        $staffQuery = new WP_Query($peopleArgs);
        $thinkerQuery = new WP_Query($thinkerArgs);

        ?>

        <?php if ($staffQuery->have_posts()): ?>
            <?php while ($staffQuery->have_posts()): $staffQuery->the_post(); ?>
                <?php if (function_exists('get_field')):

                    $full_name            = get_field('full_name');
                    $title                 = get_field('title');
                    $link1                = get_field('web_link_1');
                    $link2                 = get_field('web_link_2');
                    $link3                = get_field('web_link_3');

                    // $comma1 = $link2 ? "," : "";
                    // $comma2 = $link3 ? "," : "";
                ?>
                    <div class="staff-item">
                        <h3 class="staff-name"><?php echo $full_name ?></h3>
                        <p class="staff-title p2"><?php echo $title ?></p>
                        <div class="staff-links">
                            <?php
                            if ($link1) {
                                echo "<a target='blank' href='" . esc_url($link1['url']) . "'>" . esc_attr($link1['title']) . "</a>";
                            }
                            ?>
                            <?php
                            if ($link2) {
                                echo "<a target='blank' href='" . esc_url($link2['url']) . "'>" . esc_attr($link2['title']) . "</a>";
                            }
                            ?>
                            <?php
                            if ($link3) {
                                echo "<a target='blank' href='" . esc_url($link3['url']) . "'>" . esc_attr($link3['title']) . "</a>";
                            }
                            ?>
                        </div>
                    </div>
                <?php endif ?>
            <?php endwhile ?>
        <?php endif ?>
        <section id="thinkers">
            <h3 id="thinkers-title">Thinkers in Residence</h3>

            <?php if ($thinkerQuery->have_posts()): ?>
                <?php while ($thinkerQuery->have_posts()): $thinkerQuery->the_post(); ?>
                    <?php if (function_exists('get_field')):

                        $full_name            = get_field('full_name');
                        $thinklink1            = get_field('web_link_1');
                        $thinklink2         = get_field('web_link_2');
                        $thinklink3            = get_field('web_link_3');

                        // $thinkcomma1 = $thinklink2 ? "," : "";
                        // $thinkcomma2 = $thinklink3 ? "," : "";
                    ?>

                        <div class="thinker-item">
                            <h3 class="thinker-name"><?php echo $full_name ?></h3>
                            <div class="thinker-links">
                                <?php
                                if ($thinklink1) {
                                    echo "<a target='blank' href='" . esc_url($thinklink1['url']) . "'>" . esc_attr($thinklink1['title']) . "</a>";
                                }
                                ?>
                                <?php
                                if ($thinklink2) {
                                    echo "<a target='blank' href='" . esc_url($thinklink2['url']) . "'>" . esc_attr($thinklink2['title']) . "</a>";
                                }
                                ?>
                                <?php
                                if ($thinklink3) {
                                    echo "<a target='blank' href='" . esc_url($thinklink3['url']) . "'>" . esc_attr($thinklink3['title']) . "</a>";
                                }
                                ?>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endwhile ?>
                <?php wp_reset_postdata(); ?>
            <?php endif ?>

        </section>
        <!-- <div id="blog-button">
                <a target="_blank" href="https://artinoddplaces.org/blog/" class="button brightblue">AiOP Blog</a>
            </div> -->
    </section>


    <div class="positioner">
        <img src="<?php bloginfo('template_url'); ?>/assets/parallax/about/ellipse-blue-green.png" alt="" class="parallax ellipse-cell" id="ellipse-blue-green">
    </div>

    <div class="positioner">
        <img src="<?php bloginfo('template_url'); ?>/assets/parallax/about/ellipse-city.png" alt="" class="parallax" id="ellipse-city">
    </div>


    <section id="dedication" class="content-section-padding">

        <h2>Dedication</h2>

        <?php
        wp_reset_query();
        ?>
        <?php
        $partnerArgs = array(
            'post_type' => 'partner',
            'orderby' => 'ID',
            'order'    => 'ASC',
            'posts_per_page' => -1,
        );

        $partnerQuery = new WP_Query($partnerArgs);
        ?>
        <?php if ($partnerQuery->have_posts()): ?>
            <?php while ($partnerQuery->have_posts()): $partnerQuery->the_post(); ?>
                <?php
                if (function_exists('get_field')):
                    $partner_image          = get_field('partner_image');
                    $partner_description    = get_field('partner_description');
                    $partner_link           = get_field('partner_link');
                ?>

                    <div class="partner-container">

                        <img src="<?php echo esc_url($partner_image['url']); ?>" class="partner-logo"
                            alt="\<?php echo esc_attr($partner_image['alt']); ?>" />

                        <div class="partner">
                            <p class="partner-text p2"><?php echo $partner_description; ?></p>
                            <a target="_blank" href=<?php echo esc_url($partner_link['url']); ?>
                                class="button lemon-lime"><?php echo esc_attr($partner_link['title']); ?></a>
                        </div>
                    </div>
                <?php endif ?>
            <?php endwhile ?>
            <?php wp_reset_postdata(); ?>
        <?php endif ?>
    </section>


    <section id="support" class="content-section-padding">

        <h2>Support</h2>

        <div id="support-copy" class="p2">
            <p class="p1"><?php echo $dedication; ?></p>
        </div>

        <div id="thanks" class="p2">
            <h3>Thanks</h3>
            <p><?php echo $thanks; ?></p>
        </div>

    </section>

    <div class="positioner">
        <img class="parallax" id="ellipse-dark-blue" src="<?php bloginfo('template_url'); ?>/assets/parallax/about/ellipse-dark-blue.png" alt="" />
    </div>

    <div class="positioner">
        <img class="parallax ellipse-dot" id="about-ellipse-2" src="<?php bloginfo('template_url'); ?>/assets/parallax/pink-dot.svg" alt="" />
    </div>

    <div class="positioner">
        <img class="parallax ellipse-dot" id="about-ellipse-3" src="<?php bloginfo('template_url'); ?>/assets/parallax/pink-dot.svg" alt="" />
    </div>

    <div class="positioner">
        <img class="parallax ellipse-cell" id="ellipse-yellow-orng" src="<?php bloginfo('template_url'); ?>/assets/parallax/about/ellipse-yellow-orng.png" alt="" />
    </div>

    <div class="positioner">
        <img class="parallax" id="ellipse-flowers" src="<?php bloginfo('template_url'); ?>/assets/parallax/about/ellipse-flowers.png" alt="" />
    </div>

</main><!-- #primary -->

<?php get_footer(); ?>
