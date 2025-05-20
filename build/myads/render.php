<?php
    $image_url    = isset( $attributes['imageUrl'] ) ? $attributes['imageUrl'] : '';
    $image_size   = isset( $attributes['adsSize'] ) ? $attributes['adsSize'] : '';
    $image_alt    = isset( $attributes['imageAlt'] ) ? $attributes['imageAlt'] : '';
    $link_url     = isset( $attributes['linkUrl'] ) ? $attributes['linkUrl'] : '#';
    $alignment    = isset( $attributes['alignment'] ) ? $attributes['alignment'] : 'center';
    $open_new_tab = isset( $attributes['openInNewTab'] ) ? $attributes['openInNewTab'] : false;
    
    // Set target attribute for the link
    $target = $open_new_tab ? ' target="_blank" rel="noopener noreferrer"' : '';
    
    // Generate wrapper class based on alignment and layout
    $wrapper_class = sprintf(
        'adi26r-adsimage-block align-%s',
        esc_attr( str_replace('flex-', '', $alignment) )
    );
?>

<div class="<?php echo $wrapper_class?>">
    <?php 
    if ($image_url) {
    ?>
    <div class='ads-link-wrapper <?php echo $image_size ?>'>
        <img src="<?php echo get_template_directory_uri(); ?>/img/ads-corner.svg" alt="the next image is an ads. and this is an ads badge" class='ads-badge'>
        <a href="<?php echo esc_url( $link_url ) ?>"<?php echo $target ?>>
            <img 
                src="<?php echo esc_url( $image_url ) ?>" 
                alt="<?php echo esc_attr( $image_alt ) ?>" 
                class='ads-link-image'
            />
        </a>
    </div>
    <?php } else { ?>
        <a href="mailto:adiws@yandex.com"<?php echo $target ?> class="ads-link-wrapper">
            <div class="noads <?php echo $image_size ?>">
                <p>Interesting to put your ads here. DM or Email me</p>
            </div>
        </a>
    <?php } ?>
</div>