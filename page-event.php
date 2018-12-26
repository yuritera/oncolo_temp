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
<?php
  endwhile;
  endif;
  echo '<main class="content_main">';
  echo '<div class="entry-content">';
?>
  <ul class="single-tab-menu">
    <li><a href="/event2018">全国イベント情報</a></li>
    <li class="select"><a href="/event">イベント記事</a></li>
    <li><a href="/conference">学会スケジュール</a></li>
	</ul>
<?php
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  $args=array(
    'cat' => 173,
    'posts_per_page'=> 10,
    'paged' => $paged
  );
  $wp_query = new WP_Query( $args );
  get_template_part('temp/post_list3_b');
  echo '</div>';
  echo '</main>';
?>
</article>
</div><!--/innner-->
</div><!--/wrap-->
<?php get_footer(); ?>
