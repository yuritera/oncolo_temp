<?php
/*
Template Name: LinkIT
*/

if($_GET['id']){
$my_postid = $_GET['id'];
}else{
$my_postid = 16;
}
$content_post = get_post($my_postid);


$content = $content_post->post_content;
$title = $content_post->post_title;

$contents = apply_filters('the_content', $content);
$contents = str_replace(']]>', ']]&gt;', $contents);

$contents = preg_replace('#<img.+?src="([^"]*)".*?/?>#i', '<img src="$1" class="img">', $contents);


?>
<html>
<head>
<title><?php echo $title; ?></title>

<script type='text/javascript' src='https://oncolo.jp/wp/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-61005136-1']);
    _gaq.push(['_trackPageview']);
  </script>

</head>
<body>
<style type="text/css">

.fit{
	width:100%;
}
h1{
  padding-bottom:15px;
}

</style>

<!-- POST ENTRY -->
<div id="post-entry">
<div class="post-entry-inner">
<article <?php post_class('post-single page-single'); ?> id="post-<?php the_ID(); ?>">
<h1 class="post-title entry-title"><?php echo $title; ?></h1>
<?php do_action( 'bp_before_post_content' ); ?>
<div class="post-content">
<div class="entry-content" style="padding-top:30px;">
<?php
echo $contents;
?>
</div>
<?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
</div><!-- POST CONTENT END -->
<?php do_action( 'bp_after_post_content' ); ?>
</article>

</div>
</div>
<!-- POST ENTRY END -->

<script type="text/javascript">


jQuery(document).ready(function() {
    jQuery('.linkitpop').click(function(e) {
        e.preventDefault();
        var url = jQuery(this).attr('href');
        if(/^(http?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url)){
            window.location.replace(url);
        }else{
            jQuery("#linkit").css("display","block");
            jQuery("#linkitout").load(url);
        }
    });
    jQuery('.linkit-close').click(function(e) {
        e.preventDefault();
        jQuery("#linkit").css("display","none");
    });
});

jQuery(document).ready(function() {
  var imgs = jQuery('.img');
  imgs.each(function(){
    var img = jQuery(this);
    var width = img.width();
    var height = img.height();
    if(width > 320){
       img.addClass('fit');
    }
  })
});

(function() {
    var ga = document.createElement('script');     ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:'   == document.location.protocol ? 'https://ssl'   : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
   </script>


</body></html>
