<?php
// Plugin Name: Contenteam блоки

require_once plugin_dir_path(__FILE__)."/inc/cases/catalog.php";
require_once plugin_dir_path(__FILE__)."/inc/cases/single.php";

define("CONTENTEAM_BLOCKS_URL", plugin_dir_url( __FILE__ ));
define("CONTENTEAM_BLOCKS_PATH", plugin_dir_path( __FILE__ ));


add_action("wp_enqueue_scripts", "include_blocks_assets");
add_action( 'admin_enqueue_scripts', 'include_blocks_assets' );
function include_blocks_assets(){
	wp_enqueue_style("contenteam-blocks",  plugin_dir_url( __FILE__ )."assets/css/style.css");
	wp_enqueue_script("contenteam-blocks",  plugin_dir_url( __FILE__ )."assets/js/main.js", [], false, true);
	wp_localize_script("contenteam-blocks", "contenteam_blocks_meta", [
		"ajax" => admin_url("admin-ajax.php")
	]);
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
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/hero_main.php"
	]);
}

add_action("acf/init", "rating_block");
function rating_block(){
	acf_register_block_type([
		"name" => "rating_block",
		"title" => "Блок рейтинга",
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/rating.php"
	]);
}

add_action("acf/init", "cases_block");
function cases_block(){
	acf_register_block_type([
		"name" => "cases_block",
		"title" => "Кейсы",
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/cases.php"
	]);
}

add_action("acf/init", "advantages_block");
function advantages_block(){
	acf_register_block_type([
		"name" => "advantages_block",
		"title" => "Преимущества",
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/advantages.php"
	]);
}

add_action("acf/init", "team_block");
function team_block(){
	acf_register_block_type([
		"name" => "team_block",
		"title" => "Команда",
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/team.php"
	]);
}

add_action("acf/init", "posts_carosel_block");
function posts_carosel_block(){
	acf_register_block_type([
		"name" => "posts_carosel_block",
		"title" => "Слайдер постов",
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/post_carousel.php"
	]);
}


add_action("acf/init", "footer_block");
function footer_block(){
	acf_register_block_type([
		"name" => "footer_block",
		"title" => "Футер",
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/footer.php"
	]);
}

add_action("acf/init", "person_hero");
function person_hero(){
	acf_register_block_type([
		"name" => "person_hero",
		"title" => "Хироблок с изображением",
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/person_hero.php",
		"description" => "Хироблок с отдельным изображением",
		"icon" => '<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm64 80a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM272 224c8.4 0 16.1 4.4 20.5 11.5l88 144c4.5 7.4 4.7 16.7 .5 24.3S368.7 416 360 416L88 416c-8.9 0-17.2-5-21.3-12.9s-3.5-17.5 1.6-24.8l56-80c4.5-6.4 11.8-10.2 19.7-10.2s15.2 3.8 19.7 10.2l26.4 37.8 61.4-100.5c4.4-7.1 12.1-11.5 20.5-11.5z"/></svg>'
	]);
}

add_action("acf/init", "problems_block");
function problems_block(){
	acf_register_block_type([
		"name" => "problems_block",
		"title" => "Блок с проблемами",
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/problems.php",
		"description" => "Блок с проблемами (Знакомые проблемы?)",
		"icon" => '<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM231 231C240.4 221.6 255.6 221.6 264.9 231L319.9 286L374.9 231C384.3 221.6 399.5 221.6 408.8 231C418.1 240.4 418.2 255.6 408.8 264.9L353.8 319.9L408.8 374.9C418.2 384.3 418.2 399.5 408.8 408.8C399.4 418.1 384.2 418.2 374.9 408.8L319.9 353.8L264.9 408.8C255.5 418.2 240.3 418.2 231 408.8C221.7 399.4 221.6 384.2 231 374.9L286 319.9L231 264.9C221.6 255.5 221.6 240.3 231 231z"/></svg>'
	]);
}

add_action("acf/init", "advantages_with_icons_block");
function advantages_with_icons_block(){
	acf_register_block_type([
		"name" => "advantages_with_icons",
		"title" => "Блок преимуществ с иконками",
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/advantages_icons.php",
		"description" => "Блок преимуществ с иконками",
		"icon" => '<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M353.8 118.1L330.2 70.3C326.3 62 314.1 61.7 309.8 70.3L286.2 118.1L233.9 125.6C224.6 127 220.6 138.5 227.5 145.4L265.5 182.4L256.5 234.5C255.1 243.8 264.7 251 273.3 246.7L320.2 221.9L366.8 246.3C375.4 250.6 385.1 243.4 383.6 234.1L374.6 182L412.6 145.4C419.4 138.6 415.5 127.1 406.2 125.6L353.9 118.1zM288 320C261.5 320 240 341.5 240 368L240 528C240 554.5 261.5 576 288 576L352 576C378.5 576 400 554.5 400 528L400 368C400 341.5 378.5 320 352 320L288 320zM80 384C53.5 384 32 405.5 32 432L32 528C32 554.5 53.5 576 80 576L144 576C170.5 576 192 554.5 192 528L192 432C192 405.5 170.5 384 144 384L80 384zM448 496L448 528C448 554.5 469.5 576 496 576L560 576C586.5 576 608 554.5 608 528L608 496C608 469.5 586.5 448 560 448L496 448C469.5 448 448 469.5 448 496z"/></svg>'
	]);
}

add_action("acf/init", "what_includes_block");
function what_includes_block(){
	acf_register_block_type([
		"name" => "what_includes",
		"title" => "Блок \"Что входит в пакет?\"",
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/what_includes.php",
		"description" => "Блок с содержанием услуги",
		"icon" => '<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 160C96 124.7 124.7 96 160 96L480 96C515.3 96 544 124.7 544 160L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 160zM160 160L160 224L224 224L224 160L160 160zM480 160L288 160L288 224L480 224L480 160zM160 288L160 352L224 352L224 288L160 288zM480 288L288 288L288 352L480 352L480 288zM160 416L160 480L224 480L224 416L160 416zM480 416L288 416L288 480L480 480L480 416z"/></svg>'
	]);
}

add_action("acf/init", "results_block");
function results_block(){
	acf_register_block_type([
		"name" => "results_block",
		"title" => "Блок с результатами",
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/results.php",
		"description" => "Блок с результатами услуги",
		"icon" => '<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"/></svg>'
	]);
}

add_action("acf/init", "for_whom_block");
function for_whom_block(){
	acf_register_block_type([
		"name" => "for_whom_block",
		"title" => "Блок \"Для кого?\"",
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/for_whom.php",
		"description" => "Блок для кого-то",
		"icon" => '<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>'
	]);
}

add_action("acf/init", "steps_block");
function steps_block(){
	acf_register_block_type([
		"name" => "steps_block",
		"title" => "Блок \"Как мы работаем?\"",
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/steps.php",
		"description" => "Как мы работаем?",
		"icon" => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 100 100" aria-hidden="true" role="img" class="iconify iconify--gis" preserveAspectRatio="xMidYMid meet"><path d="M21 32C9.459 32 0 41.43 0 52.94c0 4.46 1.424 8.605 3.835 12.012l14.603 25.244c2.045 2.672 3.405 2.165 5.106-.14l16.106-27.41c.325-.59.58-1.216.803-1.856A20.668 20.668 0 0 0 42 52.94C42 41.43 32.544 32 21 32zm0 9.812c6.216 0 11.16 4.931 11.16 11.129c0 6.198-4.944 11.127-11.16 11.127c-6.215 0-11.16-4.93-11.16-11.127c0-6.198 4.945-11.129 11.16-11.129z" fill="#000000"/><path d="M87.75 0C81.018 0 75.5 5.501 75.5 12.216c0 2.601.83 5.019 2.237 7.006l8.519 14.726c1.193 1.558 1.986 1.262 2.978-.082l9.395-15.99c.19-.343.339-.708.468-1.082a12.05 12.05 0 0 0 .903-4.578C100 5.5 94.484 0 87.75 0zm0 5.724c3.626 0 6.51 2.876 6.51 6.492c0 3.615-2.884 6.49-6.51 6.49c-3.625 0-6.51-2.875-6.51-6.49c0-3.616 2.885-6.492 6.51-6.492z" fill="#000000"/><path d="M88.209 37.412c-2.247.05-4.5.145-6.757.312l.348 5.532a126.32 126.32 0 0 1 6.513-.303zm-11.975.82c-3.47.431-6.97 1.045-10.43 2.032l1.303 5.361c3.144-.896 6.402-1.475 9.711-1.886zM60.623 42.12a24.52 24.52 0 0 0-3.004 1.583l-.004.005l-.006.002c-1.375.866-2.824 1.965-4.007 3.562c-.857 1.157-1.558 2.62-1.722 4.35l5.095.565c.038-.406.246-.942.62-1.446h.002v-.002c.603-.816 1.507-1.557 2.582-2.235l.004-.002a19.64 19.64 0 0 1 2.388-1.256zM58 54.655l-3.303 4.235c.783.716 1.604 1.266 2.397 1.726l.01.005l.01.006c2.632 1.497 5.346 2.342 7.862 3.144l1.446-5.318c-2.515-.802-4.886-1.576-6.918-2.73c-.582-.338-1.092-.691-1.504-1.068zm13.335 5.294l-1.412 5.327l.668.208l.82.262c2.714.883 5.314 1.826 7.638 3.131l2.358-4.92c-2.81-1.579-5.727-2.611-8.538-3.525l-.008-.002l-.842-.269zm14.867 7.7l-3.623 3.92c.856.927 1.497 2.042 1.809 3.194l.002.006l.002.009c.372 1.345.373 2.927.082 4.525l5.024 1.072c.41-2.256.476-4.733-.198-7.178c-.587-2.162-1.707-4.04-3.098-5.548zM82.72 82.643a11.84 11.84 0 0 1-1.826 1.572h-.002c-1.8 1.266-3.888 2.22-6.106 3.04l1.654 5.244c2.426-.897 4.917-1.997 7.245-3.635l.006-.005l.003-.002a16.95 16.95 0 0 0 2.639-2.287zm-12.64 6.089c-3.213.864-6.497 1.522-9.821 2.08l.784 5.479c3.421-.575 6.856-1.262 10.27-2.18zm-14.822 2.836c-3.346.457-6.71.83-10.084 1.148l.442 5.522c3.426-.322 6.858-.701 10.285-1.17zm-15.155 1.583c-3.381.268-6.77.486-10.162.67l.256 5.536c3.425-.185 6.853-.406 10.28-.678zm-15.259.92c-2.033.095-4.071.173-6.114.245l.168 5.541a560.1 560.1 0 0 0 6.166-.246z" fill="#000000" fill-rule="evenodd"/></svg>'
	]);
}

add_action("acf/init", "get_price_block");
function get_price_block(){
	acf_register_block_type([
		"name" => "get_price",
		"title" => "Узнать стоимость",
		"category" => "contenteam",
		"render_template" => plugin_dir_path( __FILE__ )."inc/blocks/get_price.php",
		"description" => "Блок с кнопкой \"Узнать стоимость\"",
		"icon" => '<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M208 96C190.3 96 176 110.3 176 128L176 336L136 336C122.7 336 112 346.7 112 360C112 373.3 122.7 384 136 384L176 384L176 432L136 432C122.7 432 112 442.7 112 456C112 469.3 122.7 480 136 480L176 480L176 512C176 529.7 190.3 544 208 544C225.7 544 240 529.7 240 512L240 480L392 480C405.3 480 416 469.3 416 456C416 442.7 405.3 432 392 432L240 432L240 384L352 384C431.5 384 496 319.5 496 240C496 160.5 431.5 96 352 96L208 96zM352 320L240 320L240 160L352 160C396.2 160 432 195.8 432 240C432 284.2 396.2 320 352 320z"/></svg>'
	]);
}
add_filter('wpcf7_autop_or_not', '__return_false');

add_shortcode("cases_catalog_test", function(){
	ob_start();
	do_action("case_catalog", "test-1");
	return ob_get_clean();
});

add_shortcode("cases_cover_test", function(){
	ob_start();
	do_action("case_cover");
	return ob_get_clean();
});

function contenteam_register_blocks_category(array $categories): array{
	return [
		[
			"slug" => "contenteam",
			"title" => "Контентим"
		],
		...$categories
	];
}
add_filter("block_categories_all", "contenteam_register_blocks_category");