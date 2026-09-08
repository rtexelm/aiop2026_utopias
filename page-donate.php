<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-artist
 *
 * @package WordPress
 * @subpackage AiOP_2026
 * @copyright  AiOP, Laurie Waxman, Ross Mabbett
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();

?>


<div id="fullpage-texture"></div>
<main class="site-content donate" id="main-content">

    <h1 class="hidden">Donate</h1>

    <section id="donate-proclaim" class="content-section-padding">

        <h2 id="donate-headline" class="h1">
            There are several ways to donate!
        </h2>

        <h3 id="donate-note">
            Please note that donations are made through our 5013c fiscal sponsor, GOH/Seven Loaves Productions.
        </h3>

    </section>


    <section id="donation-options" class="content-section-padding">

        <div class="payment-method paypal">
            <h3>PayPal</h3>
            <p>Be sure to select the amount and the program: <span class="italic">Art in Odd Places</span> from the drop-down menu.</p>
            <p>Credit, debit, or PayPal are accepted.</p>
            <a href="https://www.paypal.com/us/fundraiser/charity/147426" class="button lemon-lime">Donate now</a>
        </div>

        <div class="payment-method mail">
            <h3>Mail us a check</h3>
            <p>Make checks payable to GOH Productions (our 5013c fiscal sponsor) with Art in Odd Places in the
                note & send to:</p>
            <p class="p2">
                GOH Productions</br>
                309 East 4th Street, Suite 3-B</br>
                New York, NY 10009-6911</br>
                Attention: Art in Odd Places
            </p>
        </div>
    </section>


    <section id="support" class="content-section-padding">
        <div id="support-frame"></div>

        <img class="tshirt" id="tshirt-blue" src="<?php bloginfo('template_url'); ?>/assets/tshirts-591.png" />

        <div id="support-copy">
            <h2 class="h1">
                Give support via our merch store!
            </h2>

            <p>
                Every purchase directly supports the festival's artists, with 100% of proceeds going toward artist fees for AiOP's 21st annual festival.
            </p>

            <div id="support-copy-buttons">
                <a class="button bright-green" href="https://www.bonfire.com/store/aiop/">Visit our store</a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
