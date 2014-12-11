<?php get_header(); ?>
<?php the_post(); ?>
<section class="raport">
	<link rel="stylesheet" type="text/css" href="<?php the_field('css'); ?>">
	<style type="text/css" scoped>
		<?php the_field('css'); ?>
	</style>
	<?php the_field('content'); ?>
	<script src="<?php the_field('js'); ?>"></script>
</section>
<?php get_footer(); ?>