<?php
/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Gorn
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */


require_once get_template_directory() . '/admin/tgmpa/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'gp_register_required_plugins' );

function gp_register_required_plugins() {

	$plugins = array(
 
 
	array(
			'name'      => 'Contact Form 7', // The plugin name.
			'slug'         => 'contact-form-7', // The plugin slug (typically the folder name).
			'required'  => false,
		),	
	array(
		'name'      => 'WP Lightbox 2', // The plugin name.
		'slug'         => 'wp-lightbox-2', // The plugin slug (typically the folder name).
		'required'  => false,
	),	
	array(
		'name'      => 'Real Custom Post Order', // The plugin name.
		'slug'         => 'real-custom-post-order', // The plugin slug (typically the folder name).
		'required'  => false,
	),	 
);

	$config = array(
		'id'           => 'gpress_tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


	);

	tgmpa( $plugins, $config );
}
