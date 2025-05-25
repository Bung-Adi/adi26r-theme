<?php
$tag = get_queried_object();

if (!function_exists('adi26r_render_tag_posts')) {
function adi26r_render_tag_posts($post_types, $section_title, $tag_id) {
    $args = [
        'post_type' => $post_types,
        'posts_per_page' => 10,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
        'tax_query' => [
            [
                'taxonomy' => 'post_tag',
                'field'    => 'term_id',
                'terms'    => $tag_id,
            ],
        ],
    ];
    $query = new WP_Query($args);
    ?>
    <section class="tag-archive-posts">
        <?php if ($section_title): ?>
            <h2><?php echo esc_html($section_title); ?></h2>
        <?php endif; ?>
        <?php if ($query->have_posts()) : ?>
            <ul class="posts-list">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <li class="post-item">
                        <a href="<?php the_permalink(); ?>" class="post-link">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php $alt_text = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);?>
                                <img class="gridpost_image" src="<?php the_post_thumbnail_url('medium');?>" alt="<?php echo esc_html($alt_text);?>">
                            <?php endif; ?>
                            <?php if (get_post_type() != 'ai-art-gallery'): ?>
                              <span class="post-title"><?php the_title(); ?></span>
                            <?php else: ?>
                              <span class="post-title"></span>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div class="pagination">
                <?php
                echo paginate_links([
                    'total' => $query->max_num_pages,
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                ]);
                ?>
            </div>
        <?php else : ?>
            <p>
                <?php esc_html_e('No posts found for this tag.', 'adi26r'); ?>
            </p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </section>
    <?php
}}
?>

<div class="adi26r-mytag">
    <header class="archive-header">
        <h1 class="archive-title"><?php echo esc_html(single_tag_title('', false)); ?></h1>
        <p class="archive-description">AI art Image with tags <?php echo esc_html(single_tag_title('', false)); ?> you can use all this image as wallpaper for your phone, tablet, pc, desktop, or you can use it for your personal content</p>
    </header>
    <?php
        adi26r_render_tag_posts('ai-art-gallery', '', $tag->term_id);
        adi26r_render_tag_posts(['concept', 'post'], __('Concept & Blog Posts with this Tag', 'adi26r'), $tag->term_id);
    ?>
</div>