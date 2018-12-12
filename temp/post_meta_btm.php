<!-- ソーシャルボタン-->
<?php if(get_post_meta($post->ID,'social-button',true) == 'SNSボタン無し'): ?>
<?php else : ?>
<?php if(function_exists("wp_social_bookmarking_light_output_e")){wp_social_bookmarking_light_output_e();}?>
<?php endif; ?>

<!-- 利益相反-->
<?php if(get_post_meta($post->ID,'conflict',true) == '利益相反無しの表示を出す'): ?>
<p>この記事に利益相反はありません。</p>
<?php endif; ?>
