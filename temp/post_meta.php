<!-- ソーシャルボタン-->
<?php if(get_post_meta($post->ID,'social-button',true) == 'SNSボタン無し'): ?>
<?php else : ?>
<?php if(function_exists("wp_social_bookmarking_light_output_e")){wp_social_bookmarking_light_output_e();}?>
<?php endif; ?>

<!-- 更新日-->
<?php
  echo '<ul class ="content_day">';
  echo '<li class="content_day_item">［公開日］'.get_the_time('Y.m.d').'</li>';
  echo '<li class="content_day_item">［最終更新日］'.get_the_modified_date('Y.m.d');
  if(get_post_meta($post->ID,'update-shisetsu',TRUE)){
    echo get_post_meta($post->ID,'update-shisetsu',TRUE);
  }
  echo '</li>';
?>
