<?php
$postType = isset($attributes['postType']) ? $attributes['postType'] : 'post';
$sectionTitle = isset($attributes['sectionTitle']) ? $attributes['sectionTitle'] : __('Latest Posts', 'adi26r');
$sectionDescription = isset($attributes['sectionDescription']) ? $attributes['sectionDescription'] : __('Latest posts description.', 'adi26r');
$sectionId = isset($attributes['sectionId']) ? $attributes['sectionId'] : 'latest-post';

$args = [
    'post_type' => $postType,
    'posts_per_page' => 5,
];
$query = new WP_Query($args);
?>
<section class="adi26r-latest-posts" id="<?php echo esc_html($sectionId); ?>">
    <header class="latest-posts-header">
        <h3 class="title"><?php echo esc_html($sectionTitle); ?></h3>
        <p class="description"><?php echo esc_html($sectionDescription); ?></p>
    </header>
    <ul class="posts-list">
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li class="post-item">
                    <a href="<?php the_permalink(); ?>" class="post-link">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" alt="<?php the_title_attribute(); ?>">
                            </div>
                        <?php else : ?>
                            <div class="post-thumbnail">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/a26r-square-medium.jpg'); ?>" alt="<?php esc_attr_e('Default Thumbnail', 'adi26r'); ?>">
                            </div>
                        <?php endif; ?>
                        <span>
                            <h4 class="post-title"><?php the_title(); ?></h4>
                            <p class="post-date"><?php echo get_the_date(); ?></p>
                        </span>
                    </a>
                </li>
            <?php endwhile; ?>
        <?php else : ?>
            <li><?php esc_html_e('No posts found.', 'adi26r'); ?></li>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </ul>
    <div class="read-more">
        <a href="<?php echo get_post_type_archive_link($postType); ?>" class="read-more-button">
            <?php esc_html_e('Read More', 'adi26r'); ?>
        </a>
    </div>
</section>