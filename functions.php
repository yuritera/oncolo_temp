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

//リンクカード
function blogcardFunc($atts) {
    extract(shortcode_atts(array(
        'url' => '',
    ), $atts));
    $url = wp_make_link_relative($url);
    $blogcard_id = url_to_postid($url);
    //if(get_post_status( $blogcard_id  ) == 'publish' ){
    $blogcard_link =get_the_permalink( $blogcard_id);
    $blogcard_img = get_the_post_thumbnail($blogcard_id,'thumbnail');
    $blogcard_ttl = get_the_title($blogcard_id);
    $blogcard_txt = mb_strimwidth(get_post_field('post_content', $blogcard_id), 0, 240, "…", "UTF-8");
    $blogcard_txt = wp_strip_all_tags( $blogcard_txt );
    $blogcard = <<< CARD
    <aside class="blogcard">
      <a href="{$blogcard_link}">
        <figure>{$blogcard_img}</figure>
        <div class="blogcard_box">
          <p class="ttl">{$blogcard_ttl}</p>
          <p class="txt">{$blogcard_txt}</p>
        </div>
      </a>
    </aside>
CARD;
    //}else{
      //$blogcard;
    //}

    return $blogcard;
}
add_shortcode('blogcard', 'blogcardFunc');
?>
