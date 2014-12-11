<?php
/*
Template Name: Press
*/
?>

<?php get_header(); ?>

<section class="press">
<div class="section-head">
	<div class="container">
		<?php the_breadcrumb(); ?>
		<h1 class="section-headline"><?php the_title(); ?></h1>
	</div>
</div><!-- / .projects-head -->


<div class="section-body press-body">
	<div class="row">
	<?php while ( have_rows('press') ) : the_row(); ?>
	<article class="press-single">
		<figure class="press-single-logo">
		<?php
		$image = get_sub_field('logo');
		if( !empty($image) ): ?>
			<img src="<?php echo $image; ?>" alt="<?php  the_sub_field('title'); ?>" />
		<?php endif; ?>
		</figure>
		<h1 class="press-single-h"><?php  the_sub_field('title'); ?></h1>
		<a href="<?php  the_sub_field('link'); ?>" target="_blank" class="press-single-link"></a>
	</article><!-- / .press-single -->
	<?php endwhile;?>
	</div>
</div>
</section>


<?php get_footer(); ?>