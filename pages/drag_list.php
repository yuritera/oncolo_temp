<?php
/*
Template Name:記事一覧（薬剤）
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
  <p><?php echo get_the_title().'のニュースをご紹介しています。'; ?>

  </div>

<?php
  endwhile;
endif;
$args=array(
    'tax_query' => array(
      array(
        'taxonomy' => 'post_tag',
        'field' => 'slug',
        'terms' => 'ペムブロリズマブ',//キイトルーダ暫定固定
      )
    ),
    'cat' => 12,
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
