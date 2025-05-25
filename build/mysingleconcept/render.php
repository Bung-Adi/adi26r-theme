
<article id="concept-<?php the_ID(); ?>" <?php post_class(); ?>>
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
  <div class="content-tags">
    <h2>Tags : </h2>
    <?php
      $tags = get_the_terms(get_the_ID(), 'post_tag');
      if ( $tags && ! is_wp_error( $tags ) ) {
          echo '<ul class="post-tags">';
          foreach ( $tags as $tag ) {
    ?>
            <a href="<?php echo esc_url( get_tag_link( $tag ) ); ?>" rel="tag"><?php echo esc_html( $tag->name ); ?></a>
    <?php
          }
          echo '</ul>';
      }
    ?>
  </div>
  <!-- Related Posts Section -->
  <section class="related-posts">
    <h2><?php esc_html_e( 'Related Posts', 'adi26r' ); ?></h2>
    <ul>
      <?php
      $tags = wp_get_post_tags( get_the_ID(), array( 'fields' => 'ids' ) );
      if ( $tags ) {
        $query_args = array(
          'tag__in'        => $tags, // Posts with the same tags
          'post__not_in'   => array( get_the_ID() ), // Exclude the current post
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
      <?php
        endif;
      } else {
      ?>
        <li><?php esc_html_e( 'No related posts found.', 'adi26r' ); ?></li>
      <?php } ?>
    </ul>
  </section>
</article>