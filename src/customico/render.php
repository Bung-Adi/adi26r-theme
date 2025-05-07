<?php
    $image_url    = isset( $attributes['imageUrl'] ) ? $attributes['imageUrl'] : '';
    $image_size   = isset( $attributes['imageSize'] ) ? intval( $attributes['imageSize'] ) : 64;
    $image_alt    = isset( $attributes['imageAlt'] ) ? $attributes['imageAlt'] : '';
    $link_url     = isset( $attributes['linkUrl'] ) ? $attributes['linkUrl'] : '#';
    $link_text    = isset( $attributes['linkText'] ) ? $attributes['linkText'] : '';
    $alignment    = isset( $attributes['alignment'] ) ? $attributes['alignment'] : 'center';
    $open_new_tab = isset( $attributes['openInNewTab'] ) ? $attributes['openInNewTab'] : false;
    $layout       = isset( $attributes['layout'] ) ? $attributes['layout'] : 'vertical';
    
    // Check for required content
    if ( empty( $image_url ) ) {
        return '';
    }

    // special for vertical
    if ($layout = 'vertical') {
        $vertical_responsive = sprintf(
            'style="--image-size: %spx;"',
            esc_attr( intval($image_size) )
        );
    }
    
    // Set target attribute for the link
    $target = $open_new_tab ? ' target="_blank" rel="noopener noreferrer"' : '';
    
    // Generate wrapper class based on alignment and layout
    $wrapper_class = sprintf(
        'adi26r-customico-block %s align-%s',
        esc_attr( $layout ),
        esc_attr( str_replace('flex-', '', $alignment) )
    );
?>

<div class="<?php echo $wrapper_class?>" <?php echo $vertical_responsive?>>
    <a href="<?php echo esc_url( $link_url ) ?>"<?php echo $target ?> class="icon-link-wrapper">
        <img 
            src="<?php echo esc_url( $image_url ) ?>" 
            alt="<?php echo esc_attr( $image_alt ) ?>" 
            class="icon-link-image" 
            style="width:<?php echo intval( $image_size ) ?>px; height:<?php echo intval( $image_size ) ?>px" 
        />
        <div class="icon-link-text"><?php echo esc_html( $link_text ) ?></div>
    </a>
</div>