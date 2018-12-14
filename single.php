<?php get_header(); ?>
<div class="ly_wrap">
<aside class="ly_inner">
<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>
<?php get_template_part('temp/bread'); ?>
<article class="content">
<header id="contentHead" class="content_head">
  <h1 class="ttl_blblue"><?php the_title(); ?></h1>
  <?php get_template_part('temp/post_meta'); ?>
</header>
<main class="content_main">
<?php
if(get_post_meta($post->ID,'single-visual',true) == 'アイキャッチ表示無し'){
}else{
  if(has_post_thumbnail()){
    echo '<aside class="content_eyecach">';
    the_post_thumbnail('large');
    echo '</aside>';
  }
}
$ad1 = get_post_meta($post->ID,'related-ad1',TRUE);
if (!empty($ad1) ){
  $args = array( 'include' =>  $ad1 );
  $ad1_post = get_posts($args);
  print_r($ad1_post);
}
  echo '<div class="ly_inner">';
  echo '<div class="entry-content">';
  the_content( __('...more &raquo;','mesocolumn') );
  echo '</div>';
  if(in_category(array(50,174,12,14,10))):
  $the_author_id = get_the_author_meta('ID')
  ?>
  <div class="content_author">
	<div class="content_author_icon"><?php echo get_avatar( $the_author_id, 100 ); ?></div>
	<div class="content_author_info">
		<h3><?php the_author_meta('display_name'); ?></h3>
		<p><?php the_author_meta('description'); ?></p>
		<a href="<?php echo get_author_posts_url( $the_author_id ); ?>">記事一覧を見る &#9654;</a>
	</div>
  </div>
  <?php
  endif;
  get_template_part('temp/post_meta_btm');
  related_posts();//関連記事
  get_template_part('temp/ranking');//ランキング
  echo '</div>';
  endwhile;
endif;
?>
</main>
</article>
</div><!--/innner-->
</div><!--/wrap-->
<?php get_footer(); ?>
