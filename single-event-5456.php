<?php get_header('event'); ?>
<?php
	
	$locale = get_locale();
	
	$_features = isset($_GET['features']) ? $_GET['features'] : array();
	if( !is_array($_features) )
		$_features = array( $_features );
		
	$_features[] = 'countdown';
	$_features[] = 'gallery';
	
	if( substr($_SERVER['REQUEST_URI'], 0, 4) == '/pl/' ) {
		
		// setlocale('pl_PL');
		
	}
	
	if( !function_exists('____') ) {
		function ____($s) {
			
			$locale = get_locale();
						
			switch( $s ) {
				
				case '_link_to_travel_grants_form': {
					
					if( $locale == 'pl_PL' )
						return 'http://bit.ly/PDFcee2017podroz';
					else
						return 'http://bit.ly/PDFcee2017travel';
					
				}
				
				case '_link_to_workshops_form': {
					
					if( $locale == 'pl_PL' )
						return 'http://bit.ly/PDFcee2017warsztaty';
					else
						return 'http://bit.ly/PDFcee2017workshops';
					
				}
				
				case 'Travel Grants': {
					
					if( $locale == 'pl_PL' )
						return 'Dofinansowanie';
					else
						return 'Travel Grants';
						
				}
				
				case 'Visit on Facebook': {
					
					if( $locale == 'pl_PL' )
						return 'Odwiedź stronę wydarzenia na Facebooku';
					else
						return 'Visit event\'s page on Facebook';
						
				}
				
				case 'Apply for a Travel Grant': {
					
					if( $locale == 'pl_PL' )
						return 'Złóż wniosek o dofinansowanie uczestnictwa';
					else
						return 'Apply for a Travel Grant';
						
				}
				
				case 'Show rules for Travel Grants': {
					
					if( $locale == 'pl_PL' )
						return 'Pokaż regulamin przyznawania grantów';
					else
						return 'Show Travel Grants Terms and Conditions';
						
				}
				
				case 'Hide rules for Travel Grants': {
					
					if( $locale == 'pl_PL' )
						return 'Ukryj regulamin przyznawania grantów';
					else
						return 'Hide Travel Grants Terms and Conditions';
						
				}
												
				case 'Practical Information': {
					
					if( $locale == 'pl_PL' )
						return 'Informacje';
					else
						return 'Information';

				}
				
				case 'Organizers': {
					
					if( $locale == 'pl_PL' )
						return 'Organizatorzy';
					else
						return 'Organizers';

				}
				
				case 'Visegrad': {
					
					if( $locale == 'pl_PL' )
						return 'Wyszehrad';
					else
						return 'Visegrad';

				}
				
				case 'Visegrad Project': {
					
					if( $locale == 'pl_PL' )
						return 'Wyszehrad';
					else
						return 'Visegrad Project';

				}	
				
				case 'TransparenCEE Project': {
					
					if( $locale == 'pl_PL' )
						return 'TransparenCEE';
					else
						return 'TransparenCEE Project';
					
				}
				
				case 'Prelegenci': {
					
					if( $locale == 'pl_PL' )
						return 'Prelegentki/ci';
					else
						return 'Speakers';
					
				}	
				
				case 'PDF CEE 2017 starts in': {
					
					if( $locale == 'pl_PL' )
						return 'PDF CEE 2017 rozpocznie się za';
					else
						return 'PDF CEE 2017 starts in';
					
				}	
				
				case 'REGISTER NOW': {
					
					if( $locale == 'pl_PL' )
						return 'ZAREJESTRUJ SIĘ TERAZ';
					else
						return 'REGISTER NOW';
					
				}	
				
				case 'Side Events': {
					
					if( $locale == 'pl_PL' )
						return 'Wydarzenia satelickie';
					else
						return 'Satellite Events';
					
				}
				
				case 'Days': {
					
					if( $locale == 'pl_PL' )
						return 'dni';
					else
						return 'days';
					
				}
				
				case 'Hours': {
					
					if( $locale == 'pl_PL' )
						return 'godzin';
					else
						return 'hours';
					
				}
				
				case 'Minutes': {
					
					if( $locale == 'pl_PL' )
						return 'minut';
					else
						return 'minutes';
					
				}
				
				case 'Seconds': {
					
					if( $locale == 'pl_PL' )
						return 'sekund';
					else
						return 'seconds';
					
				}
					
								
				default: {
					
					return __($s);
					
				}
				
			}
			
		}
	}
	
	
	$gallery_html_file = $_SERVER['DOCUMENT_ROOT'] . '/pdf_gallery_html_' . $locale . '.html';
	
	/*
	if( isset($_REQUEST['build_gallery']) )
	{
		
		$gallery_html = '<div id="myTabContent" class="tab-content"><div class="tab-pane fade active in" id="day1">';
				
		if( have_rows('gallery') )
		{
			
			$gallery_html .= '<div class="galleria day1">';
			
			while (have_rows('gallery')) : the_row();
				
				$image = get_sub_field('image');
				$gallery_html .= '<a href="' . htmlspecialchars($image['sizes']['large']) . '"><img src="' . htmlspecialchars($image['sizes']['thumbnail']) . '" data-big="' . htmlspecialchars($image['sizes']['large']) . '" data-title="' . htmlspecialchars(get_sub_field('title')) . '" data-description="' . htmlspecialchars(get_sub_field('description')) . '"></a>';
				
			endwhile;
			
			$gallery_html .= '</div>';
			
		}
		
		$gallery_html .= '</div><div class="tab-pane fade" id="day2">';
		
		
		
		if( have_rows('gallery2') )
		{
			
			$gallery_html .= '<div class="galleria day2">';
			
			while (have_rows('gallery2')) : the_row();
				
				$image = get_sub_field('image');
				$gallery_html .= '<a href="' . htmlspecialchars($image['sizes']['large']) . '"><img src="' . htmlspecialchars($image['sizes']['thumbnail']) . '" data-big="' . htmlspecialchars($image['sizes']['large']) . '" data-title="' . htmlspecialchars(get_sub_field('title')) . '" data-description="' . htmlspecialchars(get_sub_field('description')) . '"></a>';
				
			endwhile;
			
			$gallery_html .= '</div>';
			
		}
						  
		$gallery_html .= '</div></div>';
		
		@unlink( $gallery_html_file );
		file_put_contents($gallery_html_file, $gallery_html);
				
	}
	*/
	
	$gallery_html = file_get_contents($gallery_html_file);
	
?>
<?php the_post(); ?>

	<script src="//epf.org.pl/en/wp-content/themes/epf/js/event_5456.js?v=9" type="text/javascript"></script>
	<?php /* <script src="//epf.org.pl/en/wp-content/themes/epf/js/jquery.countdown.min.js" type="text/javascript"></script> */ ?>
	<script src="//epf.org.pl/en/wp-content/themes/epf/galleria/galleria-1.5.6.min.js" type="text/javascript"></script>
	<style>
		@font-face { font-family: Pier; src: url('/en/wp-content/themes/epf/fonts/pier.otf'); } 
	</style>
	
    <main id="content" class="img" role="main">
	    <div id="content-bg">
	        
	        <div class="container container-content-bg">
		       <div class="z_event_title">
			       <p class="text h personal">Personal</p>
			       <p class="text h democracy">Democracy</p>
			       <p class="text h forum">Forum</p>
			       <p class="text cee">CEE 2017</p>
		       </div>
		       <div class="z_event_info">
			       <p class="text info time">April 6-7</p>
			       <p class="text info location">Gdansk, Poland</p>
		       </div>
		       <div class="z_event_cog">
		           <div class="cog"><img src="http://epf.org.pl/en/wp-content/themes/epf/images/pdf-cog.svg" width="600" /></div>
		       </div>
	           <div class="z_event_motto">
		           <p class="text motto rebooting">Rebooting</p>
		           <p class="text motto democracy">Democracy</p>
	           </div>
	        </div>
	        	        
	    </div>
    </main>
    
    <div class="menu_event">
	
        <div id="menu_tabs" class="navbar-default">
	        <div class="container">
	            
	            <a class="navbar-brand scroll_link" href="#"><img src="http://epf.org.pl/en/wp-content/themes/epf/images/pdf/pdf-cee-2017-logo-small-1.svg" alt="PDF CEE 2017"></a>
	            	            
				<div class="navbar-nav-cont">
					
					<div class="navbar-header">
		                <button type="button" class="_navbar-toggle" id="menu_toggler">
		                    <span class="sr-only">Toggle navigation</span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                </button>
		            </div>
					
					<ul class="nav navbar-nav" id="menu_div">
					
					<?php
						
						$items = array();
						
						if( in_array('gallery', $_features) ) {
							$items[] = array(
								'href' => '#materials',
								'label' => __('Materials'),
							);
						}
						
						if (get_field('o_evencie'))
							$items[] = array(
								'href' => '#o_evencie',
								'label' => __('O wydarzeniu'),
							);
												
						if (have_rows('program'))
							$items[] = array(
								'href' => '#program',
								'label' => __('Program'),
							);
		                
		                $items[] = array(
							'href' => '#satellite_events',
							'label' => ____('Side Events'),
						);
		                
		                if (have_rows('speakers'))
		                	$items[] = array(
								'href' => '#prelegenci',
								'label' => ____('Prelegenci'),
							);
						
						
						
						$items[] = array(
								'href' => '#tcee',
								'label' => __('TCEE'),
							);
						
						if (get_field('visegrad'))
		                	$items[] = array(
								'href' => '#visegrad',
								'label' => ____('Visegrad'),
							);
						
						/*
						$items[] = array(
							'href' => '#organizatorzy',
							'label' => ____('Organizers'),
						);
		                */
		                
		                if (get_field('dojazd'))
		                	$items[] = array(
								'href' => '#dojazd',
								'label' => __('Dojazd'),
							);
		                
		                if (get_field('nagrania'))
		                	$items[] = array(
								'href' => '#nagrania',
								'label' => __('Nagrania'),
							);
		                
		                if (get_field('sponsorzy_i_partnerzy'))
		                	$items[] = array(
								'href' => '#sponsorzy_i_partnerzy',
								'label' => __('Sponsorzy i partnerzy'),
							);
		                
		                if (get_field('kontakt'))
		                	$items[] = array(
								'href' => '#kontakt',
								'label' => __('Kontakt'),
							);
		                
		                /*
		                if (get_field('Regulamin'))
		                	$items[] = array(
								'href' => '#regulamin',
								'label' => __('Regulamin'),
							);
		                */
						
						$items[] = array(
							'href' => '#organizers',
							'label' => ____('Organizers'),
							'hidden' => true,
						);
						
						/*
						if (get_field('Travel_Granty_dla_NGO'))
		                	$items[] = array(
								'href' => '#travel_grants',
								'label' => ____('Travel Grants'),
							);
						*/
						
						if( !in_array('gallery', $_features) ) {
							if (get_field('media_text'))
				                $items[] = array(
									'href' => '#media',
									'label' => ____('Media'),
								);
						}
						
						if (get_field('practical_info'))
			                $items[] = array(
								'href' => '#practical_info',
								'label' => ____('Practical Information'),
							);
							
						
						
						$menu_output = '';
						for( $i=0; $i<count($items); $i++ ) {
							
							$item = $items[ $i ];
							$class = ( $i===0 ) ? ' class="active"' : false;
							
							$style = isset($item['hidden']) ? ' style="display: none;"' : '';
							
							$menu_output .= '<li' . $style . $class . '><a class="scroll_link" href="' . $item['href'] . '">' . $item['label'] . '</a></li>';
							
						}
												
						echo $menu_output;
						
					?>
					
				  
	                
					</ul>
				</div>
				
				
				
	            
            </div>
        </div>
    
    </div>
	
    
    <div id="container_tabs">
        <div>
            
            <div id="tabs_content">
	            
	            <?php if( $locale == 'en_US' ) {?>
	            <div class="experience" id="materials">
		            <div class="container">
		            	<h2 style="margin: 35px 0 25px;"><?php echo __('Experience #PDFCEE17 again'); ?></h2>
			            			            
			            <ul class="nav nav-tabs eia-menu">
						  <li class="active"><a href="#day1" data-toggle="tab">Thursday</a></li>
						  <li><a href="#day2" data-toggle="tab">Friday</a></li>						  
						</ul>
						
						<?php /*
						<div id="myTabContent" class="tab-content">
						  <div class="tab-pane fade active in" id="day1">

						    <?php if( have_rows('gallery') ) {?>
				            <div class="galleria day1">
					            
					            <?php while (have_rows('gallery')) : the_row(); ?>
					            	
					            	<?php $image = get_sub_field('image'); ?>
								    <a href="<?php echo htmlspecialchars($image['sizes']['large']) ?>"><img src="<?php echo htmlspecialchars($image['sizes']['thumbnail']) ?>" data-big="<?php echo htmlspecialchars($image['sizes']['large']) ?>" data-title="<?php echo htmlspecialchars(get_sub_field('title')) ?>" data-description="<?php echo htmlspecialchars(get_sub_field('description')) ?>"></a>
								    					    
							    <?php endwhile; ?>
							</div>
							<?php } ?>
						    
						  </div>
						  <div class="tab-pane fade" id="day2">
						    
						    <?php if( have_rows('gallery2') ) {?>
				            <div class="galleria day2">
					            
					            <?php while (have_rows('gallery2')) : the_row(); ?>
					            	
					            	<?php $image = get_sub_field('image'); ?>
								    <a href="<?php echo htmlspecialchars($image['sizes']['large']) ?>"><img src="<?php echo htmlspecialchars($image['sizes']['thumbnail']) ?>" data-big="<?php echo htmlspecialchars($image['sizes']['large']) ?>" data-title="<?php echo htmlspecialchars(get_sub_field('title')) ?>" data-description="<?php echo htmlspecialchars(get_sub_field('description')) ?>"></a>
								    					    
							    <?php endwhile; ?>
							</div>
							<?php } ?>
						    
						  </div>
						</div>
						*/ ?>
						
						<?php echo $gallery_html; ?>	            
			            
		            </div>
	            </div>
	            <?php } ?>
	            
	            
	            
                <?php if (get_field('o_evencie')) {
	                
	                /*
	                if( in_array('countdown', $_features) ) {
		            ?>
		            
		            <div class="container"><p id="countdown"></p></div>
					<script type="text/javascript">
						$("#countdown").countdown("2017/04/06 11:00:00", function(event) {
							
							var $this = $(this).html(event.strftime('<?php echo ____('PDF CEE 2017 starts in'); ?> '
						    + '<span>%-D</span> <?php echo ____('Days')?> '
						    + '<span>%-H</span> <?php echo ____('Hours')?> '
						    + '<span>%-M</span> <?php echo ____('Minutes')?> '
						    + '<span>%-S</span> <?php echo ____('Seconds')?>'));
							
							
						});
					</script>
		                
		                
	                <?php
	                } */
	                ?>
	            
	            <?php /*
	            <div class="container">
	            <div class="registration_cont">
		            <a href="http://themovement.io/events/pdfcee17" class="btn btn-primary btn-lg"><?php echo ____('REGISTER NOW') ?></a>
	            </div>
	            </div>
	            */ ?>
	               
	            <?php
	                
                    echo '<div class="event-block"><div id="o_evencie" style="text-align: justify; text-justify: inter-word;"><h2 style="margin: 35px 0 25px;">' . __('O wydarzeniu') . '</h2>';
                    
                    
                    
                    the_field('o_evencie');
                    // include('o_evencie.html');
                    

                    echo '</div></div>';
                } ?>
                
                
                
                
                
                
                <?php if (have_rows('program')) {
                    echo '<div class="event-block text-center"><div class="container"><div id="program"><p>&nbsp;</p><h2>' . __('Program') . '</h2><div class="row"><div class="col-sm-8 col-sm-offset-2"><ul>';
					
					$init = false;
					
                    // loop through the rows of data
                    while (have_rows('program')) : the_row();
						
						$sw = trim( get_sub_field('start_wystapienia') );
						if( $init && !$sw ) {
							
							echo '</div><div class="col-sm-8 col-sm-offset-2"><ul>';
							
						}
						$init = true;
						
												
						if( in_array(get_sub_field('tytul_wystapienia'), array('Spotkanie krajów Grupy Wyszehradzkiej', 'V4 Countries Meet-Up - 2nd floor')) ) {
							
							// display a sub field value
	                        echo '<li class="cloud"><div class="wystapienie"><h3';
	                        if( get_sub_field('opis_wystapienia') )
		                        echo ' class="has_text"';
	                        echo '><span class="_time">13:30-14:30</span>';
	                        echo '<span class="_text">';
	                        the_sub_field('tytul_wystapienia');
	                        echo '</span>';
	                        echo '</h3><div class="sub">';
	                        the_sub_field('opis_wystapienia');
	                        echo '</div></div></li>';
							
						} else {
						
	                        // display a sub field value
	                        echo '<li><div class="time">';
	
	                        the_sub_field('start_wystapienia');
	                        echo '</div><div class="wystapienie"><h3';
	                        if( get_sub_field('opis_wystapienia') )
		                        echo ' class="has_text"';
	                        echo '>';
	                        the_sub_field('tytul_wystapienia');
	                        echo '</h3><div class="sub">';
	                        the_sub_field('opis_wystapienia');
	                        echo '</div></div></li>';
                        
                        }

                    endwhile;

                    echo '</div></div></ul></div></div></div><p>&nbsp;</p>';
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
                
                <?php /* if (get_field('Regulamin')) {
                    echo '<div id="regulamin" style="text-align: justify; text-justify: inter-word;"><h2>' . __('Regulamin') . '</h2>';
                    the_field('Regulamin');
                    echo '</div>';
                } */ ?>
                
				<?php /* if (get_field('Travel_Granty_dla_NGO')) {
                    echo '<div id="travel_grants" style="text-align: justify; text-justify: inter-word;"><h2>' . __('Travel Granty dla NGO') . '</h2>';
                    the_field('Travel_Granty_dla_NGO');
                    echo '</div>';
                } */ ?>    
                
                
                <?php if (get_field('festival_of_apps')) {
                    echo '<div class="event-block event-block-darker"><div class="container"><div id="satellite_events" style="text-align: justify; text-justify: inter-word;"><p>&nbsp;</p><h2>' . ____('Side Events') . '</h2>';
                    echo '<div class="satellite_events">';
                    the_field('festival_of_apps');
                    
                    
                    if( have_rows('program_fest_of_apps') ) {
                    
	                    echo '<div class="event-block text-center"><div class="container"><div class="_program"><p>&nbsp;</p><h2>' . __('Program') . '</h2><div class="row"><div class="col-sm-10 col-sm-offset-1"><ul>';
						
						$init = false;
						
											
	                    // loop through the rows of data
	                    while (have_rows('program_fest_of_apps')) : the_row();
											
							
													
							// display a sub field value
	                        echo '<li><div class="time">';
	
	                        the_sub_field('start_wystapienia');
	                        echo '</div><div class="wystapienie"><h3';
	                        if( get_sub_field('opis_wystapienia') )
		                        echo ' class="has_text"';
	                        echo '>';
	                        the_sub_field('tytul_wystapienia');
	                        echo '</h3><div class="sub">';
	                        the_sub_field('opis_wystapienia');
	                        echo '</div></div></li>';
	
	                    endwhile;
	
	                    echo '</div></div></ul></div></div></div><p>&nbsp;</p>';
                    
                    }
                    
                    
                    
                    
                    
                    echo '</div>';
                    echo '</div></div></div>';
                } ?>
                            
		<?php if (have_rows('speakers')) {
                    echo '<div class="event-block"><div class="container"><div id="prelegenci"><p>&nbsp;</p>
                    <h2>' . ____('Prelegenci') . '</h2>';
                    echo '<ul class="speakers_ul row">';
                    $i = 0;
                    $first = true;
                    while (have_rows('speakers')) : the_row(); ?>
                        <?php
	                        
	                    $i++;
	                    if( !$first && ($i % 3 === 1) ) {
		                    echo '</ul><ul class="speakers_ul row">';
	                    }
	                    $first = false;  
	                    
                        // display a sub field value
                        echo '<li class="col-sm-4">'; ?>
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
                        <?php
	                        $text = get_sub_field('opis');
	                        $trimmed = wp_trim_words($text, 30, '');
	                        echo '<p class="text trimmed">' . $trimmed;
	                        
	                        if( strlen($text) != strlen($trimmed) ) {
		                        
		                        echo '...</p><p class="text full" style="display: none;">' . $text . '</p>';
		                        
		                        echo '<div class="text-buttons more"><a href="#" class="more">more &darr;</a><a href="#" class="less">less &uarr;</a></div>';
		                        
	                        } else {
		                        
		                        echo "</p>";
		                        
	                        }
	                        
	                        // the_sub_field('opis');
                        ?>

                        <?php echo '</li>';
                    endwhile;
                    echo '</ul>';
                    echo '</div></div></div>';
                } ?>

                <?php if (get_field('nagrania')) {
                    echo '<div id="nagrania"><h2>' . __('Nagrania') . '</h2>';
                    the_field('nagrania');
                    echo '</div>';
                } ?>
                
                
                
                <?php if (get_field('tcee')) {
                    echo '<div class="event-block event-block-darker"><div class="container"><div id="tcee" style="text-align: justify; text-justify: inter-word;"><p>&nbsp;</p><h2>' . ____('TransparenCEE Project') . '</h2>';
                    the_field('tcee');
                    echo '</div></div></div>';
                } ?>
                
                <?php if (get_field('visegrad')) {
                    echo '<div class="event-block event-block-darker"><div class="container"><div id="visegrad" style="text-align: justify; text-justify: inter-word;"><p>&nbsp;</p><h2>' . ____('Visegrad Project') . '</h2>';
                    the_field('visegrad');
                    echo '</div></div></div>';
                } ?>
                
                <?php
	                echo '<div class="event-block"><div class="container"><div id="organizers" style="text-align: center;"><p>&nbsp;</p>';
                    // the_field('visegrad');
                    include('organizers.php');
                    echo '</div></div></div>';
                ?>
                
                
                
                <?php if (get_field('sponsorzy_i_partnerzy')) {
                    echo '<div id="sponsorzy_i_partnerzy"><h2>' . __('Sponsorzy i partnerzy') . '</h2>';
                    the_field('sponsorzy_i_partnerzy');
                    '</div>';
                } ?>
                
                <?php /*
                <?php if (get_field('Travel_Granty_dla_NGO')) {
                    echo '<div class="event-block event-block-darker" id="travel_grants" style="text-align: justify; text-justify: inter-word;"><div class="container"><p>&nbsp;</p><h2>' . ____('Travel Grants') . '</h2></div>';
                ?>
                <div class="container">
	                <div class="row">
		                <div class="col-md-10 col-md-offset-1">
			                
			                <div class="event_paper">
				                
				                <div class="info"><?php the_field('travel_grants_info'); ?></div>
				                
				                <p class="text-center"><a class="btn btn-primary btn-lg" href="<?php echo ____('_link_to_travel_grants_form') ?>" target="_blank"><?php echo ____('Apply for a Travel Grant'); ?></a></p>
				                
				                <div class="text"><?php the_field('Travel_Granty_dla_NGO'); ?></div>
				                <p class="buttons">
					                <a href="#travel_grants" class="btn-show"><?php echo ____('Show rules for Travel Grants'); ?> &darr;</a>
									<a href="#travel_grants" class="btn-hide"><?php echo ____('Hide rules for Travel Grants'); ?> &uarr;</a>
								</p>
								
			                </div>
			                
		                </div>
	                </div>
                </div>
	            <?php echo '</div>'; } ?>
	            */ ?>
                
                <?php if (get_field('media_text')) {
                    echo '<div class="event-block event-block-darker media_div" id="media" style="text-align: justify; text-justify: inter-word;"><div class="container"><p>&nbsp;</p><h2>' . ____('Media') . '</h2></div><div class="container">';
                    the_field('media_text');                    
                    echo "<p>&nbsp;</p></div></div>";
                    }
                ?>
                
                <?php if( get_field('Regulamin') ) { ?>
                <div class="modal fade" tabindex="-1" role="dialog" id="tocModal">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-body">
				        <div id="toc-content">
				          <?php the_field('Regulamin'); ?>
				        </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close') ?></button>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
                <?php } ?>
                
                <?php if (get_field('practical_info')) {
                    echo '<div class="event-block" id="practical_info" style="text-align: justify; text-justify: inter-word;"><div class="container"><p>&nbsp;</p><h2>' . ____('Practical Information') . '</h2></div>';
                    the_field('practical_info');
                ?>
                
                <div class="container text-center">
	                <iframe id="ytvideo" width="560" height="315" src="https://www.youtube.com/embed/KroPhbkmfdM" frameborder="0" allowfullscreen></iframe>
                </div>
                
                <?php
                    
                    include('practical_info.html');
                    echo '</div>';
                } ?>
                
                
                
            </div>
            
            
            <?php /*
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
                
                <?php if (have_rows('logotypy_wspolorganizatorow')) {
                    echo '<div id="event_organizatorzy_images"><h3>' . __('Współorganizatorzy') . '</h3>';
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
            */ ?>

        </div>

    </div>
    
    
    <?php /*
    <div id="event_footer">
        <div id="event_6_featured_posts">
            <div class="posts-list">
                <div class="container" id="container">
                    <?php
                    $args = array('posts_per_page' => 6, 'category' => get_field('wpisy_pod_eventem'));
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
                    <?php endif;


                    ?>


                </div>
            </div>
        </div>

        <div id="event_nagrania">
            <div class="posts-list">
                <div class="container">
                    <h2><?php echo get_field('nagranie_tytul'); ?></h2>
                    <?php
                    $args = array('posts_per_page' => 6, 'category' => get_field('nagrania_wybor_kategorii'));
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
		        
    </div>
    <?php */ ?>

<?php get_footer(); ?>