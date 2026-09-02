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

    <section id="utopias">

        <div class="positioner">
            <img class="cloud" id="cloud-01" src="<?php bloginfo('template_url'); ?>/assets/Cloud-01.png" />
        </div>

        <div id="headlines">

            <h2 class="h1" id="headline-eng">
                What happens when we treat the street not as a corridor of consumption or control...
            </h2>

            <h2 class="h1 espanol" id="headline-esp">
                ¿Qué sucede cuando tratamos la calle no como un corredor de consumo o control...?
            </h2>

        </div>

        <div id="c-statement">

            <div class="p1">
                <?php echo $highlight ?>
            </div>

            <div class="p1 espanol">
                <?php echo $statement ?>
            </div>

        </div>

        <div class="positioner">
            <img class="cloud" id="cloud-02" src="<?php bloginfo('template_url'); ?>/assets/Cloud-02.png" />
        </div>

    </section>


    <section id="mission">

        <h2>Mission</h2>

        <div class="p2">
            <?php echo $mission ?>
        </div>

    </section>


    <section id="history">

        <h2>History</h2>

        <div class="p2">
            <?php echo $history ?>
        </div>

    </section>


    <section id="people">
        <h2>People</h2>

        <!-- <div class="p2" id="curator-bio">
                <?php echo $curator_bio ?>
            </div> -->

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
        <!-- <section class="thinkers">
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

            </section> -->
        <!-- <div id="blog-button">
                <a target="_blank" href="https://artinoddplaces.org/blog/" class="button brightblue">AiOP Blog</a>
            </div> -->
    </section>


    <div class="positioner">
        <img class="cloud" id="cloud-03" src="<?php bloginfo('template_url'); ?>/assets/Cloud-03.png" />
    </div>

    <div class="positioner">
        <img class="cloud" id="cloud-04" src="<?php bloginfo('template_url'); ?>/assets/Cloud-04.png" />
    </div>

    <!-- <section id="partners">

        <h2>Partners</h2>

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
                    class="button brightpurple"><?php echo esc_attr($partner_link['title']); ?></a>
            </div>
        </div>
        <?php endif ?>
        <?php endwhile ?>
        <?php wp_reset_postdata(); ?>
        <?php endif ?>
    </section> -->


    <section id="support">

        <h2>Support</h2>

        <div class="dedication p2">
            <p class="p1"><?php echo $dedication; ?></p>
        </div>

        <div class="thanks p2">
            <h3>Thanks</h3>
            <p><?php echo $thanks; ?></p>
        </div>

    </section>


</main><!-- #primary -->

<?php get_footer(); ?>
