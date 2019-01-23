<?php get_header(); ?>
<div class="ly_wrap">
<div class="ly_inner">
<?php get_template_part('temp/bread'); ?>
<article class="content">
<header id="contentHead" class="content_head">
  <h1 class="ttl_blblue"><?php single_cat_title(); ?></h1>
</header>
<?php
if(is_category()){
  $term_query = get_term(get_query_var('cat'),'category');
}elseif(is_tag()){
  $term_query = get_term(get_query_var('tag_id'),'post_tag');
}
if(
  (isset($term_query -> slug) && $term_query -> slug == "news") ||
  (isset($term_query -> slug) && $term_query -> slug == "pick-up")||
  (isset($term_query -> slug) && $term_query -> slug == "feature")||
  (isset($term_query -> slug) && $term_query -> slug == "reserch")
) :
?>
  <nav class="news_navi">
    <ul class="news_navi_list">
      <li class="news_navi_item <?php if($term_query -> slug == "news" ){echo 'active';} ?>"><a href="/category/news">オリジナル</a></li>
      <li class="news_navi_item <?php if($term_query -> slug == "pick-up" ){echo 'active';} ?>"><a href="/category/pick-up">ピックアップ</a></li>
      <li class="news_navi_item <?php if($term_query -> slug == "feature" ){echo 'active';} ?>"><a href="/category/feature">特集</a></li>
      <li class="news_navi_item <?php if($term_query -> slug == "reserch" ){echo 'active';} ?>"><a href="/category/reserch">リサーチ</a></li>
    </ul>
  </nav>
<?php
endif; // news_navi
get_template_part('temp/post_list3_b');
?>
</article>
</div><!--/innner-->
</div><!--/wrap-->
<?php get_footer(); ?>
