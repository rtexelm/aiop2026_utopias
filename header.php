<?php

/**
 * The Header template
 */

$nav_class = '';
$logo_file = 'aiop_nav_dark_green.png';
$hamburger_file = 'hamburger-icon-24-dark.svg';

if (is_page('artists')) {
    $nav_class = 'nav-green';
    $logo_file = 'aiop_nav_light_blue.png';
    $hamburger_file = 'hamburger-icon-24.svg';
}

?>
<html>

<head>
    <title>AiOP 2026 UTOPIAS</title>
    <!-- meta data -->
    <meta charset="UTF-8">
    <meta name="description" content="Art in Odd Places 2026 UTOPIAS">
    <meta name="keywords" content="AiOP, Festival, Performance, New York City, NYC, Art">
    <meta name="author" content="Laurie Waxman & Ross Mabbett">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <!-- Stop phones from turning dashes into phone numbers -->
    <meta name="format-detection" content="telephone=no">
    <!-- fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/hoe1avd.css">
    <!-- scripts & styles -->
    <?php wp_head(); ?>
    <!-- scripts -->

</head>

<body <?php body_class(); ?>>

    <nav class="top <?php echo esc_attr($nav_class); ?>">

        <a href="#main-content" id="skip-content">Skip to content</a>

        <section class="nav-bar-flex" id="navScroll">

            <a title="home" href="<?php echo get_home_url(); ?>" id="home">

                <img src="<?php bloginfo('template_url'); ?>/assets/<?php echo esc_attr($logo_file); ?>" id="aiopLogo" alt="AIOP"
                    aria-hidden="true">
            </a>

            <div class="flex-container just-flex-end align-items-center">

                <div class="menuVisible">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'top-navigation',
                        'container_class' => 'topNav'
                    ));
                    ?>
                </div>

                <a title="full menu" href="#menuFull" id="menuToggleAnchor">

                    <img id="menuToggle" src="<?php bloginfo('template_url'); ?>/assets/<?php echo esc_attr($hamburger_file); ?>"
                        alt="view menu" aria-hidden="true">

                    <img id="menuToggleDark" class="display-none" src="
                        <?php bloginfo('template_url'); ?>/assets/hamburger-icon-24.svg" alt="view menu"
                        aria-hidden="true">

                </a>

            </div>

        </section>

        <div class="menuFull" id="menuFull">

            <?php
            wp_nav_menu(array(
                'theme_location' => 'full-navigation',
                'container_class' => 'fullNav'
            ));
            // wp_nav_menu( array( 
            // 'theme_location' => 'sub-navigation', 
            // 'container_class' => 'subNav' 
            // ) );
            ?>
        </div>
    </nav>
    <!-- <div id="spacer"></div> -->
