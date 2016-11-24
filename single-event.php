<?php get_header('event'); ?>
<?php the_post(); ?>
<?php

$image = get_field('zdjecie');

if (!empty($image)): ?>
    <main style="background-image: url('<?php the_field('zdjecie'); ?>')" id="content" class="" role="main">
        <div class="container">
            <?php $image = get_field('logo_eventu');
            if (!empty($image)): ?>

                <img id="logo_eventu" src="<?php echo $image ?>" alt="<?php the_title(); ?>"/>

            <?php endif; ?>
            <?php $value2 = get_field("data");

            if ($value2) {

                echo '<div id="event_data">' . $value2 . '</div>';

            } ?>
        </div>
        </div>
    </main>
<?php endif; ?>
    <div class="menu_event">

        <div class="container">
            <div id="menu_tabs">
            </div>
            <div id="zarejesruj_sie">

            </div>
        </div>
    </div>
    
    <div class="container" id="container_tabs">
        
        <div id="horizontalTab">
            <ul>
                <?php if (get_field('o_evencie')) {
                    echo '<li><a href="#o_evencie">' . __('O wydarzeniu') . '</a></li>';
                } ?>
                <?php if (have_rows('program')) {
                    echo '<li><a href="#program">' . __('Program') . '</a></li>';
                } ?>
                <?php if (get_field('dojazd')) {
                    echo ' <li><a href="#dojazd">' . __('Dojazd') . '</a></li>';
                } ?>
		<?php if (get_field('visegrad')) {
                    echo '<li><a href="#visegrad">' . __('Visegrad project') . '</a></li>';
                } ?>
                <?php if (have_rows('speakers')) {
                    echo '<li><a href="#prelegenci">' . __('Prelegenci') . '</a></li>';
                } ?>
                <?php if (get_field('nagrania')) {
                    echo '<li><a href="#nagrania">' . __('Nagrania') . '</a></li>';
                } ?>
                <?php if (get_field('sponsorzy_i_partnerzy')) {
                    echo '<li><a href="#sponsorzy_i_partnerzy">' . __('Sponsorzy i partnerzy') . '</a></li>';
                } ?>
                <?php if (get_field('kontakt')) {
                    echo '<li><a href="#kontakt">' . __('Kontakt') . '</a></li>';
                } ?>
				<?php if (get_field('Regulamin')) {
                    echo '<li><a href="#regulamin">' . __('Regulamin') . '</a></li>';
                } ?>
				<?php if (get_field('Travel_Granty_dla_NGO')) {
                    echo '<li><a href="#travel_grants">' . __('Travel Granty dla NGO') . '</a></li>';
                } ?>
            </ul>
            
            <?php if( $value = get_field("zarejestruj_sie") ) { ?>
            	<a href="<?php echo $value ?>" id="zarejestruj"><?php echo __('Zarejestruj się') ?>  </a>
            <?php } ?>
            
            <div id="tabs_content">
                
                <?php if (get_field('o_evencie')) {
                    echo '<div id="o_evencie"><h2>' . __('O wydarzeniu') . '</h2>';
                    the_field('o_evencie');
                    echo '</div>';
                } ?>
                
                <?php if (have_rows('speakers')) {
            
                    echo '<div id="prelegaci2"><h2>' . __('Wystąpią') . '</h2>';
                    echo '<ul class="speakers">';
            
                    while (have_rows('speakers')) : the_row(); ?>
                        <?php
                        // display a sub field value
                        echo '<li>'; ?>
                        
                        <figure><?php
                            $image = get_sub_field('speakers_photo');
                            if (!empty($image)):

                                // vars
                                $url = $image['url'];
                                $title = $image['title'];
                                $alt = $image['alt'];
                                $caption = $image['caption'];

                                // thumbnail
                                $size = 'thumbnail';
                                $thumb = $image['sizes'][$size];
                                $width = $image['sizes'][$size . '-width'];
                                $height = $image['sizes'][$size . '-height'];

                                if ($caption): ?>

                                    <div class="wp-caption"><?php endif; ?>
                                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"
                                     width="<?php echo $width; ?>" height="<?php echo $height; ?>"/>
                                <?php if ($caption): ?>
                                </div>
                            <?php endif; ?>
                            <?php endif; ?>
                        </figure>
                        
                        <h4 class="name a"><?php if (get_sub_field('youtube_link')): ?><a
                                href="<?php the_sub_field('youtube_link'); ?>"
                                target="_blank"><?php endif; ?><?php the_sub_field('speakers_name'); ?>
                                <?php if (get_sub_field('youtube_link')): ?></a><?php endif; ?>
                        </h4>
                        <h4 class="name"><i><?php the_sub_field('tytul_prelegenta'); ?></i></h4>

                        <?php echo '</li>';
                    endwhile;
                    
                    echo '</ul>';
                    echo '</div>';
                } ?>
                
		<?php if (get_field('visegrad')) {
                    echo '<div id="visegrad"><h2>' . __('Visegrad project') . '</h2>';
                    the_field('visegrad');
                    echo '</div>';
                } ?>
		    
                <?php if (have_rows('program')) {
                    echo '<div id="program"><h2>' . __('Program') . '</h2><ul>';

                    // loop through the rows of data
                    while (have_rows('program')) : the_row();

                        // display a sub field value
                        echo '<li><div class="time">';

                        the_sub_field('start_wystapienia');
                        echo '</div><div class="wystapienie"><h3>';
                        the_sub_field('tytul_wystapienia');
                        echo '</h3><p>';
                        the_sub_field('opis_wystapienia');
                        echo '</p></div></li>';

                    endwhile;

                    echo '</ul></div>';
                } ?>
                
                <?php if (get_field('dojazd')) {
                    echo '<div id="dojazd"><h2>' . __('Dojazd') . '</h2>';
                    the_field('dojazd');
                    echo '</div>';
                } ?>
                
                <?php if (get_field('kontakt')) {
                    echo '<div id="kontakt"><h2>' . __('Kontakt') . '</h2>';
                    the_field('kontakt');
                    echo '</div>';
                } ?>
                
                <?php if (get_field('Regulamin')) {
                    echo '<div id="regulamin"><h2>' . __('Regulamin') . '</h2>';
                    the_field('Regulamin');
                    echo '</div>';
                } ?>
                
				<?php if (get_field('Travel_Granty_dla_NGO')) {
                    echo '<div id="travel_grants"><h2>' . __('Travel Granty dla NGO') . '</h2>';
                    the_field('Travel_Granty_dla_NGO');
                    echo '</div>';
                } ?>
                
				<?php if (have_rows('speakers')) {
                    echo '<div id="prelegenci">
                    <h2>' . __('Prelegenci') . '</h2>';
                    echo '<ul class="speakers">';
                    while (have_rows('speakers')) : the_row(); ?>
                        <?php
                        // display a sub field value
                        echo '<li>'; ?>
                        <figure><?php
                            $image = get_sub_field('speakers_photo');
                            if (!empty($image)):

                                // vars
                                $url = $image['url'];
                                $title = $image['title'];
                                $alt = $image['alt'];
                                $caption = $image['caption'];

                                // thumbnail
                                $size = 'thumbnail';
                                $thumb = $image['sizes'][$size];
                                $width = $image['sizes'][$size . '-width'];
                                $height = $image['sizes'][$size . '-height'];

                                if ($caption): ?>

                                    <div class="wp-caption"><?php endif; ?>
                                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>"
                                     height="<?php echo $height; ?>"/>
                                <?php if ($caption): ?>
                                </div>
                            <?php endif; ?>
                            <?php endif; ?>
                        </figure>
                        <h4 class="name b"><?php if (get_sub_field('youtube_link')): ?><a
                                href="<?php the_sub_field('youtube_link'); ?>"
                                target="_blank"><?php endif; ?><?php the_sub_field('speakers_name'); ?>
                                <?php if (get_sub_field('youtube_link')): ?></a><?php endif; ?>
                        </h4>
                        <h4 class="name"><i><?php the_sub_field('tytul_prelegenta'); ?></i></h4>
                        <p><?php the_sub_field('opis'); ?></p>

                        <?php echo '</li>';
                    endwhile;
                    echo '</ul>';
                    echo '</div>';
                } ?>

                <?php if (get_field('nagrania')) {
                    echo '<div id="nagrania"><h2>' . __('Nagrania') . '</h2>';
                    the_field('nagrania');
                    echo '</div>';
                } ?>
                
                <?php if (get_field('sponsorzy_i_partnerzy')) {
                    echo '<div id="sponsorzy_i_partnerzy"><h2>' . __('Sponsorzy i partnerzy') . '</h2>';
                    the_field('sponsorzy_i_partnerzy');
                    '</div>';
                } ?>
            </div>
            
            <div id="tabs_sidebar">

                <?php if (have_rows('logotypy_organizatorow')) {
                    echo '<div id="event_organizatorzy_images"><h3>' . __('Organizatorzy') . '</h3>';
                    while (have_rows('logotypy_organizatorow')) : the_row(); ?>
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

                <?php if (have_rows('sponsorzy_logotypy')) {
                    echo '<div id="event_sponsorzy_images"><h3>' . __('Sponsorzy') . '</h3>';
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
                <?php if (have_rows('logotypy_partnerow')) {
                    echo '<div id="event_partnerzy_images"><h3 id="partnerzy">' . __('Partnerzy') . '</h3>';
                    while (have_rows('logotypy_partnerow')) : the_row();

                        // display a sub field value
                        ?>
                        <?php $value = get_sub_field("link_logotypu");

                        if ($value) { ?><span><a href="<?php echo $value; ?>"><img
                                    src="<?php the_sub_field('logotyp_partnera'); ?> "></a></span> <?php } else {
                            ?>
                            <span><img src="<?php the_sub_field('logotyp_partnera'); ?> "></span>
                            <?php
                        }

                    endwhile;
                    echo '</div>';
                } ?>
                <?php if (have_rows('logotypy_patronow_medialnych')) {
                    echo '<div id="event_patroni_medialni_images"><h3 id="patroni">' . __('Patroni medialni') . '</h3>';
                    while (have_rows('logotypy_patronow_medialnych')) : the_row();

                        // display a sub field value
                        ?>
                        <?php $value = get_sub_field("link_logotypu");

                        if ($value) { ?><span><a href="<?php echo $value; ?>"><img
                                    src="<?php the_sub_field('patroni_medialni_logotypy'); ?> "></a>
                            </span> <?php } else {
                            ?>
                            <span><img src="<?php the_sub_field('patroni_medialni_logotypy'); ?> "></span>
                            <?php
                        }

                    endwhile;
                    echo '</div>';
                } ?>
            </div>

        </div>

    </div>
    
    <div id="event_footer">
        
        <div id="event_6_featured_posts">
            <div class="posts-list">
                <div class="container" id="container">
                    <?php
                    $args = array('posts_per_page' => 300, 'category' => get_field('wpisy_pod_eventem'));
                    $post_objects = get_posts($args);
                    if ($post_objects): ?>
                        <?php foreach ($post_objects as $post): // variable must be called $post (IMPORTANT) ?>
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
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div id="event_nagrania">
            <div class="posts-list">
                <div class="container">
                    <h2><?php echo get_field('nagranie_tytul'); ?></h2>
                    <?php
                    $args = array('posts_per_page' => 300, 'category' => get_field('nagrania_wybor_kategorii'));
                    $post_objects = get_posts($args);
                    if ($post_objects): ?>
                        <?php foreach ($post_objects as $post): // variable must be called $post (IMPORTANT) ?>
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

                                        <h1 class="post-title"><?php the_title(); ?></h1>
                                        <a href="<?php the_permalink(); ?>" class="post-more-link"></a>

                                    </div>


                                </article>
                                <!-- / .post--listed -->
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div id="event_polecane_eventy">
            <div class="posts-list">
                <div class="container">
                    <h2><?php echo __('Inne nasze wydarzenia') ?></h2>
                    <?php
                    $post_objects = get_field('3_polecane_eventy');
                    if ($post_objects): ?>
                        <?php foreach ($post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                            <?php setup_postdata($post); ?>
                            <div class="item" style="background-image: url('<?php the_field('zdjecie'); ?>')">
                                <?php $image = get_field('logo_eventu');
                                if (!empty($image)): ?>

                                    <img class="logo_event" src="<?php echo $image ?>" alt="<?php the_title(); ?>"/>

                                <?php endif; ?>

                                <h3> <?php the_title(); ?> </h3>

                                <p> <?php if (get_field('krotki_opis')) {
                                        echo the_field('krotki_opis');
                                    } ?></p>
                                <a class="wiecej" href="<?php the_permalink(); ?>"><?php echo __('więcej') ?> </a>
                                <!-- / .post--listed -->
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div id="event_polecane_eventy">
            <div class="posts-list">
                <div class="container">
                    <h2><?php echo __('Inne nasze wydarzenia') ?></h2>
                    <?php
                    $post_objects = get_field('3_polecane_eventy');
                    if ($post_objects): ?>
                        <?php foreach ($post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                            <?php setup_postdata($post); ?>
                            <div class="item" style="background-image: url('<?php the_field('zdjecie'); ?>')">
                                <?php $image = get_field('logo_eventu');
                                if (!empty($image)): ?>

                                    <img class="logo_event" src="<?php echo $image ?>" alt="<?php the_title(); ?>"/>

                                <?php endif; ?>

                                <h3> <?php the_title(); ?> </h3>

                                <p> <?php if (get_field('krotki_opis')) {
                                        echo the_field('krotki_opis');
                                    } ?></p>
                                <a class="wiecej" href="<?php the_permalink(); ?>"><?php echo __('więcej') ?> </a>
                                <!-- / .post--listed -->
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
    </div>

<?php get_footer(); ?>
