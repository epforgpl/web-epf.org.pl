<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

 <section class="homeIntro js-windowHeight">
<div class="homeIntro-container container">
	<div class="homeIntro-lead lead">
		<?php the_field('description'); ?>
	</div>
	<!-- /.homeIntro-lead -->
</div>
<!-- /.homeIntro-container -->
<div class="homeIntro-tiles">
	<div class="homeIntro-tiles-container container">
		<div class="row">
			<div class="homeIntro-tile homeIntro-tile--1">
			    <a href="<?php the_field('link_1'); ?>" class="homeIntro-tile-link"><?php the_field('title_1'); ?><i></i></a>
			</div>
			<div class="homeIntro-tile homeIntro-tile--2">
				<a href="<?php the_field('link_2'); ?>" class="homeIntro-tile-link"><?php the_field('title_2'); ?><i></i></a>
			</div>
			<div class="homeIntro-tile homeIntro-tile--3">
				<a href="<?php the_field('link_3'); ?>" class="homeIntro-tile-link"><?php the_field('title_3'); ?><i></i></a>
			</div>
			<div class="homeIntro-tile homeIntro-tile--4">
				<a href="<?php the_field('link_4'); ?>" class="homeIntro-tile-link"><?php the_field('title_4'); ?><i></i></a>
			</div>

		</div>
	</div>
</div>
<!-- /.homeIntro-tiles -->
</section>
<!-- /.homeIntro -->

<!--
<section class="homeAbout">
	<div class="homeAbout-container container">

		<div id="tabs">
			<ul class="tabs">
				<?php $i=0; ?>
				<?php while ( have_rows('about') ) : the_row(); ?>
					<?php $i++; ?>
					<li <?php if($i==1) echo 'class="active"'; ?>><a href="#tab-<?php echo $i; ?>" ><?php the_sub_field('title'); ?></a></li>
				<?php endwhile;?>
			</ul>

			<?php $i=0; ?>
			<?php while ( have_rows('about') ) : the_row(); ?>
				<?php $i++; ?>
				<div id="tab-<?php echo $i; ?>" class="tab">
					<?php the_sub_field('description'); ?>
				</div>
			<?php endwhile;?>
		</div>
	</div>
</section>-->
<!-- /.homeIntro -->


<?php if( have_rows('sections') ):
	while ( have_rows('sections') ) : the_row(); ?>
		<section style="background-image: url(<?php echo get_sub_field('background'); ?>);" id="<?php echo get_sub_field('id'); ?>" class="homeWhite js-windowHeight" >
		<div class="homeWhite-container container _vm">
		<div class="homeWhite-box <?php if( get_sub_field('box_right') ) echo "homeWhite-box--right"; ?>">
			<h1 class="homeWhite-title"><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a></h1>
			<div class="homeWhite-box-description">
				<?php the_sub_field('description'); ?>
			</div>
			<a href="<?php the_sub_field('link'); ?>" class="btn btn-primary homeWhite-btn"><?php echo __('Więcej')?> <i>&rarr;</i></a>
		</div>
		</div>
		          
		</section>
        
        <div class="container aktualnosci_home">
<h2><?php echo get_sub_field('nazwa_kategorii');?></h2>
            <?php
            $args = array( 'posts_per_page' => 3, 'category' => get_sub_field('nazwa_kategorii_wpisow'));
            $post_objects = get_posts( $args );
if( $post_objects ): ?>
    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
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
                   
                     
    <?php endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;
?>
    <a class="zobacz_wszystkie btn btn-primary homeWhite-btn" href="index.php?cat=<?php echo get_sub_field('nazwa_kategorii_wpisow') ?>"><?php echo __('Zobacz wszystkie')?> <i>&rarr;</i></a>
     </div>   


<?php endwhile; endif; ?>

 <div id="home_polecane_eventy">
  <div class="posts-list">
    <div class="container">
        <h2><?php echo __('Inne projekty')?></h2>
            <?php
$post_objects = get_field('projekty_home');
if( $post_objects ): ?>
    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <div class="item" style="background-image: url('<?php the_field('zdjecie'); ?>')">
               <?php $image = get_field('logo_eventu'); if( !empty($image) ): ?>
                    <figure class="projects-single-logo"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>"></figure>
                <?php endif; ?>
<h3> <?php the_title();?> </h3>
<p><?php the_field('krotki_opis'); ?></p>
<a href="<?php the_permalink();  ?>" class="btn btn-primary homeWhite-btn"><?php echo __('Więcej')?> <i>&rarr;</i></a>
                        <!-- / .post--listed -->
                    </div>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;


?>
        
        
       
  </div>      
   </div> 
</div>
<?php get_footer(); ?>