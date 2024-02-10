<?php
/**
 * File:		pro-login-page.php
 * Theme:		Flat Blocks PRO
 *
 * Changes the WordPress login page to use this site's site icon
 *
 * @package          flatblocks-pro
 */

/*
 * Redirect to this site's home page instead of WordPress.org
 */
add_filter( 'login_headerurl', 'fbp_login_headerurl' );

function fbp_login_headerurl( $url ) {
	return esc_url( home_url( '/' ) );
}

/*
 * Override WordPress.org logo to use this site's site icon, if there is one
 */
add_filter( 'login_headertext', 'fbp_login_headertitle' );

function fbp_login_headertitle( $title ) {
	return get_bloginfo ( 'name' ) . ' - ' . get_bloginfo ( 'description' );
}

/*
 * Override WordPress.org logo to use this site's site icon, if there is one
 */
add_action( 'login_enqueue_scripts', 'fbp_login_headerlogo' );

if ( has_site_icon() ) :
function fbp_login_headerlogo() { ?>
    <style type="text/css">
        .login h1 a,
        #login h1 a {
            background-image: url(<?php site_icon_url(); ?>);
            /*border-radius: 50%;*/
        }
    </style>
<?php 
}
endif; 
