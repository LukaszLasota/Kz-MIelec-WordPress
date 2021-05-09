<?php 

// require get_theme_file_path('/includes/search-route.php');
// require get_theme_file_path('/includes/like-route.php');

function kzmielec_files(){
       
    if(strstr($_SERVER['SERVER_NAME'], 'kzmielec.local')){
        wp_enqueue_script('main-kzmielec-js', 'http://localhost:10008/bundled.js', NULL, '1.0', true);
        
    }else{
        wp_enqueue_script('our-vendor-js', get_theme_file_uri('/bundled-assets/vendors~scripts.86869f993505ab16d6b9.js'), NULL, '1.0', true);
        wp_enqueue_script('main-kzmielec-js', get_theme_file_uri('/bundled-assets/scripts.6a3585d20f779dc22455.js'), NULL, '1.0', true);
        wp_enqueue_style('our-main-styles', get_theme_file_uri('/bundled-assets/styles.6a3585d20f779dc22455.css'));
    }
    

    // wp_enqueue_script( 'fb', 'https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v4.0', array (), '1.0.0', true);

    // wp_enqueue_script( 'map_js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCgYY5EXm6tdyIf2ngkCSH4rpqbbvdVrWo&callback=initMap', array(), '1.0.0', true);

    wp_localize_script('main-kzmielec-js', 'kzmielecData', array(
        'root_url'=> get_site_url(),
        'nonce'=> wp_create_nonce('wp_rest'),
    ));

}

add_action('wp_enqueue_scripts', 'kzmielec_files');


function kzmielec_features(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');//dodanie wybranych obrazów w poście
}

add_action( 'after_setup_theme', 'kzmielec_features');


function kzmielec_post_types(){
    // register_post_type('visits', array(
    //     'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    //     'show_in_rest' => true,
    //     'has_archive' => true,
    //     'public'=> true,
    //     'labels' => array(
    //         'name'=> 'Wizyty strona główna',
    //         'add_new_item' => 'Dodaj nową wizytę',
    //         'edit_item' => 'Edytuj wizytę',
    //         'all_items' => 'Wszystkie wizyty',
    //         'singular_name' => 'Wizyty',
    //     ),
    //     'menu_icon' => 'dashicons-universal-access-alt',
    // ));

    register_post_type('zaplanuj-wizyte', array(
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'show_in_rest' => true,
        'has_archive' => true,
        'public'=> true,
        'labels' => array(
            'name'=> 'Wizyty strona główna',
            'add_new_item' => 'Dodaj nową wizytę',
            'edit_item' => 'Edytuj wizytę',
            'all_items' => 'Wszystkie wizyty',
            'singular_name' => 'Wizyty',
        ),
        'menu_icon' => 'dashicons-universal-access-alt',
    ));
    
    //Nasze-atuty typ postu, Po każdym dodaniu nowego rodzaju postu trzeba odświeżyć permalinki
    // register_post_type('Nasze-atuty', array(
    //     'supports' => array('title'),  
    //     'show_in_rest' => true,
    //     'has_archive' => true,
    //     'public'=> true,
    //     'labels' => array(
    //         'name'=> 'Nasze atuty przedszkole',
    //         'add_new_item' => 'Dodaj nowy atut',
    //         'edit_item' => 'Edytuj atut',
    //         'all_items' => 'Wszystkie atuty',
    //         'singular_name' => 'Atut',
    //     ),
    //     'menu_icon' => 'dashicons-heart',
    // ));

    // register_post_type('kariera', array(
    //     'supports' => array('title', 'editor', 'thumbnail'),  
    //     'show_in_rest' => true,
    //     'has_archive' => true,
    //     'public'=> true,
    //     'labels' => array(
    //         'name'=> 'Kariera przedszkole',
    //         'add_new_item' => 'Dodaj nowe ogłoszenie',
    //         'edit_item' => 'Edytuj ogłoszenie',
    //         'all_items' => 'Wszystkie ogłoszenia',
    //         'singular_name' => 'ogłoszenie',
    //     ),
    //     'menu_icon' => 'dashicons-businesswoman',
    // ));

    // register_post_type('pdf-goscie', array(
    //     'supports' => array('title'),  
    //     'show_in_rest' => true,
    //     'has_archive' => true,
    //     'public'=> true,
    //     'labels' => array(
    //         'name'=> 'PDF dla gości',
    //         'add_new_item' => 'Dodaj nowy pdf',
    //         'edit_item' => 'Edytuj pdf',
    //         'all_items' => 'Wszystkie pdfy',
    //         'singular_name' => 'pdf',
    //     ),
    //     'menu_icon' => 'dashicons-pdf',
    // ));
    // register_post_type('pdf-rodzice', array(
    //     'supports' => array('title'),
    //     'public' => false,
    //     'show_ui'=> true,//Show in admin dashboard
    //     'labels' => array(
    //         'name' => 'PDF dla rodziców',
    //         'add_new_item' => 'Dodaj nowy pdf',
    //         'edit_item' => 'Edytuj pdf',
    //         'all_items' => 'Wszystkie pdfy',
    //         'singular_name' => 'pdf',
    //     ),
    //     'menu_icon' => 'dashicons-pdf'
    // ));

//     //Program post type Po każdym dodaniu nowego rodzaju postu trzeba odświeżyć permalinki
//     register_post_type('program', array(
//         'show_in_rest' => true,
//         'supports' => array('title'),
//         'rewrite' => array('slug'=> 'programs'),
//         'has_archive' => true,
//         'public'=> true,
//         'labels' => array(
//             'name'=> 'Programs',
//             'add_new_item' => 'Add new ',
//             'edit_item' => 'Edit Program',
//             'all_items' => 'All Programs',
//             'singular_name' => 'Program',
//         ),
//         'menu_icon' => 'dashicons-awards',
//     ));

//     // Professor Post Type
//   register_post_type('professor', array(
//     'show_in_rest' => true,
//     'supports' => array('title', 'editor', 'thumbnail'),
//     'public' => true,
//     'labels' => array(
//       'name' => 'Professors',
//       'add_new_item' => 'Add New Professor',
//       'edit_item' => 'Edit Professor',
//       'all_items' => 'All Professors',
//       'singular_name' => 'Professor'
//     ),
//     'menu_icon' => 'dashicons-welcome-learn-more'
//   ));

//   //Campus post type Po każdym dodaniu nowego rodzaju postu trzeba odświeżyć permalinki
//   register_post_type('campus', array(
//     'capability_type'=>'campus',
//     'map_meta_cap' => true,
//     'show_in_rest' => true,
//     'supports' => array('title', 'editor', 'excerpt'),
//     'rewrite' => array('slug'=> 'campuses'),
//     'has_archive' => true,
//     'public'=> true,
//     'labels' => array(
//         'name'=> 'Campuses',
//         'add_new_item' => 'Add New Campus',
//         'edit_item' => 'Edit Campus',
//         'all_items' => 'All campuses',
//         'singular_name' => 'Campus',
//     ),
//     'menu_icon' => 'dashicons-location-alt',
// ));

// //note post type
// register_post_type('note', array(
//   'capability_type'=> 'note',
//   'map_meta_cap'=> true,
//   'show_in_rest' => true,
//   'supports' => array('title', 'editor'),
//   'public' => false,
//   'show_ui'=> true,
//   'labels' => array(
//     'name' => 'Notes',
//     'add_new_item' => 'Add New note',
//     'edit_item' => 'Edit note',
//     'all_items' => 'All notes',
//     'singular_name' => 'note'
//   ),
//   'menu_icon' => 'dashicons-welcome-write-blog'
// ));
  
// //Like post type
// register_post_type('like', array(
//   'supports' => array('title'),
//   'public' => false,
//   'show_ui'=> true,
//   'labels' => array(
//     'name' => 'Likes',
//     'add_new_item' => 'Add New Like',
//     'edit_item' => 'Edit Like',
//     'all_items' => 'All Likes',
//     'singular_name' => 'Like'
//   ),
//   'menu_icon' => 'dashicons-heart'
// ));
  
};

 add_action('init', 'kzmielec_post_types');



// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'kzmielec'),
        'description' => __('Description for this widget-area...', 'kzmielec'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'kzmielec'),
        'description' => __('Description for this widget-area...', 'kzmielec'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}




/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */
function rd_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}
 
	/*
	 * Nonce verification
	 */
	if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
		return;
 
	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );
 
	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;
 
	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {
 
		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);
 
		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );
 
		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}
 
		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				if( $meta_key == '_wp_old_slug' ) continue;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}
 
 
		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts')) {
		$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Kopiuj</a>';
	}
	return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );


function kzmielec_adjust_queries($query){
   
    if(!is_admin() AND is_post_type_archive('zaplanuj-wizyte') AND $query-> is_main_query() ){
        $query->set('order', 'ASC');
    }

}

add_action( 'pre_get_posts', 'kzmielec_adjust_queries' );