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

// タクソノミー 'campaign_category' を登録する関数
function create_campaign_taxonomy()
{
    register_taxonomy(
        'campaign_category',
        'campaign',
        array(
            'labels' => array(
                'name' => __('Campaign Categories'),
                'singular_name' => __('Campaign Category'),
                'search_items' => __('Search Campaign Categories'),
                'all_items' => __('All Campaign Categories'),
                'parent_item' => __('Parent Campaign Category'),
                'parent_item_colon' => __('Parent Campaign Category:'),
                'edit_item' => __('Edit Campaign Category'),
                'update_item' => __('Update Campaign Category'),
                'add_new_item' => __('Add New Campaign Category'),
                'new_item_name' => __('New Campaign Category Name'),
                'menu_name' => __('キャンペーンカテゴリー')
            ),
            'rewrite' => array('slug' => 'campaign-category'),
            'hierarchical' => true,
            'show_in_nav_menus' => true,
            'show_ui' => true,
            'show_admin_column' => true
        )
    );
}
add_action('init', 'create_campaign_taxonomy');

// テーマの基本設定
function my_theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'my_theme_setup');

// キャンペーンアーカイブの表示件数を設定
function set_campaign_posts_per_page($query)
{
    if (!is_admin() && $query->is_main_query() && (is_post_type_archive('campaign') || is_tax('campaign_category'))) {
        $query->set('posts_per_page', 6);
    }
}
add_action('pre_get_posts', 'set_campaign_posts_per_page');

// Voice アーカイブの表示件数を設定
function set_voice_posts_per_page($query)
{
    if (!is_admin() && $query->is_main_query() && (is_post_type_archive('voice') || is_tax('voice_category'))) {
        $query->set('posts_per_page', 6);
    }
}
add_action('pre_get_posts', 'set_voice_posts_per_page');

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

// 記事の閲覧数を増加させる関数
function set_post_views($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// 記事が表示されたときに閲覧数を増加させる
function track_post_views($post_id)
{
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    set_post_views($post_id);
}
add_action('wp_head', 'track_post_views');

// カスタムフィールドを管理画面に表示しない
// function remove_post_views_column($columns)
// {
//     unset($columns['post_views']);
//     return $columns;
// }
// add_filter('manage_posts_columns', 'remove_post_views_column');

// Contact Form 7でのキャンペーン内容を、投稿ページタイトルから動的に取得
function campaign_titles_dropdown()
{
    $args = array(
        'post_type' => 'campaign',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );

    $posts = get_posts($args);
    if (empty($posts)) {
        return '<option value="">キャンペーンがありません</option>';
    }

    $options = '<option value="">キャンペーン内容を選択</option>';
    foreach ($posts as $post) {
        $options .= sprintf('<option value="%1$s">%1$s</option>', esc_html($post->post_title));
    }

    return $options;
}

add_shortcode('campaign_titles', 'campaign_titles_dropdown');

// JavaScriptをエンキュー
// function enqueue_custom_scripts()
// {
//     wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom-script.js', array('jquery'), '1.0.1', true);
//     wp_localize_script('custom-js', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
// }
// add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
function enqueue_custom_scripts()
{
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.1', true);
    wp_localize_script('custom-js', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// Ajaxハンドラの追加
function ajax_get_campaign_titles()
{
    echo do_shortcode('[campaign_titles]');
    wp_die();
}
add_action('wp_ajax_get_campaign_titles', 'ajax_get_campaign_titles');
add_action('wp_ajax_nopriv_get_campaign_titles', 'ajax_get_campaign_titles');



// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
    return false;
}

function my_theme_enqueue_styles()
{
    wp_enqueue_style('my-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'));
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

// 管理画面の『投稿』の名前を変更
function Change_menulabel()
{
    global $menu;
    global $submenu;
    $name = 'ブログ';
    $menu[5][0] = $name;
    $submenu['edit.php'][5][0] = $name . '一覧';
    $submenu['edit.php'][10][0] = '新しい' . $name;
}
function Change_objectlabel()
{
    global $wp_post_types;
    $name = 'ブログ';
    $labels = &$wp_post_types['post']->labels;
    $labels->name = $name;
    $labels->singular_name = $name;
    $labels->add_new = _x('追加', $name);
    $labels->add_new_item = $name . 'の新規追加';
    $labels->edit_item = $name . 'の編集';
    $labels->new_item = '新規' . $name;
    $labels->view_item = $name . 'を表示';
    $labels->search_items = $name . 'を検索';
    $labels->not_found = $name . 'が見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
add_action('init', 'Change_objectlabel');
add_action('admin_menu', 'Change_menulabel');
