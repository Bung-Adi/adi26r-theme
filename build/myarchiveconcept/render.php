<?php
$postType = 'concept';
$sectionTitle = isset($attributes['sectionTitle']) ? $attributes['sectionTitle'] : __('Archive Title', 'adi26r');
$sectionDescription = isset($attributes['sectionDescription']) ? $attributes['sectionDescription'] : __('Archive Description', 'adi26r');

$args = [
    'post_type' => $postType,
    'posts_per_page' => 10,
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
];
$query = new WP_Query($args);
?>
<section class="adi26r-myarchive-concept">
    <header class="archive-header">
        <h1 class="archive-title"><?php echo esc_html($sectionTitle); ?></h1>
        <p class="archive-description"><?php echo esc_html($sectionDescription); ?></p>
    </header>
    <div class="archive-posts">
        <?php if ($query->have_posts()) : ?>
            <ul class="posts-list">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <li class="post-item">
                        <a href="<?php the_permalink(); ?>" class="post-link">
                            <div class="post-thumb">
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
                                    <h2 class="post-title"><?php the_title(); ?></h2>
                                    <p class="post-date"><?php echo get_the_date(); ?></p>
                                    <p class="post-excerpt"><?php the_excerpt(); ?></p>
                                </span>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div class="pagination">
                <?php
                echo paginate_links([
                    'total' => $query->max_num_pages,
                ]);
                ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e('No posts found.', 'adi26r'); ?></p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</section>
