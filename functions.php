<?php
get_template_part('lib/init');//初期設定
get_template_part('lib/admin_func');//管理画面設定用
get_template_part('lib/custom_menu');//カスタムメニュー設定
get_template_part('lib/temp_func');//テンプレに関する関数（ショートコード・パラメータ）

//抜粋文字数
function custom_excerpt_length( $length ) {
return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more($more) {
return ' ... ';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*検索でカスタム投稿を除外*/
function search_exclude_custom_post_type( $query ) {
  if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
    $query->set( 'post_type', array( 'post', 'page' ) );
  }
}
add_filter( 'pre_get_posts', 'search_exclude_custom_post_type' );

add_filter('acf/settings/remove_wp_meta_box', '__return_false');
SCF::add_options_page( 'スライダー追加', 'スライダーオプション', 'manage_options', 'oncolo_slider_option' );

//object 
?>
