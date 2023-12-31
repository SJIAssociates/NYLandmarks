<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public function logo()
    {
      return get_field('logo','options');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if(is_tax('tribe_events_cat') ){
          return single_term_title();
        }

        if (is_archive() AND !is_category() AND !is_month() ) {
            return post_type_archive_title();
        }
        if(is_category() or is_month() ){
          return get_the_archive_title();
        }

        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }

        return get_the_title();
    }

    public function footerForm()
    {
      //$form  = get_field(' signup_form','options');
      return get_field('signup_form','options');
    }

    public function social()
    {
      return (object) array(
         'facebook'  =>   get_field('facebook','options'),
         'twitter'   =>   get_field('twitter','options'),
         'youtube'   =>   get_field('youtube','options'),
         'instagram' =>   get_field('instagram','options')
      );
    }

    public function headerImage()
    {
      if( is_home() ) {
        $newsID = get_option('page_for_posts', true);
        $img = get_the_post_thumbnail_url($newsID);

      }elseif( is_category() ) {

        $term = get_queried_object();
        $catImg = get_field('category_image',$term);

        $img = $catImg['url'];

      }elseif(is_post_type_archive('landmark') ) {
        $archiveImg = get_field('explore_image', 'options');
        $img = $archiveImg['url'];

      }elseif(is_post_type_archive('sacred_sites') ) {
        $archiveImg = get_field('sacred_sites_image', 'options');
        $img = $archiveImg['url'];

      }elseif(is_post_type_archive('success_stories') ) {
        $archiveImg = get_field('success_stories_archive_img', 'options');
        $img = $archiveImg['url'];

      }elseif(is_singular('staff')){

        $img = get_the_post_thumbnail_url() ?: \App\asset_path('images/placeholder-nylandmarks.png');

      }else {
        $img = get_the_post_thumbnail_url() ?? FALSE;
      }

      return $img;
    }

    public function breadcrumbs()
    {
      $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
      $delimiter = '&gt;</span>'; // delimiter between crumbs
      $home = 'Home'; // text for the 'Home' link
      $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
      $before = '<span class="current">'; // tag before the current crumb
      $after = '</span>'; // tag after the current crumb
      global $post;
      $homeLink = get_bloginfo('url');
      $enableBreadcrumbs = get_field('enable_breadcrumbs','options');

      $output = '<div id="crumbs" class="py-3"><a href="' . $homeLink . '" class="underline text-black home-crumb">' . $home . '</a> <span class="delimiter home-delimiter">' . $delimiter . ' ';

      if (is_category()) {

          $thisCat = get_category(get_query_var('cat'), false);
          if ($thisCat->parent != 0) {
              $output .= get_category_parents($thisCat->parent, true, ' <span class="delimiter">' . $delimiter . ' ');
          }
          $output .= $before . 'Category: ' . single_cat_title('', false) . $after;

      } elseif (is_search()) {

          $output .= $before . 'Search results for "' . get_search_query() . '"' . $after;

      }elseif (is_post_type_archive() ) {

        if(is_tax('tribe_events_cat')) {
          $term = get_queried_object();

          $output .= '<a href="/events/" class="text-black underline">Events</a>';
          $output .= ' ' . $delimiter . ' ';
          $output .=  $term->name;
        } else {
          $post_type = get_post_type_object(get_post_type());
          $archive_title = get_the_archive_title();
          $output .= str_replace('Archives:','',$archive_title);
        }

      } elseif( is_home() ) {

          $home = get_option('page_for_posts', true);
          $output .= get_the_title($home);

      } elseif (is_single() && !is_attachment()) {

          //Event
          if (is_singular('tribe_events')) {

            $post_type = get_post_type_object(get_post_type());
            $output .= '<a href="/events/" class="text-black underline">Events</a>';
            $output .= ' ' . $delimiter . ' ';
            $output .= $before . get_the_ID() . $after;

          //Success Stories
          } elseif (is_singular('success_stories')) {

            $cpt_archive_link = get_field('breadcrumb_link_success_stories','options') ?: '/what-we-do/success-stories/';

            $output .= '<a href="/what-we-do/" class="text-black underline">What We Do</a>';
            $output .= ' ' . $delimiter . ' ';
              $output .= '<a href="'. $cpt_archive_link .'" class="text-black underline">Success Stories</a>';
            $output .= ' ' . $delimiter . ' ';
            $output .= $before . get_the_title() . $after;

            //50 at 50 Location
          } elseif (is_singular('location')) {

                $output .= '<a href="/celebrate-50-at-50/" class="text-black underline">Celebrate 50 at 50</a>';
              $output .= ' ' . $delimiter . ' ';
              $output .= $before . get_the_title() . $after;

          //Staff
          } elseif (is_singular('staff')) {

            $cpt_archive_link =  get_field('breadcrumb_link_staff','options');
            $cpt_archive_url = get_the_permalink($cpt_archive_link) ?: '/who-we-are/board-staff/';

            $output .= '<a href="/who-we-are/" class="text-black underline">Who We Are</a>';
            $output .= ' ' . $delimiter . ' ';
            $output .= '<a href="' . $cpt_archive_url .'" class="text-black underline">Board & Staff</a>';
            $output .= ' ' . $delimiter . ' ';
            $output .= $before . get_the_title() . $after;

          //All other Post Types that aren't Post
          } elseif (get_post_type() != 'post') {

              $post_type = get_post_type_object(get_post_type());
              $archive_link = get_post_type_archive_link($post_type->name);
              $slug = $post_type->rewrite;

              $acf_breadcrumb = 'breadcrumb_link_' . $post_type->name;



              $customLink = get_field($acf_breadcrumb, 'options') ?: $archive_link;
              $customLink = get_the_permalink($customLink) ?: $archive_link;

              $output .= '<a href="' . $customLink . '" class="text-black underline">' . $post_type->labels->singular_name . '</a>';
              if ($showCurrent == 1) {
                  $output .= ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
              }

          //Post
          } else {
              $cat = get_the_category();
              $cat = $cat[0];
              $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
              $archive_title = get_the_title(get_option('page_for_posts', true) );
              $archive_link = get_post_type_archive_link('post');
              if ($showCurrent == 0) {
                  $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
              }

              $newsPage = '<a href="' . $archive_link . '" class="underline text-black">' . $archive_title . '</a>';

              $output .=  $newsPage . ' ' . $delimiter . ' ';
              //$output .= $cats;
              if ($showCurrent == 1) {

                  $title = get_the_title();
                  $cleanName = strip_tags($title);
                  $output .= $before . $cleanName . $after;
              }
          }
      } elseif (is_page() && !$post->post_parent) {
          if ($showCurrent == 1) {
              $output .= $before . get_the_title() . $after;
          }
      } elseif (is_page() && $post->post_parent) {
          $parent_id  = $post->post_parent;
          $breadcrumbs = array();
          while ($parent_id) {
              $page = get_page($parent_id);
              $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '" class="text-black underline px-2 parent-page">' . get_the_title($page->ID) . '</a>';
              $parent_id  = $page->post_parent;
          }
          $breadcrumbs = array_reverse($breadcrumbs);
          for ($i = 0; $i < count($breadcrumbs); $i++) {
              $output .= $breadcrumbs[$i];
              if ($i != count($breadcrumbs)-1) {
                  $output .= ' <span class="delimiter">' . $delimiter . ' ';
              }
          }
          if ($showCurrent == 1) {
              $output .= ' <span class="delimiter">' . $delimiter . ' ' . $before . get_the_title() . $after;
          }
      } elseif (is_404()) {
          $output .= $before . 'Error 404' . $after;
      }
      $output .= '</div>';

      if($enableBreadcrumbs == 'Off'):
        return false;
      else:
        return $output;
      endif;


    } // end the_breadcrumb()

    public function pageSidebar()
    {
      global $post;

      if( !is_404() ):

        $sidebarRepeater = get_field('sidebar_content');

        if( $sidebarRepeater ) {

            return array_map(function ($item) {
                return [
                    'title'       => $item['title'],
                    'content'     => $item['content'],
                    'cta_text'    => $item['cta_text'],
                    'cta_link'    => $item['cta_link'],
                ];
            }, $sidebarRepeater ?? [] );

        } else {
          return false;
        }
      endif;
    }

    public function subPages()
    {
      $pages = get_field('grants');

      if( !empty($pages) ){

        return array_map(function ($item) {
            return [
                'title'       => $item->post_title,
                'excerpt'     => get_the_excerpt( $item->ID),
                'permalink'   => get_the_permalink($item->ID),
                'thumbnail'   => get_the_post_thumbnail_url( $item->ID, 'news_thumb')
            ];
        }, $pages);

      } else {
        return false;
      }

    }

    public function subtitle()
    {
      $subtitle = get_field('sub_title');

      if($subtitle):
        return $subtitle;
      else:
        return false;
      endif;
    }

    public function footerLink()
    {
      $choice = get_field('page_or_email','options');

      if( $choice == 'Email'){
        return 'mailto:' . get_field('footer_email','options');
      }else {
        return get_field('footer_page','options');
      }
    }

    use Partials\CategoryLoops;
}
