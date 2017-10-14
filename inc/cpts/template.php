<?php

namespace <basename>\cpts;

class <Class Name>
{
	/**
	 * Personal constructor.
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'create_cpt_<CPT-name>' ), 10 );

		add_filter( 'enter_title_here', array( $this, 'change_title_placeholder' ) );

		add_filter( 'post_updated_messages', array($this, 'updated_messages_cb' ) );

		register_activation_hook( <constant FILE>, array( $this, 'assign_roles' ) );

	}

	/**
	 *  Change the Post Title placeholder
	 *  @param $title
	 *
	 *  @return string
	 */
	public function change_title_placeholder( $title ) {
		$screen = get_current_screen();

		if  ( '<CPT-name>' == $screen->post_type )
			$title = __('<Title placeholder>', <constant-domainname> );


		return $title;
	}



	/**
	 * This function creates the CPT <CPT-name>
	 */
	public function create_cpt_<CPT-name>() {

		$labels = array(
		    'name'                  => _x( 'name', 'Post Type General Name', <constant-domainname> ),
		    'singular_name'         => _x( 'name', 'Post Type Singular Name', <constant-domainname> ),
		    'menu_name'             => __( 'name', <constant-domainname> ),
		    'name_admin_bar'        => __( 'name', <constant-domainname> ),
		    'archives'              => __( 'name', <constant-domainname> ),
		    'attributes'            => __( 'Item Attributes', <constant-domainname> ),
		    'parent_item_colon'     => __( 'Parent Item:', <constant-domainname> ),
		    'all_items'             => __( 'All Items', <constant-domainname> ),
		    'add_new_item'          => __( 'Add New Item', <constant-domainname> ),
		    'add_new'               => __( 'Add New', <constant-domainname> ),
		    'new_item'              => __( 'New Item', <constant-domainname> ),
		    'edit_item'             => __( 'Edit Item', <constant-domainname> ),
		    'update_item'           => __( 'Update Item', <constant-domainname> ),
		    'view_item'             => __( 'View Item', <constant-domainname> ),
		    'view_items'            => __( 'View Items', <constant-domainname> ),
		    'search_items'          => __( 'Search Item', <constant-domainname> ),
		    'not_found'             => __( 'Not found', <constant-domainname> ),
		    'not_found_in_trash'    => __( 'Not found in Trash', <constant-domainname> ),
		    'featured_image'        => __( 'Featured Image', <constant-domainname> ),
		    'set_featured_image'    => __( 'Set featured image', <constant-domainname> ),
		    'remove_featured_image' => __( 'Remove featured image', <constant-domainname> ),
		    'use_featured_image'    => __( 'Use as featured image', <constant-domainname> ),
		    'insert_into_item'      => __( 'Insert into item', <constant-domainname> ),
		    'uploaded_to_this_item' => __( 'Uploaded to this item', <constant-domainname> ),
		    'items_list'            => __( 'Items list', <constant-domainname> ),
		    'items_list_navigation' => __( 'Items list navigation', <constant-domainname> ),
		    'filter_items_list'     => __( 'Filter items list', <constant-domainname> ),
		);
		$rewrite = array(
		    'slug'                  => '<slug>',
		    'with_front'            => true,
		    'pages'                 => true,
		    'feeds'                 => true,
		);
		$capabilities = array(
		    'edit_post'             => 'edit_<CPT-slug>',
		  	'edit_posts'            => 'edit_<CPT-slug>',
		    'edit_others_posts'     => 'edit_others_<CPT-slug>',
		    'read_post'             => 'read_<CPT-slug>',
		    'delete_post'           => 'delete_<CPT-slug>',
		    'delete_posts'          => 'delete_<CPT-slug>',
		    'publish_posts'         => 'publish_<CPT-slug>',
		    'read_private_posts'    => 'read_private_<CPT-slug>',
		);
		$args = array(
		    'label'                 => __( 'name', <constant-domainname> ),
		    'description'           => __( 'description', <constant-domainname> ),
		    'labels'                => $labels,
		    'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', ),
		    'taxonomies'            => array( '<taxonomy>' ),
		    'hierarchical'          => false,
		    'public'                => true,
		    'show_ui'               => true,
		    'show_in_menu'          => true,
		    'menu_position'         => 5,
		    'menu_icon'             => 'dashicons-welcome-learn-more',
		    'show_in_admin_bar'     => true,
		    'show_in_nav_menus'     => true,
		    'can_export'            => true,
		    'has_archive'           => true,
		    'exclude_from_search'   => false,
		    'publicly_queryable'    => true,
		    'rewrite'               => $rewrite,
		    'capabilities'          => $capabilities,
		);
		register_post_type( '<CPT-name>', $args );


	}



	/**
	 * Assign the new CPT roles to the administrator
	 */
	public function assign_roles() {

		$role = get_role('administrator');
		$role->add_cap('edit_<cpt-slug>');
		$role->add_cap('edit_<cpt-slug>');
		$role->add_cap('edit_others_<cpt-slug>s');
		$role->add_cap('read_<cpt-slug>');
		$role->add_cap('delete_<cpt-slug>s');
		$role->add_cap('delete_<cpt-slug>s');
		$role->add_cap('publish_<cpt-slug>s');
		$role->add_cap('read_private_<cpt-slug>s');

	}



	/**
	 * Customized messages for Sponsor Custom Post Type
	 *
	 * @param   array $messages Default messages.
	 * @return  array 			Returns an array with the new messages
	 */
	public function updated_messages_cb( $messages ) {

		$messages['<CPT Name>'] = array(
			0  => '', // Unused. Messages start at index 1.
			1 => __( 'Xxx actualizado.', <constant-domainname> ),
			4 => __( 'Xxx actualizado.', <constant-domainname> ),
			/* translators: %s: date and time of the revision */
			5 => isset( $_GET['revision']) ? sprintf( __( 'Xxx recuperado de la revisión %s.', <constant-domainname> ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => __( 'Xxx publicado.', <constant-domainname> ),
			7 => __( 'Xxx guardado.', <constant-domainname> ),
			9 => __('Xxx programador', <constant-domainname> ),
			10 => __( 'Borrador de xxx actualizado.', <constant-domainname> ),
		);

		return $messages;
	}

}
$<variable> = new <Class Name>();