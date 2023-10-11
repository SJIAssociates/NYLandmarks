<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateCelebrate extends Controller
{
  protected $acf = true;

  public function landing ()
  {
    $data['background'] = get_field('background');
    $data['content'] = get_field('intro_copy');

    return $data;
  }
  
  public function CelebrateLocations ()
  {
    $locations = get_posts([
      'post_type' => 'location',
      'posts_per_page' => -1
    ]);

    return array_map(function ($post) {
         return [
             'content'   => get_the_excerpt( $post->ID ),
             'permalink' => get_permalink( $post->ID),
             'title'     => get_the_title( $post->ID ),
             'borough'   => get_field('borough', $post->ID ),
             'genre'     => get_field('building_type',$post->ID ),
             'thumbnail' => get_the_post_thumbnail_url($post->ID,'location_thumb') ?: \App\asset_path('images/location-placeholder.jpg'),
         ];
     }, $locations);
     
  }  

  public function eventsLoop()
  {

    global $post;

    $Closest_Events = tribe_get_events( [
       'posts_per_page' => 3,
       'start_date'     => 'now',
       'tax_query'=> array(
   				array(
   					'taxonomy' => 'tribe_events_cat',
   					'field' => 'slug',
   					'terms' => 'celebrate-50-at-50'
   				)
 			),
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
  }

  public function CelebrateTrio()
  {

    $serviceRepeater = get_field( 'trio_boxes' );  // false equals to current post

    //Maybe do something with a limit here
    return array_map(function ($item) {
        return [
            'icon'        => $item['icon'],
            'title'       => $item['section_title'],
            'description' => $item['description'],
            'link'        => $item['section_link'],
        ];
    }, $serviceRepeater ?? [] );
  }

  public function VideoSection()
  {
    $data['copy'] = get_field('section_content');
    $data['title'] = get_field('section_title');
    $data['video'] = get_field('video_url');

    return $data;
  }

  public function timeline()
  {
    $timeline = get_field('timeline_cards');

    return array_map(function ($item) {
        return [
            'title'        => $item['title'],
            'year'         => $item['year'],
            'card_image'   => $item['card_image'],
            'content'      => $item['card_story'],
            'story_image'  => $item['story_image'],
        ];
    }, $timeline ?? [] );
  }
}
