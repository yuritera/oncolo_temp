<?php get_header(); ?>
<div class="ly_wrap">
<div class="ly_inner">
<?php get_template_part('temp/bread'); ?>
<article class="content">
<header id="contentHead" class="content_head">
  <h1 class="ttl_blblue"><?php single_cat_title(); ?></h1>
</header>
<?php
$cat_info = get_category($cat);
if(
  $cat_info -> slug == "news" ||
  $cat_info -> slug == "pick-up" ||
  $cat_info -> slug == "feature" ||
  $cat_info -> slug == "reserch"
) :
?>
  <nav class="news_navi">
    <ul class="news_navi_list">
      <li class="news_navi_item <?php if($cat_info -> slug == "news" ){echo 'active';} ?>"><a href="/category/news">オリジナル</a></li>
      <li class="news_navi_item <?php if($cat_info -> slug == "pick-up" ){echo 'active';} ?>"><a href="/category/pick-up">ピックアップ</a></li>
      <li class="news_navi_item <?php if($cat_info -> slug == "feature" ){echo 'active';} ?>"><a href="/category/feature">特集</a></li>
      <li class="news_navi_item <?php if($cat_info -> slug == "reserch" ){echo 'active';} ?>"><a href="/category/reserch">リサーチ</a></li>
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
