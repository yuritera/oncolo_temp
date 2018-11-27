<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/website#">
<?php
$folderUrl = $_SERVER["REQUEST_URI"] ;
$tempUrl = '//'. $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$para = $_SERVER['QUERY_STRING'];
$str=str_replace('?'.$para,"",$tempUrl);
$url= rtrim($str, '/');
?>
  <title><?php the_title(); ?></title>

  <meta charset="UTF-8">
  <meta name="theme-color" content="#008cb1">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
  <meta name="description" content="<?php bloginfo('description'); ?>">

  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="og:title" content="<?php the_title(); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo $url; ?>">
  <meta property="og:description" content="<?php bloginfo('description'); ?>">
  <meta property="og:image" content="" />

  <meta property="fb:app_id" content="286943355041198" />

  <meta name="twitter:card" content="photo">
  <meta name="twitter:site" content="">

  <!-- <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png"> -->
  <link rel="canonical" href="<?php echo $url; ?>">
  <link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
  <link rel="dns-prefetch" href="//code.jquery.com">
  <link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
  <link rel="dns-prefetch" href="//googleads.g.doubleclick.net">
  <link rel="dns-prefetch" href="//tpc.googlesyndication.com">
  <link rel="dns-prefetch" href="//www.gstatic.com">
  <link rel="dns-prefetch" href="//twitter.com">
  <link rel="dns-prefetch" href="//api.b.st-hatena.com">
  <link rel="dns-prefetch" href="//urls.api.twitter.com">
  <link rel="dns-prefetch" href="//graph.facebook.com">

  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="<?php echo get_template_directory_uri(); ?>/js/picturefill.min.js"></script>
  <?php wp_head(); ?>
<?php //タグエリア ?>
</head>
<body class="<?php if(is_home()){echo 'home ';} ?>">
<div class="spwrap" id="spWrap">
<header class="ly_header">
  <div class="ly_inner header">
    <?php if(is_home()){echo '<h1'; }else{ echo '<p'; } ?> class="header_logo"><a href="<?php echo home_url( '/' ); ?>">
    <picture>
      <source media="(max-width: 850px)" srcset="<?php echo get_template_directory_uri(); ?>/images/logo_oncolo2.png">
      <source srcset="<?php echo get_template_directory_uri(); ?>/images/logo_oncolo.png"><!-- 画面サイズ993px以上 -->
      <img src="<?php echo get_template_directory_uri(); ?>/images/logo_oncolo.png" alt="がん情報サイト「オンコロ」">
    </picture>
    </a><?php if(is_home()){echo '</h1>'; }else{ echo '</p>'; } ?>
    <div class="header_search pc">
			<div class="header_search_box">
        <form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
          <input type="text" name="s" id="searchbox" placeholder="サイト内を検索する" class="header_search_txt"/>
          <input type="image" id="searchsubmit" class="header_search_btn" src="<?php echo get_template_directory_uri( '' ); ?>/images/icon_search.gif" alt="検索する" />
        </form>
      </div>
		</div>
    <div class="header_btn">
      <ul class="header_btn_list">
        <li class="header_btn_maga pc"><a href="/newsletter">
          <img src="<?php echo get_template_directory_uri( '' ); ?>/images/icon_header_mailmaga_p.png" alt="メルマガ登録">
        </a></li>
        <li class="header_btn_mail"><a href="/contact">
          <picture>
            <source media="(max-width: 850px)" srcset="<?php echo get_template_directory_uri(); ?>/images/icon_header_mail_s.png">
            <source srcset="<?php echo get_template_directory_uri(); ?>/images/icon_header_mail_p.png"><!-- 画面サイズ993px以上 -->
            <img src="<?php echo get_template_directory_uri( '' ); ?>/images/icon_header_mail_p.png" alt="お問い合わせ">
          </picture>
        </a></li>
        <li class="header_btn_tel">
          <?php if(is_mobile()){echo '<a href="tel:0120974268">';} ?>
          <picture>
            <source media="(max-width: 850px)" srcset="<?php echo get_template_directory_uri(); ?>/images/icon_header_tel_s.png">
            <source srcset="<?php echo get_template_directory_uri(); ?>/images/bnr_header_tel.png"><!-- 画面サイズ993px以上 -->
            <img src="<?php echo get_template_directory_uri(); ?>/images/bnr_header_tel.png" alt="0120-974-268">
          </picture>
          <?php echo '</a>'; ?>
        </li>
      </ul>
    </div>
    <div class="header_spmenu sp">
      <div class="toggle" id="spToggle"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_header_burger.png" alt=""></div>
    </div>
  </div>
</header>
<nav class="ly_gnavi">
  <div class="ly_inner">gnavi</div>
</nav>
<nav class="ly_subnavi">
  <div class="ly_inner">サブナビ</div>
</nav>
<div class="ly_headnews">
  <p class="headnews"><a href="">テストテスト</a></p>
</div>