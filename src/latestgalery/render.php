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
<section class="adi26r-latest-gallery" id="latest-gallery" data-post-type="ai-art-gallery">
  <header class="latest-gallery-header">
    <h3 class="title"><?php echo $sectionTitle; ?></h3>
    <p class="description"><?php echo $sectionDescription; ?></p>
  </header>
  <ul class="gallery-list">
    <?php if ($query->have_posts()) : ?>
      <?php while ($query->have_posts()) : $query->the_post(); ?>
        <li class="gallery-item">
          <a href="<?php the_permalink(); ?>" class="post-link">
            <?php if (has_post_thumbnail()) : ?>
              <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php the_title_attribute(); ?>">
          <?php else : ?>
              <img src="<?php echo esc_url(get_template_directory_uri() . '/img/a26r-square-medium.jpg'); ?>" alt="<?php esc_attr_e('No Thumbnail', 'adi26r'); ?>">
            <?php endif; ?>
          </a>
        </li>
      <?php endwhile; ?>
    <?php else : ?>
          <li><?php esc_html_e('No image found.', 'adi26r'); ?></li>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </ul>
  <div class="read-more">
    <a href="<?php echo get_post_type_archive_link('ai-art-gallery'); ?>" class="read-more-button">
      <?php esc_html_e('More Images', 'adi26r'); ?>
    </a>
  </div>
</section>