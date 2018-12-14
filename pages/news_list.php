<?php
/*
Template Name:ニュース記事一覧
*/
get_header();
?>
<div class="ly_wrap">
<?php
if (have_posts()) :
  while (have_posts()) : the_post();
  $this_page_type = $post -> post_name;
?>
<div class="ly_inner">
<?php get_template_part('temp/bread'); ?>
<article class="content cancer_subpage">
<header id="contentHead" class="content_head">
  <h1 class="ttl_blblue"><?php the_title(); ?></h1>
  <?php get_template_part('temp/post_meta'); ?>
</header>
<div class="ly_inner">
<section class="cancer_sublist">
  <div class="entry-content">
  <p>新着ニュースをご紹介しています。</p>
  </div>

<?php
  endwhile;
endif;
    $args=array(
      'cat' => '12,22,174,10,50,57,173,15',
      'posts_per_page'=> 10,
      'paged' => $paged
    );
  $wp_query = new WP_Query( $args );
  get_template_part('temp/post_list3_b');
?>
</section>
</article>
</div><!--inner-->
</div><!--/wrap-->
<?php get_footer(); ?>
