<?php
/*
Template Name: About EN
*/
?>

<?php get_header(); ?>

<section class="about">
<div class="section-head">
	<div class="container">
		<?php the_breadcrumb(); ?>
		<h1 class="section-headline"><?php the_field('title'); ?></h1>
	</div>
</div>

<div class="about-body">
	<div class="row" id="mission">
		<div class="container">
			<ul class="links">
				<li><a href="#mission">Mission</a></li>
				<li><a href="#supervisory">Supervisory board</a></li>
				<li><a href="#partners">Partners & Sponsors </a></li>
				<li><a href="#statute">Statute</a></li>
				<li><a href="#raports">Reports</a></li>
			</ul>
			<div class="col-md-12">
				<h3>Mission</h3>
				<?php the_field('misja'); ?>
			</div>
		</div>
	</div>
	<div class="row" id="supervisory">
		<div class="container">
			<div class="col-md-12">
				<h3>Supervisory board</h3>
			</div>
			<?php $i=1; ?>
			<?php while ( have_rows('rada') ) : the_row(); ?>
				<?php if($i==1) echo '<div class="row">'; ?>
				<div class="col-md-6">
					<?php $image = get_sub_field('photo');
					if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" height="77" width="77" />
					<?php endif; $i++; ?>
					<h4><?php the_sub_field('imie'); ?></h4><br>
					<p><?php the_sub_field('opis'); ?></p>
				</div>
				<?php if($i==3) {
					echo '</div>';
					$i=1;
				} ?>
			<?php endwhile;?>
		</div>
	</div>
	<div class="row" id="partners">
		<div class="container">
			<div class="col-md-12">
				<h3>Partners & Sponsors </h3>
			</div>
			<div class="col col-md-12">
				<?php while ( have_rows('1_row') ) : the_row(); ?>
					<?php 	$image = get_sub_field('logo');
					if( !empty($image) ): ?>
						<a target="_blank" href="http://<?php the_sub_field('link'); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"  /></a>
					<?php endif; ?>
				<?php endwhile;?>
			</div>
			<div class="col col-md-12">
				<?php while ( have_rows('2_row') ) : the_row(); ?>
					<?php 	$image = get_sub_field('logo');
					if( !empty($image) ): ?>
						<a target="_blank" href="http://<?php the_sub_field('link'); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></a>
					<?php endif; ?>
				<?php endwhile;?>
			</div>
		</div>
	</div>
	<div class="row" id="statute">
		<div class="container">
			<div class="col-md-12">
				<h3>Statute</h3>
				<p><?php the_field('statut'); ?></p>
				<?php $i= get_field('link_do_statutu');
				if(!empty($i) ): ?>
					<a href="http://<?php the_field('link_do_statutu'); ?>" class="btn btn-default" target="_blank">Czytaj całość</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php if (have_rows('sprawozdania')): ?>
		<div class="row" id="raports">
			<div class="container">
				<div class="col-md-12">
					<h3>Reports</h3>
					<?php while ( have_rows('sprawozdania') ) : the_row(); ?>
						<a class="file col-md-3" href="<?php the_sub_field('file'); ?>" target="_blank">
							<img class="icon-pdf" src="<?php echo get_template_directory_uri(); ?>/images/icon-pdf.png"><br>
							<?php the_sub_field('title'); ?>
						</a>
					<?php endwhile;?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
</section>


<?php get_footer(); ?>