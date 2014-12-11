<?php get_header('blog'); ?>
<?php the_post(); ?>


<div class="post-wrap">
	<article class="post">
	<div class="post-basic">
		<figure class="post-photo">
		<?php
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post' );
			$url = $thumb['0'];
		?>
		<img src="<?php echo $url; ?>" />
		</figure>
		<div class="post-categories">
			<?php the_category(', '); ?>
		</div>
		<h1 class="post-title"><?php the_title(); ?></h1>
		<time datetime="<?php the_time( 'Ymd') ?>" class="post-date"><?php the_time('j l Y'); ?></time>
	</div>
	<!-- / .post-basic -->
	<?php the_content(); ?>

	</article>
	<!-- / .post -->

	<div class="post-after">

		<?php
		$postlist = get_posts('sort_column=menu_order&sort_order=asc');
		$posts = array();
		foreach ($postlist as $post) {
		   $posts[] += $post->ID;
		}

		$current = array_search(get_the_ID(), $posts);
		$prevID = $posts[$current-1];
		$nextID = $posts[$current+1];
		?>
		<?php if (!empty($prevID)) { ?>
		<a href="<?php echo get_permalink($prevID); ?>"
		  title="<?php echo get_the_title($prevID); ?>" class="post-link-prev">Poprzedni wpis</a>
		<?php }
		if (!empty($nextID)) { ?>
		<a href="<?php echo get_permalink($nextID); ?>"
		 title="<?php echo get_the_title($nextID); ?>" class="post-link-next">Następny wpis</a>
		<?php } ?>
	</div>
	<div class="post-more">
		<?php
		$args = array( 'numberposts' => 2, 'orderby' => 'rand');
		$lastposts = get_posts( $args );
		foreach($lastposts as $post) : setup_postdata($post); ?>
			<article class="post post--small">
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
			<!-- / .post--small -->
		<?php endforeach; ?>
	</div>
</div>


<?php get_footer(); ?>