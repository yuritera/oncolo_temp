<?php
global $post_datas , $cat_view , $date_view;
echo '<div class="postlist_type2_wrap">';
foreach( $post_datas as $post_data ) :
$cat_ids = get_the_category($post_data['post_num']);
if(!empty($post_data['post_link'])){
  $post_link =$post_data['post_link'];
}else{
  $post_link =get_the_permalink( $post_data['post_num']);
}
if(!empty($post_data['post_date'])){
  $post_date = new DateTime($post_data['post_date']);
  $post_date = $post_date->format('Y.m.d');
}else{
  $post_date =get_the_time('Y.m.d',$post_data['post_num']);
}
?>
<section class="postlist_type2">
  <a href="<?php echo $post_link; ?>">
    <aside class="eyecach"><?php
    if(!empty($post_data['post_img'])) {
      $rand_img = '<img src="'.$post_data['post_img'].'">';
    }elseif(has_post_thumbnail( $post_data['post_num'])){
      $rand_img = get_the_post_thumbnail($post_data['post_num'],'large' );
    } else {
      $rand_img = '<img src="'.get_stylesheet_directory_uri().'/images/noimage.jpg">';
    } echo $rand_img; ?></aside>
    <div class="textarea">
      <?php if($date_view === true) : ?>
      <p class="update"><?php echo $post_date; ?></p>
      <?php endif; ?>
      <?php if($cat_view === 'view') : ?>
        <ul class="cat_list"><?php foreach((get_the_category()) as $cat){ echo '<li>' . $cat->cat_name . '</li> '; } ?></ul>
      <?php elseif( $cat_view === 'event' ) : ?>
        <ul class="cat_list"><li>イベント</li></ul>
      <?php endif; ?>
    <?php if(!empty($post_data['post_title'])){
        $post_data_title = $post_data['post_title'];
      }else{
        $post_data_title = mb_strimwidth(get_the_title($post_data['post_num']), 0, 70, "…", "UTF-8");
      } ?>
      <h3 class="ttl"><?php echo $post_data_title; ?></h3>
    </div>
    </a>
</section>
<?php endforeach; ?>
</div>
