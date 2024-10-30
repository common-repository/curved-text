<?php
/*
Plugin Name: Curved Text
Plugin URI: http://wordpress.org/plugins/curved-text/
Description: A very simple shortcode series to create a curved text in Wordpress using Arctext.js
Author: Raul Alvarez (Waracle)
Version: 0.1
Author URI: http://www.waracle.net
*/

class arcText
{
    public function __construct()
    {

        add_shortcode( 'arctext', array( $this, 'arctext_shortcode' ) );
        wp_register_script( 'arctext-js', ( plugins_url( 'js/jquery.arctext.js', __FILE__ ) ), array( 'jquery' ) );
        wp_register_script( 'arctext-js-custom', ( plugins_url( 'js/arctext-custom.js', __FILE__ ) ), array( 'jquery' ) );

    }

    function arctext_shortcode( $attributes )
    {
        $return = '';

        extract( shortcode_atts( array( 'title' => null, 'class' => null, 'radius' => null, 'dir' => null, 'rotate' => null, 'type' => null), $attributes ) );

        if ( ( ! is_null( $title ) ) && ( ! is_null( $type ) ) && ( ! is_null( $class ) ) && ( ! is_null( $radius ) ) && ( ctype_alnum( $class ) ) )
        {
            wp_enqueue_script( 'arctext-js' );
            wp_enqueue_script( 'arctext-js-custom' );
            $return .= '<' . $type . ' class="efect-arctext" id="' . $class . '" data-radius="' . $radius . '" data-dir="' . $dir . '" data-rotate="' . $rotate . '">' . $title . '</' . $type . '>';
        }

        return( $return );
    }

}

$arcText = new arcText();
?>