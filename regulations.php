<?php
/*
Template Name: Regulations
*/
?>

<?php get_header(); ?>

<?php // The <style> section adds automatic numbering to <li> elements based on level of indentation. ?>
<style>
    .list-auto-numbering ol { counter-reset: item }
    .list-auto-numbering li { display: block }
    .list-auto-numbering li:before { content: counters(item, ".") " "; counter-increment: item }
</style>

<section class="regulations">
    <div class="section-head">
        <div class="container">
            <?php the_breadcrumb(); ?>
            <h1 class="section-headline"><?php the_title(); ?></h1>
        </div>
    </div>

    <div class="about-body">
        <div class="row" id="regulations">
            <div class="container list-auto-numbering">
                <?php the_content(); ?>        
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

