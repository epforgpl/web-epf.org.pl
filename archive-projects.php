<?php get_header(); ?>

<section class="projects">
<div class="section-head">
	<div class="container">
		<?php the_breadcrumb(); ?>
		<h1 class="section-headline"><?php post_type_archive_title(); ?></h1>
	</div>
</div>

<!-- / .projects-head -->
<div class="section-body projects-body">
	<div class="row">
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="projects-single" style="background-image: url(<?php the_field('zdjecie'); ?>);">
			<div class="projects-single-over">
				<?php $image = get_field('logo_eventu'); if( !empty($image) ): ?>
					<figure class="projects-single-logo"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>"></a></figure>
				<?php endif; ?>
				<div class="projects-single-description">
					<h1 class="projects-single-h"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<p><?php the_field('krotki_opis'); ?></p>
				</div>
				<a href="<?php the_permalink(); ?>" class="projects-single-link"><?php echo __('więcej')?> <i>&rarr;</i></a>
			</div>
			<div class="projects-single-under">
			</div>
			</article>
		<?php endwhile; ?>
	</div>
</div>
</section>

<?php get_footer(); ?>