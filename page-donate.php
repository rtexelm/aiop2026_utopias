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

get_header();

?>


<div id="donate-bg"></div>
<div class="positioner">
    <div class="donate-bg-ripple" id="donate-ripple-1">
        <img src="<?php bloginfo('template_url'); ?>/assets/Ripple_400px_02.png" />
    </div>
</div>
<main class="site-content donate" id="main-content">

    <h1 class="hidden">Donate</h1>

    <!-- <h2 class="page-title h1">Donate</h2> -->


    <div class="payment-method paypal">
        <h2>PayPal</h2>
        <p class="p1">Donations are made through our fiscal sponsor GOH/Seven Loaves Productions. Be sure to select the
            amount and the program: Art in Odd Places.</p>
        <a href="https://www.paypal.com/us/fundraiser/charity/1474262" class="button pink">Donate now</a>
    </div>

    <div class="payment-method mail">
        <h2>Mail us a check</h2>
        <p class="p1">Make checks payable to GOH Productions (our 5013c fiscal sponsor) with Art in Odd Places in the
            note & send to:</p>
        <p class="p2">
            GOH Productions</br>
            309 East 4th Street, Suite 3-B</br>
            New York, NY 10009-6911</br>
            Attention: Art in Odd Places
        </p>
    </div>

</main><!-- #primary -->

<?php get_footer(); ?>