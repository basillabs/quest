<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package quest
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
<?php
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

<?php if ( $wpb_all_query->have_posts() ) : ?>


  <!-- the loop -->
  <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>

    <div class="m0 bb-red">
      <div class="center cf mw8">
        <div class="fl-ns w-50-m w-third-l w-100">
          <div class="rocket-ship-div spaceship-container center">
            <svg id="rocket-flames" width="11px" height="38px" viewBox="0 0 11 38">
              <g id="flames">
                <polygon id="rocket-flame-light" fill="#9D0000" opacity="0.642266757" points="5.5 0.71875 11 38 0 38"></polygon>
                <polygon id="rocket-flame-dark" class="pulse pulse-delay" fill="#FF2020" opacity="0.813462409" points="5.5 0.71875 9 38 2 38"></polygon>
              </g>
            </svg>

            <svg id="rocket-container" width="11px" height="55px" viewBox="0 0 11 55">
              <g id="rocket">
                <polygon class="flame-move" id="Path-2" fill="#FFB914" points="4.33113325 30.9988397 5.52162438 54.7288392 6.61158311 30.9988397"></polygon>
                <polygon id="Rectangle-8" fill="#86240C" points="3 29 8 29 7.66344736 31 3.38228707 31"></polygon>
                <path d="M3.29538202,24.0004897 C3.29538202,24.0004897 0.724655534,25.40952 0.222970933,26.512686 C-0.278713667,27.6158519 0.222970933,30.756486 0.222970933,30.756486 C0.222970933,30.756486 1.07942895,29.7177413 1.64769101,29.2611171 C2.21595307,28.8044929 3.29538202,28.287665 3.29538202,28.287665 L3.29538202,24.0004897 Z" id="Path-2-Copy-3" fill="#546B7C"></path>
                <path d="M10.9475559,24.0004897 C10.9475559,24.0004897 8.37682945,25.40952 7.87514485,26.512686 C7.37346025,27.6158519 7.87514485,30.756486 7.87514485,30.756486 C7.87514485,30.756486 8.73160286,29.7177413 9.29986492,29.2611171 C9.86812698,28.8044929 10.9475559,28.287665 10.9475559,28.287665 L10.9475559,24.0004897 Z" id="Path-2-Copy-4" fill="#546B7C" transform="translate(9.299865, 27.378488) scale(-1, 1) translate(-9.299865, -27.378488) "></path>
                <path d="M3.04746713,29.546875 C2.3947312,26.5484437 1.98939014,22.2246713 1.98939014,17.0412693 C1.98939014,6.84589693 5.49202694,0.232183562 5.49202694,0.232183562 C5.49202694,0.232183562 8.99466373,6.84589693 8.99466373,17.0412693 C8.99466373,22.2246713 8.58932267,26.5484437 7.93658674,29.546875 L3.04746713,29.546875 Z" id="Combined-Shape-Copy" fill="#FFFFFF"></path>
              </g>
            </svg>
          </div>
        </div>

        <div class="fl-ns w-50-m w-two-thirds-l w-100 pa3 pa0-ns dt bt-red bn-ns">
          <div class="dtc v-mid white" style="height: 496px;">
            <div class="f4 f2-l ddc white"><?php the_title(); ?></div>
            <div class="menlo hot-red hot-red-text-glow b percentage-completed"></div>
            <div style="display:none"><?php the_meta(); ?></div>
						<div><?php get_post_meta($post_id); ?></div>
						<div class="menlo lh7 o-80">
	            <p>
								<?php the_content(); ?>
							</p>
						</div>
            <button class="btn btn-red b pointer pull-right mt4">Give</button>
          </div>
        </div>
      </div>
    </div>




  <?php endwhile; ?>
  <!-- end of the loop -->


  <?php wp_reset_postdata(); ?>

<?php else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
