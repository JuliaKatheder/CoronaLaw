<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
		<div class="container pt-3 pb-3">
			<div class="disclaimer">
				<h5>
					Disclaimer
				</h5>
				<p>
					Dieses Web-Angebot dient lediglich dem <strong>unverbindlichen Informationszweck </strong> und stellt <strong>keine Rechtsberatung</strong> im eigentlichen Sinne dar. <strong>Der Inhalt dieses Angebots kann und soll eine individuelle und verbindliche Rechtsberatung, die auf Ihre spezifische Situation eingeht, nicht ersetzen.</strong> Insofern verstehen sich alle angebotenen Informationen ohne Gewähr auf Richtigkeit und Vollständigkeit.
Falls Sie eine persönliche Rechtsberatung benötigen, die allen Einzelheiten Ihrer Situation gerecht wird, nutzen Sie bitte das Matching-Tool zur Verbindung mit einem unserer Partneranwälte.
				</p>
			</div>
            <div class="site-info">
                &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
                <span class="sep"> | </span>
                <a class="credits" href="https://afterimagedesigns.com/wp-bootstrap-starter/" target="_blank" title="WordPress Technical Support" alt="Bootstrap WordPress Theme"><?php echo esc_html__('Bootstrap WordPress Theme','wp-bootstrap-starter'); ?></a>   
            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>