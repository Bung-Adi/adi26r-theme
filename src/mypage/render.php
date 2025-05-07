<?php
if ( have_posts() ) :
  while ( have_posts() ) : the_post();?>
    <section id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </section>    
    <?php
  endwhile;
else :?>
    <p><?php esc_html_e( 'Sorry, no content available.', 'adi26r' ); ?></p>
    <?php
endif;?>