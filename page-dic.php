<?php get_header(); ?>
<div class="ly_wrap">
<div class="ly_inner">
<?php get_template_part('temp/bread'); ?>
<article class="content">
<header id="contentHead" class="content_head">
  <h1 class="ttl_blblue">がん」に関する用語辞典　～インテリム×オンコロ～</h1>
  <?php get_template_part('temp/post_meta'); ?>
</header>
<p class="dic_info">この用語辞典は<a href="https://www.intellim.co.jp/" target="_blank">株式会社インテリム</a>とオンコロで共同で作成しています。</p>
<nav class="dic_navlink">
  <ul class="dic_navlink_list">
    <li class="dic_navlink_item active"><a href="/dic">がん用語辞典</a></li>
    <li class="dic_navlink_item"><a href="/drugs">抗がん剤辞典</a></li>
  </ul>
</nav>
<nav class="dic_navi" id="dicNavi">
  <ul class="dic_navi_list">
    <li><a href="#a" class="smooth">あ</a></li>
    <li><a href="#k" class="smooth">か</a></li>
    <li><a href="#s" class="smooth">さ</a></li>
    <li><a href="#t" class="smooth">た</a></li>
    <li><a href="#n" class="smooth">な</a></li>
    <li><a href="#h" class="smooth">は</a></li>
    <li><a href="#m" class="smooth">ま</a></li>
    <li><a href="#y" class="smooth">や</a></li>
    <li><a href="#r" class="smooth">ら</a></li>
    <li><a href="#w" class="smooth">わ</a></li>
  </ul>
</nav>
<section class="dic_box">
  <h2 class="dic_ttl" id="a">あ</h2>
  <?php dic_list(1); ?>
</section>
<section class="dic_box">
  <h2 class="dic_ttl" id="k">か</h2>
  <?php dic_list(2); ?>
</section>
<section class="dic_box">
  <h2 class="dic_ttl" id="s">さ</h2>
  <?php dic_list(3); ?>
</section>
<section class="dic_box">
  <h2 class="dic_ttl" id="t">た</h2>
  <?php dic_list(4); ?>
</section>
<section class="dic_box">
  <h2 class="dic_ttl" id="n">な</h2>
  <?php dic_list(5); ?>
</section>
<section class="dic_box">
  <h2 class="dic_ttl" id="h">は</h2>
  <?php dic_list(6); ?>
</section>
<section class="dic_box">
  <h2 class="dic_ttl" id="m">ま</h2>
  <?php dic_list(7); ?>
</section>
<section class="dic_box">
  <h2 class="dic_ttl" id="y">や</h2>
  <?php dic_list(8); ?>
</section>
<section class="dic_box">
  <h2 class="dic_ttl" id="r">ら</h2>
  <?php dic_list(9); ?>
</section>
<section class="dic_box">
  <h2 class="dic_ttl" id="w">わ</h2>
  <?php dic_list(10); ?>
</section>
</article>
</div><!--/innner-->
</div><!--/wrap-->
<?php get_footer(); ?>
<?php //特定の記事の読み込み
function dic_list($kana_num){
  $param = array(
    'posts_per_page' => '-1',
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby'      => 'date',
    'order'        => 'ASC',
    'meta_query' => array(
        array(	'key'=>'cindex',
          'value'=>$kana_num,
          'compare'=>'='
          )
    ),
    'no_found_rows' => true,
      );
  $dic_ids = get_posts( $param );
  foreach ($dic_ids as $dic_id) {
    echo '<p class="dic_link"><a href="'.get_the_permalink($dic_id -> ID).'">● '.$dic_id -> post_title.'</a></p>';
  }
  echo '<p class="back"><a href="#dicNavi">TOPへもどる</a></p>';
  return ;
}
