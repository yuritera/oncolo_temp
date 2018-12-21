<?php
global $post_ids;
echo '<div class="postlist_type2_wrap">';
foreach( $post_ids as $post ) :setup_postdata($post);
$cat_ids = get_the_category();
?>
<section class="postlist_type3">
  <a href="<?php $post_link =get_the_permalink( $post ); ?>">
    <aside class="eyecach"><?php if(has_post_thumbnail()) {
      $rand_img = get_the_post_thumbnail(get_the_ID(),'thumbnail', array('alt'=>get_the_title()) );
      } else {
      $rand_img = '<img src="'.get_stylesheet_directory_uri().'/images/noimage.jpg">';
      } echo $rand_img; ?></aside>
    <div class="textarea">
      <h3 class="ttl"><?php echo mb_strimwidth(get_the_title(), 0, 70, "…", "UTF-8"); ?></h3>
      <p class="update"><?php the_time('Y.m.d'); ?></p>
      <ul class="cat_list"><?php foreach((get_the_category()) as $cat){ echo '<li>' . $cat->cat_name . '</li> '; } ?></ul>
    </div>
    </a>
</section>
<?php endforeach;
echo '</div>';
wp_reset_postdata(); ?>
