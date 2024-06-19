<?php

// テーマの設定を行う関数
function my_setup()
{
    // アイキャッチ画像のサポートを有効化
    add_theme_support('post-thumbnails');
    // 自動フィードリンクを有効化
    add_theme_support('automatic-feed-links');
    // タイトルタグのサポートを有効化
    add_theme_support('title-tag');
    // HTML5のフォームやコメントなどのサポートを有効化
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);
}

// テーマがセットアップされた後に実行されるアクションフックに関数を追加
add_action('after_setup_theme', 'my_setup');

// スクリプトの読み込みを行う関数
function my_script_init()
{
    // WordPressに登録されているjQueryを解除します
    wp_deregister_script('jquery');

    // jQueryを新しいバージョンで再登録し、読み込みます
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js', [], '3.6.4', true);

    // SwiperのCSSファイルを読み込みます
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', [], '8.0.0');

    // メインのCSSファイルを読み込みます
    wp_enqueue_style('style-css', get_template_directory_uri() . '/assets/css/style.css', [], '1.0.1');


    // jQuery InViewプラグインを読み込みます
    wp_enqueue_script('jquery-inview', get_template_directory_uri() . '/assets/js/jquery.inview.min.js', ['jquery'], '1.0.1', true);

    // メインのJavaScriptファイルを読み込みます。jQueryに依存します
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/script.js', ['jquery'], '1.0.1', true);

    // SwiperのJavaScriptファイルを読み込みます
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', [], '8.0.0', true);

    // Google Fontsを読み込みます
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@300;400;500;700&family=Noto+Serif+JP&display=swap', [], null);

    // Preconnectを追加します
    add_action('wp_head', 'add_preconnect');
    function add_preconnect()
    {
        echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    }

    // デバッグ用関数をフッターに表示
    add_action('wp_footer', 'debug_bcn_display');
    function debug_bcn_display()
    {
        // bcn_display関数が存在しない場合、赤いメッセージを表示
        if (!function_exists('bcn_display')) {
            echo '<p style="color: red;">bcn_display関数が見つかりません。プラグインが有効化されているか確認してください。</p>';
        }
    }
}

// 'wp_enqueue_scripts'アクションフックに'my_script_init'関数を追加します
add_action('wp_enqueue_scripts', 'my_script_init');

// カスタム投稿タイプ 'voice' を登録する関数
function custom_post_type()
{
    // お客様の声カスタム投稿タイプ
    register_post_type(
        'voice',
        array(
            'labels' => array(
                'name' => __('お客様の声'),
                'singular_name' => __('お客様の声')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'voice'),
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'taxonomies' => array('category'), // カテゴリーをサポート
        )
    );
}
add_action('init', 'custom_post_type');

// カスタムタクソノミー 'voice_category'
function create_voice_taxonomy()
{
    register_taxonomy(
        'voice_category',
        'voice',
        array(
            'label' => __('Voice Categories'),
            'rewrite' => array('slug' => 'voice-category'),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'create_voice_taxonomy');

// // 投稿にアイキャッチ追加
// function setup_theme() {
//     add_theme_support('post-thumbnails');
//     add_image_size('custom-thumbnail', 300, 200, true); // 一覧ページ用のアスペクト比3:2
//     add_image_size('single-thumbnail', 700, 468, true); // 詳細ページ用のアスペクト比3:2
// }
// add_action('after_setup_theme', 'setup_theme');

/* サムネイルのサイズ出力を消す */
add_filter('post_thumbnail_html', 'custom_attribute');
function custom_attribute($html)
{
    // width と height を削除する
    $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
    return $html;
}


// サイドバー表示
function theme_slug_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Blog Sidebar', 'theme-slug'),
        'id'            => 'sidebar-1',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'theme-slug'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'theme_slug_widgets_init');

//カテゴリーの選択を1つに制限
add_action( 'admin_print_footer_scripts', 'limit_category_select' );
function limit_category_select() {
	?>
	<script type="text/javascript">
		jQuery(function($) {
			// 投稿画面のカテゴリー選択を制限
			var categorydiv = $( '#categorydiv input[type=checkbox]' );
			categorydiv.click( function() {
				$(this).parents( '#categorydiv' ).find( 'input[type=checkbox]' ).attr('checked', false);
				$(this).attr( 'checked', true );
			});
			// クイック編集のカテゴリー選択を制限
			var inline_edit_col_center = $( '.inline-edit-col-center input[type=checkbox]' );
			inline_edit_col_center.click( function() {
				$(this).parents( '.inline-edit-col-center' ).find( 'input[type=checkbox]' ).attr( 'checked', false );
				$(this).attr( 'checked', true );
			});

			$( '#categorydiv #category-pop > ul > li:first-child, #categorydiv #category-all > ul > li:first-child, .inline-edit-col-center > ul.category-checklist > li:first-child' ).before( '<p style="padding-top:5px;">カテゴリーは1つしか選択できません</p>' );

		});
	</script>
	<?php
}