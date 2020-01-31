//reference: https://nabtron.com/how-to-add-javascript-file-in-wordpress-shortcode/

function nabtron_jsshortcode( $atts ) {
    $atts = shortcode_atts(
        array(
            'path' => 'default-path.js',
        ), $atts, 'path' );

    return '<script type="text/javascript" src="'.$atts['path'].'"></script>';
}
add_shortcode( 'jsshortcode', 'nabtron_jsshortcode' );

// use by: 
// [jsshortcode path="https://example.com/complete-path.js"]
