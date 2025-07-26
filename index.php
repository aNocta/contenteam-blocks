<?php
// Plugin Name: Contenteam блоки

define("CONTENTEAM_BLOCKS_URL", plugin_dir_url( __FILE__ ));
add_action("wp_enqueue_scripts", "include_blocks_assets");
function include_blocks_assets(){
	wp_enqueue_style("contenteam-blocks",  plugin_dir_url( __FILE__ )."assets/css/style.css");
	wp_enqueue_script("contenteam-blocks",  plugin_dir_url( __FILE__ )."assets/js/main.js", [], false, true);
}
add_action("after_setup_theme", "blocks_add_image_size");
function blocks_add_image_size(){
	add_image_size("case_desktop", 600, 300);
	add_image_size("member_small", 120, 120);
	add_image_size("member_full", 500, 500);
}

add_action("acf/init", "hero_main_block");
function hero_main_block(){
	acf_register_block_type([
		"name" => "hero_main",
		"title" => "Хиро блок главной",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/hero_main.php"
	]);
}

add_action("acf/init", "rating_block");
function rating_block(){
	acf_register_block_type([
		"name" => "rating_block",
		"title" => "Блок рейтинга",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/rating.php"
	]);
}

add_action("acf/init", "cases_block");
function cases_block(){
	acf_register_block_type([
		"name" => "cases_block",
		"title" => "Кейсы",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/cases.php"
	]);
}

add_action("acf/init", "advantages_block");
function advantages_block(){
	acf_register_block_type([
		"name" => "advantages_block",
		"title" => "Преимущества",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/advantages.php"
	]);
}

add_action("acf/init", "team_block");
function team_block(){
	acf_register_block_type([
		"name" => "team_block",
		"title" => "Команда",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/team.php"
	]);
}