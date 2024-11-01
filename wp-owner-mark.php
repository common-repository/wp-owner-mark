<?php
/*

**************************************************************************

Plugin Name:  WP Owner Mark
Plugin URI:   http://www.arefly.com/wordpress-comments-admin-mark/
Description:  Add Blog Owner Mark into your blog's comments.
Version:      1.0.7
Author:       Arefly
Author URI:   http://www.arefly.com/

**************************************************************************

	Copyright 2014  Arefly  (email : eflyjason@gmail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

**************************************************************************/

define("WP_OWNER_MARK_PLUGIN_URL", plugin_dir_url( __FILE__ ));
define("WP_OWNER_MARK_FULL_DIR", plugin_dir_path( __FILE__ ));
define("WP_OWNER_MARK_TEXT_DOMAIN", "wp-owner-mark");

/* Add CSS code */
function wp_owner_mark_enqueue_styles(){
	wp_enqueue_style(WP_OWNER_MARK_TEXT_DOMAIN, WP_OWNER_MARK_PLUGIN_URL.'style.min.css');
}
add_action('wp_enqueue_scripts', 'wp_owner_mark_enqueue_styles');

function wp_owner_mark($author_link){
	$comment = get_comment($comment_id);
	echo $author_link;
	if(user_can($comment->user_id, 'administrator')){
		?><a title="Blog Admin" class="admin_mark"></a><?php
	}
}
add_filter('get_comment_author_link', 'wp_owner_mark');
