<?php get_header(); ?>
<?php the_post(); ?>
<section class="project">
<div class="section-head" style="background-image: url(
<?php $large_background = get_field('large_background');
if( !empty($large_background) )  the_field('large_background');
else  the_field('background'); ?>);">

	<div class="container project-container">
		<?php the_breadcrumb(); ?>
		<div class="project-head">
			<figure class="project-head-logo">
			<img src="<?php the_field('logo'); ?>" alt="">
			</figure>
			<h1 class="section-headline"><?php the_title(); ?></h1>
			<a href="<?php echo get_post_type_archive_link( 'projects' ); ?>" class="project-head-link"><i>&larr;</i> wróć do listy projektów</a>
		</div>
	</div>
</div>
<!-- / .projects-head -->
<div class="section-body project-body text container">
	<?php the_content(); ?>
	<a href="http://<?php the_field('link'); ?>" target="_blank" class="btn btn-primary project-btn">Przejdź do strony projektu <i>&rarr;</i></a>
</div>
<!-- / .projects-body -->
</section>

<?php get_footer(); ?>