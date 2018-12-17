<?php
//日本語URL対応
add_filter('do_parse_request', function($bool, $obj, $extra_query_vars){
    $_SERVER['REQUEST_URI'] = strtolower($_SERVER['REQUEST_URI']);
    return $bool;
}, 10, 3);

//スマホ表示分岐
function is_mobile(){
    $useragents = array(
        'iPhone', // iPhone
        'iPod', // iPod touch
        'Android.*Mobile', // 1.5+ Android *** Only mobile
        'Windows.*Phone', // *** Windows Phone
        'dream', // Pre 1.5 Android
        'CUPCAKE', // 1.5+ Android
        'blackberry9500', // Storm
        'blackberry9530', // Storm
        'blackberry9520', // Storm v2
        'blackberry9550', // Storm v2
        'blackberry9800', // Torch
        'webOS', // Palm Pre Experimental
        'incognito', // Other iPhone browser
        'webmate' // Other iPhone browser
    );
    $pattern = '/'.implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

// remove WP version from RSS & CSS & JS
function cubic_rss_version() { return ''; }
add_filter( 'the_generator', 'cubic_rss_version' );
function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );

// loading modernizr and jquery, and reply script
function register_jquery() {
global $pagenow;
  if (!is_admin() && $pagenow !== 'wp-login.php') {
    $script_directory = get_template_directory_uri();
    wp_deregister_script('jquery'); // 同梱のJQueryを読み込ませない
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), NULL, true);
    wp_enqueue_script( 'jquery' );    //登録したJQueryをフックさせる
  }
}
add_action('init', 'register_jquery');

//URLに「/page/」があるかチェックしてあればリダイレクトさせない
add_filter('redirect_canonical','my_disable_redirect_canonical');
function my_disable_redirect_canonical( $redirect_url ) {
        $subject = $redirect_url;
        $pattern = '/\/page\//'; // URLに「/page/」があるかチェック
        preg_match($pattern, $subject, $matches);
        if ($matches){
        $redirect_url = false;
        return $redirect_url;
        }
}

//wp_head cleanup
function cubic_head_cleanup() {
  remove_action( 'wp_head', 'feed_links_extra', 3 );
  remove_action( 'wp_head', 'feed_links', 2 );
  remove_action( 'wp_head', 'rsd_link' );
  remove_action( 'wp_head', 'wlwmanifest_link' );
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
  remove_action( 'wp_head', 'wp_generator' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'wp_head', 'rel_canonical');
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
}
add_action( 'init', 'cubic_head_cleanup' );

//moreリンク
function custom_content_more_link( $output ) {
    $output = preg_replace('/#more-[\d]+/i', '', $output );
    return $output;
}
add_filter( 'the_content_more_link', 'custom_content_more_link' );

//セルフピンバック禁止
// function no_self_pingst( &$links ) {
//     $home = home_url();
//     foreach ( $links as $l => $link )
//         if ( 0 === strpos( $link, $home ) )
//             unset($links[$l]);
// }
// add_action( 'pre_ping', 'no_self_pingst' );

//iframeのレスポンシブ対応
function wrap_iframe_in_div($the_content) {
  if ( is_singular() ) {
    $the_content = preg_replace('/< *?iframe/i', '<div class="youtube-container"><iframe', $the_content);
    $the_content = preg_replace('/<\/ *?iframe *?>/i', '</iframe></div>', $the_content);
  }
  return $the_content;
}
add_filter('the_content','wrap_iframe_in_div');

//更新日の追加
function get_mtime($format) {
    $mtime = get_the_modified_time('Ymd');
    $ptime = get_the_time('Ymd');
    if ($ptime > $mtime) {
        return get_the_time($format);
    } elseif ($ptime === $mtime) {
        return get_the_time($format);
    } else {
        return get_the_modified_time($format);
    }
}

//寄稿者でもメディアアップロード
    if (current_user_can('contributor') && !current_user_can('upload_files')) {
    add_action('admin_init', 'allow_contributor_uploads');
    }
    function allow_contributor_uploads() {
    $contributor = get_role('contributor');
    $contributor->add_cap('upload_files');
    }

//ページ分割
function custom_wp_link_pages() {
$defaults = array(
 'before' => '<div class="pagesprit">',
 'after' => '</div>',
 'link_before' => '<span>',
 'link_after' => '</span>',
 'next_or_number' => 'number',
 'separator' => ' ',
 'nextpagelink' => __( 'Next page' ),
 'previouspagelink' => __( 'Previous page' ),
 'pagelink' => '%',
 'echo' => 1
 );
 return $defaults;
}
add_filter( 'wp_link_pages_args', 'custom_wp_link_pages');
function no_pageing_hook( $post ) {
    global $pages, $multipage, $numpages;
    if(is_mobile()) {
        $multipage = 0;
        $content = str_replace("\n<!--nextpage-->\n", '<!--nextpage-->', $post->post_content);
        $content = str_replace("\n<!--nextpage-->", '<!--nextpage-->', $content);
        $content = str_replace("<!--nextpage-->\n", '<!--nextpage-->', $content);
        $pages = array( str_replace('<!--nextpage-->', '', $content) );
        $numpages = 1;
    }
}
add_action( 'the_post', 'no_pageing_hook' );
?>
