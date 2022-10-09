<?php
/*******************************************
* css読み込み
*******************************************/
function add_my_styles() {
	wp_enqueue_style(
		'my-fa5',
		'//use.fontawesome.com/releases/v5.6.3/css/all.css',
		array(),
		'5.6.3'
	);
	wp_enqueue_style(
		'slick',
		get_theme_file_uri( 'common/slick/slick/slick.css' ),
		array()
	);
	wp_enqueue_style(
		'slick-theme',
		get_theme_file_uri( '/common/slick/slick/slick-theme.css' ),
		array()
	);
	wp_enqueue_style(
		'my-main-style',
		get_theme_file_uri( 'common/css/style.css' ),
		array(),
		filemtime( get_theme_file_path( 'common/css/style.css' ) )
	);
}
add_action( 'wp_enqueue_scripts', 'add_my_styles' );

/*******************************************
* js読み込み
*******************************************/
function add_my_scripts() {
	wp_deregister_script( 'jquery');//WordPress 本体の jQuery を登録解除
	wp_enqueue_script(
		'jquery',
		'//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
		array(),
		'3.3.1',
		true
	);
	wp_enqueue_script(
		'slick-script',
		get_theme_file_uri( 'common/slick/slick/slick.js' ),
		array( 'jquery' ),
		filemtime( get_theme_file_path( 'common/slick/slick/slick.js' ) ),
		true
	);
	wp_enqueue_script(
		'slick-min-script',
		get_theme_file_uri( 'common/slick/slick/slick.min.js' ),
		array( 'jquery' ),
		filemtime( get_theme_file_path( 'common/slick/slick/slick.min.js' ) ),
		true
	);
	wp_enqueue_script(
		'base-script',
		get_theme_file_uri( 'common/js/common.js' ),
		array( 'jquery' ),
		filemtime( get_theme_file_path( 'common/js/common.js' ) ),
		true
	);
}
add_action('wp_enqueue_scripts', 'add_my_scripts');

/*******************************************
* アイキャッチ有効
*******************************************/
add_theme_support('post-thumbnails');

/*******************************************
* デフォルトのブロックエディタcss有効
*******************************************/
add_action( 'after_setup_theme', 'nxw_setup_theme' );
function nxw_setup_theme() {
	add_theme_support( 'wp-block-styles' );
	//独自スタイルの適用
	add_theme_support( 'editor-styles' );
	add_editor_style( 'editor-style.css' );
}
//オリジナルcssの適用
function nendebcom_block_editor_styles() {
	wp_enqueue_style( 'nendebcom-block-editor-styles', get_theme_file_uri( '/css/editor-style-gutenberg.css' ), false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'nendebcom_block_editor_styles' );
//カスタム投稿estateでブロックエディタ無効
add_filter( 'use_block_editor_for_post', 'disable_block_editor_for_post', 10, 2 );
function disable_block_editor_for_post( $use_block_editor, $post ) {
	if ( $post->post_name === 'estate' ) return false;
	return $use_block_editor;
}

/*******************************************
* body_classにページスラッグ名を含ませた
*オリジナルのclassを追加&タブレットと
*スマホの場合のクラスも追加
*******************************************/
function pagename_class($classes = '') {
	if (is_page()) { //slugを追加
		$page = get_page(get_the_ID());
		$classes[] = $page->post_name . '-page';
	} elseif (is_category() || is_single()) { //slugを追加
		$category = get_the_category();
		$classes[] = $category[0]->slug . '-page';
	}
	if (wp_is_mobile()) {
		$classes[] .= 'mobile'; //mobileの場合classを追加
	}
	//$classes[] .= 'layer-page'; //その他必要なクラス名があれば追加
	return $classes;
}
add_filter('body_class','pagename_class');
add_filter( 'use_block_editor_for_post', function( $use_block_editor, $post ) {
	if ( 'estate' === $post->post_type ) {
		$use_block_editor = false;
	}
	return $use_block_editor;
}, 10, 2 );

/*******************************************
* 表示する件数
*******************************************/
function change_posts_per_page( $query ) {
	if ( '0' === $_GET['fe_form_no'] ) {
		$query->set( 'posts_per_page', -1 );
	}
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

/*******************************************
* basic認証
*******************************************/
function basic_auth($auth_list,$realm="Restricted Area",$failed_text="認証に失敗しました"){
	if (isset($_SERVER['PHP_AUTH_USER']) and isset($auth_list[$_SERVER['PHP_AUTH_USER']])){
		if ($auth_list[$_SERVER['PHP_AUTH_USER']] == $_SERVER['PHP_AUTH_PW']){
			return $_SERVER['PHP_AUTH_USER'];
		}
	}
	header('WWW-Authenticate: Basic realm="'.$realm.'"');
	header('HTTP/1.0 401 Unauthorized');
	header('Content-type: text/html; charset='.mb_internal_encoding());
	die($failed_text);
}
/*******************************************
* lazy blocks
*******************************************/
function my_custom_lazyblock_handlebars_helper ( $handlebars ) {
	$handlebars->registerHelper( 'nl2br', function( $val ) {
		return nl2br($val);
	});
}
add_action( 'lzb/handlebars/object', 'my_custom_lazyblock_handlebars_helper' );