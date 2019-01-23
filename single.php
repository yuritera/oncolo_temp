<?php get_header(); ?>
<div class="ly_wrap">
<aside class="ly_inner">
<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>
<?php get_template_part('temp/bread'); ?>
<article class="content">
<?php if(in_category(array(57,15))) : ?>
<div class="hajimete"><a href="/guide">はじめて治験のお問合せする方へのお願い</a></div>
<?php endif; ?>
<header id="contentHead" class="content_head">
  <h1 class="ttl_blblue"><?php the_title();
  $subtitle = get_post_meta($post->ID,'sub-title',TRUE);
  if(!empty($subtitle)){
    echo '<span class="ttl_blblue_sub">'.$subtitle.'</span>';
  }
  ?></h1>
  <?php get_template_part('temp/post_meta'); ?>
</header>
<div class="content_aside">
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
  $ad_link =get_the_permalink( $ad1_post[0] -> ID );
  $ad_img = get_the_post_thumbnail($ad1_post[0] -> ID,'thumbnail', array('alt'=>$ad1_post[0] -> post_title) );
  $ad_time = get_the_time('Y.m.d',$ad1_post[0] -> ID);
  echo <<< EMO
<aside class="content_ad_wrap">
    <h3 class="content_ad_ttl">おすすめ情報</h3>
    <div class="content_ad">
      <a href="{$ad_link}">
        <figure class="content_ad_img">
        {$ad_img}
        </figure>
        <p class="content_ad_txt">{$ad1_post[0] -> post_title}</p>
        <p class="content_ad_date">{$ad_time}</p>
      </a>
    </div>
  </aside>
EMO;
}
  echo '</div>';
  echo '<main class="content_main">';
  echo '<div class="ly_inner">';
  echo '<div class="entry-content">';
  the_content( __('...more &raquo;','mesocolumn') );
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
  if ( get_post_meta($post->ID,'related-tag',TRUE) ){ //連携タグ
    echo '<h2>'.get_the_title().'の臨床試験（治験）</h2>';
    $args=array(
			'tax_query' => array(
				array(
				'taxonomy' => 'post_tag',
				'field' => 'slug',
				'terms' => get_post_meta($post->ID,'related-tag',TRUE)
				)
				),
				'cat' => 15,
				'posts_per_page'=> 5,
				'paged' => $paged
      );
    $post_ids = get_posts($args);
    get_template_part('temp/post_list4');
  }
  if(get_post_meta($post->ID,'cancer-tag',TRUE) ){//連携広告
    echo '<h2>'.get_the_title().'の治験・臨床試験広告</h2>';
    $args=array(
			'tax_query' => array(
				array(
				'taxonomy' => 'post_tag',
				'field' => 'slug',
				'terms' => get_post_meta($post->ID,'cancer-tag',TRUE)
				)
				),
				'cat' => 57,
				'posts_per_page'=> 5,
				'paged' => $paged
			);
    $post_ids = get_posts($args);
    get_template_part('temp/post_list4');
  }
  get_template_part('temp/post_meta_btm');
  related_posts();//関連記事
  echo '</div>';
  get_template_part('temp/ranking');//ランキング
  echo '</div>';
  endwhile;
endif;
?>
</main>
</article>
<aside class="content_pr_wrap">
  <div class="ly-inner">
    <dl class="content_pr">
      <dt class="content_pr_ttl green">
        がんの臨床試験（治験）をお探しの方へ
      </dt>
      <dd class="content_pr_txt">
        <p>がん情報サイト「オンコロ」ではがんの臨床試験（治験）情報を掲載しています。</p>
        <div class="btn_box">
          <p><a href="/ct/triallist">掲載中の臨床試験（治験）情報はこちら &raquo;</a></p>
          <p><a href="/dictionary/clinicalresarch">臨床試験（治験）とは &raquo;</a></p>
        </div>
      </dd>
      <dt class="content_pr_ttl blue">
        オンコロリサーチ
      </dt>
      <dd class="content_pr_txt">
        <p>患者さんやそのご家族のがんに関わるあらゆる声を調査（リサーチ）するための調査を実施しております。</p>
        <div class="btn_box">
          <p><a href="/reserch/lists">実施中の調査一覧はこちら &raquo;</a></p>
        </div>
      </dd>
      <dt class="content_pr_ttl orange">
        無料メルマガ配信中
      </dt>
      <dd class="content_pr_txt">
        <p>メルマガ独自のコラム、臨床試験情報、最新情報を毎週配信しています。ぜひご登録ください。</p>
        <div class="btn_box">
          <p><a href="/newsletter">メルマガ登録はこちら &raquo;</a></p>
        </div>
      </dd>
    </dl>
  </div>
</aside>
</div><!--/innner-->
<?php get_footer(); ?>
