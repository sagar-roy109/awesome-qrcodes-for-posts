<?php
/*
 * Plugin Name:       Awesome QR Codes For Posts
 * Plugin URI:        https://devellix.com
 * Description:       Awesome QR Codes for posts plugin will help you to show QR codes inside your post single page.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Sagar Roy
 * Author URI:        https://devellix.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       aws-post-qrcodes
 * Domain Path:       /languages
 */


 class AWS_QR_Codes_For_Posts{

	function __construct(){

		add_action('init', array($this, 'aws_qr_filters'));

	}

	function aws_qr_filters(){
		add_filter('the_content', array($this, 'add_qr_in_post'));
	}

	function add_qr_in_post($content){

		if(!is_single()){
			return $content;
		}

		$post_url = esc_url(get_the_permalink());
		$qr_output = "<div style='border: 1px solid #000; padding: 10px; border-radius: 5px;'>";
		$qr_output .= __("<h5>Share post using QR Code </h5>",'aws-post-qrcodes');
		$qr_output .= "<p> <img src='https://api.qrserver.com/v1/create-qr-code/?size=250x250&data={$post_url}'/> </p> ";
		$qr_output .= "</div>";

		return $content . $qr_output;

	}

 }

 new AWS_QR_Codes_For_Posts;
