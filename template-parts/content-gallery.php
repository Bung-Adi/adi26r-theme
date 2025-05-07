<?php
// Query the latest 'ai-art-gallery' posts
$args = array(
  'post_type' => 'ai-art-gallery',
  'posts_per_page' => 5,
  'orderby' => 'date',
  'order' => 'DESC',
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
  <div class="latest-ai-art-gallery">
    <div>
      <?php while ($query->have_posts()) : $query->the_post(); ?>
        <a href="<?php the_permalink(); ?>">
          <?php if (has_post_thumbnail()) : ?>
            <div class="thumbnail"><?php the_post_thumbnail('medium'); ?></div>
          <?php endif; ?>
          <h3><?php the_title(); ?></h3>
        </a>
      <?php endwhile; ?>
    </div>
  </div>
<?php
else :
  echo '<p>No AI Art found.</p>';
endif;

// Reset post data
wp_reset_postdata();
?>