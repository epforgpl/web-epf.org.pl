<?php get_header('blog'); ?>


    <div class="posts-list">
        <div id="author_outside">
            <div class="container">
                <h3><?php $authordata = get_userdata($post->post_author); echo $authordata->display_name; ?></h3>
                <div id="athor_bio">
<p><?php $authordata = get_userdata($post->post_author); echo $authordata->description; ?></p>
                </div>
            </div>
        </div>
        <div class="container" id="container">
            <?php $author_id = get_the_author_meta( 'ID' );?>
            
            <?php $loop = new WP_Query(array('author'=> $author_id, 'paged' => $paged)); ?>
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