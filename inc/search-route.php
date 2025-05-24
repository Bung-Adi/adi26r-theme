<?php

add_action('rest_api_init', 'adi26rRegisterSearch');

function adi26rRegisterSearch() {
  register_rest_route('adi26r/v1', 'search', array(
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'adi26rSearchResults'
  ));
}

function adi26rSearchResults($data) {
  $mainQuery = new WP_Query(array(
    'post_type' => array('post', 'page', 'ai-art-gallery', 'concept'),
    's' => sanitize_text_field($data['term']) // <-- enable search by term
  ));

  $results = array(
    'pages' => array(),
    'post' => array(),
    'ai-art-gallery' => array(),
    'concept' => array()
  );

  while($mainQuery->have_posts()) {
    $mainQuery->the_post();

    if (get_post_type() == 'page') {
      array_push($results['pages'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink()
      ));
    }
    
    if (get_post_type() == 'post') {
      array_push($results['post'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'image' => get_the_post_thumbnail_url(0, 'thumbnail')
      ));
    }
    
    if (get_post_type() == 'ai-art-gallery') {
      array_push($results['ai-art-gallery'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'image' => get_the_post_thumbnail_url(0, 'thumbnail')
      ));
    }
    
    if (get_post_type() == 'concept') {
      array_push($results['concept'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'image' => get_the_post_thumbnail_url(0, 'thumbnail')
      ));
    }
  }

  return $results;

}