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

  <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png">
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
  <link href="//fonts.googleapis.com/earlyaccess/notosansjapanese.css" rel="stylesheet" />
  <?php wp_head(); ?>
<?php //タグエリア ?>
</head>
<body class="<?php if(is_home()){echo 'home ';}if(!is_mobile()){echo 'pc';}else{echo 'sp';} ?>">
<?php //タグエリア ?>
<header class="ly_header">
  <div class="ly_inner">
  <?php if(is_home()){echo '<h1'; }else{ echo '<p'; } ?> class="header_logo">オンコロ<?php if(is_home()){echo '</h1>'; }else{ echo '</p>'; } ?>
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
