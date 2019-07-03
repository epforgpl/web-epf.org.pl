<?php
/*
Template Name: Team
*/
?>

<?php get_header(); ?>

<section class="team">
<div class="section-head">
	<div class="container">
		<?php the_breadcrumb(); ?>
		<h1 class="section-headline"><?php the_title(); ?></h1>
	</div>
</div>

<div class="team-body">
	<div class="row">

<?php $i=0;
if( have_rows('persons') ):
	while ( have_rows('persons') ) : the_row();
		if($i==0 || $i==1 ) $class = 'odd'; else $class = 'even'; ?>
		<article class="team-person team-person--<?php echo $class; ?>">
		<figure class="team-person-photo" style="background-image: url(<?php the_sub_field('photo'); ?>)"></figure>
		<div class="team-person-details">
		<h1 class="team-person-name"><?php the_sub_field('name'); ?><br>
		<?php the_sub_field('surname'); ?></h1>
		<p class="team-person-position">
			<?php the_sub_field('position'); ?>
		</p>
		<div class="team-person-description">
			<p>
				<?php the_sub_field('description'); ?>
			</p>
		</div>
		</article>
<?php $i++; if($i==4){$i=0;} endwhile; endif; ?>
		
		<?php if(get_field('join')){ ?>
			<div class="team-hire">
				<h2 class="team-hire-title"><?php echo __('Dołącz do nas')?></h2>
				<p>
					<?php echo __('Jesteśmy pasjonatami otwartego rządu i wykorzystywania nowych technologii do tworzenia społeczeństwa obywatelskiego. <strong>Myślisz w podobny sposób?</strong>')?>
				</p>
				<a href="mailto:<?php the_field('mailto'); ?>" class="team-hire-link"><?php echo __('Napisz do nas')?> <i>&rarr;</i></a>
			</div>
		<?php } ?>
	</div>
</div>
</section>


<?php get_footer(); ?>