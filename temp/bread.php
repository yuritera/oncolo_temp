<nav class="ly_bread">
  <div class="bread" vocab="http://schema.org/" typeof="BreadcrumbList">
    <span property="itemListElement" typeof="ListItem" class="bread_item"><a property="item" typeof="WebPage" href="/internal-seo/" class="home"><span property="name">HOME</span></a><meta property="position" content="1"></span>
    >
    <?php
    //親部分
    if(is_page()){
      $nowpost = $wp_query->post;
      $parents = array();
      for($i=0;$i<20;$i++){ if($nowpost->post_parent){
      $nowpost = get_post($nowpost->post_parent);
      $parents[] = array($nowpost->post_title,get_permalink($nowpost->ID));
      } else {
      break;
      }
      }
      for($i=count($parents)-1;$i>=0;$i--){
echo <<< EMO
      <span property="itemListElement" typeof="ListItem" class="bread_item"><a property="item" typeof="WebPage" title="{$parents[$i][0]}" href="{$parents[$i][1]}" class="taxonomy category"><span property="name">{$parents[$i][0]}</span></a><meta property="position" content="2"></span>
      >
EMO;
    }
  }elseif(is_single()){
    $linked_page = get_post_meta($post->ID, 'linked-page', true);
    if(!empty($linked_page)){
      $linked_pieces = explode(":", $linked_page);
echo <<< EMO
      <span property="itemListElement" typeof="ListItem" class="bread_item"><a property="item" typeof="WebPage" title="がん種一覧" href="/cancer" class="taxonomy category"><span property="name">がん種一覧</span></a><meta property="position" content="2"></span>
      >
      <span property="itemListElement" typeof="ListItem" class="bread_item"><a property="item" typeof="WebPage" title="{$linked_pieces[0]}" href="/cancer/{$linked_pieces[1]}" class="taxonomy category"><span property="name">{$linked_pieces[0]}</span></a><meta property="position" content="2"></span>
      >
EMO;
      if(in_category('news')){
echo <<< EMO
      <span property="itemListElement" typeof="ListItem" class="bread_item"><a property="item" typeof="WebPage" title="{$linked_pieces[0]}" href="/cancer/{$linked_pieces[1]}/news" class="taxonomy category"><span property="name">{$linked_pieces[0]}ニュース</span></a><meta property="position" content="2"></span>
      >
EMO;
      }
    }
  }
    ?>
    <span property="itemListElement" typeof="ListItem" class="bread_item"><span property="name"><?php the_title(); ?></span><meta property="position" content="3"></span>
  </div>
</nav>
