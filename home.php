<?php get_header(); ?>
<div class="ly_wrap">

  <div class="ly_slider" id="homeSlider">
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
          $slider_txt = mb_strimwidth(strip_tags($hot_topic -> post_content) , 0, 100, "…", "UTF-8");
          if(is_mobile()){
            $slider_ttl = mb_strimwidth(strip_tags($hot_topic -> post_content) , 0, 64, "…", "UTF-8");
          }else{
            $slider_ttl = $hot_topic -> post_title;
          }
          echo add_slider_content($slider_link,$slider_img,$slider_ttl,$slider_txt);
        }
      ?>
    </section>
    <div class="ly_inner">
    <section class="pickup_wrap" id="homePicup">
    <?php
    //picuplist function
    function homePicupList($cat){
      $args = array(
        'category' => $cat,
        'posts_per_page' => 9,
        'no_found_rows' => true,
      );
      $post_ids = get_posts( $args );
      return $post_ids;
      }
    ?>
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
        <div class="picup" v-if="isCurrent('new')" key="new">
        <div class="pickup_list">
        <?php //新着記事
        $picup_cat = '12,22,174,10,50,57,173,15';
        $post_ids = homePicupList($picup_cat);
        get_template_part('temp/post_list');
        ?>
        </div>
        <p class="pickup_more"><a href="/latest">もっと見る &#8811; </a></p>
        </div>

        <div class="picup" v-if="isCurrent('news')" key="news">
        <div class="pickup_list">
        <?php //ニュース記事
        $picup_cat = '12';
        $post_ids = homePicupList($picup_cat);
        get_template_part('temp/post_list');
        ?>
        </div>
        <p class="pickup_more"><a href="/category/news">もっと見る &#8811; </a></p>
        </div>

        <div class="picup" v-if="isCurrent('feature')" key="feature">
        <div class="pickup_list">
        <?php //特集記事
        $picup_cat = '174';
        $post_ids = homePicupList($picup_cat);
        get_template_part('temp/post_list');
        ?>
        </div>
        <p class="pickup_more"><a href="/category/feature">もっと見る &#8811; </a></p>
        </div>

        <div class="picup" v-if="isCurrent('movie')" key="movie">
        <div class="pickup_list">
        <?php //動画記事
        $picup_cat = '779';
        $post_ids = homePicupList($picup_cat);
        get_template_part('temp/post_list');
        ?>
        </div>
        <p class="pickup_more"><a href="/category/seminar_video">もっと見る &#8811; </a></p>
        </div>

        <div class="picup" v-if="isCurrent('ct')" key="ct">
        <div class="pickup_list">
        <?php //治験広告記事
        $post_datas  = array();
        $picup_cat = '57';
        $args = array(
          'category' => $picup_cat,
          'posts_per_page' => -1,
          'no_found_rows' => true,
        );
        $post_ids = get_posts( $args );
        foreach ($post_ids as $post_id) {
          $post_datas[] = [
            'post_num'=>$post_id -> ID
          ];
        }
        get_template_part('temp/post_list_c');
        $post_datas  = array();
        $cancers = get_posts(array(
        'post_type' => 'page',
        'posts_per_page' => '-1',
        'post_parent' => 16657,
        ));
        foreach ($cancers as $cancer) {
          $cancer_group = SCF::get( 'cancer_grop' , $cancer->ID );
          if(!empty($cancer_group[0]['cancer_ct_ttl'])){
            foreach ($cancer_group as $cancer_item) {
              $canser_img = wp_get_attachment_image_src($cancer_item['cancer_ct_img'],'large');
              $canser_img = esc_url($canser_img[0]);
              if(empty($cancer_item['cancer_ct_txt'])){
                $post_txt = $cancer_item['cancer_ct_ttl'];
              }else{
                $post_txt =$cancer_item['cancer_ct_txt'];
              }
              $post_datas[] = [
              'post_title'=>$cancer_item['cancer_ct_ttl'],
              'post_img'=>$canser_img,
              'post_link'=>$cancer_item['cancer_ct_link'],
              'post_date'=>$cancer_item['cancer_ct_date'],
              'post_txt'=>$post_txt,
              ];
            }
          }
        }
        foreach($post_datas as $key => $value)
        {
          $sort_keys[$key] = $value['post_date'];
        }
        array_multisort($sort_keys, SORT_DESC, $post_datas);
        get_template_part('temp/post_list_c');
        ?>
        </div>
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

    <section class="eventlist_wrap" id="homeEvent">
      <div class="ly_inner">
        <h2 class="ttl_bblue">イベント情報</h2>
        <?php
        $cat_view = "event";
        $date_view = false;
        $post_datas  = array();
        $post_datas[] = [
          'post_num'=>52302,//該当する記事(外部に飛ばす場合は空白)
          'post_title'=>'全国のがんイベント情報一覧',//表示したいタイトル（空白だと記事タイトル）
          'post_img'=>'/wp-content/uploads/2017/11/ibent1.jpg',//表示したい画像（空白だと記事アイキャッチ）
          'post_link'=>''//飛ばしたい飛び先（空白だと記事へリンク）
        ];
        $post_datas[] = [
          'post_num'=>47313,
          'post_title'=>'',
          'post_img'=>'',
          'post_link'=>''
        ];
        $post_datas[] = [
          'post_num'=>49635,
          'post_title'=>'〜希少がんを知り・学び・集うセミナー！〜希少がん Meet the Expert2019 参加者募集！',
          'post_img'=>'',
          'post_link'=>'',
        ];
        $post_datas[] = [
          'post_num'=>48765,
          'post_title'=>'ONCOLO Meets Cancer Experts（OMCE）2019 参加者募集！',
          'post_img'=>'',
          'post_link'=>''
        ];
        get_template_part('temp/post_list2_c');
        ?>
      </div>
    </section>

    <section class="information_wrap" id="homeInformation">
      <div class="ly_inner">
        <h2 class="ttl_bblue">オンコロInformation</h2>
        <?php
        $cat_view = false;
        $date_view = false;
        $post_datas  = array();
        $info_posts = wp_get_nav_menu_items( 'top_info' );
        foreach ($info_posts as $info_post) {
          if(!empty($info_post -> thumbnail_id)){
            $image_url = wp_get_attachment_image_src ($info_post -> thumbnail_id, true);
            $image_url = $image_url[0];
          }else{
            $image_url = "";
          }
          $post_datas[] = [
          'post_num'=>$info_post -> object_id,
          'post_title'=>$info_post -> title,
          'post_img'=>$image_url,
          'post_link'=>$info_post -> url
        ];
        }
        get_template_part('temp/post_list2_c');
        ?>
      </div>
    </section>

    <div class="ly_flex justify">

      <?php get_template_part('temp/ranking'); ?>

      <section class="newpost_wrap" id="homeNewPost">
        <h2 class="ttl_bblue">新着情報</h2>
        <ul class="newpost_list">
          <?php
          $args = array(
            'category' => '50,12,176,173,174,9,73,74,10,22,15',
            'posts_per_page' => 10,
            'no_found_rows' => true,
          );
          $new_posts = get_posts($args);
          foreach ($new_posts as $new_post) {
            echo '<li class="newpost_item"><a href="'.get_the_permalink( $new_post -> ID ).'"><span class="newpost_day">'.get_the_date( 'Y.m.d', $new_post -> ID ).'</span>'.$new_post -> post_title.'</a></li>';
          }
          ?>
        </ul>
      </section>
    </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
