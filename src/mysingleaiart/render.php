<article id="ai-art-gallery-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <p class="entry-meta">
      <?php esc_html_e( 'Published on', 'adi26r' ); ?> <?php the_date(); ?> 
      <?php esc_html_e( 'by', 'adi26r' ); ?> <?php the_author(); ?>
    </p>
  </header>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
  <aside class="related-posts">
    <h2><?php esc_html_e( 'Related Images', 'adi26r' ); ?></h2>
    <ul>
      <?php
      $tags = get_the_terms(get_the_ID(), 'post_tag');
      if ( $tags && ! is_wp_error( $tags ) && isset($tags[0]) ) {
        $first_tag = $tags[0]->term_id;
        $query_args = array(
          'post_type'      => 'ai-art-gallery',
          'posts_per_page' => 5,
          'post__not_in'   => array(get_the_ID()), // Exclude current post
          'tax_query'      => array(
              array(
                  'taxonomy' => 'post_tag',
                  'field'    => 'term_id',
                  'terms'    => $first_tag,
              ),
          ),
        );
        $related_posts = new WP_Query( $query_args );

        if ( $related_posts->have_posts() ) :
          while ( $related_posts->have_posts() ) : $related_posts->the_post();
      ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <img class="related_image" src="<?php the_post_thumbnail_url('medium');?>" 
              <?php $alt_text = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);?> 
              alt="<?php echo esc_html($alt_text);?>">
            </a>
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
      <?php
      }
      ?>
    </ul>
  </aside>
</article>