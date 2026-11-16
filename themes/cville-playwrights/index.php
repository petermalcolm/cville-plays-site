<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="cpc-hero">
	<header class="cpc-header">
		<div class="cpc-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" tabindex="-1" aria-hidden="true">
				<?php
				// The ?ver= stamp changes whenever the file does, so browsers fetch the new logo.
				$cpc_logo = 'assets/images/cville-plays-collective.svg';
				$cpc_logo_url = add_query_arg( 'ver', filemtime( get_theme_file_path( $cpc_logo ) ), get_theme_file_uri( $cpc_logo ) );
				?>
				<img src="<?php echo esc_url( $cpc_logo_url ); ?>" alt="" width="600" height="600">
			</a>
		</div>
		<p class="cpc-site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				The Charlottesville <br> Playwrights <br> Collective
			</a>
		</p>

		<nav class="cpc-nav" aria-label="<?php esc_attr_e( 'Main', 'cville-playwrights' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'cpc-nav__list',
					'depth'          => 1,
					'fallback_cb'    => 'cpc_nav_fallback',
				)
			);
			?>
		</nav>
	</header>

	<main class="cpc-main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'cpc-panel' ); ?>>
					<?php the_title( '<h1>', '</h1>' ); ?>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<div class="cpc-panel">
				<p>Nothing here yet.</p>
			</div>
		<?php endif; ?>
	</main>
</div>

<footer class="cpc-footer">
	<p>
		&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> The Charlottesville Playwrights Collective
		<span class="cpc-footer__sep" aria-hidden="true">&middot;</span>
		<span class="cpc-footer__place">Charlottesville, VA</span>
	</p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
