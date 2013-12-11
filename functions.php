<?php
/**
 * Child theme function
 *
 * @package yt1300
 * @since 0.1
 * @author Josh Pollock http://JoshPress.net
 * @license GPLv2+
 */
    
/**
 * Add controls/ settings for background colors
 *
 * @package yt1300
 * @since 0.1
 * @author Josh Pollock
 */
 function yt1300_bg_colors() {
     global $wp_customize;
     //add section
     $wp_customize->add_section( 'yt1300_gradient_bg', array(
         'title'          => __('Gradient Background Colors', 'yt1300'),
         'priority'       => 35,
     ) );
     //start color
     $wp_customize->add_setting( 'gradient_start', array(
         'default'        => '#000',
     ) );
     $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gradient_start', array(
         'label'   => __('Gradient Start Color', 'yt1300'),
         'section' => 'yt1300_gradient_bg',
         'settings'   => 'gradient_start',
     ) ) );
    //end color
     $wp_customize->add_setting( 'gradient_end', array(
         'default'        => '#F5F5F5',
     ) );

     $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gradient_end', array(
         'label'   => __('Gradient End Color', 'yt1300'),
         'section' => 'yt1300_gradient_bg',
         'settings'   => 'gradient_end',
     ) ) );
 }
add_action( 'customize_register', 'yt1300_bg_colors' );

/**
 * Add gradient background with colors set in bg_colors() as inline style in heades
 *
 * @package yt1300
 * @since 0.1
 * @author Josh Pollock
 */

function yt1300_falcon_style() {
    //get colors
    $start = get_theme_mod( 'gradient_start', '#000' );
    $end = get_theme_mod( 'gradient_end', '#F5F5F5');
    //set up custom style
    $custom_css = "
            .site:before, body{
                    background-image: -webkit-gradient(linear,left bottom,right bottom,color-stop(0,{$start}),color-stop(1,{$end}));
                    background-image: -o-linear-gradient(right,{$start} 0%,{$end} 100%);
                    background-image: -moz-linear-gradient(right,{$start} 0%,{$end} 100%);
                    background-image: -webkit-linear-gradient(right,{$start} 0%,{$end} 100%);
                    background-image: -ms-linear-gradient(right,{$start} 0%,{$end} 100%);
                    background-image: linear-gradient(to right,{$start} 0%,{$end} 100%);
            }";
    //print for header
    echo '<style>'.$custom_css.'</style>';
}
add_action( 'wp_head', 'yt1300_falcon_style' );

?>