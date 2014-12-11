<?php get_header('blog'); ?>


<div class="posts-list">
	<div class="container">

		<?php if ( have_posts() ) :  ?>
			<?php while ( have_posts() ) : the_post(); ?>
						<article class="post post--listed">
						<div class="post-basic">
							<figure class="post-photo">
							<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
							<img src="<?php echo $url; ?>" />
							</figure>
							<div class="post-categories">
								<?php the_category(', '); ?>
							</div>
							<h1 class="post-title"><?php the_title(); ?></h1>
							<time datetime="<?php the_time( 'Ymd') ?>" class="post-date"><?php the_time('j l Y'); ?></time>
						</div>
						<!-- / .post-basic -->
						<p><?php the_excerpt(); ?></p>
						<a href="<?php the_permalink(); ?>" class="post-more-link"></a>
						</article>
						<!-- / .post--listed -->
			<?php endwhile; ?>
			<?php else : ?>
				<h2>Brak postów</h2>
		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>