<?php
/*
Single Post Template: Wybory
Description: This part is optional, but helpful for describing the Post Template
*/
?>
<?php get_header(); ?>
<?php the_post(); ?>
<section class="project technologia">
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
            
        </div>
    </div>
</div>
<!-- / .projects-head -->
<div class="section-body project-body text container">
    <div id="tabs_content">
        

    <?php the_field('opis_projektu'); ?>
    <a href="<?php the_field('pobierz_plik_pdf'); ?>" class="pdf btn btn-primary homeWhite-btn"><?php echo __('Pobierz plik .pdf')?> <i>&rarr;</i></a>
           </div>
        <div id="tabs_sidebar">
            <h3><?php echo __('Partnerzy')?></h3>
<?php

// check if the repeater field has rows of data
if( have_rows('partnerzy') ):

    // loop through the rows of data
    while ( have_rows('partnerzy') ) : the_row();

        // display a sub field value
$image = get_sub_field('logotyp');
$size = 'medium'; // (thumbnail, medium, large, full or custom size)

if( $image ) {

   ?><a TARGET="_blank" href="<?php the_sub_field('link_logotypu'); ?>"><?php echo wp_get_attachment_image( $image, $size ); ?></a><?php

}


    endwhile;

else :

    // no rows found

endif;

?>
            </div>

    <?php if(get_field('link')) {?><a href="http://<?php the_field('link'); ?>" target="_blank" class="btn btn-primary project-btn"><?php echo __('Przejdź do strony projektu')?> <i>&rarr;</i></a> <?php }?>
</div>
<!-- / .projects-body -->
<div id="event_footer">
<div id="event_6_featured_posts">
  <div class="posts-list">
    <div class="container" id="container">
            <?php
$args = array( 'posts_per_page' => 600, 'category' => get_field('kategoria_6_wpisow'));
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
        
        
       
  </div>      
   </div> 
</div>
  

            <?php
$post_objects = get_field('3_polecane_projekty');
if( $post_objects ): ?>
  <div id="event_polecane_eventy">
  <div class="posts-list">
    <div class="container">
        <h2><?php echo __('Inne projekty')?></h2>
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
      </div>      
   </div> 
</div>
<?php endif;


?>
        
        
       



</div>
</section>

<?php get_footer(); ?>