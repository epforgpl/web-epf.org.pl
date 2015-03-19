<?php get_header('blog'); ?>


    <div class="posts-list">
        <div class="container" id="container">
            <?php $loop = new WP_Query(array('paged' => $paged, 'cat' => get_query_var('cat'))); ?>
            <?php if ($loop->have_posts()) : ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="item">
                        <article class="post post--listed">
                            <div class="post-basic">

                                <?php if (has_post_thumbnail()) { // Set Featured Image ?>
                                    <figure class="post-photo"><?php the_post_thumbnail(); ?></figure>
                                <?php } elseif (first_post_image()) { // Set the first image from the editor ?>
                                    <figure class="post-photo"><img src="<?php echo first_post_image(); ?>"
                                                                    class="wp-post-image"></figure>
                                <?php } ?>

                                <div class="post-categories">
                                    <?php the_category(', '); ?>
                                </div>
                                <h1 class="post-title"><?php the_title(); ?></h1>
                                <time datetime="<?php the_time('Ymd') ?>"
                                      class="post-date"><?php the_time('j F Y'); ?></time>
                            </div>
                            <!-- / .post-basic -->
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="post-more-link"></a>
                        </article>
                        <!-- / .post--listed -->
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <h2><?php echo __('Brak postów')?></h2>
            <?php endif; ?>
        </div>
        <div class="pagination">
            <?php generatePagination(get_query_var('paged'), $loop); ?>
        </div>
    </div>

<?php get_footer(); ?>