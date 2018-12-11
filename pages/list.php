<?php
/*
Template Name:リスト
*/

  $terms = get_terms('post_tag');
  foreach ($terms as $term) {
    echo $term -> term_id .','. $term -> name .','. $term -> slug .','. $term -> parent .'<br>';
  }
?>
