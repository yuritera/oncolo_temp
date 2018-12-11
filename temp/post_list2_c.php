<?php
global $post_datas , $cat_view;
foreach( $post_datas as $post_data ) :
$cat_ids = get_the_category($post_data -> ID);
?>
<section class="postlist_type2">
  <a href="<?php $post_link =get_the_permalink( $post_data -> ID ); ?>">
    <aside class="eyecach"><?php
    if(!empty($post_data -> post_img)) {
      $rand_img = '<img src="'.$post_data -> post_img.'">';
    }elseif(has_post_thumbnail( $post_data -> ID )){
      $rand_img = get_the_post_thumbnail($post_data -> ID,'thumbnail' );
    } else {
      $rand_img = '<img src="'.get_stylesheet_directory_uri().'/images/noimage.jpg">';
    } echo $rand_img; ?></aside>
    <div class="textarea">
      <p class="update"><?php echo get_the_time('Y.m.d',$post_data -> ID); ?></p>
      <?php if($cat_view === 'view') : ?>
        <ul class="cat_list"><?php foreach((get_the_category()) as $cat){ echo '<li>' . $cat->cat_name . '</li> '; } ?></ul>
      <?php elseif( $cat_view === 'event' ) : ?>
        <ul class="cat_list"><li>イベント</li></ul>
      <?php endif; ?>
    <?php if(!empty($post_data -> post_title)){
        $post_data_title = $post_data -> post_title;
      }else{
        $post_data_title = mb_strimwidth(get_the_title($post_data -> ID), 0, 70, "…", "UTF-8");
      } ?>
      <h3 class="ttl"><?php echo $post_data_title; ?></h3>
    </div>
    </a>
</section>
<?php endforeach; ?>
