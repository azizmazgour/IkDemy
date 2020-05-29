<?php

//---------------------------------------------
//--------------- Version Theme ---------------
//---------------------------------------------
define('MAZ_version', '1.1.1');




	// *****************  action 1
	function maz_admin_scripts() {
		if(isset($_GET['page'])):
			// chargement des styles admin
			wp_enqueue_style('maz-bootstrap3-adm-css', get_template_directory_uri() . '/css/vendors/bootstrap.min.css', array(), 
				MAZ_version );	
		endif;

		}  // fin function lgmac_admin_scripts

	add_action('admin_enqueue_scripts', 'maz_admin_scripts' );




	


//---------------------------------------------
//-------------- Elements Set Up --------------
//---------------------------------------------
function MAZ_setup(){
	
	add_theme_support( 'custom-logo' );
	add_theme_support('post-thumbnails');
	require_once('includes/wp-bootstrap-navwalker.php');
	register_nav_menus(array('primary'=>'Principal', 'secondary'=>'Secondaire'));

}
add_action('after_setup_theme','MAZ_setup');


//---------------------------------------------
//-------------- Widget Nos Formation ---------
//---------------------------------------------
function MAZ_widgets_init(){
	register_sidebar(array(
		'name'			=> 'MARKETING DIGITAL',
		'description'	=> 'Widgets affiche: 1',
		'id'			=> 'widget-dom-formation1',
		'before_widget'	=> '<div id="%1$s" class="col-md-12 %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<i class="icon-chart-bar"></i>
							<h4>',
		'after_title'	=> '</h4> ',
		));
}
add_action('widgets_init','MAZ_widgets_init');

function MAZ_widgets_init2(){
	register_sidebar(array(
		'name'			=> 'COMMUNICATION',
		'description'	=> 'Widgets affiche: 1',
		'id'			=> 'widget-dom-formation2',
		'before_widget'	=> '<div id="%1$s" class="col-md-12 %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<i class="icon-clock"></i>
							<h4>',
		'after_title'	=> '</h4> ',
		));
}
add_action('widgets_init','MAZ_widgets_init2');

function MAZ_widgets_init3(){
	register_sidebar(array(
		'name'			=> 'MANAGEMENT',
		'description'	=> 'Widgets affiche: 1',
		'id'			=> 'widget-dom-formation3',
		'before_widget'	=> '<div id="%1$s" class="col-md-12 %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<i class="icon-users"></i>
							<h4>',
		'after_title'	=> '</h4> ',
		));
}
add_action('widgets_init','MAZ_widgets_init3');

function MAZ_widgets_init4(){
	register_sidebar(array(
		'name'			=> 'SOCIAL MEDIA',
		'description'	=> 'Widgets affiche: 1',
		'id'			=> 'widget-social-media',
		'before_widget'	=> '<div id="%1$s" class="col-md-12 %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4>',
		'after_title'	=> '</h4> ',
		));
}
add_action('widgets_init','MAZ_widgets_init4');


//---------------------------------------------
//----------------- NOS SERVICES -----------------
//---------------------------------------------

function MAZ_service_init() {
	$labels = array(
		'name'               => 'IK Service',
		'singular_name'      => 'Image  Accueil',
		'add_new'            => 'Ajouter Service',
		'add_new_item'       => 'Ajouter une Service ',
		'edit_item'          => 'Modifier Service ',
		'new_item'           => 'Nouveau',
		'all_items'          => 'liste des services',
		'view_items'         => 'Voir element',
		'search_items'       => 'Cherche une image accueil',
		'not_found'          => 'Aucun element trouve',
		'not_found_in_trash' => 'Aucun element dans la corbeille',
		'menu_name'          => 'IK Services', 
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'          => get_stylesheet_directory_uri() . '/img/logo-ico.png',
		'publicly_queryable' => false,
		'exclude_from_searsh'=> true,
		'supports'           => array( 'title', 'editor', 'page-attributes', 'thumbnail')
	);

	register_post_type( 'MAZ-service', $args );
}

add_action( 'init', 'MAZ_service_init' );


//---------------------------------------------
//----------------- COL et IMAGE -----------------
//---------------------------------------------

add_filter('manage_posts_columns', 'MAZ_col_change'); 

function MAZ_col_change($columns) { 
	$columns['MAZ_slider_image_o­rder'] = 'Ordre'; 
	$columns['MAZ_slider_image'] = 'Image'; 
	return $columns; } 



add_action('manage_posts_custom_column', 'MAZ_content_show', 10 ,2); 
// affiche contenu 
function MAZ_content_show($column, $post_id) { 
	global $post; 
	if ( $column == 'MAZ_slider_image' ) { 
		echo the_post_thumbnail(array(80,80)); 
	} 
	if ( $column == 'MAZ_slider_image_o­rder' ) { 
		echo $post->menu_order; } 
	}


//=========================================================================
//==============    opérations sur les messages 
//=========================================================================
include('includes/message-liste.php'); 


