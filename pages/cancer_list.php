<?php
/*
Template Name:ガン記事一覧（各種）
*/
get_header();
$ancestors_ids = get_ancestors( $post->ID, 'page' );
$ancestors_ids = array_reverse($ancestors_ids);
$this_pages = get_post($ancestors_ids[1]);
$cancer_color = get_post_meta($this_pages -> ID, 'cancer_color', true);
$cancer_color2 = get_post_meta($this_pages -> ID, 'cancer_color2', true);
?>
<style>
.cancer_subpage .postlist_type1,
.cancer_subpage .cancer_head,
.cancer_subpage .cancer_nav_item
{
  background:<?php echo $cancer_color; ?>;
}
.cancer_subpage .cancer_ttl{
  color:<?php echo $cancer_color2; ?>;
}
.cancer_subpage .cancer_more,
.cancer_subpage .cancer_nav_item:hover,
.cancer_subpage .cancer_nav_item.active {
  background:<?php echo $cancer_color2; ?>;
}
.cancer_subpage .ttl_blblue{
  color:<?php echo $cancer_color2; ?>;
  border-color:<?php echo $cancer_color; ?>;
}
</style>
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
  <p><?php
  switch ($this_page_type) {
    case 'ct':
      echo $this_pages -> post_title.'の臨床試験（治験）情報を掲載しています。';
      break;

    case 'ad':
      echo '医師または製薬企業より直接依頼を受け、「オンコロ」で募集を行っている'.$this_pages -> post_title.'の臨床試験（治験）情報を掲載しています。';
      break;

    case 'news':
      echo $this_pages -> post_title.'のニュースをご紹介しています。';
      break;

    case 'pick-up':
      echo 'がん全般のニュースをご紹介しています。';
      break;

    case 'latest':
      echo $this_pages -> post_title.'の新着ニュースをご紹介しています。';
      break;

    case 'feature':
      echo $this_pages -> post_title.'の特集記事をご紹介しています。';
      break;

    case 'story':
      echo $this_pages -> post_title.'患者さんの体験談を掲載しています。';
      break;

    default:

      break;
  }
  ?>
  </p>
  </div>
  <?php if($this_page_type == 'ct'|| $this_page_type == 'ad') : ?>
  <nav class="cancer_nav">
    <ul class="cancer_nav_list">
      <li class="cancer_nav_item <?php if($this_page_type == 'ct'){echo 'active';} ?>"><a href="/cancer/<?php echo $this_pages -> post_name; ?>/ct">ALL</a></li>
      <li class="cancer_nav_item <?php if($this_page_type == 'ad'){echo 'active';} ?>"><a href="/cancer/<?php echo $this_pages -> post_name; ?>/ct/ad">広告</a></li>
    </ul>
  </nav>
<?php elseif($this_page_type == 'news'|| $this_page_type == 'pick-up'||$this_page_type == 'feature') : ?>
  <nav class="cancer_nav">
    <ul class="cancer_nav_list">
      <li class="cancer_nav_item <?php if($this_page_type == 'news'){echo 'active';} ?>"><a href="/cancer/<?php echo $this_pages -> post_name; ?>/news"><?php echo $this_pages -> post_title; ?>のニュース</a></li>
      <li class="cancer_nav_item <?php if($this_page_type == 'pick-up'){echo 'active';} ?>"><a href="/cancer/<?php echo $this_pages -> post_name; ?>/news/pick-up">全般のニュース</a></li>
      <li class="cancer_nav_item <?php if($this_page_type == 'feature'){echo 'active';} ?>"><a href="/cancer/<?php echo $this_pages -> post_name; ?>/news/feature">特集</a></li>
    </ul>
  </nav>
<?php endif; ?>
<?php
  endwhile;
endif;
if($this_page_type == 'pick-up'){
  $cat_slug[] = "";
  $cat_slug[] = $this_pages -> post_name;
  $cat_slug[] = 'all-cancer';
}elseif($this_page_type == 'story'){
  $this_page_type = 'mystory';
  $cat_slug = $this_pages -> post_name;
}else{
  $cat_slug = $this_pages -> post_name;
}
$args=array(
    'tax_query' => array(
      array(
        'taxonomy' => 'post_tag',
        'field' => 'slug',
        'terms' => $cat_slug
      )
    ),
    'category_name' => $this_page_type,
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
