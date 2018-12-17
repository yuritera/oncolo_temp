<?php
if ($wp_query->have_posts()):
  echo '<div class="postlist_type3_wrap">';
while($wp_query->have_posts()) : $wp_query->the_post();
$cat_ids = get_the_category();
?>
<section class="postlist_type3">
  <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
    <aside class="eyecach"><?php if(has_post_thumbnail()) {
      $rand_img = get_the_post_thumbnail(get_the_ID(),'thumbnail', array('alt'=>get_the_title()) );
      } else {
      $rand_no =mt_rand(1, 4);
      $rand_img = '<img src="'.get_stylesheet_directory_uri().'/images/noimage.jpg">';
      } echo $rand_img; ?></aside>
    <div class="textarea">
      <h3 class="ttl"><?php echo strip_tags(get_the_title()); ?></h3>
      <p class="update"><?php the_time('Y.m.d'); ?></p>
      <ul class="cat_list"><?php foreach((get_the_category()) as $cat){ echo '<li>' . $cat->cat_name . '</li> '; } ?></ul>
      <?php
      echo '<p class="txt">'.strip_tags(mb_strimwidth(get_the_excerpt(), 0, 240, "…", "UTF-8")).'</p>';
    ?>
    </div>
    </a>
</section>
<?php
endwhile;
echo '</div>';
echo '<div class="pager">';
wp_pagenavi(array(
  'options' => array(
    'pages_text' => "",
  )
)
);
echo '</div>';
else:
echo '<p class="nolist">記事がありません</p>';
endif;
wp_reset_postdata();
?>
