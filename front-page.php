<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page
 *
 * @package WordPress
 * @subpackage AiOP_2024
 * @copyright  AiOP, Laurie Waxman, Ross Mabbett
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();

?>

<main class="home" id="main-content">
    <div id="frontpage-background"></div>
    <section class="header">
        <!-- Title text -->
        <article id="title">
            <h1>
                <span id="title-1">Art in</span>
                <span id="title-2">Odd Places</span>
                <span id="title-3">2024</span>
                <span id="title-4">CARE</span>
            </h1>
        </article>
    </section>
    <section id="dates">
        <h2 class="date-text h1">
            <span class="month">October</span>
            <span class="days">
                <div style="display:inline-block">18&ndash;</div>20,<span class="year">
                    2024
                </span>
            </span>
        </h2>
        <div class="date-buttons">
            <a class="button light-coral" href="<?php echo home_url(); ?>/schedule">Schedule</a>
            <a class="button bright-blue" href="<?php echo home_url(); ?>/public-programs">Public
                Programs</a>
        </div>
        <div class="date-care">
            <p class="p1"><span class="italic">Art in Odd Places 2024: CARE</span> features visual and performance
                artists on 14th Street from Avenue A to the Hudson River, October 18&ndash;20, 2024.</p>
        </div>
    </section>

    <section id="about">
        <h2 class="byline lh-8em h1">
            <span id="byline-1">Curated by</span>
            <span id="byline-2">Patricia Miranda</span>
            <span id="byline-3">& Christopher</span>
            <span id="byline-4">Kaczmarek</span>
        </h2>
        <div class="about-text">
            <div class="curatorial">
                <p class="p1">Care is a ripple.</p>
                <p class="p1">From intimate to global, from self-care, care of family and lover, friend and neighbor,
                    town and city, state and country, the global world, care undulates out to our whole island planet
                    and every species upon it. To care is to look after, provide for, to watch over, to grieve, to
                    lament, to cry, to feel concern, to attach importance.</p>
                <p class="sm">Art opens a space of empathy – an invitation to see through the eyes and heart and mind of
                    another. An act of hope and imagination – art can help us dream new ways and new worlds into being.
                    We invite you to imagine together how we can bring care to one another and our fraught and fragile
                    world. <span class="italic">AiOP 2024</span> asks how art can create spaces and actions of
                    compassionate fearless care.</p>
            </div>
            <a class="button mustard" href="<?php echo home_url(); ?>/about">About the festival</a>
        </div>
    </section>

    <section id="artists">
        <div class="artists-heading">

            <h2 class="lh-8em h1">
                <span id="artists-count">75+ Artists'</span>
                <span id="artists-projects"> Projects</span>
            </h2>
        </div>
        <div class="artists-buttons">
            <a class="button beige" href="<?php echo home_url(); ?>/artists">Artists</a>
            <a class="button light-coral" href="<?php echo home_url(); ?>/schedule">Schedule</a>
        </div>
        <div class="artists-list">
            <p class="p2">Abigail Simon & Marina Zurkow |Alexandra Neuman | Amanda Wu, Yasmeen Abdallah & Ying Chen |
                Amelia Marzec | AnimaeNoctis (Silvia Marcantoni Taddei & Massimo Sannelli) | Anna Miller | Augustus
                Wendell | Barbara Ann Michaels | Bonny Leibowitz | Buddy YoMA | Chanika Svetvilas | Chere Krakovsky |
                Claudine Arendt | Connie Perry | Creatures From The Hole Poetry & Film Collective//Autocracy: The Pink,
                Thing, Frend, Wun, bug/war, Mon, Chi-Chi, Guerilla, (W)horse, The, Dog, Revolutionary Abject & Puppet
                Horde | Cynthia Reynolds | David Appel, Randy Burd, Paris Cullen, Ann Duffy, Sophia Dunn-Fox, Cecilia
                Fontanesi, Ava Heller, Emilee Lord, Noa Covelo Lores & Nicole Touzien | David Darts | Day de Dada
                Performance Art Collective: Vivian Vassar, Barbara Lubliner, Jennifer Weigel, Eileen Ramos & Mary
                Campbel | Deirdre Macleode | doblespiral: María Bonomi & Lucía Cozz | Domenica Garcia | Doreen Chan |
                Earthworks | Gabbing with Gays: Zach Rothman-Hicks & André Knights | Geraldo Zamproni | Giannina Gomez,
                with collaborators: Savannah Claudia Levin, Kalan Sherrard, Crackhead Barney, & more | Gretchen Vitamvas
                | Janine Renee Cunningham | Jared leClaire & Kirstin Dunlap | Jessica Duby | Jo Blin |
                Jo Yarringtone | Julia Justo | Karen Kalkstein | Katie Cercone | Ken Rinaldo | Kiki McGrath | Kristin
                Mariani and Heather Lyon with Misael Soto | Laura Nova, Michele Kahane & Sara Koller | Laura Reeder |
                Laure Drogoul | Leah Crosby | Lichen Likers: Alex Buchan, Amy Youngs, Anna Arbogast, Doosung Yoo, Jiara
                Sha & Madison Blue | Lisa Hein | Maisie Luo | Maria Seddio, Pia Tempestini, and the WasherWoman
                Collective | Mariana Maia | Nima Nikakhlagh |Priscilla Stadler, Fan Kong, and Renè Sing | Rachelle
                Beaudoin | Rae Goodwin | Sally Apfelbaum | Serena Buschi | Shirah Rubin | Susan Wolf | Suh Amorim with
                Pedro Garcia | Sylvain Souklaye | tasha dougé | Terry S Hardy | The Bureau of Non Competitive Research:
                Stacey Cann, José Cortés, Daniel Fiset, Po B. K. Lomami & Victoria Stanton | The Department NYC:
                Emmanuelle Zagoria and Jack Daniel Woods | The Illuminator | The Square Theatre Jiawen: Hu, Jing, Dong |
                the Web… | | The Why Collective | Theda Sandiford | Thomas Diafas | Unsent Letter Mailbox: Sofia Kavlin
                & Kelly To | Victoria Boulay| Y Nishizawa | Zhao Mengyu</p>
        </div>
    </section>
    <section id="volunteer">
        <p class="p2">AiOP is a volunteer-run organization; we&rsquo;re always looking for people to help make the
            festival happen in a range of positions. Fill out our form and we&rsquo;ll help find the best spot for you
            on our volunteer team.</p>
        <div class="text">
            <h2 class="d2">CARE to volunteer?</h2>
            <a class="button deep-coral"
                href="https://docs.google.com/forms/d/e/1FAIpQLSfb5jew752cHdCaXX_1nUN-10t-J81IOpejrz80JqI-Xjq3uQ/viewform">Count
                me in!</a>
        </div>
    </section>

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
                        <div class="optionalParent">
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
    </div>
</main>

<?php get_footer(); ?>