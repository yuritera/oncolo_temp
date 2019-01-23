<?php
global $post_datas;
echo '<div class="postlist_type1_wrap">';
foreach( $post_datas as $post_data ) :
if(!empty($post_data['post_date'])){
  $post_date = new DateTime($post_data['post_date']);
  $post_date = $post_date->format('Y.m.d');
}else{
  $post_date =get_the_time('Y.m.d',$post_data['post_num']);
}
if(!empty($post_data['post_title'])){
  $post_data_title = $post_data['post_title'];
}else{
  $post_data_title = mb_strimwidth(get_the_title($post_data['post_num']), 0, 70, "…", "UTF-8");
}
if(!empty($post_data['post_link'])){
  $post_link =$post_data['post_link'];
}else{
  $post_link =get_the_permalink( $post_data['post_num']);
}
if(!empty($post_data['post_txt'])){
  $post_data_txt = $post_data['post_txt'];
}else{
  $post_data_txt = mb_strimwidth(get_the_title($post_data['post_num']), 0, 70, "…", "UTF-8");
}
?>
<section class="postlist_type1">
  <div class="recent_triger">
    <aside class="eyecach"><?php
    if(!empty($post_data['post_img'])) {
      $rand_img = '<img src="'.$post_data['post_img'].'">';
    }elseif(has_post_thumbnail( $post_data['post_num'])){
      $rand_img = get_the_post_thumbnail($post_data['post_num'],'large' );
    } else {
      $rand_img = '<img src="'.get_stylesheet_directory_uri().'/images/noimage.jpg">';
    } echo $rand_img; ?></aside>
    <div class="textarea">
      <p class="update"><?php echo $post_date; ?></p>
      <h3 class="ttl"><?php echo $post_data_title; ?></h3>
    </div>
  </div>
  <div class="recent_popup">
    <a href="<?php echo $post_link; ?>">
    <?php
      echo '<p class="txt">'.$post_data_txt.'</p>';
    ?>
    <div class="more">記事を読む</div>
    </a>
  </div>
</section>
<?php endforeach;
echo '</div>';
wp_reset_postdata(); ?>
