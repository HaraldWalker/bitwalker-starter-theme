<?php
/**
 * Extends WP_Nav_Menu_Widget, so that we can use twig templates to style it correctly.
 * User: harald
 * Date: 16.09.18
 * Time: 10:40
 */

class Timber_Nav_Menu_Widget extends WP_Nav_Menu_Widget {

	public function widget( $args, $instance ) {

		$menu_id = ! empty( $instance['nav_menu'] ) ? $instance['nav_menu'] : false;

		if ( ! $menu_id ) {
			return;
		}

		$timberMenu = new Timber\Menu($menu_id);
		$timberMenu->title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$context['side_menu'] = $timberMenu;

		Timber::render( 'side_menu.twig', $context );
	}

}

function timber_nav_menu_widget_registration() {
	unregister_widget('WP_Nav_Menu_Widget');
	register_widget('Timber_Nav_Menu_Widget');
}
