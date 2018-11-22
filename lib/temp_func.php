<?php
//SP PC　の出し分け*[sp][pc]
function pcFunc( $atts, $content = null ) {
  if(!is_mobile()){
    $this_content = do_shortcode($content);
  }else{
    $this_content = '';
  }
return  $this_content;
}
add_shortcode('pc', 'pcFunc');
function spFunc( $atts, $content = null ) {
  if(is_mobile()){
    $this_content = do_shortcode($content);
  }else{
    $this_content = '';
  }
return  $this_content;
}
add_shortcode('sp', 'spFunc');
?>
