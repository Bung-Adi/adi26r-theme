<?php
$postType = 'concept';
$sectionTitle = isset($attributes['sectionTitle']) ? $attributes['sectionTitle'] : __('Archive Title', 'adi26r');
$sectionDescription = isset($attributes['sectionDescription']) ? $attributes['sectionDescription'] : __('Archive Description', 'adi26r');

$args = [
    'post_type' => 'ai-art-gallery',
    'posts_per_page' => 10,
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
];
$query = new WP_Query($args);
?>
<section class="adi26r-myarchive-aiart">
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
                            <img class="gridpost_image" src="<?php the_post_thumbnail_url('medium');?>" 
                            <?php $alt_text = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);?> 
                            alt="<?php echo esc_html($alt_text);?>">
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
