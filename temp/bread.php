<nav class="ly_bread">
  <div class="bread" vocab="http://schema.org/" typeof="BreadcrumbList">
    <span property="itemListElement" typeof="ListItem" class="bread_item"><a property="item" typeof="WebPage" href="/" class="home"><span property="name">HOME</span></a><meta property="position" content="1"></span>
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
    $bread_title = get_the_title();
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
    }else{
      $nowcat = get_the_category();
      $nowtag = get_the_tags();
      if($nowcat[0] -> slug == 'cancer'){
      echo <<< EMO
      <span property="itemListElement" typeof="ListItem" class="bread_item"><a property="item" typeof="WebPage" title="がん種一覧" href="/cancer" class="taxonomy category"><span property="name">がん種一覧</span></a><meta property="position" content="2"></span>
      >
EMO;
      if(!empty($nowtag)){
      echo <<< EMO
      <span property="itemListElement" typeof="ListItem" class="bread_item"><a property="item" typeof="WebPage" title="{$nowtag[0] -> name}" href="/cancer/{$nowtag[0] -> slug}" class="taxonomy category"><span property="name">{$nowtag[0] -> name}</span></a><meta property="position" content="2"></span>
      >
EMO;
      }
      }else{
      $category_link = get_category_link( $nowcat[0] -> term_id);
      echo <<< EMO
      <span property="itemListElement" typeof="ListItem" class="bread_item"><a property="item" typeof="WebPage" title="{$nowcat[0] -> name}" href="{$category_link }" class="taxonomy category"><span property="name">{$nowcat[0] -> name}</span></a><meta property="position" content="2"></span>
      >
EMO;
      }
    }
    $bread_title = get_the_title();
  }elseif(is_404()){
    $bread_title = '404';
  }elseif(is_category()||is_tag()){
  if(is_category()){
    $term_query = get_term(get_query_var('cat'),'category');
  }elseif(is_tag()){
    $term_query = get_term(get_query_var('tag_id'),'post_tag');
  }
  $bread_title = $term_query->name;
  }elseif(is_search()){
    $bread_title = the_search_query().'の検索結果';
  }else{
    $bread_title = get_the_title();
    $bread_title = strip_tags($bread_title);
  }
    ?>
    <span property="itemListElement" typeof="ListItem" class="bread_item"><span property="name"><?php echo $bread_title; ?></span><meta property="position" content="3"></span>
  </div>
</nav>
