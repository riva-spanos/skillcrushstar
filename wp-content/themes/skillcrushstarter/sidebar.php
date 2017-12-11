<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 2.0
 */
?>
<div id="sidebar">
	<?php if ( has_nav_menu( 'secondary' ) ) : ?>
	<nav role="navigation" class="navigation site-navigation secondary-navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
	</nav>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #primary-sidebar -->
	<?php endif; ?>

	<div id="authors" class="widget">
		<h2>Authors</h2>
		<ul>
			<li class="widget_categories">
			<?php wp_list_authors('exclude_admin=0'); ?>
		</li>
		</ul>
	</div>
</div>
