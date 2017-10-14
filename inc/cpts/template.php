<?php

/*
[MODIFY] <project_name>
Set the project name to avoid classes colissions
*/
namespace <project_name>\cpts;

/*
[MODIFY] <classname>
Give the class a specific name. It could the same as the Custom Post Type
*/
class <classname>
{
	
	/*
	[MODIFY] Variables
	$cpt_name 		=> The Custom Post Type Name
	$singular_name 	=> The name in singular
	$plural_name 	=> The name in plural
	$supports 		=> Set the support for the Custom Post Type (Default title, editor and thumbnail)
	*/
	private $cpt_name 		= ""
	private $singular_name 	= "";
	private $plural_name 	= "";
	private $supports		= array( 'title', 'editor', 'thumbnail' )
	
	
	/**
	 * Constructor.
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'create_cpt_office' ), 10 );

		add_filter( 'enter_title_here', array( $this, 'change_title_placeholder' ) );

		add_filter( 'post_updated_messages', array($this, 'updated_messages_cb' ) );

		register_activation_hook( MGBPWPTHEME_FILE, array( $this, 'assign_roles' ) );

	}

	/**
	 *  Change the Post Title placeholder
	 *  @param $title
	 *
	 *  @return string
	 */
	public function change_title_placeholder( $title ) {
		$screen = get_current_screen();

		/*
		[MODIFY] <Set the Custom Post Type Name>
		*/
		if  ( '<Set the Custom Post Type Name>' == $screen->post_type )
			$title = __('Introduzca el nombre', MGBPWPTHEME_TEXTDOMAIN );


		return $title;
	}



	/**
	 * This function creates the CPT Office
	 */
	public function create_cpt_office() {

		$labels = array(
			'name'                  => _x( $plural_name, 'Post Type General Name', MGBPWPTHEME_TEXTDOMAIN ),
			'singular_name'         => _x( 'Oficina', 'Post Type Singular Name', MGBPWPTHEME_TEXTDOMAIN ),
			'menu_name'             => __( $plural_name, MGBPWPTHEME_TEXTDOMAIN ),
			'name_admin_bar'        => __( $plural_name, MGBPWPTHEME_TEXTDOMAIN ),
			'archives'              => __( $plural_name, MGBPWPTHEME_TEXTDOMAIN ),
			'all_items'             => __( 'Todas las ' . strtolower($plural_name), MGBPWPTHEME_TEXTDOMAIN ),
			'add_new_item'          => __( 'Agregar nueva ' . strtolower($singular_name), MGBPWPTHEME_TEXTDOMAIN ),
			'add_new'               => __( 'Agregar nueva', MGBPWPTHEME_TEXTDOMAIN ),
			'new_item'              => __( 'Nueva ' . strtolower($singular_name), MGBPWPTHEME_TEXTDOMAIN ),
			'edit_item'             => __( 'Editar ' . strtolower($singular_name), MGBPWPTHEME_TEXTDOMAIN ),
			'update_item'           => __( 'Actualizar ' . strtolower($singular_name), MGBPWPTHEME_TEXTDOMAIN ),
			'view_item'             => __( 'Ver ' . strtolower($singular_name), MGBPWPTHEME_TEXTDOMAIN ),
			'view_items'            => __( 'Ver ' . strtolower($plural_name), MGBPWPTHEME_TEXTDOMAIN ),
			'search_items'          => __( 'Buscar ' . strtolower($singular_name), MGBPWPTHEME_TEXTDOMAIN ),
			'not_found'             => __( 'No encontrado', MGBPWPTHEME_TEXTDOMAIN )
		);
		$rewrite = array(
			'slug'                  => strtolower($plural_name),
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$capabilities = array(
			'edit_post'             => 'edit_' . strtolower($singular_name),
			'edit_posts'            => 'edit_' . strtolower($singular_name),
			'edit_others_posts'     => 'edit_others_' . strtolower($plural_name),
			'read_post'             => 'read_' . strtolower($singular_name),
			'delete_post'           => 'delete_' . strtolower($plural_name),
			'delete_posts'          => 'delete_' . strtolower($plural_name),
			'publish_posts'         => 'publish_' . strtolower($plural_name),
			'read_private_posts'    => 'read_private_' . strtolower($plural_name),
		);
		$args = array(
			'label'                 => __( ucfirst($plural_name), MGBPWPTHEME_TEXTDOMAIN ),
			'labels'                => $labels,
			'supports'              => $supports,
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 10,
			'menu_icon'             => 'dashicons-location-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capabilities'          => $capabilities,
		);
		register_post_type( $cpt_name, $args );


	}


	/**
	 * Assign the new CPT roles to the administrator
	 */
	public function assign_roles() {

		$role = get_role('administrator');
		$role->add_cap('edit_office');
		$role->add_cap('edit_offices');
		$role->add_cap('edit_others_offices');
		$role->add_cap('read_office');
		$role->add_cap('delete_offices');
		$role->add_cap('publish_offices');
		$role->add_cap('read_private_offices');

	}




	/**
	 * Customized messages for Custom Post Type
	 *
	 * @param   array $messages Default messages.
	 * @return  array 			Returns an array with the new messages
	 */
	public function updated_messages_cb( $messages ) {

		$messages[$cpt_name] = array(
			0  => '', // Unused. Messages start at index 1.
			1 => __( ucfirst( $singular_name ) . ' actualizado.', MGBPWPTHEME_TEXTDOMAIN ),
			4 => __( ucfirst( $singular_name ) . ' actualizado.', MGBPWPTHEME_TEXTDOMAIN ),
			/* translators: %s: date and time of the revision */
			5 => isset( $_GET['revision']) ? sprintf( __( ucfirst( $singular_name ) . ' recuperado de la revisión %s.', MGBPWPTHEME_TEXTDOMAIN ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => __( ucfirst( $singular_name ) . ' publicado.', MGBPWPTHEME_TEXTDOMAIN ),
			7 => __( ucfirst( $singular_name ) . ' guardado.', MGBPWPTHEME_TEXTDOMAIN ),
			9 => __( ucfirst( $singular_name ) . ' programador', MGBPWPTHEME_TEXTDOMAIN ),
			10 => __( 'Borrador de ' . $strtolower( $singular_name ) . ' actualizado.', MGBPWPTHEME_TEXTDOMAIN ),
		);

		return $messages;
	}

}

/*
[MODIFY] <variable name>, <classname>
Set a name for the variable and set the Class name.
*/
$<variable name> = new <classname>();