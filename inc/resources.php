<?php 

/**
 * Enqueue scripts and styles.
 */
function akazsu_scripts() {

	if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin())

		/* Fonts*/
		wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Yantramanav:300,400,700', false ); 

		/* style.min.css */	
		wp_enqueue_style( 'akazsu-style', get_template_directory_uri() . '/dist/css/style.min.css', false );


		/* Jquery */
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '2.2.4' , true );

		/*scripts.min.js*/
		wp_enqueue_script( 'akazsu-main-js', get_template_directory_uri() . '/dist/js/scripts.min.js', array(), '0.0.1' ,true );

}
add_action( 'wp_enqueue_scripts', 'akazsu_scripts' );



/* Conditionsl Scripts
***********************/

function akaZsu_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}


?>