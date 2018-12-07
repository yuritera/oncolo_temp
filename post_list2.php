<?php if ($wp_query->have_posts()): ?>
<?php while($wp_query->have_posts()) : $wp_query->the_post();
if (function_exists('prm')){$prm = prm();}
if($post -> post_type == 'experiences'){
?>
  <section class="mod-list_exp">
  <a href="<?php $post_link =get_the_permalink( $post ); echo $post_link.do_shortcode('[prm]'); ?>">
  <div class="subarea-txt">
    <h3 class="ttl"><?php echo mb_strimwidth(get_the_title(), 0, 64, "…", "UTF-8"); ?></h3>
  <?php
  $exp_debt = get_post_meta($post->ID,'exp_debt',true);
  if(!empty($exp_debt)){
    echo '<p class="debt">借入額<span class="money">'.$exp_debt.'</span></p>';
    }
  echo '</div></a>';
  if (function_exists('cucy_term_list')){$list_age = cucy_term_list('age','');}
      if (function_exists('cucy_term_list')){$list_occ = cucy_term_list('occ','');}
    if(!empty($list_age) or !empty($list_occ)){
    echo '<ul class="list_exp_tag">';
    echo $list_age.$list_occ;
    echo '</ul>';
    }
  ?>
  </section>
<?php
}else{
  $cat_ids = get_the_category(); $cat_id = end($cat_ids);
?>
  <section class="mod-list_post hvr-post <?php if(is_category()){echo 'in_cat';} ?>">
  <a href="<?php $post_link =get_the_permalink( $post ); echo $post_link.do_shortcode('[prm]'); ?>">
    <aside class="eyecach"><?php if(has_post_thumbnail()) {
      $rand_img = get_the_post_thumbnail(get_the_ID(),'thumbnail', array('alt'=>get_the_title()) );
      } else {
      $rand_no =mt_rand(1, 4);
      $rand_img = '<img src="'.get_stylesheet_directory_uri().'/images/noimage0'.$rand_no.'.jpg">';
      } echo $rand_img; ?></aside>
    <div class="subarea-txt">
      <h3 class="ttl"><?php echo mb_strimwidth(get_the_title(), 0, 64, "…", "UTF-8"); ?></h3>
      <?php if(!is_mobile()){
        echo '<p class="txt">'.mb_strimwidth(get_the_excerpt(), 0, 120, "…", "UTF-8").'</p>';
      } ?>
    </div>
    </a>
    <?php if(!is_category()) : ?>
    <p class="link-cat"><a href="<?php echo esc_url(get_category_link($cat_id->term_id)).$prm; ?>"><?php echo $cat_id->name; ?></a></p>
    <?php endif; //if not category ?>
  </section>
<?php }
endwhile;
if(is_mobile()){
  if (function_exists("sp_pagination")) {sp_pagination();}
}else{
  if (function_exists("pagination")) {pagination();}
}
else: 
echo '<p class="nolist">記事がありません</p>';
endif; ?>