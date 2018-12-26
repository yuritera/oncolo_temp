<?php get_header(); ?>
<div class="ly_wrap">
<div class="ly_inner">
<?php get_template_part('temp/bread'); ?>
<article class="content">
<header id="contentHead" class="content_head">
  <h1 class="ttl_blblue">お探しのページは存在しません</h1>
</header>
<?php
  echo '<main class="content_main">';
  echo '<div class="entry-content">';
  echo '<p>お探しのページを削除されたか、URLが間違っている可能性があります。</p>';
  echo '</div>';
  echo '</main>';
?>
</article>
</div><!--/innner-->
</div><!--/wrap-->
<?php get_footer(); ?>
