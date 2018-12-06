<?php get_header(); ?>
<div class="ly_wrap">
  <div class="ly_slider">
  <script type="text/javascript" src="<?php echo get_template_directory_uri( '' ); ?>/js/slick/slick.min.js"></script>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri( '' ); ?>/js/slick/slick.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri( '' ); ?>/js/slick/slick-theme.css">
  <script>
  jQuery(function() {
    jQuery('.slider').slick({
    infinite: true,
    dots:true,
    arrows:true,
    slidesToShow: 1,
    centerMode: true, //要素を中央寄せ
    centerPadding:'0px', //両サイドの見えている部分のサイズ
    autoplay:true
  });
  });
  </script>
    <ul class="slider">
      <?php
      $args=array(
        'tax_query' => array(
			array(
				'taxonomy' => 'post_tag',
				'field' => 'slug',
				'terms' => array('toppage')
			)
		),
        	'cat' => 184,
			'posts_per_page'=> 4,
			'paged' => $paged
		);
      ?>
      <li class="test">テスト</li>
      <li class="test">テスト２</li>
      <li class="test">テスト３</li>
      <li class="test">テスト４</li>
    </ul>
  </div>
</div>
<?php get_footer(); ?>
