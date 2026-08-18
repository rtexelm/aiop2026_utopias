<?php

/**
 * The template for about page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#about
 * @package WordPress
 * @subpackage AiOP_2024
 * @copyright  AiOP, Laurie Waxman, Ross Mabbett
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();

?>
<?php

$statement = get_field('about_cs_statement');
$mission = get_field('about_aiop_mission');
$history = get_field('about_aiop_history');
$bureau = get_field('about_bureau');
$center = get_field('about_the_center');
$pollinate = get_field('about_pollinate');
$dedication = get_field('about_dedication');
$thanks = get_field('about_thanks');
$volunteers = get_field('about_volunteers');

?>

<div id="about-background"></div>
<main class="site-content about" id="main-content">

    <h1 class="hidden">ABOUT</h1>

    <div class="positioner">
        <div class="about-bg-ripple" id="about-ripple-1">
            <img src="<?php bloginfo('template_url'); ?>/assets/Ripple_1200px_01.png" />
        </div>
    </div>

    <section class="dress">
        <div class="c-statement p1">
            <h2 class="h1">Care is a ripple.</h2>
            <p class="p1">
                <?php echo $statement ?>
            </p>
        </div>
    </section>

    <div class="scrolling-text d1">
        <span id="text1">How wide can our caring arms be embraced?</span>
    </div>
    <div class="scrolling-text no-border-top d1">
        <span id="text2">Who can we give care to?</span>
    </div>
    <div class="positioner">
        <div class="about-bg-ripple" id="about-ripple-2">
            <img src="<?php bloginfo('template_url'); ?>/assets/Ripple_300px_01.png" />
        </div>
    </div>
    <section class="festival p2">
        <div class="mission">
            <h2>Mission</h2>
            <p>
                <?php echo $mission ?>
            </p>
        </div>
        <div class="history">
            <h2>History</h2>
            <p>
                <?php echo $history ?>
            </p>
        </div>
    </section>


    <div class="scrolling-text d1">
        <span id="text3">What can we watch over?</span>
    </div>
    <div class="scrolling-text no-border-top d1">
        <span id="text4">What and who can we be careful about?</span>
    </div>

    <div class="positioner">
        <div class="about-bg-ripple" id="about-ripple-3">
            <img src="<?php bloginfo('template_url'); ?>/assets/Ripple_600px_01.png" />
        </div>
    </div>

    <section class="people">
        <h2>People</h2>
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
            <p class="staff-title"><?php echo $title ?></p>
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
        <section class="thinkers">
            <h3 class="thinkers-title">Thinkers in Residence</h3>

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
        <div id="blog-button">
            <a target="_blank" href="https://artinoddplaces.org/blog/" class="button deep-coral">AiOP Blog</a>
        </div>
    </section>

    <div class="scrolling-text d1">
        <span id="text5">Who is deemed worthy of care?</span>
    </div>
    <div class="positioner">
        <div class="about-bg-ripple" id="about-ripple-4">
            <img src="<?php bloginfo('template_url'); ?>/assets/Ripple_400px_02.png" />
        </div>
    </div>

    <section class="partners">

        <h2>Partners</h2>

        <div class="partner-container">

            <img src="<?php bloginfo('template_url'); ?>/assets/about/BGSQD-168w.png"
                alt="Bureau of General Services – Queer Division" class="partner-logo" id="partner-logo-bureau" />

            <div class="partner bureau">
                <p class="partner-text p2"><?php echo $bureau; ?></p>
                <a target="_blank" href="https://bookshop.org/shop/bgsqd" class="button deep-coral">bgsqd.com</a>
            </div>
        </div>
        <div class="partner-container">

            <img src="<?php bloginfo('template_url'); ?>/assets/about/pollinate252w.png" alt="Pollinate"
                class="partner-logo" id="partner-logo-pollinate" />

            <div class="partner pollinate">
                <p class="partner-text p2"><?php echo $pollinate; ?></p>
                <a target="_blank" href="https://www.pollinate.co/" class="button deep-coral">pollinate.co</a>
            </div>
        </div>
        <!--         <div class="partner-container">

            <img src="<?php bloginfo('template_url'); ?>/assets/about/The Center_White.PNG" alt="The Center"
                class="partner-logo" id="partner-logo-center" />

            <div class="partner the-center">
                <p class="partner-text p2"><?php echo $center; ?></p>
                <a target="_blank" href="https://gaycenter.org/" class="button deep-coral">gaycenter.org</a>
            </div>
        </div> -->

    </section>
    <div class="positioner">
        <div class="about-bg-ripple" id="about-ripple-5">
            <img src="<?php bloginfo('template_url'); ?>/assets/Ripple_800px_02.png" />
        </div>
    </div>

    <div class="scrolling-text d1">
        <span id="text6">What is appropriate care?</span>
    </div>
    <div class="scrolling-text no-border-top d1">
        <span id="text7">When is care invasive?</span>
    </div>

    <div class="positioner">
        <div class="about-bg-ripple" id="about-ripple-6">
            <img src="<?php bloginfo('template_url'); ?>/assets/Ripple_300px_02.png" />
        </div>
    </div>

    <section class="support">

        <h2>Support</h2>
        <div class="dedication p2">
            <p class="p1"><?php echo $dedication; ?></p>
        </div>
        <div class="thanks p2">
            <h3>Thanks</h3>
            <p><?php echo $thanks; ?></p>
        </div>
        <div class="volunteers p2">
            <h3>Volunteers</h3>
            <p><?php echo $volunteers; ?></p>
        </div>
    </section>

    <div class="scrolling-text d1">
        <span id="text8">Should we care?</span>
    </div>
    <div class="scrolling-text no-border-top d1">
        <span id="text9">Can we not care?</span>
    </div>
    <div class="scrolling-text no-border-top d1">
        <span id="text10">Do we have that luxury?</span>
    </div>
    <div class="positioner">
        <div class="about-bg-ripple" id="about-ripple-7">
            <img src="<?php bloginfo('template_url'); ?>/assets/Ripple_400px_01.png" />
        </div>
    </div>

</main>

<?php get_footer(); ?>