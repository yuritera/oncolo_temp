<?php
/*
YARPP Template: Simple
Author: Shigeo Kinoshita
Description: A simple example YARPP template.
*/
?>
<section class="content_related">
<h3 class="content_related_ttl">関連記事</h3>
<?php if (have_posts()):?>
<ul class="content_related_post">
	<?php while (have_posts()) : the_post(); ?>
	<li><a href="<?php the_permalink() ?>" rel="bookmark">
		<div class="content_related_post_pic"><?php the_post_thumbnail('medium'); ?></div>
		<div class="content_related_post_ttl"><?php the_title(); ?></div>
	</a></li>
	<?php endwhile; ?>
</ul>
<?php else: ?>
<p>No related posts.</p>
<?php endif; ?>
</section>
