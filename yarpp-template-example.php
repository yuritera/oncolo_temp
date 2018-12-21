<?php
/*
YARPP Template: Simple
Author: Shigeo Kinoshita
Description: A simple example YARPP template.
*/
?>
<section class="content_related">
<h2 class="content_related_ttl">関連記事</h2>
<?php if (have_posts()):?>
<div class="postlist_type3_wrap">
	<?php while (have_posts()) : the_post(); ?>
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
    </div>
    </a>
</section>
	<?php endwhile; ?>
</div>
<?php else: ?>
<p>No related posts.</p>
<?php endif; ?>
</section>
