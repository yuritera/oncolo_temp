<?php get_header(); ?>
<div class="ly_wrap">
<div class="ly_inner">
<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>
<?php get_template_part('temp/bread'); ?>
<article class="content">
<header id="contentHead" class="content_head">
  <h1 class="ttl_blblue"><?php the_title(); ?></h1>
  <?php get_template_part('temp/post_meta'); ?>
</header>
<?php
  echo '<main class="content_main">';
  echo '<div class="entry-content">';
  the_content();
  echo '</div>';
  echo '</main>';
  endwhile;
endif;
?>
</article>
</div><!--/innner-->
</div><!--/wrap-->
<?php get_footer(); ?>
