<footer class="footer">
<div class="footer-container container">
	<div class="row">
		<?php wp_nav_menu(
			array(
				'theme_location' => 'footer-nav--primary',
				'menu_class' => 'footer-nav footer-nav--primary',
				'container' => '',
			)
		); ?>
		<?php wp_nav_menu(
			array(
				'theme_location' => 'footer-nav--secondary',
				'menu_class' => 'footer-nav footer-nav--secondary',
				'container' => '',
			)
		); ?>
	</div>
	<ul class="footer-social">
		<li><a target="_blank" href="https://www.youtube.com/user/epanstwo" class="footer-social-icon icon--youtube"></a></li>
		<li><a target="_blank" href="https://www.facebook.com/epanstwo" class="footer-social-icon icon--facebook"></a></li>
		<li><a target="_blank" href="https://twitter.com/epforgpl" class="footer-social-icon icon--twitter"></a></li>
	</ul>
</div>
</footer>
<?php // Jan Zankowski, 29/5/18: If wp_footer() is moved below closing tag of <div class="wrap">..</div>, then it's shown at very bottom of site. ?>
<?php wp_footer(); ?>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/js/async.min.js"></script>
<style type="text/css">
	.homeIntro-tile-link:focus, .homeIntro-tile-link:active, .homeIntro-tile-link:visited{
		color: #fff;
		outline: none;
	}
</style>
<?php if( !isset( $_GET['new'] ) ) {?>
     <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#horizontalTab').responsiveTabs({
                rotate: false,
                startCollapsed: 'accordion',
                collapsible: 'accordion',
                setHash: true,
                activate: function(e, tab) {
                    jQuery('.info').html('Tab <strong>' + tab.id + '</strong> activated!');
                },
                activateState: function(e, state) {
                    // console.log(state);
                    jQuery('.info').html('Switched from <strong>' + state.oldState + '</strong> state to <strong>' + state.newState + '</strong> state!');
                }
            });
         
        });
    </script>
<?php } ?>
</body>
</html>
