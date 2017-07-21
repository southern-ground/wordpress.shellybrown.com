<?php 
/**
 * Load Google Front
 */
function newfashion_theme_slug_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lora = _x( 'on', 'Hind font: on or off', 'theme-slug' );
 
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'theme-slug' );
 
    if ( 'off' !== $lora || 'off' !== $open_sans ) {
        $font_families = array();
 
        if ( 'off' !== $lora ) {
            $font_families[] = 'Hind:400,300,500,600,700';
        }
 
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Playfair+Display:400,700,900,400italic,700italic,900italic';
        }
 
        $query_args = array(
            'family' => ( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 		
 		$protocol = is_ssl() ? 'https:' : 'http:';
        $fonts_url = add_query_arg( $query_args, $protocol .'//fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}



function newfashion_wpo_theme_google_fonts() {  
	$protocol = is_ssl() ? 'https:' : 'http:';
	wp_enqueue_style( 'newfahion-theme-slug-fonts', newfashion_theme_slug_fonts_url(), array(), null );
}
add_action('wp_enqueue_scripts', 'newfashion_wpo_theme_google_fonts');