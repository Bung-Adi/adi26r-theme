<?php
$sectionTitle = isset($attributes['sectionTitle']) ? $attributes['sectionTitle'] : '';
$sectionDescription = isset($attributes['sectionDescription']) ? $attributes['sectionDescription'] : '';
$postType = isset($attributes['postType']) ? $attributes['postType'] : 'post';

$args = [
    'post_type' => $postType,
    'posts_per_page' => 5,
];
$query = new WP_Query($args);
?>
<section class="adi26r-latest-posts" data-post-type="<?php echo esc_attr($postType); ?>">
    <h3 class="title"><?php echo esc_html($sectionTitle); ?></h3>
    <p class="description"><?php echo esc_html($sectionDescription); ?></p>
    <ul class="posts-list">
        <li><?php esc_html_e('Loading posts...', 'latestposts'); ?></li>
    </ul>
</section>