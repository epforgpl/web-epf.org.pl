

<div class="row">
	<div class="col-sm-4">
	
		<?php if (have_rows('logotypy_organizatorow')) {
		    echo '<div id="event_organizatorzy_images"><h3 class="margin-bottom">' . __('Organizatorzy') . '</h3>';
		    while (have_rows('logotypy_organizatorow')) : the_row(); ?>
		        
		        <?php
		        $value = get_sub_field("link_logotypu");
		        if ($value) { ?>
		        	<a href="<?php echo $value; ?>"><img src="<?php the_sub_field('logotyp_organizatora'); ?> "></a>
		    	<?php } else { ?>
		            <img src="<?php the_sub_field('logotyp_organizatora'); ?>">
				<?php }
		    endwhile;
		    echo '</div>';
		} ?>
	
	</div><div class="col-sm-4">

<?php if (have_rows('logotypy_wspolorganizatorow')) {
    echo '<div id="event_organizatorzy_images"><h3 class="margin-bottom">' . __('Współorganizatorzy') . '</h3>';
    while (have_rows('logotypy_wspolorganizatorow')) : the_row(); ?>
        <?php $value = get_sub_field("link_logotypu");
        if ($value) { ?><a href="<?php echo $value; ?>"><img
                src="<?php the_sub_field('logotyp_organizatora'); ?> "></a> <?php } else {
            ?>
            <img src="<?php the_sub_field('logotyp_organizatora'); ?> ">
            <?php
        }
    endwhile;
    echo '</div>';
} ?>

	</div><div class="col-sm-4">

<?php if (have_rows('sponsorzy_logotypy')) {
    echo '<div id="event_sponsorzy_images"><h3 class="margin-bottom">' . __('Sponsorzy') . '</h3>';
    while (have_rows('sponsorzy_logotypy')) : the_row();

        // display a sub field value
        ?>
        <?php $value = get_sub_field("link_logotypu");

        if ($value) { ?><a href="<?php echo $value; ?>"><img
                src="<?php the_sub_field('logotyp_sponsora'); ?> "></a> <?php } else {
            ?>
            <img src="<?php the_sub_field('logotyp_sponsora'); ?> ">
            <?php
        }
    endwhile;
    echo '</div>';
} ?>

	</div>
</div>

<?php if (have_rows('logotypy_partnerow')) {
    echo '<div id="event_sponsorzy_images" class="event_sponsorzy_images in_row"><h3 class="margin-bottom">' . __('Partnerzy') . '</h3>';
    while (have_rows('logotypy_partnerow')) : the_row();

        // display a sub field value
        ?>
        <?php
	        $value = get_sub_field("link_logotypu");
	        if ($value) { ?>
	        	<a href="<?php echo $value; ?>"><img src="<?php the_sub_field('logotyp_partnera'); ?> "></a>
        	<?php } else { ?>
            <span><img src="<?php the_sub_field('logotyp_partnera'); ?> "></span>
        <?php }

    endwhile;
    echo '</div>';
} ?>

<?php if (have_rows('logotypy_patronow_medialnych')) {
    echo '<div id="event_sponsorzy_images" class="event_sponsorzy_images in_row"><h3 style="margin-top: 35px; margin-bottom: 50px;" class="margin-bottom" id="patroni">' . __('Patroni medialni') . '</h3>';
    while (have_rows('logotypy_patronow_medialnych')) : the_row();

        // display a sub field value
        ?>
        <?php $value = get_sub_field("link_logotypu");

        if ($value) { ?><span style="margin: 10px 10px;"><a href="<?php echo $value; ?>"><img
                    src="<?php the_sub_field('patroni_medialni_logotypy'); ?> "></a>
            </span> <?php } else {
            ?>
            <span style="margin: 5px 40px;"><img src="<?php the_sub_field('patroni_medialni_logotypy'); ?> "></span>
            <?php
        }

    endwhile;
    echo '</div>';
} ?>