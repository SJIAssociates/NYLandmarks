<?php
/*
Home Carousel

Landmark Contacts
Landmark Profile
LandMark: Tourist Vidoes
LandMark Location (And Sacred Sites)

Page: Sidebar
Page: News

Event: Tickets
*/
if( function_exists('acf_add_local_field_group') ):
	/*
	Name: Home Carousel Settings
	Fields: image_carousel -> image
	Location: Template: Home
	*/
	acf_add_local_field_group(array(
		'key' => 'group_5d91114c94437',
		'title' => 'Home::Carousel',
		'fields' => array(
			array(
				'key' => 'field_5d9113a086598',
				'label' => 'Image Carousel',
				'name' => 'image_carousel',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => 'field_5d9113aa86599',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_5d9113aa86599',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'medium',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'views/template-home.blade.php',
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
	));
	/*
	Name: Home::Landing Video
	Fields: landing_video -> file,video_poster -> image
	Location: Template: Home
	*/
	acf_add_local_field_group(array(
		'key' => 'group_62f635d64d05b',
		'title' => 'Home::Landing Video',
		'fields' => array(
			array(
				'key' => 'field_62f635e2c7101',
				'label' => 'Landing Video',
				'name' => 'landing_video',
				'type' => 'file',
				'return_format' => 'url',
				'library' => 'uploadedTo',
				'min_size' => '',
				'max_size' => '',
				'mime_types' => 'mp4',
			),
			array(
				'key' => 'field_62f6363ac7102',
				'label' => 'Video Poster',
				'name' => 'video_poster',
				'aria-label' => '',
				'type' => 'image',
				'return_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'views/template-home.blade.php',
					),
				),
			),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'active' => true,
	));
	/*
	Name: Landmark::Contact
	Fields: location_email,location_number
	Location: Post_type -> Landmark
	*/
	acf_add_local_field_group(array(
		'key' => 'group_5d8bd9d7cf7d6',
		'title' => 'Landmark::Contact',
		'fields' => array(
			array(
				'key' => 'field_5d8bd9ee939bb',
				'label' => 'Location Email',
				'name' => 'location_email',
				'type' => 'email',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_5d8bda18939bc',
				'label' => 'Phone Number',
				'name' => 'location_number',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'landmark',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	/*
	Name: Landmark::Profile
	Fields: website,landmark_facebook,landmark_twitter
	Location: Post_type -> Landmark
	*/
	acf_add_local_field_group(array(
		'key' => 'group_5d8bda97c0e79',
		'title' => 'Landmark::Profile',
		'fields' => array(
			array(
				'key' => 'field_5d8bda9d187d2',
				'label' => 'Website',
				'name' => 'website',
				'type' => 'url',
			),
			array(
				'key' => 'field_5d8bdaa9187d3',
				'label' => 'Facebook',
				'name' => 'landmark_facebook',
				'type' => 'url',
			),
			array(
				'key' => 'field_5d8bdab6187d4',
				'label' => 'Twitter',
				'name' => 'landmark_twitter',
				'type' => 'url',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'landmark',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	/*
	Name: Landmark::Tourist in Your Own Town
	Fields: video_embed
	Location: Post_type -> Landmark
	*/
	acf_add_local_field_group(array(
		'key' => 'group_5d8bdb591fede',
		'title' => 'Landmarks::Tourist in Your Own Town',
		'fields' => array(
			array(
				'key' => 'field_5d8bdb6295e0b',
				'label' => 'Video Embed',
				'name' => 'video_embed',
				'type' => 'oembed',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'width' => '',
				'height' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'landmark',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	/*
	Name: Landmark::Tourist in Your Own Town
	Fields: location
	Location: Post_type -> Landmark & Site & Location
	*/
	acf_add_local_field_group(array(
		'key' => 'group_5d6fdf13950f9',
		'title' => 'Location',
		'fields' => array(
			array(
				'key' => 'field_5d6fee69a854d',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'google_map',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'center_lat' => '',
				'center_lng' => '',
				'zoom' => '',
				'height' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'site',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'location',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'landmark',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	/*
	Name: Page::News
	Fields: category
	Location: Default Pages
	Purpose: Adding the news boxes to pages (mainly used for grant pages)
	*/
	acf_add_local_field_group(array(
		'key' => 'group_5d9628ce9600b',
		'title' => 'Page:News',
		'fields' => array(
			array(
				'key' => 'field_5d9628dc7eb0b',
				'label' => 'Category',
				'name' => 'category',
				'type' => 'taxonomy',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'taxonomy' => 'category',
				'field_type' => 'select',
				'allow_null' => 1,
				'add_term' => 0,
				'save_terms' => 0,
				'load_terms' => 0,
				'return_format' => 'object',
				'multiple' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'default',
				),
			),
		),
		'menu_order' => 10,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
	/*
	Name: Page::Sidebar
	Fields: Repeater
	Location: Default Pages | Forms Pages
	*/
	acf_add_local_field_group(array(
		'key' => 'group_5d79984523190',
		'title' => 'Page::Sidebar',
		'fields' => array(
			array(
				'key' => 'field_5d79985c0c7b1',
				'label' => 'Sidebar Content',
				'name' => 'sidebar_content',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => 'field_5d7998ba0c7b2',
				'min' => 0,
				'max' => 0,
				'layout' => 'block',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_5d7998ba0c7b2',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '100%',
						),
					),
					array(
						'key' => 'field_5d7998c00c7',
						'label' => 'Button Type',
						'type' => 'button_group',
						'instructions' => 'Is the button linking to a internal page or external wesbite',
						'required' => 0,
						'conditional_logic' => 0,
						'choices' => array(
							'wp_page' => 'Internal',
							'url' => 'External',
						),
						'allow_null' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'wrapper' => array(
							'width' => '50%',
						),
					),
					array(
						'key' => 'field_5d7998c00c7bc',
						'label' => 'Button Text',
						'name' => 'cta_text',
						'instructions' => 'Text that appears in the button. The Button will be placed below the content.',
						'type' => 'text',
						'wrapper' => array(
							'width' => '50%',
						),
					),
					array(
						'key' => 'field_5d7998c00c7bd',
						'label' => 'Button Link',
						'name' => 'cta_link',
						'type' => 'page_link',
						'instructions' => 'Select the page title within this site.',
						'wrapper' => array(
							'width' => '100%',
						),
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d7998c00c7',
									'operator' => '==',
									'value' => 'wp_page',
								),
							),
						),
					),
					array(
						'key' => 'field_5d7998c00c7be',
						'label' => 'Button Link',
						'name' => 'cta_link',
						'type' => 'url',
						'instructions' => 'Input the URL of the desired page, including HTTP in the beginning.',
						'wrapper' => array(
							'width' => '100%',
						),
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d7998c00c7',
									'operator' => '==',
									'value' => 'url',
								),
							),
						),
					),
					array(
						'key' => 'field_5d7998c00c7b3',
						'label' => 'Content',
						'name' => 'content',
						'type' => 'wysiwyg',
						'wrapper' => array(
							'width' => '100%',
						),
						'tabs' => 'all',
						'toolbar' => 'full',
						'media_upload' => 1,
					),
				),
			),
		),
		'location' => array(
				array(
					array(
						'param' => 'post_template',
						'operator' => '==',
						'value' => 'default',
					),
				),
				array(
					array(
						'param' => 'post_template',
						'operator' => '==',
						'value' => 'views/template-form.blade.php',
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
		));
	
	
	
	/*
	Name: Sub Title for Pages
	Fields: sub_title
	Location: Default Pages and Page ID 9
	*/
	acf_add_local_field_group(array(
		'key' => 'page_group_1',
		'title' => 'Sub Title For Page',
		'fields' => array (
			array (
				'key' => 'field_5d79985c0c7sdf',
				'label' => 'Sub Title',
				'name' => 'sub_title',
				'type' => 'text',
			)
		),
		'location' => array(
				array(
					array(
						'param' => 'post_template',
						'operator' => '==',
						'value' => 'default',
					),
				),
				array(
					array(
						'param' => 'page',
						'operator' => '==',
						'value' => '9',
					),
				),
				array(
					array(
						'param' => 'post_template',
						'operator' => '==',
						'value' => 'views/template-ssoh.blade.php',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'acf_after_title',
			'style' => 'seamless',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
	));
	/*
	Name: Category Images
	Fields: category_image
	Location: Default Pages and Page ID 9
	*/
	acf_add_local_field_group(array(
		'key' => 'category_acf_1',
		'title' => 'Category::Images',
		'fields' => array (
			array (
				'key' => 'field_5d79985ccd4as',
				'label' => 'Category Images',
				'name' => 'category_image',
				'type' => 'image',
				'instructions' => '',
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
			)
		),
		'location' => array(
				array(
					array(
						'param' => 'taxonomy',
						'operator' => '==',
						'value' => 'category',
					),
				),
			),
		'position' => 'acf_after_title',
	));
	/*
	Name: Sacred Sites Hour
	Fields: Dates_Open, saturday_open, saturday_close, sunday_open, sunday_close
	*/
	acf_add_local_field_group(array(
		'key' => 'group_5e14c70183a33',
		'title' => 'Sacred Site::Hours',
		'fields' => array(
			array(
				'key' => 'field_5e14c707d03a1',
				'label' => 'Dates Open',
				'name' => 'dates_open',
				'type' => 'checkbox',
				'choices' => array(
					'Saturday' => 'Saturday',
					'Sunday' => 'Sunday',
				),
				'allow_null' => 0,
				'default_value' => 'Saturday',
				'layout' => 'horizontal',
				'return_format' => 'value',
			),
			array(
				'key' => 'field_5e14c730d03a2',
				'label' => 'Saturday Open',
				'name' => 'saturday_open',
				'type' => 'time_picker',
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5e14c707d03a1',
							'operator' => '==',
							'value' => 'Saturday',
						),
					),
				),
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'g:i a',
				'return_format' => 'g:i a',
			),
			array(
				'key' => 'field_5e14c761d03a3',
				'label' => 'Saturday Close',
				'name' => 'saturday_close',
				'type' => 'time_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5e14c707d03a1',
							'operator' => '==',
							'value' => 'Saturday',
						),
					),
				),
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'g:i a',
				'return_format' => 'g:i a',
			),
			array(
				'key' => 'field_5e14c7b96a162',
				'label' => 'Sunday Open',
				'name' => 'sunday_open',
				'type' => 'time_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5e14c707d03a1',
							'operator' => '==',
							'value' => 'Sunday',
						),
					),
				),
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'g:i a',
				'return_format' => 'g:i a',
			),
			array(
				'key' => 'field_5e14c7c96a163',
				'label' => 'Sunday Close',
				'name' => 'sunday_close',
				'type' => 'time_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5e14c707d03a1',
							'operator' => '==',
							'value' => 'Sunday',
						),
					),
				),
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'g:i a',
				'return_format' => 'g:i a',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'site',
				),
			),
		),
		'position' => 'side',
	));
	/*
	Name: Sacred Site:Activity Description
	Fields: Activity Description
	*/
	acf_add_local_field_group(array(
		'key' => 'group_5e14dfa005636',
		'title' => 'Sacred Site:Activity Description',
		'fields' => array(
			array(
				'key' => 'field_5e14dff235562',
				'label' => 'Activity Descrition',
				'name' => 'activity_descrition',
				'type' => 'wysiwyg',
				'instructions' => 'Use the Area Below for describing activities on site. Include details about times or cost of any event or tours.',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'site',
				),
			),
		),
		'style' => 'seamless',
	));
	/*
	Name: SacredSite::Activities
	Fields: activities, event_link, city
	*/
	acf_add_local_field_group(array(
		'key' => 'group_5d6fd8df061b1',
		'title' => 'Tours & Activities',
		'fields' => array(
			array(
				'key' => 'field_5d6fd8e847aa7',
				'label' => 'Tours',
				'name' => 'activities',
				'type' => 'checkbox',
				'choices' => array(
					'self-guided-tours' => 'Self-guided Tours',
					'guided-tours' => 'Guided Tours',
					'pre-booked-tours' => 'Pre-booked Tours',
				),
				'allow_custom' => 0,
				'default_value' => array(
				),
				'layout' => 'vertical',
				'toggle' => 0,
				'return_format' => 'value',
				'save_custom' => 0,
			),
			array(
				'key' => 'field_5d6ff9a60c040',
				'label' => 'City',
				'name' => 'city',
				'type' => 'text',
				'instructions' => 'This Field is auto-populated by the Google Map field.',
	
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'site',
				),
			),
		),
		'position' => 'side',
	));
	
	/*
	Name: SacredSite::Activities
	Fields: activities, event_link, city
	*/
	acf_add_local_field_group( array(
		'key' => 'group_6515aec82dd5f',
		'title' => 'Event Tickets',
		'fields' => array(
			array(
				'key' => 'field_6515aec94e5e3',
				'label' => 'Ticket Host',
				'name' => 'ticket_host',
				'type' => 'button_group',
				'relevanssi_exclude' => 1,
				'choices' => array(
					'nylc' => 'NYLC',
					'other' => 'Other',
				),
				'return_format' => 'value',
				'allow_null' => 0,
				'layout' => 'horizontal',
			),
			array(
				'key' => 'field_6515b01f44277',
				'label' => 'Eventbrite ID',
				'name' => 'eventbrite_id',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => 'Enter the ID for the event from Eventbrite.',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_6515aec94e5e3',
							'operator' => '==',
							'value' => 'nylc',
						),
					),
				),
				'relevanssi_exclude' => 0,
			),
			array(
				'key' => 'field_6515b04644278',
				'label' => 'Ticket Link',
				'name' => 'ticket_link',
				'aria-label' => '',
				'type' => 'url',
				'instructions' => 'Enter the URL of the page for purchasing tickets',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_6515aec94e5e3',
							'operator' => '==',
							'value' => 'other',
						),
					),
				),
				'relevanssi_exclude' => 1,
			),
			array(
				'key' => 'field_6515b1a844279',
				'label' => 'Sold Out',
				'name' => 'sold_out',
				'type' => 'true_false',
				'instructions' => 'Check this is the Event is Sold Out.',
				'required' => 0,
				'conditional_logic' => 0,
				'relevanssi_exclude' => 1,
				'default_value' => 0,
				'ui_on_text' => 'Yes',
				'ui_off_text' => 'No',
				'ui' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'site',
				),
			),
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
		'hide_on_screen' => '',
		'active' => true,
	  ) 
	);

endif;