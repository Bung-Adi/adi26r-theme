
<article id="concept-<?php the_ID(); ?>" <?php post_class(); ?>>
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
</article>