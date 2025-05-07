<?php
  $sectionTitle = isset( $attributes['sectionTitle'] ) ? $attributes['sectionTitle'] : '';
  $sectionDescription = isset( $attributes['sectionDescription'] ) ? $attributes['sectionDescription'] : '';
  
  $args = array(
    'post_type' => 'ai-art-gallery',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC',
  );
  $query = new WP_Query($args);
?>
<section class="adi26r-latest-gallery" data-post-type="ai-art-gallery">
  <h3 class="title"><?php echo $sectionTitle; ?></h3>
  <p class="description"><?php echo $sectionDescription; ?></p>
  <div class="latest-gallery">
    <div><?php esc_html_e('Loading gallery...', 'latestgalery'); ?></div>
  </div>
</section>