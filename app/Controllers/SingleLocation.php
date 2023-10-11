<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleLocation extends Controller
{
  public function tourVideo()
  {
      $output = '<div class="container"><div class="embed-container">';
      $output .= get_field('video_embed');
      $output .= '</div></div>';
      return $output;
  }

  use Partials\location;

  public function profile()
  {
    return (object) array(
       'borough'   =>   get_field('borough'),
       'creator'   =>   get_field('creator'),
       'period'    =>   get_field('period')
    );
  }

  public function locationEvents()
  {

    global $post;

    $Closest_Events = tribe_get_events( [
       'posts_per_page' => 1,
       'start_date'     => 'now',
       'meta_query' => array(
                  			array(
                  				'key' => 'celebration_location', // name of custom field
                  				'value' => get_the_ID(), // matches exaclty "123", not just 123. This prevents a match for "1234"
                  				'compare' => 'LIKE'
                  			)
       							)
    ]);

    return array_map(function ($post) {
       return [
         'title'      =>  get_the_title( $post->ID ),
         'time'       =>  tribe_get_start_date($post->ID),
         'thumbnail'      =>  get_the_post_thumbnail_url($post->ID,'news_thumb') ?: \App\asset_path('images/placeholder-nylandmarks.png'),
         'content'    =>  get_the_excerpt( $post->ID ),
         'permalink'       =>  get_the_permalink( $post->ID ),
       ];
    }, $Closest_Events);
    //return $Closest_Events;


  }

  public function prevLandmark()
  {

    $prevPost =  get_previous_post();

    //return $prevPost;
    if($prevPost != ''):
      return (object) array(
        'title'       => $prevPost->post_title,
        'permalink'   => get_the_permalink($prevPost->ID),
        'excerpt'     => get_the_excerpt($prevPost->ID),
        'thumb'       => get_the_post_thumbnail_url($prevPost->ID,'news_thumb') ?: \App\asset_path('images/placeholder-nylandmarks.png'),
      );
    else:
      return false;
    endif;
  }

  public function nextLandmark()
  {

    $nextPost =  get_next_post();

    if($nextPost != ''):
      return (object) array(
        'title'       => $nextPost->post_title,
        'permalink'   => get_the_permalink($nextPost->ID),
        'excerpt'     => get_the_excerpt($nextPost->ID),
        'thumb'       => get_the_post_thumbnail_url($nextPost->ID, 'news_thumb') ?: \App\asset_path('images/placeholder-nylandmarks.png'),
      );
    else:
      return false;
    endif;
  }

}
