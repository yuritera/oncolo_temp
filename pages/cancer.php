<?php
/*
Template Name:ガンの種類
*/
get_header();
$cancer_color = get_post_meta($post->ID, 'cancer_color', true);
$cancer_color2 = get_post_meta($post->ID, 'cancer_color2', true);
?>
<style>
.cancer_page .postlist_type1,
.cancer_page .cancer_head,
.cancer_page .cancer_nav_item.active
{
  background:<?php echo $cancer_color; ?>;
}
.cancer_page .cancer_ttl{
  color:<?php echo $cancer_color2; ?>;
}
.cancer_page .cancer_more a,
.cancer_page .cat_list li {
  background:<?php echo $cancer_color2; ?>;
}
.cancer_page .cancer_submenu_item a,
.cancer_page .cancer_nav_item.active
{
  color:<?php echo $cancer_color2; ?>;
  border-color:<?php echo $cancer_color2; ?>;
}
.cancer_page .cancer_nav_item{
  border-color:<?php echo $cancer_color2; ?>;
}
</style>
<div class="ly_wrap">
<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>
<div class="ly_inner">
<?php get_template_part('temp/bread'); ?>
</div>
<article class="content cancer_page">
<header id="contentHead" class="cancer_head">
  <div class="ly_inner">
    <div class="cancer_head_box">
      <div class="cancer_topcontent">
        <?php
        $cancer_txt = get_post_meta($post->ID, 'cancer_txt', true);
        if(!empty($cancer_txt)){echo $cancer_txt;}
        ?>
      </div>
    </div>
    <div class="cancer_head_box">
      <h1 class="cancer_head_ttl"><?php the_title(); ?></h1>
      <nav class="cancer_submenu">
        <ul class="cancer_submenu_list">
        <?php
        $cancer_submenu = get_post_meta($post->ID, 'cancer_submenu', false);
        $cancer_ttl = get_post_meta($post->ID, 'cancer_ttl', true);
        $array = explode("\n", $cancer_ttl);
        $array = array_map('trim', $array);
        $array = array_filter($array, 'strlen');
        $cancer_ttl = array_values($array);
        foreach ($cancer_submenu as $key => $value) {
          echo '<li class="cancer_submenu_item"><a href="'.get_the_permalink( $value ).'">'.$cancer_ttl[$key].'</a></li>';
        }
        ?>
        </ul>
      </nav>
    </div>
  </div>
</header>
<div class="ly_inner">
    <section class="cancer_wrap" id="cancerPickup">
    <?php
    //picuplist function
    function cancerPicup($cancer,$cat_type){
      if($cat_type == 'new'){
        $cat_type= '12,15,22,174,10,50,57,173';
      }else{
        $cat_type = '12';
      }
      $args=array(
        'tax_query' => array(
          array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => array($cancer,'all-cancer')
          )
        ),
          'cat' => $cat_type,
          'posts_per_page'=> 6,
          'no_found_rows' => true
        );
      $post_ids = get_posts( $args );
      return $post_ids;
      }

    ?>
      <nav class="cancer_nav">
        <ul class="cancer_nav_list">
          <li class="cancer_nav_item" @click="show('new')" v-bind:class="{'active': current === 'new'}">新着</li>
          <li class="cancer_nav_item" @click="show('news')" v-bind:class="{'active': current === 'news'}">ニュース</li>
        </ul>
      </nav>
      <div class="cancer_body">
      <transition name="fade" mode="out-in">
        <div class="cancer" v-if="isCurrent('new')" key="new">
        <div class="cancer_list">
        <?php
          $post_ids = cancerPicup($slug_name = $post->post_name,'new');
          get_template_part('temp/post_list');
        ?>
        </div>
        <p class="cancer_more"><a href="/latest">もっと見る &#8811; </a></p>
        </div>

        <div class="cancer" v-if="isCurrent('news')" key="news">
        <div class="cancer_list">
        <?php
          $post_ids = cancerPicup($slug_name = $post->post_name,'news');
          get_template_part('temp/post_list');
        ?>
        </div>
        <p class="cancer_more"><a href="/category/news">もっと見る &#8811; </a></p>
        </div>

      </transition>
      </div>
      <script>
      new Vue({
        el:'#cancerPickup',
        data:{
          current:'new',
          },
        methods:{
          show:function(name){
            this.current = name;
          },
          isCurrent:function(name){
            return this.current == name;
          },
        }
      })
      </script>
    </section>
      <?php //治験広告があれば表示
        $cat_view = "治験広告";
        $date_view = true;
        $post_datas  = array();
        $cancer_group = SCF::get('cancer_grop');
        if(!empty($cancer_group[0]['cancer_ct_ttl'])){
        foreach ($cancer_group as $cancer_item) {
          $canser_img = wp_get_attachment_image_src($cancer_item['cancer_ct_img'],'large');
          $canser_img = esc_url($canser_img[0]);
          $post_datas[] = [
          'post_num'=>'',
          'post_title'=>$cancer_item['cancer_ct_ttl'],
          'post_img'=>$canser_img,
          'post_link'=>$cancer_item['cancer_ct_link']
          ];
        }
        }
        $args=array(
        'tax_query' => array(
          array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => array($slug_name = $post->post_name,'all-cancer')
          )
        ),
          'cat' => 57,
          'posts_per_page'=> 10,
          'no_found_rows' => true
        );
        $cancer_items = get_posts($args);
        if(!empty($cancer_items)){
          echo '<section class="cancer_wrap">';
          echo '<h2 class="cancer_ttl">募集中の臨床試験・治験広告</h2>';
          foreach ($cancer_items as $cancer_item) {
          $post_datas[] = [
          'post_num'=>$cancer_item -> ID,
          'post_title'=>'',
          'post_img'=>'',
          'post_link'=>''
          ];
        }
        get_template_part('temp/post_list2_c');
        echo '</section>';
        }
      ?>
      <?php //セミナー動画があれば表示
      $cat_view = "";
      $date_view = true;
      $post_datas  = array();
      $args=array(
					'tax_query' => array(
          array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => array($slug_name = $post->post_name)
          )
        ),
          'cat' => 779,
          'posts_per_page'=> 17,
          'no_found_rows' => true
        );
        $cancer_items = get_posts($args);
        if(!empty($cancer_items)){
          echo '<section class="cancer_wrap">';
          echo '<h2 class="cancer_ttl">セミナー動画</h2>';
          foreach ($cancer_items as $cancer_item) {
          $post_datas[] = [
          'post_num'=>$cancer_item -> ID,
          'post_title'=>'',
          'post_img'=>'',
          'post_link'=>''
          ];
        }
        get_template_part('temp/post_list2_c');
        echo '</section>';
        }
      ?>
  </div>
  <div class="entry-content ly_inner" id="readmore">
<?php
  the_content();
  echo '</div>';
  endwhile;
endif;
?>
</article>
</div><!--/wrap-->
<?php get_footer(); ?>
