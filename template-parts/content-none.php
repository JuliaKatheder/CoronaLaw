<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Keine Suchergebnisse', 'wp-bootstrap-starter' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Bereit deinen ersten Beitrag zu veröffentlichen? <a href="%1$s">Hier starten</a>.', 'wp-bootstrap-starter' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Leider ergab Ihre Suche keine Treffer, bitte versuchen Sie es mit einem anderen Stichwort.', 'wp-bootstrap-starter' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'Leider können wir den gewünschten Inhalt nicht finden. Bitte versuchen Sie es über unsere Suche.', 'wp-bootstrap-starter' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
