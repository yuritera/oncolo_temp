<?php get_header(); ?>
<div class="ly_wrap">
  <div class="ly_slider">
  <script type="text/javascript" src="<?php echo get_template_directory_uri( '' ); ?>/js/slick/slick.min.js"></script>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri( '' ); ?>/js/slick/slick.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri( '' ); ?>/js/slick/slick-theme.css">
  <script>
  jQuery(function() {
    jQuery('.slider').slick({
    infinite: true,
    dots:true,
    arrows:true,
    slidesToShow: 1,
    centerMode: true, //要素を中央寄せ
    centerPadding:'0px', //両サイドの見えている部分のサイズ
    autoplay:true
  });
  });
  </script>
    <section class="slider">
    <?php
      function add_slider_content($slider_link,$slider_img,$slider_ttl,$slider_txt){
$slider_content = <<<SLIDER
    <div class="slider_item">
    <a href="{$slider_link}">
      <aside class="slider_image">{$slider_img}</aside>
      <div class="slider_content">
        <h2 class="slider_ttl">{$slider_ttl}</h2>
        <p class="slider_txt">$slider_txt</p>
        <p class="slider_more"><span>詳細を見る</span></p>
      </div>
    </a>
    </div>
SLIDER;
        return $slider_content;
      }
      $slider_hands = SCF::get_option_meta( 'oncolo_slider_option', 'slider_group' );
      foreach ($slider_hands as $slider_hand) {
        if(!empty($slider_hand['slider_linkout'])){
          $slider_link = $slider_hand['slider_linkout'];
        }else{
          $slider_link =get_the_permalink( $slider_hand['slider_link'][0] );
        }
        $slider_img = wp_get_attachment_image( $slider_hand['slider_iamge'], 'full');
        $slider_ttl = $slider_hand['slider_title'];
        $slider_txt = $slider_hand['slider_txt'];
        echo add_slider_content($slider_link,$slider_img,$slider_ttl,$slider_txt);
      }
      $args=array(
        'tax_query' => array(
          array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => array('toppage')
            )
          ),
          'cat' => 184,
          'posts_per_page'=> 4,
          'no_found_rows' => true,
        );
        $hot_topics = get_posts($args);
        foreach ($hot_topics as $hot_topic) {
          $slider_link =get_the_permalink( $hot_topic -> ID );
          if(has_post_thumbnail($hot_topic -> ID)) {
            $slider_img = get_the_post_thumbnail($hot_topic -> ID,'full', array('alt'=> $hot_topic -> post_title) );
          }
          $slider_txt = strip_tags(mb_strimwidth($hot_topic -> post_content , 0, 100, "…", "UTF-8"));
          if(is_mobile()){
            $slider_ttl = mb_strimwidth($hot_topic -> post_title , 0, 64, "…", "UTF-8");
          }else{
            $slider_ttl = $hot_topic -> post_title;
          }
          echo add_slider_content($slider_link,$slider_img,$slider_ttl,$slider_txt);
        }
      ?>
    </section>
    <div class="ly_inner">
    <section class="pickup_wrap" id="homePicup">
      <nav class="pickup_nav">
        <ul class="pickup_nav_list">
          <li class="pickup_nav_item" @click="show('new')" v-bind:class="{'active': current === 'new'}">新着</li>
          <li class="pickup_nav_item" @click="show('news')" v-bind:class="{'active': current === 'news'}">ニュース</li>
          <li class="pickup_nav_item" @click="show('feature')" v-bind:class="{'active': current === 'feature'}">特集</li>
          <li class="pickup_nav_item" @click="show('movie')" v-bind:class="{'active': current === 'movie'}">動画</li>
          <li class="pickup_nav_item" @click="show('ct')" v-bind:class="{'active': current === 'ct'}">治験広告</li>
        </ul>
      </nav>
      <div class="pickup_body">
      <transition name="fade" mode="out-in">

        <div class="pickup_list" v-if="isCurrent('new')" key="new">
        <?php
        $args = array(
          'category' => '12,22,174,10,50,57,173,15',
          'posts_per_page' => 9,
          'no_found_rows' => true,
        );
        $post_ids = get_posts( $args );
        get_template_part('post_list');
        ?>
        <p class="pickup_more"><a href="/latest">もっと見る &#8811; </a></p>
        </div>

        <div class="pickup_list" v-if="isCurrent('news')" key="news">
        <?php
        $args = array(
          'category' => '12',
          'posts_per_page' => 9,
          'no_found_rows' => true,
        );
        $post_ids = get_posts( $args );
        get_template_part('post_list');
        ?>
        <p class="pickup_more"><a href="/category/news">もっと見る &#8811; </a></p>
        </div>

        <div class="pickup_list" v-if="isCurrent('feature')" key="feature">
        <?php
        $args = array(
          'category' => '174',
          'posts_per_page' => 9,
          'no_found_rows' => true,
        );
        $post_ids = get_posts( $args );
        get_template_part('post_list');
        ?>
        <p class="pickup_more"><a href="/category/feature">もっと見る &#8811; </a></p>
        </div>

        <div class="pickup_list" v-if="isCurrent('movie')" key="movie">
        <?php
        $args = array(
          'category' => '779',
          'posts_per_page' => 9,
          'no_found_rows' => true,
        );
        $post_ids = get_posts( $args );
        get_template_part('post_list');
        ?>
        <p class="pickup_more"><a href="/category/seminar_video">もっと見る &#8811; </a></p>
        </div>

        <div class="pickup_list" v-if="isCurrent('ct')" key="ct">
        <?php
        $args = array(
          'category' => '12,22,174,10,50,57,173,15',
          'posts_per_page' => 9,
          'no_found_rows' => true,
        );
        $post_ids = get_posts( $args );
        get_template_part('post_list');
        ?>
        <p class="pickup_more"><a href="/latest">もっと見る &#8811; </a></p>
        </div>
      </transition>
      </div>
      <script>
      new Vue({
        el:'#homePicup',
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
    <div class="ly_inner">
      <h2 class="ttl_bblue">イベント情報</h2>
    </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
