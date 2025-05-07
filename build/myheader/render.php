<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<nav class="adi26r-mnav">
  <div class="panel">
    <div class="logo">
      <a href="<?php echo home_url('/'); ?>" aria-label="adi26r logo">
        <img src="<?php echo get_template_directory_uri(); ?>/img/adi26r-logo-w.png" alt="adi26r logo" class="adi26r-thelogo">
      </a>
    </div>
    <div class="links">
      <ul>
        <?php
          $menuOne = array(
              'menu'            => 'nav-menu',
              'menu_class'      => '',
              'items_wrap'      => '%3$s',
              'theme_location'  => 'nav-menu',
              'container'       => false,
              'echo'            => false,
              'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
              'fallback_cb'     => '__return_empty_string',
          );
          $menu_html = wp_nav_menu($menuOne);
          $menu_html = preg_replace('/<\/?li[^>]*>/', '<li>', $menu_html);
          // echo strip_tags(wp_nav_menu($menuOne), '<a>');
          echo $menu_html; 
        ?>
      </ul>
    </div>
    <div class="search">
      <a href="#" aria-label="search button of adi26r website">
        <img src="<?php echo get_template_directory_uri(); ?>/img/akar-icons_search.svg" alt="search icon"/>
      </a>
    </div>
  </div>
</nav>

<div class="adi26r-mnav-button">
  <button class="burger" title="open close navigation" aria-label="open close menu">
    <span class="line line-a"></span>
    <p class="text">menu</p>
    <span class="line line-b"></span>
  </button>
</div>

<main class="adi26r-main">