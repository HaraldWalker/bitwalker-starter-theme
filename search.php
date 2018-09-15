<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$templates = array( 'search.twig', 'archive.twig', 'index.twig' );

$context          = Timber::get_context();
$context['title'] = 'Search results for ' . get_search_query();
$context['posts'] = new Timber\PostQuery();
$context['left_sidebar_top'] = Timber::get_widgets('left_sidebar_top');
$context['left_sidebar_bottom'] = Timber::get_widgets('left_sidebar_bottom');
Timber::render( $templates, $context );
