<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page
 *
 * @package WordPress
 * @subpackage AiOP_2026
 * @copyright  AiOP, Laurie Waxman, Ross Mabbett
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();

?>

<main class="home" id="main-content">
    <div id="fullpage-texture"></div>
    <section class="heading">
        <div class="positioner">
            <img class="parallax ellipse-dot" id="ellipse-1" src="<?php bloginfo('template_url'); ?>/assets/parallax/ellipse-1.svg" alt="" />
        </div>
        <div class="positioner">
            <img class="parallax ellipse-dot" id="ellipse-2" src="<?php bloginfo('template_url'); ?>/assets/parallax/ellipse-1.svg" alt="" />
        </div>
        <div class="positioner">
            <img class="parallax ellipse-image" id="ellipse-treeline" src="<?php bloginfo('template_url'); ?>/assets/parallax/ellipse-treeline.png" alt="" />
        </div>
        <!-- Title text -->
        <article id="title">
            <div class="title-group" id="title-group-1">
                <p class="p1" id=" title-attribution">Art in Odd Places 2026</p>
                <h1 id="masthead">UTOPIAS<h1>
            </div>
        </article>
        <div class="positioner">
            <img class="parallax ellipse-image" id="ellipse-canal" src="<?php bloginfo('template_url'); ?>/assets/parallax/ellipse-canal.png" alt="" />
        </div>
        <div class="positioner">
            <img class="parallax ellipse-dot" id="ellipse-3" src="<?php bloginfo('template_url'); ?>/assets/parallax/ellipse-1.svg" alt="" />
        </div>
    </section>
    <section id="dates">
        <h2 class="date-text h1">
            <span id="date-line-1">September</span>
            <span id="date-line-2">20&ndash;22 2026</span>
            <span id="date-line-3" class="espanol">de septiembre</span>

        </h2>
        <a id="schedule-button" class="button bright-green" href="<?php echo home_url(); ?>/schedule">Schedule</a>
    </section>
    <div class="positioner">
        <img class="parallax ellipse-dot" id="ellipse-4" src="<?php bloginfo('template_url'); ?>/assets/parallax/ellipse-1.svg" alt="" />
    </div>
    <section id="about">
        <div class="about-text">
            <h2 class="byline h1">
                <span id="byline-1">Curated by</span>
                <span id="byline-2" class="espanol">Curado por</span>
                <span id="byline-3">Arantxa Araujo</span>
                <span id="byline-4">& Pancho López</span>
            </h2>
            <div class="curatorial">
                <p class="p1">
                    Art in Odd Places 2026: <span class="italic">UTOPIAS</span> features visual and performance artists on 14th Street from Avenue C to  the Hudson River, September 20–22, 2026.
                </p>
                <p class="p1 espanol">
                    Art in Odd Places 2026: <span class="italic">UTOPIAS</span> features visual and performance artists on 14th Street from Avenue C to  the Hudson River, September 20–22, 2026.
                </p>
            </div>
            <a class="button bright-green" href="<?php echo home_url(); ?>/about">About the festival</a>
        </div>
        <div class="positioner">
            <img class="parallax ellipse-image" id="ellipse-dome" src="<?php bloginfo('template_url'); ?>/assets/parallax/ellipse-dome.png" alt="" />
        </div>
    </section>
    <div class="positioner">
        <img class="parallax ellipse-dot" id="ellipse-5" src="<?php bloginfo('template_url'); ?>/assets/parallax/ellipse-1.svg" alt="" />
    </div>
    <div class="positioner">
        <img class="parallax" id="vector-map" src="<?php bloginfo('template_url'); ?>/assets/parallax/vector-map.png" alt="" />
    </div>
    <section id="artists">
        <div class="positioner">
            <img class="parallax ellipse-dot" id="ellipse-6" src="<?php bloginfo('template_url'); ?>/assets/parallax/ellipse-1.svg" alt="" />
        </div>
        <div class="artists-heading">

            <h2 class="h1">
                <span id="artists-count-1">35+ Artists&rsquo; Projects</span></br>
                <span id="artists-count-2" class="espanol">35+ proyectos de artistas</span>
            </h2>
        </div>
        <div class="artists-buttons">
            <a class="button bright-green" href="<?php echo home_url(); ?>/artists">Artists</a>
        </div>
    </section>

    <section id="support">
        <div class="positioner">
            <img class="parallax ellipse-dot" id="ellipse-7" src="<?php bloginfo('template_url'); ?>/assets/parallax/ellipse-1.svg" alt="" />
        </div>
        <div id="support-frame"></div>

        <div class="positioner">
            <img class="parallax" id="ellipse-shrooms" src="<?php bloginfo('template_url'); ?>/assets/parallax/ellipse-shrooms.png" alt="" />
        </div>

        <img class="tshirt" id="tshirt-blue" src="<?php bloginfo('template_url'); ?>/assets/tshirts-591.png" />

        <div id="support-copy">
            <h2 class="h1">
                Want to suppport us?
            </h2>

            <p>
                Lorem ipsum brief description of our store
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a metus tristique, tincidunt dolor quis.
            </p>

            <div id="support-copy-buttons">
                <a class="button bright-green" href="">Visit our store</a>
                <a class="button secondary" href="<?php echo home_url(); ?>/donate">Just donate</a>
            </div>
        </div>

    </section>
    <!-- <section id="volunteer">
        <p class="p2">AiOP is a volunteer-run organization; we&rsquo;re always looking for people to help make the
            festival happen in a range of positions. Fill out our form and we&rsquo;ll help find the best spot for you
            on our volunteer team.</p>
        <div class="text">
            <h2 class="d2">CARE to volunteer?</h2>
            <a class="button deep-coral"
                href="https://docs.google.com/forms/d/e/1FAIpQLSfb5jew752cHdCaXX_1nUN-10t-J81IOpejrz80JqI-Xjq3uQ/viewform">Count
                me in!</a>
        </div>
    </section> -->

    <section id="mailing-list">
        <div class="text">
            <h2 class="d2">Join our mailing list!</h2>
            <p class="p1">Sign up to keep informed of major festival events and announcements.</p>
        </div>
        <div id="mc_embed_shell">
            <div id="mc_embed_signup">
                <form
                    action="https://artinoddplaces.us2.list-manage.com/subscribe/post?u=59738127bacb34e4346674bbc&amp;id=e45a88786c&amp;f_id=00cb7fe0f0"
                    method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate"
                    target="_blank">
                    <div id="mc_embed_signup_scroll">
                        <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                        <div class="mc-field-group"><label for="mce-EMAIL">Email Address <span
                                    class="asterisk">*</span></label><input type="email" name="EMAIL"
                                class="required email" id="mce-EMAIL" required="" value=""></div>
                        <div class="mc-field-group"><label for="mce-FNAME">First Name </label><input type="text"
                                name="FNAME" class=" text" id="mce-FNAME" value=""></div>
                        <div class="mc-field-group"><label for="mce-LNAME">Last Name </label><input type="text"
                                name="LNAME" class=" text" id="mce-LNAME" value=""></div>
                        <div id="mce-responses" class="clear foot">
                            <div class="response" id="mce-error-response" style="display: none;"></div>
                            <div class="response" id="mce-success-response" style="display: none;"></div>
                        </div>
                        <div aria-hidden="true" style="position: absolute; left: -5000px;">
                            /* real people should not fill this in and expect good things - do not remove this or risk
                            form bot signups */
                            <input type="text" name="b_59738127bacb34e4346674bbc_e45a88786c" tabindex="-1" value="">
                        </div>
                        <div class="optional-parent">
                            <div class="clear foot">
                                <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button"
                                    value="Subscribe">
                                <p style="margin: 0px auto;"><a href="http://eepurl.com/iXL1Jk"
                                        title="Mailchimp - email marketing made easy and fun"><span
                                            style="display: inline-block; background-color: transparent; border-radius: 4px;"><img
                                                class="refferal_badge"
                                                src="https://digitalasset.intuit.com/render/content/dam/intuit/mc-fe/en_us/images/intuit-mc-rewards-text-dark.svg"
                                                alt="Intuit Mailchimp"
                                                style="width: 220px; height: 40px; display: flex; padding: 2px 0px; justify-content: center; align-items: center;"></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script>
            <script type="text/javascript">
                (function($) {
                    window.fnames = new Array();
                    window.ftypes = new Array();
                    fnames[0] = 'EMAIL';
                    ftypes[0] = 'email';
                    fnames[1] = 'FNAME';
                    ftypes[1] = 'text';
                    fnames[2] = 'LNAME';
                    ftypes[2] = 'text';
                    fnames[3] = 'MMERGE3';
                    ftypes[3] = 'text';
                }(jQuery));
                var $mcj = jQuery.noConflict(true);
            </script>
        </div>

    </section>
</main>

<?php get_footer(); ?>
