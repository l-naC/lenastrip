<?php

require_once('walker/CommentWalker.php');

/**
 * The theme setup function.
 * 
 */
define('THEME_PATH', get_template_directory());

function lenastrip_setup() {

	// Set text domain.
	load_theme_textdomain( 'lenastrip', get_template_directory() . '/languages' );

	// Add theme support.
	add_theme_support( 'html5' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background', array( 'default-color' => 'eeeeee' ) );
	add_theme_support('menus');
	add_theme_support('post-thumbnails');
	add_theme_support( 'custom-logo' );

	add_image_size('post-thumbnail', 330, 177, true);

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'header' => __( 'Header Menu', 'lenastrip' ),
			'footer' => __( 'Footer Menu', 'lenastrip' ),
			'social' => __( 'Social Links Menu', 'lenastrip' ),
		)
	);

	// Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for Block Styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );

    // Enqueue editor styles.
    add_editor_style( 'style-editor.css' );


	/**
	 * Fires after the theme setup has finished.
	 */
	do_action( 'lenastrip_theme_setup' );

}
function lenastrip_init() {
    register_taxonomy('continents', 'post', [
        'labels' => [
            'name' => 'Continents',
            'singular_name' => 'Continent',
            'plural_name' => 'Continents',
            'search_items' => 'Rechercher des continents',
            'all_items' => 'Tous les continents',
            'edit_item' => 'Editer le continent',
            'update_item' => 'Mettre à jour le continent',
            'add_new_item' => 'Ajouter un nouveau continent',
            'new_item_name' => 'Ajouter un nouveau continent',
            'menu_name' => 'Continents',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
	]);
	
	register_taxonomy('continents_albums', 'post', [
        'labels' => [
            'name' => 'Continents albums',
            'singular_name' => 'Continent',
            'plural_name' => 'Continents',
            'search_items' => 'Rechercher des continents',
            'all_items' => 'Tous les continents',
            'edit_item' => 'Editer le continent',
            'update_item' => 'Mettre à jour le continent',
            'add_new_item' => 'Ajouter un nouveau continent',
            'new_item_name' => 'Ajouter un nouveau continent',
            'menu_name' => 'Continents albums',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
    ]);
}

function lenastrip_menu_class($classes) {
    $classes[] = 'nav-item';
    return $classes;
}

function lenastrip_menu_link_class($attrs) {
    $attrs['class'] = 'nav-link';
    return $attrs;
}

function lenastrip_custom_excerpt($excerpt) {
	$excerpt = str_replace( "<p", "<p class=\"card-text\"", $excerpt );
 	return $excerpt;
}

add_action( 'after_setup_theme', 'lenastrip_setup', 10, 0 );
add_action('init', 'lenastrip_init');
add_filter('nav_menu_css_class', 'lenastrip_menu_class');
add_filter('nav_menu_link_attributes', 'lenastrip_menu_link_class');
add_filter('the_excerpt',  'lenastrip_custom_excerpt');

/**
 * Bootstrap Setup
 * 
 */

function lenastrip_enqueue_scripts() {
	$dependencies = array('jquery');
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.js', $dependencies, '3.3.6', true );
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', $dependencies, '3.3.6', true );
}

function lenastrip_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    $dependencies = array('bootstrap');
    wp_enqueue_style( 'lenastrip-style', get_stylesheet_uri(), $dependencies );
    foreach( glob( THEME_PATH. '/assets/css/*.css' ) as $file ) {
        $file = str_replace(THEME_PATH, '', $file);
        // $file contains the name and extension of the file
		wp_enqueue_style( $file.'style', get_template_directory_uri() . $file);
    }
}

add_action( 'wp_enqueue_scripts', 'lenastrip_enqueue_scripts' );
add_action( 'wp_enqueue_scripts', 'lenastrip_enqueue_styles' );


add_filter('comment_form_fields', function ($fields) {
    $fields['author'] = <<<HTML
    <div class="form-group row">
        <div class="col-md-6 my-1">
            <input class="form-control" name="author" id="author" placeholder="Nom" required/>
        </div>
    HTML;
    $fields['email'] = <<<HTML
        <div class="col-md-6 my-1">
            <input class="form-control" name="email" id="email" placeholder="Email" required/>
        </div>
    </div>
    HTML;
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    $fields['comment'] = <<<HTML
    <div class="form-group">
        <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Votre commentaire" required></textarea>
    </div>
    HTML;
    $comment_field = $fields['cookies'];
    unset( $fields['cookies'] );
    $fields['cookies'] = $comment_field;
    $fields['cookies'] = <<<HTML
    <div class="form-check">
        <input class="form-check-input" name="wp-comment-cookies-consent" id="wp-comment-cookies-consent" type="checkbox" value="yes"/>
        <label class="form-check-label" for="wp-comment-cookies-consent">
            Enregistrer mes informations dans le navigateur pour mon prochain commentaire.
        </label>
    </div>
    HTML;
    unset($fields['url']);
    return $fields;
});

function filter_comment_form_submit_button( $submit_button, $args ) {
    $submit_before = '<div class="form-group">';
    $submit_after = '</div>';
    $submit_button = str_replace('class="submit"','class="submit btn btn-outline-secondary"', $submit_button);
    return $submit_before . $submit_button . $submit_after;
};
 
add_filter( 'comment_form_submit_button', 'filter_comment_form_submit_button', 10, 2 );
