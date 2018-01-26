<?php
$images = get_post_meta($post->ID, 'seattle_gallery_id', true);
if ($images) {
foreach ($images as $image) {
  //echo wp_get_attachment_link($image, 'large');
  $image_meta = get_post($image);
  $image_title = $image_meta->post_title;
  $image_caption = $image_meta->post_excerpt;
  $image_arr = wp_get_attachment_image_src($image, 'large');
  $image_url = !empty($image_arr[0]) ? $image_arr[0] : '';

  $image_sizeWidth = get_post_meta($image, 'display-img-size', true);
  $image_sizeHeight = get_post_meta($image, 'display-img-height', true);
  if(empty($image_sizeWidth)) { $image_sizeWidth = 'col-md-6'; }
  if(empty($image_sizeHeight)) { $image_sizeHeight = 'grid-md'; }
?>
  <article class="hentry grid-item <?php echo $image_sizeWidth; ?>">
    <div class="entry-inner">
      <div class="featured-image">
        <img src="<?php echo $image_url ?>" alt="" />
      </div>
      <?php if ($image_caption) { ?>
        <div class="entry-details px-4">
          <header class="entry-header pt-4 mb-2">
            <div class="entry-meta">
              <?php echo $image_title ?>
            </div><!-- .entry-meta -->
          </header><!-- .entry-header -->
          <footer class="entry-footer pb-4">
        		<?php echo $image_caption ?>
        	</footer><!-- .entry-footer -->
        </div>
      <?php } ?>
    </div>
  </article>
<?php }} ?>