
<div class="ly_subcontent">
  <aside class="ly_photo">
    <div class="ly_inner">
      <h2 class="ttl_bblue">オンコロ応援団</h2>
      <?php
      $gallery_rand = get_post_meta( '50099', 'foogallery_attachments', true );
      $gallery_keys  = array_rand($gallery_rand , 6);
      if($gallery_keys ){
        echo '<ul class="photo_list">';
        foreach ($gallery_keys  as $gallery_key ) {
          $gallery_key_img = parse_url( wp_get_attachment_url($gallery_rand[$gallery_key] ) );
          $gallery_key_img = dirname( $gallery_key_img [ 'path' ] ) . '/' . rawurlencode( basename( $gallery_key_img[ 'path' ] ) );
          echo '<li class="photo_item"><a href="'.$gallery_key_img.'" class="foobox" ><img src="'.$gallery_key_img.'" alt=""></a></li>';
        }
        echo '</ul>';
      }
      ?>
      <p class="photo_link"><a href="/cheer">写真ギャラリーを見る »</a></p>
    </div>
  </aside>
  <aside class="ly_link">
    <div class="ly_inner">
      <h2 class="ttl_bblack">リンク</h2>
      <div class="link1">
        <ul class="link_list1">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'ftlink1',
              'container'      => '',
              'depth'          => 1,
              'items_wrap'      => '%3$s'
            ) );
          ?>
        </ul>
      </div>
      <div class="link2">
        <ul class="link_list2">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'ftlink2',
              'container'      => '',
              'depth'          => 1,
              'items_wrap'      => '%3$s'
            ) );
          ?>
        </ul>
      </div>
    </div>
  </aside>
</div>
<nav class="gotop"><span class="gotop_icon">▲</span></nav>
<footer class="ly_footer" id="footer">
  <div class="ly_inner footer">
    <div class="footer_left">
      <div class="footer_links">
        <ul class="footer_links_list">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'ftnavi',
              'container'      => '',
              'depth'          => 1,
              'items_wrap'      => '%3$s'
            ) );
          ?>
        </ul>
      </div>
      <ul class="footer_sns">
        <li class="footer_sns_item"><a href="https://www.facebook.com/ct.oncolo/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_footer_fb.png" alt=""></a></li>
        <li class="footer_sns_item"><a href="https://twitter.com/oncolo_ct" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_footer_twitter.png" alt="Twitter"></a></li>
      </ul>
      <div class="footer_honcode">
        <figure class="footer_honcode_img"><a href="#" onclick="event.preventDefault();　window.open('https://www.healthonnet.org/HONcode/Japanese/?HONConduct882964','_blank', 'width=700,height=500');return false; "><img src="https://www.honcode.ch/HONcode/Seal/HONConduct882964_hr1.gif" title="This website is certified by Health On the Net Foundation. Click to verify." alt="This website is certified by Health On the Net Foundation. Click to verify."></a></figure>
        <p class="footer_honcode_txt">このサイトは、 信頼できる医療・ 健康情報のための 倫理標準である HONcodeの条件を満たしています。 <span><a href="#" onclick="event.preventDefault();　window.open('https://www.healthonnet.org/HONcode/Japanese/?HONConduct882964','_blank', 'width=700,height=500');return false; ">こちらから確認してください。</a></span></p>
      </div>
      <ul class="footer_mark">
        <li class="footer_mark_item"><img src="<?php echo get_template_directory_uri(); ?>/images/iso27001.png" alt="ISMS ISR018, ISO27001BUREAU VARITAS Certification"></li>
        <li class="footer_mark_item"><a href="https://privacymark.jp/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_pmark2.gif" alt="プライバシーマーク"></a></li>
      </ul>
      <p class="footer_conduct">がん情報サイト「オンコロ」は株式会社クロエ／株式会社クリニカル・トライアルが運営しています。</p>
    </div>
    <div class="footer_right fbbox">
      <div class="fb-page" data-href="https://www.facebook.com/ct.oncolo/" data-tabs="timeline" data-width="500" data-height="350" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/ct.oncolo/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ct.oncolo/">オンコロ</a></blockquote>
  		</div>
    </div>
  </div>
  <div class="footer_copy">
    <address><a href="<?php echo home_url( '/' ); ?>">Copyright &#169; <?php echo date('Y'); ?> . がんと・ひとを・つなぐオンコロ</a></address>
  </div>
</footer>
</div>
<div class="spmenu sp">
  <div class="spmenu_close"><button class="spmenu_close_btn" id="spClose"></button></div>
  <nav class="spmenu_inner">
    <div class="spmenu_search">
      <form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
        <input type="text" name="s" id="searchbox" placeholder="サイト内を検索する" class="spmenu_search_txt"/><input type="submit" id="searchsubmit" class="spmenu_search_btn" value="検索" />
      </form>
    </div>
    <ul class="spmenu_list">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'spnavi',
          'container'      => '',
          'depth'          => 0,
          'items_wrap'      => '%3$s'
        ) );
      ?>
    </ul>
  </nav>
</div>
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/base.js"></script>
</body>
</html>
