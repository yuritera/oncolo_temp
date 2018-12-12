<?php get_header(); ?>
<div class="ly_wrap">
<div class="ly_inner">
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
    echo '</div>';
  }
}
$ad1 = get_post_meta($post->ID,'related-ad1',TRUE);
if (!empty($ad1) ){
  $args = array( 'include' =>  $ad1 );
  $ad1_post = get_posts($args);
  print_r($ad1_post);
}
  the_content();
  get_template_part('temp/post_meta_btm');
  endwhile;
endif;
?>
</main>
</article>
</div><!--/innner-->
</div><!--/wrap-->
<?php get_footer(); ?>
