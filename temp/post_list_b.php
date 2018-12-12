<?php
if ($wp_query->have_posts()):
  echo '<div class="postlist_type1_wrap">';
while($wp_query->have_posts()) : $wp_query->the_post();
$cat_ids = get_the_category();
?>
<section class="postlist_type1">
  <div class="recent_triger">
    <aside class="eyecach"><?php if(has_post_thumbnail()) {
      $rand_img = get_the_post_thumbnail(get_the_ID(),'thumbnail', array('alt'=>get_the_title()) );
      } else {
      $rand_no =mt_rand(1, 4);
      $rand_img = '<img src="'.get_stylesheet_directory_uri().'/images/noimage.jpg">';
      } echo $rand_img; ?></aside>
    <div class="textarea">
      <p class="update"><?php the_time('Y.m.d'); ?></p>
      <ul class="cat_list"><?php foreach((get_the_category()) as $cat){ echo '<li>' . $cat->cat_name . '</li> '; } ?></ul>
      <h3 class="ttl"><?php echo mb_strimwidth(get_the_title(), 0, 70, "…", "UTF-8"); ?></h3>
    </div>
  </div>
  <div class="recent_popup">
    <a href="<?php $post_link =get_the_permalink( $post ); ?>">
    <?php
      echo '<p class="txt">'.mb_strimwidth(get_the_excerpt(), 0, 240, "…", "UTF-8").'</p>';
    ?>
    <div class="more">記事を読む</div>
    </a>
  </div>
</section>
<?php
endwhile;
echo '</div>';
else:
echo '<p class="nolist">記事がありません</p>';
endif;
?>
