<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 12/10/13
 * Time: 12:52 AM
 */

namespace yt1300;


class mobile_sidebar {

    function __construct() {
        add_action( 'wp_enqueue_scripts', array($this, 'pageslide' ) );
        add_action( 'wp_footer', array($this, 'make_it_so') );
        add_action( 'widgets_init', array($this, 'mobile_widget_area'));
    }
    /**
     * Enqueue sidr CSS/JS
     *
     * @package yt1300
     * @since 0.2
     * @author Josh Pollock
     */
    function pageslide() {
        wp_enqueue_script( 'pagelslide', get_stylesheet_directory_uri().'/js/jquery.pageslide.min.js', array('jquery'), null, true );
        wp_enqueue_style( 'pageslide', get_stylesheet_directory_uri().'/css/jquery.pageslide.css');
    }

    /**
     * The script to output to footer if is_mobile to make this.
     *
     * @package yt1300
     * @since 0.2
     * @author Josh Pollock
     */
    function make_it_so() {
        echo '
            <script>
                jQuery(document).ready(function($) {
                    $(".second").pageslide({ direction: "left", modal: true });
                });
            </script>';

    }

    /**
     * Register a mobile sidebar
     *
     * @package yt1300
     * @since 0.2
     * @author Josh Pollock
     */
    function mobile_widget_area()  {
        register_sidebar( array(
            'name'          => __( 'Mobile Sidebar', 'yt1300' ),
            'id'            => 'sidebar-mobile',
            'description'   => __( 'Slideout sidebar for mobile devices.', 'yt1300' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
            ) );
    }
}

new mobile_sidebar();