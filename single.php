<?php get_header('blog'); ?>
<?php the_post(); ?>

<div class="post-wrap">
	<article class="post">
	
	<?php if( get_field('nie_pokazuj_autora', $post->ID) ) { ?>
	    <div class="post-basic">
    <?php } else { ?>
    
		<div class="author_info">
			<div class="author_left"><?php echo get_avatar( get_the_author_meta( 'ID' ), 74 ); ?></div>
	        <h4><?php echo get_the_author_meta( 'display_name' );?></h4>
	        <p class="bio"><?php $author_id = get_the_author_meta( 'ID' ); echo get_field('short_bio','user_'. $author_id) ?></p>
	        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>"><?php echo __('Więcej od autora'); ?></a>
        </div>
        
		<div class="post-basic small_photo">
    <?php } ?>

			<div class="post-categories"><?php the_category(', '); ?></div>
            <h1 class="post-title"><?php the_title(); ?></h1>
            <time datetime="<?php the_time('Ymd') ?>" class="post-date"><?php the_time('j F Y'); ?></time>
			
		    <figure class="post-photo">
	
		        <?php if (has_post_thumbnail()) { // Set Featured Image
		            the_post_thumbnail('post');
	            } elseif (first_post_image()) { // Set the first image from the editor
	                echo '<img src="' . first_post_image() . '" class="wp-post-image" />';
	            } ?>

            </figure>
            
            <div class="post-content">
            <?php the_content(); ?>
            </div>
            
        </div>
        <!-- / .post-basic -->

        

    </article>
    <!-- / .post -->

        
    <div id="post-more-wrapper">
    <div class="post-more">
        <div class="post-after">
        <div class="post-link-prev"><?php previous_post_link('%link', 'Poprzedni wpis', TRUE); ?> </div>
        <div class="post-link-next"><?php next_post_link('%link', 'Następny wpis', TRUE); ?> </div>
    </div>
        <?php
     $category = get_the_category(); 
$aaa = $category[0]->term_id;
        $args = array('numberposts' => 2, 'orderby' => 'rand', 'cat'=>$aaa);
        $lastposts = get_posts($args);
        foreach ($lastposts as $post) : setup_postdata($post); ?>
            <article class="post post--small">
                <div class="post-basic">
                    <figure class="post-photo">
                        <?php
                        if (has_post_thumbnail()) { // Set Featured Image
                            the_post_thumbnail('post');
                        } elseif (first_post_image()) { // Set the first image from the editor
                            echo '<img src="' . first_post_image() . '" class="wp-post-image" />';
                        }
                        ?>
                    </figure>
                    <div class="post-categories">
                        <?php the_category(', '); ?>
                    </div>
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <time datetime="<?php the_time('Ymd') ?>" class="post-date"><?php the_time('j F Y'); ?></time>
                </div>
                <!-- / .post-basic -->
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="post-more-link"></a>
            </article>
            <!-- / .post--small -->
        <?php endforeach; ?>
    </div>
    </div>
</div>

<?php get_footer(); ?>