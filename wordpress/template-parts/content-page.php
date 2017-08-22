<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package quest
 */

?>
		<div class="dark-red-bg m0 pa6 bb-red">
      <div class="mw5 mw7-ns center">
        <div class="f4 f2-l ddc white">Team Blastoff</div>
        <div class="menlo hot-red hot-red-text-glow b">62% Completed</div>
        <p class="lh7 menlo white o-80">These STEM learning tubs will give students the opportunity to recreate bridges, houses and vehicles. They will apply all of their knowledge about counting, shapes, measurement; to create a master piece.</p>
        <a href="#" class="btn btn-red menlo b mt3 dib">Give</a>
      </div>
    </div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'quest' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'quest' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
