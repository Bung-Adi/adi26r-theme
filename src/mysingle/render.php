
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <p class="entry-meta">
      <?php esc_html_e( 'Published on', 'adi26r' ); ?> <?php the_date(); ?> 
      <?php esc_html_e( 'by', 'adi26r' ); ?> <?php the_author(); ?>
    </p>
  </header>
  <section class="entry-content">
    <?php the_content(); ?>
  </section>
  <!-- Related Posts Section -->
  <section class="related-posts">
    <h2><?php esc_html_e( 'Related Posts', 'adi26r' ); ?></h2>
    <ul>
      <?php
      $categories = wp_get_post_categories( get_the_ID() );
      $query_args = array(
        'category__in'   => $categories,
        'post__not_in'   => array( get_the_ID() ),
        'posts_per_page' => 3, // Number of related posts to display
      );
      $related_posts = new WP_Query( $query_args );

      if ( $related_posts->have_posts() ) :
        while ( $related_posts->have_posts() ) : $related_posts->the_post();
      ?>
          <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </li>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
      ?>
        <li><?php esc_html_e( 'No related posts found.', 'adi26r' ); ?></li>
      <?php endif; ?>
    </ul>
  </section>
  <?php
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }
  ?>
</article>