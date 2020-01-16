<?php 

remove_action('wp_head','wp_generator');


// Função para carregamento dos scripts
function carrega_scripts(){
	// Enfileirando Bootstrap

    wp_enqueue_script( 'jquery',  get_template_directory_uri().  '/scripts/jquery-3.4.1.slim.min.js', array(), null, true);
    wp_enqueue_script( 'popper',  get_template_directory_uri().  '/scripts/popper.min.js', array(), null, true);
    wp_enqueue_script( 'boootstrap4-js',  get_template_directory_uri().  '/scripts/bootstrap.min.js', array(), null, true);
    wp_enqueue_script( 'mainjs', get_template_directory_uri(). '/scripts/main.js', array(), null, true);	

    wp_enqueue_style( 'sifilis', get_stylesheet_uri() );
    wp_enqueue_style( 'bootstrap4-css', get_template_directory_uri() . '/styles/bootstrap.min.css', array(), '1', 'all');
    wp_enqueue_style( 'elegantFont', get_template_directory_uri() . '/styles/elegant-font.css', array(), '1', 'all');
    wp_enqueue_style( 'style-custom', get_template_directory_uri() . '/styles/style.min.css', array(), '1', 'all');
	
}
add_action( 'wp_enqueue_scripts', 'carrega_scripts' );



// Função para registro de nossos menus
register_nav_menus(
	array(
		'main-menu' => __( 'Main Menu'),
	)
);

// Adicionando suporte ao tema
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('video', 'image'));
add_theme_support('html5', array('search-form'));


function sedis_custom_logo_setup() {
	$defaults = array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'sedis_custom_logo_setup' );

require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';

// Add theme support for selective refresh for widgets.
add_theme_support( 'customize-selective-refresh-widgets' );

// Registrando sidebars
if (function_exists('register_sidebar')){
	register_sidebar(
		array(
			'name'		=> 'Projeto',
			'id'		=> 'sidebar-1',
			'description'	=> 'Barra do Projeto',
			'before_widget'	=> '<div class="widget-wrapper">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h2 class="widget-titulo"><span>',
			'after_title'	=> '</span></h2>',			
		)
	);
}
