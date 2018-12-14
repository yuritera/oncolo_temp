<?php
/*---------
ダッシュボード用
--------------------------------*/
//ダッシュボードウィジェットを削除します。
function remove_dashboard_widget() {
 	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); // アクティビティ
 	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); // クイックドラフト
 	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); // WordPressニュース
}
add_action('wp_dashboard_setup', 'remove_dashboard_widget' );


/*---------
投稿・コンテンツ入力画面用
--------------------------------*/
//管理画面css
function custom_enqueue($hook) {
  global $post;
  wp_enqueue_style('custom_css', get_template_directory_uri() . '/admin.css');
}
add_action('admin_enqueue_scripts', 'custom_enqueue');
//画像相対パス設定
function my_remove_img_attr($html, $id, $alt, $title, $align, $size){
    $html = preg_replace('/ title=".+"/', '', $html);
    $html = str_replace(' />','>',$html);
    $domein_url = site_url();
    $html = str_replace($domein_url,'',$html);
    return $html;
}
add_action( 'get_image_tag', 'my_remove_img_attr', 1 ,6);

//アイキャッチサムネイル
add_theme_support('post-thumbnails');

// // オートフォーマット関連の無効化
// add_action('init', function() {
// 	remove_filter('the_title', 'wptexturize');
// 	remove_filter('the_content', 'wptexturize');
// 	remove_filter('the_excerpt', 'wptexturize');
// 	remove_filter('the_title', 'wpautop');
// 	remove_filter('the_content', 'wpautop');
// 	remove_filter('the_excerpt', 'wpautop');
// 	remove_filter('the_editor_content', 'wp_richedit_pre');
//     remove_filter('the_content', 'convert_chars');
//     remove_filter('the_title'  , 'convert_chars');
//     remove_filter('the_excerpt', 'convert_chars');
// });
function remove_p_on_images($content){
    return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}
add_filter('the_content', 'remove_p_on_images');

function override_mce_options( $init_array ) {
    $init_array['indent']  = true;
    $init_array['wpautop'] = false;
    $init_array['forced_root_block'] = false;
    $init_array['valid_children'] = '+body[script],+body[style],+div[div|span],+span[span]';
    $init_array['valid_elements']          = '*[*]';
    $init_array['extended_valid_elements'] = '*[*]';
    $init_array['force_p_newlines']        = false;
    return $init_array;
}

add_filter( 'tiny_mce_before_init', 'override_mce_options' );

//管理画面にjquery
function my_jquery($hook) {
  global $post;
   if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
    if ( 'post' === $post->post_type ) {
        wp_enqueue_script('custom_admin_script', get_bloginfo('template_url').'/js/jquery_admin.js', array('jquery'),'',true);
    }
   }
}
add_action('admin_enqueue_scripts', 'my_jquery');
?>
