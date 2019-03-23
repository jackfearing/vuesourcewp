<?php

/****************************************/
/* TAXONOMY FOR CUSTOM POST TYPES       */
/****************************************/

	add_action( 'init', 'my_custom_post_type_init' );
	/**
	 * Register a custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 * @link https://developer.wordpress.org/resource/dashicons/
	 */
	function my_custom_post_type_init() {
		$labels = array(
			'name'               => _x( 'Sidebars', 'post type general name', 'vuesource' ),
			'singular_name'      => _x( 'Sidebar', 'post type singular name', 'vuesource' ),
			'menu_name'          => _x( 'Sidebars', 'admin menu', 'vuesource' ),
			'name_admin_bar'     => _x( 'Sidebar', 'add new on admin bar', 'vuesource' ),
			'add_new'            => _x( 'Add New', 'sidebar', 'vuesource' ),
			'add_new_item'       => __( 'Add New Sidebar', 'vuesource' ),
			'new_item'           => __( 'New Sidebar', 'vuesource' ),
			'edit_item'          => __( 'Edit Sidebar', 'vuesource' ),
			'view_item'          => __( 'View Sidebar', 'vuesource' ),
			'all_items'          => __( 'All Sidebars', 'vuesource' ),
			'search_items'       => __( 'Search Sidebars', 'vuesource' ),
			'parent_item_colon'  => __( 'Parent Sidebars:', 'vuesource' ),
			'not_found'          => __( 'No sidebars found.', 'vuesource' ),
			'not_found_in_trash' => __( 'No sidebar found in Trash.', 'vuesource' )
		);

		$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Description.', 'vuesource' ),
			'public'             => true,
			'show_in_rest' 		 => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'          => 'dashicons-welcome-widgets-menus', //dashicons-align-left
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'sidebars' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt'),
			'taxonomies' 		 => array('category','post_tag'),
		);

		register_post_type( 'sidebar', $args );



		$labels = array(
			'name'               => _x( 'Content Blocks', 'post type general name', 'vuesource' ),
			'singular_name'      => _x( 'Content Block', 'post type singular name', 'vuesource' ),
			'menu_name'          => _x( 'Content Blocks', 'admin menu', 'vuesource' ),
			'name_admin_bar'     => _x( 'Content Block', 'add new on admin bar', 'vuesource' ),
			'add_new'            => _x( 'Add New', 'content block', 'vuesource' ),
			'add_new_item'       => __( 'Add New Content Block', 'vuesource' ),
			'new_item'           => __( 'New Content Block', 'vuesource' ),
			'edit_item'          => __( 'Edit Content Block', 'vuesource' ),
			'view_item'          => __( 'View Content Block', 'vuesource' ),
			'all_items'          => __( 'All Content Blocks', 'vuesource' ),
			'search_items'       => __( 'Search Content Blocks', 'vuesource' ),
			'parent_item_colon'  => __( 'Parent Content Blocks:', 'vuesource' ),
			'not_found'          => __( 'No Content Block found.', 'vuesource' ),
			'not_found_in_trash' => __( 'No Content Blocks found in Trash.', 'vuesource' )
		);

		$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Description.', 'vuesource' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'          => 'dashicons-media-code', //dashicons-align-left
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'content_block' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt'),
			'taxonomies' 		 => array('category','post_tag'),
		);

		register_post_type( 'content_block', $args );
	}







	// hook into the init action and call create_product_taxonomies when it fires
	add_action( 'init', 'create_product_taxonomies', 0 );

	// create taxonomy, types for the post type "product"
	function create_product_taxonomies() {
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x( 'Types', 'taxonomy general name', 'vuesource' ),
			'singular_name'     => _x( 'Type', 'taxonomy singular name', 'vuesource' ),
			'search_items'      => __( 'Search Types', 'vuesource' ),
			'all_items'         => __( 'All Types', 'vuesource' ),
			'parent_item'       => __( 'Parent Type', 'vuesource' ),
			'parent_item_colon' => __( 'Parent Type:', 'vuesource' ),
			'edit_item'         => __( 'Edit Type', 'vuesource' ),
			'update_item'       => __( 'Update Type', 'vuesource' ),
			'add_new_item'      => __( 'Add New Type', 'vuesource' ),
			'new_item_name'     => __( 'New Type Name', 'vuesource' ),
			'menu_name'         => __( 'Type', 'vuesource' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'type' ),
		);

		register_taxonomy( 'type', array( 'sidebar' ), $args );



		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x( 'Content Block Types', 'taxonomy general name', 'vuesource' ),
			'singular_name'     => _x( 'Content Block Type', 'taxonomy singular name', 'vuesource' ),
			'search_items'      => __( 'Search Content Block Types', 'vuesource' ),
			'all_items'         => __( 'All Content Block Types', 'vuesource' ),
			'parent_item'       => __( 'Parent Content Block Type', 'vuesource' ),
			'parent_item_colon' => __( 'Parent Content Block Type:', 'vuesource' ),
			'edit_item'         => __( 'Edit Content Block Type', 'vuesource' ),
			'update_item'       => __( 'Update Content Block Type', 'vuesource' ),
			'add_new_item'      => __( 'Add New Content Block Type', 'vuesource' ),
			'new_item_name'     => __( 'New Content Block Type Name', 'vuesource' ),
			'menu_name'         => __( 'Content Block Type', 'vuesource' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'content_block_type' ),
		);

		register_taxonomy( 'content_block_type', array( 'content_block' ), $args );

	}


/*******************************************/
/* TAXONOMY FILTER FOR CUSTOM POST TYPES  */
/*****************************************/

	/**
	 * Display a custom taxonomy dropdown in admin
	 * @author Mike Hemberger
	 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
	 */
	add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy');
	function tsm_filter_post_type_by_taxonomy() {
		global $typenow;
		$post_type = 'sidebar'; // change to your post type
		$taxonomy  = 'type'; // change to your taxonomy
		if ($typenow == $post_type) {
			$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
			$info_taxonomy = get_taxonomy($taxonomy);
			wp_dropdown_categories(array(
				'show_option_all' => __("Show All {$info_taxonomy->label}"),
				'taxonomy'        => $taxonomy,
				'name'            => $taxonomy,
				'orderby'         => 'name',
				'selected'        => $selected,
				'show_count'      => true,
				'hide_empty'      => true,
			));
		};
	}
	/**
	 * Filter posts by taxonomy in admin
	 * @author  Mike Hemberger
	 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
	 */
	add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
	function tsm_convert_id_to_term_in_query($query) {
		global $pagenow;
		$post_type = 'sidebar'; // change to your post type
		$taxonomy  = 'type'; // change to your taxonomy
		$q_vars    = &$query->query_vars;
		if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
			$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
			$q_vars[$taxonomy] = $term->slug;
		}
	}








	/**
	 * Display a custom taxonomy dropdown in admin
	 * @author Mike Hemberger
	 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
	 */
	add_action('restrict_manage_posts', 'tsm_filter_post_type_content_blocks');
	function tsm_filter_post_type_content_blocks() {
		global $typenow;
		$post_type = 'content_block'; // change to your post type
		$taxonomy  = 'type'; // change to your taxonomy
		if ($typenow == $post_type) {
			$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
			$info_taxonomy = get_taxonomy($taxonomy);
			wp_dropdown_categories(array(
				'show_option_all' => __("Show All {$info_taxonomy->label}"),
				'taxonomy'        => $taxonomy,
				'name'            => $taxonomy,
				'orderby'         => 'name',
				'selected'        => $selected,
				'show_count'      => true,
				'hide_empty'      => true,
			));
		};
	}
	/**
	 * Filter posts by taxonomy in admin
	 * @author  Mike Hemberger
	 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
	 */
	add_filter('parse_query', 'tsm_convert_id_to_term_in_query_content_blocks');
	function tsm_convert_id_to_term_in_query_content_blocks($query) {
		global $pagenow;
		$post_type = 'content_block'; // change to your post type
		$taxonomy  = 'type'; // change to your taxonomy
		$q_vars    = &$query->query_vars;
		if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
			$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
			$q_vars[$taxonomy] = $term->slug;
		}
	}




/****************************************/
/* TAXONOMY FOR PAGES 					*/
/****************************************/

	// Add custom taxonomy to pages
	//hook into the init action and call create_sidebar_taxonomies when it fires
	add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );

	//create a custom taxonomy name it topics for your posts
	function create_topics_hierarchical_taxonomy() {
		// Add new taxonomy, make it hierarchical like categories
		$labels = array(
			'name' 				=> _x( 'Topics', 'taxonomy general name', 'vuesource' ),
			'singular_name' 	=> _x( 'Topic', 'taxonomy singular name', 'vuesource' ),
			'search_items' 		=> __( 'Search Topics', 'vuesource' ),
			'all_items' 		=> __( 'All Topics', 'vuesource' ),
			'parent_item' 		=> __( 'Parent Topic', 'vuesource' ),
			'parent_item_colon'	=> __( 'Parent Topic:', 'vuesource' ),
			'edit_item' 		=> __( 'Edit Topic', 'vuesource' ),
			'update_item' 		=> __( 'Update Topic', 'vuesource' ),
			'add_new_item' 		=> __( 'Add New Topic', 'vuesource' ),
			'new_item_name' 	=> __( 'New Topic Name', 'vuesource' ),
			'menu_name' 		=> __( 'Topics', 'vuesource' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'topic' ),
		);

		register_taxonomy( 'topics', array( 'page' ), $args );

	}


/****************************************/
/* TAXONOMY FILTER FOR PAGES 			*/
/****************************************/

	/**
	 * Display a custom taxonomy dropdown in admin
	 * @author Mike Hemberger
	 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
	 */
	add_action('restrict_manage_posts', 'tsm_filter_page_type_by_taxonomy');
	function tsm_filter_page_type_by_taxonomy() {
		global $typenow;
		$post_type = 'page'; // change to your post type
		$taxonomy  = 'topics'; // change to your taxonomy
		if ($typenow == $post_type) {
			$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
			$info_taxonomy = get_taxonomy($taxonomy);
			wp_dropdown_categories(array(
				'show_option_all' => __("Show All {$info_taxonomy->label}"),
				'taxonomy'        => $taxonomy,
				'name'            => $taxonomy,
				'orderby'         => 'name',
				'selected'        => $selected,
				'show_count'      => true,
				'hide_empty'      => true,
			));
		};
	}
	/**
	 * Filter posts by taxonomy in admin
	 * @author  Mike Hemberger
	 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
	 */
	add_filter('parse_query', 'tsm_convert_id_to_tax_in_query');
	function tsm_convert_id_to_tax_in_query($query) {
		global $pagenow;
		$post_type = 'page'; // change to your post type
		$taxonomy  = 'topics'; // change to your taxonomy
		$q_vars    = &$query->query_vars;
		if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
			$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
			$q_vars[$taxonomy] = $term->slug;
		}
	}



?>