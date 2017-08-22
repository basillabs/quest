<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package quest
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quest</title>
    <?php wp_head(); ?>
  </head>
  <body class="sans-serif dark-red-bg">
    <header>
      <div class="lh7 cover bg-left p5-ns p3 bg-center-l" style="background-image: url(<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/quest/img/bg.png)">
        <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/quest/img/logo.svg" class="db center pt6" />
        <div class="">
          <div class="mt0 pt5 pa3 pa0-l pb5 pb6-m pb6-l mw7-ns center">
            <h1 class="f3 f1-l ddc hot-red dark-text-shadow-lg tc">The sky is not the limit.</h1>
            <p class="menlo hot-red b dark-text-shadow">
              Quest for Space is a one-of-a-kind program for students to
              create and run experiments aboard the International Space Station (ISS).

            </p>
            <p class="menlo white dark-text-shadow o-90">
              This allows them to collect data and analyze findings with the mentorship of top scientists and engineers from around the world.
              Quest for Space is offered through The Quest Institute for Quality Education, located in San Jose, California.  This is a non-profit organization 501(3)(c) with a mission to “provide enriching programs for schools around the world in the fields of academics, arts and athletics via a personal quest for excellence.”
            </p>
          </div>
        </div>
      </div>
    </header>
    <div id="content" class="site-content">

