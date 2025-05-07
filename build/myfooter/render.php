<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
</main>
<footer class="adi26r-footer">
	<ul>
    <?php
      $menuTwo = array(
          'menu'            => 'footer-menu',
          'menu_class'      => '',
          'items_wrap'      => '%3$s',
          'theme_location'  => 'footer-menu',
          'container'       => false,
          'echo'            => false,
          'depth'           => 0, // 1 = no dropdowns, 2 = with dropdowns.
          'fallback_cb'     => '__return_empty_string',
      );
      $menu_html = wp_nav_menu($menuTwo);
      $menu_html = preg_replace('/<\/?li[^>]*>/', '<li>', $menu_html);
      // echo strip_tags(wp_nav_menu($menuTwo), '<a>');
      echo $menu_html; 
    ?>
	</ul>
	<p class="credit">Code & Design by Adi26R a.k.a bungadi.com adikoding</p>
</footer>
