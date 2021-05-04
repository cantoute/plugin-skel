<?php
/*
Plugin Name: Plugin skeleton
Plugin URI: https://github.com/cantoute/plugin-skel
Description: adds [my_shortcode] and [my_btn]
Author: Antony GIBBS <antony@cantoute.com>
Version: 0.0.1
Author URI: https://cantoute.com/
*/

defined('ABSPATH') or die('No script kiddies please!');


function add_plugin_skel_scripts()
{
	// load css/js from plugin dir
	wp_enqueue_style('plugin_skel', plugin_dir_url(__FILE__) . 'plugin-skel.css', array(), '0.1', 'all');
	wp_enqueue_script('plugin_skel', plugin_dir_url(__FILE__) . 'plugin-skel.js', array('jquery'), '0.1', true);
}
add_action('wp_enqueue_scripts', 'add_plugin_skel_scripts');


function my_shortcode_func($atts)
{
	$a = shortcode_atts(
		array(
			'attr1' => 'attr1 default value',
			'attr2' => 'attr2 default value',
		),
		$atts
	);

	$html = '<div>'
		. 'You called my_shortcode with'
		. ' attr1="' . htmlspecialchars($a['attr1']) . '"'
		. ' and attr2="' . htmlspecialchars($a['attr2']) . '"'
		. '</div>';

	return $html;
}
add_shortcode('my_shortcode', 'my_shortcode_func');


function my_btn_func($atts)
{
	$a = shortcode_atts(
		array(
			'txt' => 'Button',
			'color' => 'white',
			'bg-color' => 'blue',
		),
		$atts
	);

	$style = 'background-color:' . $a['bg-color'] . ';';
	$style .= 'color:' . $a['color'] . ';';
	// $style .= 'border-radius:1em;'; // done in plugin-skel.css

	$btn = '<button style="' . $style . '" class="my_btn">'
		. htmlspecialchars($a['txt'])
		. '</button>';
	return $btn;
}
add_shortcode('my_btn', 'my_btn_func');
