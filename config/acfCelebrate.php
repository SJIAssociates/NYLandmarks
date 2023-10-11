<?php
if( function_exists('acf_add_local_field_group') ):
/*
Group Name: Celebrate Landing
Fields: Background [IMAGE], Intro Copy [TEXT], Video [FILE]
Location: Template: 50 at 50
*/
acf_add_local_field_group(array(
  'key' => 'group_62f123cbb015c',
  'title' => 'Celebrate:: Landing',
  'fields' => array(
      array(
        'key' => 'field_62f123e1ccb50',
        'label' => 'Background',
        'name' => 'background',
        'type' => 'image',
        'return_format' => 'url',
        'preview_size' => 'medium',
        'library' => 'uploadedTo',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
      array(
        'key' => 'field_62f123eaccb51',
        'label' => 'Intro Copy',
        'name' => 'intro_copy',
        'type' => 'textarea',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
    ),
  'location' => array(
    array(
      array(
        'param' => 'page_template',
        'operator' => '==',
        'value' => 'views/template-celebrate.blade.php',
      ),
    ),
  ),
  'menu_order' => 0,
  'hide_on_screen' => array(
      0 => 'the_content',
      1 => 'excerpt',
      2 => 'discussion',
      3 => 'comments',
    ),
  'active' => true,
));
/*
Group Name: Trio Boxes
Fields: trio_boxes [Repeater]
Location: Template: 50 at 50
*/
acf_add_local_field_group(array(
  'key' => 'group_62f11dc39689a',
  'title' => 'Celebrate::Page Navigation',
  'fields' => array(
    array(
      'key' => 'field_62f11dd7bc0be',
      'label' => 'Trio Boxes',
      'name' => 'trio_boxes',
      'type' => 'repeater',
      'layout' => 'block',
      'sub_fields' => array(
          array(
            'key' => 'field_62f11de8bc0bf',
            'label' => 'Section Title',
            'name' => 'section_title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '25',
              'class' => '',
              'id' => '',
            ),
          ),
          array(
            'key' => 'field_62f11df0bc0c0',
            'label' => 'Icon',
            'name' => 'icon',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '25',
            ),
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
          ),
          array(
            'key' => 'field_62f11df9bc0c1',
            'label' => 'Description',
            'name' => 'description',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '25',
              'class' => '',
              'id' => '',
            ),
          ),
          array(
            'key' => 'field_62f11e56bc0c4',
            'label' => 'Section Link',
            'name' => 'section_link',
            'type' => 'text',
            'instructions' => 'Enter the ID of the section you would like to link to. Do not include the # symbol.',
            'required' => 0,
            'wrapper' => array(
              'width' => '25',
              'class' => '',
              'id' => '',
            ),
          ),
        ),
      ),
      ),
  'location' => array(
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'views/template-celebrate.blade.php',
        ),
      ),
    ),
  'menu_order' => 1,
  'hide_on_screen' => array(
      0 => 'the_content',
      1 => 'excerpt',
      2 => 'discussion',
      3 => 'comments',
    ),
  'active' => true,
));
/*
Group Name: Celebration Video
Fields: section_title, section_content, video_url
Location: Template: 50 at 50
*/
acf_add_local_field_group(array(
  'key' => 'group_62fe5d886ed59',
  'title' => 'Celebration Video',
  'fields' => array(
    array(
      'key' => 'field_62fe5eb0596ee',
      'label' => 'Section Title',
      'name' => 'section_title',
      'type' => 'text',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '25',
      ),
      ),
    array(
      'key' => 'field_62fe5eb6596ef',
      'label' => 'Section Content',
      'name' => 'section_content',
      'aria-label' => '',
      'type' => 'textarea',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '75',
        'class' => '',
        'id' => '',
      ),
    ),
    array(
      'key' => 'field_62fe5d93524b9',
      'label' => 'Video URL',
      'name' => 'video_url',
      'aria-label' => '',
      'type' => 'oembed',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
    ),
    ),
  'location' => array(
    array(
      array(
        'param' => 'page_template',
        'operator' => '==',
        'value' => 'views/template-celebrate.blade.php',
        ),
      ),
    ),
  'menu_order' => 2,
  'hide_on_screen' => '',
  'active' => true,
  'show_in_rest' => 0,
));
/*
Group Name: Celebration::Timeline
Fields: timeline_cards[Repeater]
            - year [TEXT]
            - title [TEXT]
            - card_image [IMAGE]
            - card_story [wysiwyg]
            - story_image [IMAGE]
Location: Template: 50 at 50
*/
acf_add_local_field_group(array(
  'key' => 'group_62ff8a292cb82',
  'title' => 'Celebration::Timeline',
  'fields' => array(
      array(
        'key' => 'field_62ff8a3f8e2fb',
        'label' => 'Timeline Cards',
        'name' => 'timeline_cards',
        'type' => 'repeater',
        'collapsed' => 'field_62ff8a488e2fc',
        'layout' => 'block',
        'button_label' => 'Add Card',
        'sub_fields' => array(
            array(
              'key' => 'field_62ff8a518e2fd',
              'label' => 'Year',
              'type' => 'text',
              'name' => 'year',
              'wrapper' => array(
                'width' => '33',
                'class' => '',
                'id' => '',
              ),
              'parent_repeater' => 'field_62ff8a3f8e2fb',
            ),
            array(
              'key' => 'field_62ff8a488e2fc',
              'label' => 'Title',
              'name' => 'title',
              'type' => 'text',
              'wrapper' => array(
                'width' => '33',
                'class' => '',
                'id' => '',
              ),
              'parent_repeater' => 'field_62ff8a3f8e2fb',
            ),
            array(
              'key' => 'field_62ff8a568e2fe',
              'label' => 'Preview Image',
              'name' => 'card_image',
              'type' => 'image',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '33',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'array',
              'preview_size' => 'medium',
              'library' => 'all',
              'parent_repeater' => 'field_62ff8a3f8e2fb',
            ),
            array(
              'key' => 'field_44',
              'label' => 'Long Title',
              'name' => 'long_title',
              'type' => 'text',
              'wrapper' => array(
                'width' => '100',
                'class' => '',
                'id' => '',
              ),
              'parent_repeater' => 'field_62ff8a3f8e2fb',
            ),
            array(
              'key' => 'field_62ff8a618e2ff',
              'label' => 'Card Story',
              'name' => 'card_story',
              'type' => 'wysiwyg',
              'wrapper' => array(
                'width' => '75',
                'class' => '',
                'id' => '',
              ),
              'tabs' => 'all',
              'toolbar' => 'full',
              'media_upload' => 1,
              'delay' => 0,
              'parent_repeater' => 'field_62ff8a3f8e2fb',
            ),
            array(
              'key' => 'field_632339ed141ef',
              'label' => 'Story Image',
              'name' => 'story_image',
              'type' => 'image',
              'wrapper' => array(
                'width' => '25',
              ),
              'return_format' => 'array',
              'preview_size' => 'medium',
              'library' => 'all',
              'parent_repeater' => 'field_62ff8a3f8e2fb',
            ),
          ),
        'rows_per_page' => 20,
      ),
    ),
  'location' => array(
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'views/template-celebrate.blade.php',
        ),
      ),
    ),
  'menu_order' => 4,
  'active' => true,
  'show_in_rest' => 0,
  ));

/*
Group Name: Celebration Event Location
Fields: celebration_location[post_object]
Location: Template: tribe_events
*/
acf_add_local_field_group(array(
  'key' => 'group_630393c9ba005',
  'title' => 'Celebration Event Location',
  'fields' => array(
      array(
      'key' => 'field_630393d306c8f',
      'label' => 'Celebration Location',
      'name' => 'celebration_location',
      'aria-label' => '',
      'type' => 'post_object',
      'instructions' => 'If the event involves one of the 50 at 50 locations, please select it from this list.',
      'post_type' => array(
        0 => 'location',
      ),
      'return_format' => 'id',
      'ui' => 1,
    ),
    ),
  'location' => array(
    array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'tribe_events',
        ),
      ),
    ),
  'menu_order' => 0,
  'position' => 'side',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'active' => true,
));
/*
Group Name: Location Filters
Fields: borough[select],building_type[select],year_built[text]
Location: Template: location
*/
acf_add_local_field_group(array(
  'key' => 'group_63038b3f79b96',
  'title' => 'Location Filters',
  'fields' => array(
    array(
      'key' => 'field_63038b4a72860',
      'label' => 'Borough',
      'name' => 'borough',
      'type' => 'select',
      'choices' => array(
        'manhattan' => 'Manhattan',
        'brooklyn' => 'Brooklyn',
        'queens' => 'Queens',
        'bronx' => 'The Bronx',
        'staten-island' => 'Staten Island',
      ),
      'default_value' => 'manhattan',
      'return_format' => 'label',

    ),
    array(
      'key' => 'field_63038e6672861',
      'label' => 'Building Type',
      'name' => 'building_type',
      'type' => 'select',
      'choices' => array(
        'Civic' => 'Civic',
        'Cultural' => 'Cultural',
        'Domestic' => 'Domestic',
        'Transportation' => 'Transportation',
        'Religion' => 'Religion',
        'Hospitality' => 'Hospitality',
      ),
      'default_value' => false,
      'allow_null' => 1,
      'multiple' => 0,
      'ui' => 0,
      'return_format' => 'value',
      'ajax' => 0,
      'placeholder' => '',
    ),
    array(
      'key' => 'field_630390b872862',
      'label' => 'Year Built',
      'name' => 'year_built',
      'aria-label' => '',
      'type' => 'text',
    ),
    array(
      'key' => 'field_period',
      'label' => 'Period Description',
      'name' => 'period',
      'type' => 'text',
    ),
    array(
      'key' => 'field_creator',
      'label' => 'Creator',
      'name' => 'creator',
      'type' => 'textarea',
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'location',
        ),
      ),
    ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'left',
  'instruction_placement' => 'label',
  'active' => true,
));

acf_add_local_field_group(array(
  'key' => 'group_62fd4809d7ac4',
  'title' => 'Location::Details',
  'fields' => array(
  array(
    'key' => 'field_62fd4d456ec94',
    'label' => 'Building Type',
    'name' => 'building_type',
    'aria-label' => '',
    'type' => 'select',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array(
      'width' => '',
      'class' => '',
      'id' => '',
    ),
    'choices' => array(
      'Religious' => 'Religious',
      'Historic' => 'Historic',
      'Gothic' => 'Gothic',
      'Residential' => 'Residential',
    ),
    'default_value' => false,
    'allow_null' => 0,
    'multiple' => 0,
    'ui' => 0,
    'return_format' => 'value',
    'ajax' => 0,
    'placeholder' => '',
  ),
  ),
  'location' => array(
  array(
    array(
      'param' => 'post_type',
      'operator' => '==',
      'value' => 'post',
    ),
  ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => true,
  'description' => '',
  'show_in_rest' => 0,
));

endif;
