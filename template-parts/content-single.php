<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Seattle
 */

 $square_thumbnail = true;
 $thumbnail_arr = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $square_thumbnail ? 'large' : 'medium');
 $thumbnail_url = !empty($thumbnail_arr[0]) ? $thumbnail_arr[0] : '';
 $sizeWidth = get_post_meta(get_the_ID(), 'display-img-size', true);
 $sizeHeight = get_post_meta(get_the_ID(), 'display-img-height', true);
 if(empty($sizeWidth)) { $sizeWidth = 'col-md-4'; }
 if(empty($sizeHeight)) { $sizeHeight = 'grid-md'; }

// Determine size for the container
// For testing only. Will replace with something better later.
if ($sizeWidth == 'col-md-1' || $sizeWidth == 'col-md-2' || $sizeWidth == 'col-md-3' || $sizeWidth == 'col-md-4' || $sizeWidth == 'col-md-5'  ) {
  $colWidth_1 = 'col-md-6';
  $colWidth_2 = 'col-md-6';
} elseif ($sizeWidth == 'col-md-6' || $sizeWidth == 'col-md-7' || $sizeWidth == 'col-md-8') {
  $colWidth_1 = 'col-md-8';
  $colWidth_2 = 'col-md-4';
} elseif ($sizeWidth == 'col-md-9' || $sizeWidth ==  'col-md-10'  || $sizeWidth == 'col-md-11' || $sizeWidth == 'col-md-12') {
  $colWidth_1 = 'col-md-12';
  $colWidth_2 = 'col-md-12';
} else {
  $colWidth_1 = 'col-md-6';
  $colWidth_2 = 'col-md-6';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-inner mb-5">
    <div class="row align-items-center">
      <div class="<?php echo $colWidth_1; ?>">
        <div class="featured-image">
          <img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" />
        </div>
      </div><!-- .colWidth1 -->
      <div class="<?php echo $colWidth_2; ?>">
        <div class="entry-details px-4">
        <header class="entry-header pt-4 mb-4">
          <?php
          if ( is_singular() ) :
            the_title( '<h1 class="entry-title mb-0">', '</h1>' );
          else :
            the_title( '<h2 class="entry-title mb-0"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
          endif;

          if ( 'post' === get_post_type() ) : ?>
          <div class="entry-meta">
            <?php seattle_posted_on(); ?>
          </div><!-- .entry-meta -->
          <?php
          endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
      		<?php
      			the_content( sprintf(
      				wp_kses(
      					/* translators: %s: Name of current post. Only visible to screen readers */
      					__( 'Continue reading<span class="screen-reader-text sr-only"> "%s"</span>', 'seattle' ),
      					array(
      						'span' => array(
      							'class' => array(),
      						),
      					)
      				),
      				get_the_title()
      			) );

      			wp_link_pages( array(
      				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'seattle' ),
      				'after'  => '</div>',
      			) );
      		?>
      	</div><!-- .entry-content -->
        <footer class="entry-footer pb-4">
      		<?php seattle_entry_footer(); ?>
      	</footer><!-- .entry-footer -->
      </div><!-- .entry-details -->
    </div><!-- .colWidth2 -->
    </div><!-- .row -->
  </div><!-- .entry-inner-->
</article><!-- #post-<?php the_ID(); ?> -->

<div class="row grid">
<div class="grid-sizer col-md-1 col-sm-6"></div>
<?php get_template_part( 'template-parts/attachment_gallery' ); ?>
</div>
