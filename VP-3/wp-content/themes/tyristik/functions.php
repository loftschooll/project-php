<?php
/**
 * tyristik functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tyristik
 */
//style
add_action('wp_enqueue_scripts', 'style_theme');
function style_theme() {
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('libs', get_template_directory_uri() . '/assets/css/libs.min.css');
    wp_enqueue_style('media', get_template_directory_uri() . '/assets/css/media.css');
}

//scripts
add_action('wp_enqueue_scripts', 'func_scripts');
function func_scripts() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-2.2.4.min.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'],
    null, true);
    wp_enqueue_script('customizer', get_template_directory_uri() . 'js/customizer.js');
    wp_enqueue_script('navigation', get_template_directory_uri() . '/js/navigation.js');

}

//menu
add_action('after_setup_theme', 'myMenu');
function myMenu() {
    register_nav_menu('top', 'header menu');
    register_nav_menu('bottom', 'footer menu');
    add_theme_support('post-thumbnails', array('post'));
    add_image_size('post_thumb', 270, 190, true);
    add_image_size('post_thumb-single', 795, 320, true);
}

add_filter( 'get_search_form', 'my_search_form' );
function my_search_form( $form ) {

    $form = '
	<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
		<label class="screen-reader-text" for="s">Запрос для поиска:</label>
		<input type="text" value="' . get_search_query() . '" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="Найти" />
	</form>';

    return $form;
}

//post text
add_filter('excerpt_more', function($more) {
    return "...";
});

//widget sidebar
add_action('widgets_init', 'widget_sidebar');

function widget_sidebar() {
    register_sidebar( array(
        'name' => 'Sidebar',
        'id' => 'right_sidebar',
        'description' => 'Описание сайдбара',
        'before_widget' => '<div class="sidebar__sidebar-item">',
        'after_widget' => "</div>\n",
        'before_title' => '<div class="sidebar-item__title">',
        'after_title' => "</div>",
    ));
}
