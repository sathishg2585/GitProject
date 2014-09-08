<?php

/**
 * @file
 * Bartik's theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *   "Blog entry" it would result in "node-blog". Note that the machine
 *   name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *   listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */

?>

<?php
  /** Video Section **/
  $field_video_section_value = $content['field_video_section']['#items'][0]['value'];
  $field_video_section = $content['field_video_section'][0]['entity']['field_collection_item'][$field_video_section_value];
  $field_video_id = $field_video_section['field_video_id']['#items'][0]['value'];

  $field_transcript_title = (isset($field_video_section['field_transcript_title'])?$field_video_section['field_transcript_title']['#items'][0]['value']:'');

  $field_transcript_description = (isset($field_video_section['field_transcript_description'])?$field_video_section['field_transcript_description']['#items'][0]['value']:'');

  $field_transcript_more_link = (isset($field_video_section['field_transcript_more_link'])?$field_video_section['field_transcript_more_link']['#items'][0]['value']:'');

  $field_video_description = (isset($field_video_section['field_video_description'])?$field_video_section['field_video_description']['#items'][0]['value']:'');

  /** Related Videos Section **/
  $related_videos_left = $related_videos_right = '';  
  if (isset($node->field_related_videos_section[LANGUAGE_NONE])) {
    $field_related_videos_section_count = count($content['field_related_videos_section']['#items']);
	for ($related_videos =0; $related_videos < $field_related_videos_section_count; $related_videos++) {
		$field_related_videos_section_value = $content['field_related_videos_section']['#items'][$related_videos]['value'];
		$field_related_videos_section = $content['field_related_videos_section'][$related_videos]['entity']['field_collection_item'][$field_related_videos_section_value];

		$field_related_videos_title_1 = (isset($field_related_videos_section['field_related_videos_title_1'])?$field_related_videos_section['field_related_videos_title_1']['#items'][0]['value']:'');
		$field_related_videos_title_2 = (isset($field_related_videos_section['field_related_videos_title_2'])?$field_related_videos_section['field_related_videos_title_2']['#items'][0]['value']:'');

		$field_related_videos_description = (isset($field_related_videos_section['field_related_videos_description'])?$field_related_videos_section['field_related_videos_description']['#items'][0]['value']:'');

		$field_related_videos_link_url = (isset($field_related_videos_section['field_related_videos_link'])?$field_related_videos_section['field_related_videos_link']['#items'][0]['url']:'');

		$field_related_videos_link_label = (isset($field_related_videos_section['field_related_videos_link'])?$field_related_videos_section['field_related_videos_link']['#items'][0]['title']:'');

		$field_related_videos_link_target = (isset($field_related_videos_section['field_related_videos_link']['#items'][0]['attributes']['target'])?$field_related_videos_section['field_related_videos_link']['#items'][0]['attributes']['target']:'_self');

		$field_related_videos_position = (isset($field_related_videos_section['field_related_videos_position'])?$field_related_videos_section['field_related_videos_position']['#items'][0]['taxonomy_term']->name:'');
		
		if ($field_related_videos_title_1 != '' || $field_related_videos_title_2 != '') {
			$related_videos_link_tag = '';
			if ($field_related_videos_link_url != '') {
				$related_videos_link_tag = '<p>
						<a class="uppercase" href="'.$field_related_videos_link_url.'" target="'.$field_related_videos_link_target.'">
							'.$field_related_videos_link_label.'
						</a>
					</p>';
			}
			if (strtolower($field_related_videos_position) != 'right') {
				$related_videos_left .= '
				<div class="mod full clearfix mod top-space">
					<div class="mainstageHeader">
						<h2 class="blackhead blackheadsmall">'.$field_related_videos_title_1.' <strong>'.$field_related_videos_title_2.'</strong></h2>
					</div>
					<section class="copy clearfix">
					'.$field_related_videos_description.'
					'.$related_videos_link_tag;
			}
			else {
				$related_videos_right .= '
					<div class="mod">
						<div class="mainstageHeader">
							<h2 class="blackhead blackheadsmall">'.$field_related_videos_title_1.' <strong>'.$field_related_videos_title_2.'</strong></h2>
						</div>
						<div class="initiativeRightBody copy">
							'.$field_related_videos_description.'
							'.$related_videos_link_tag.'						
							<div class="mainstageVideos clearfix">	
				';
			}
			if (isset($field_related_videos_section['field_related_videos_iteration'])) {
				$field_related_videos_iteration_count = count($field_related_videos_section['field_related_videos_iteration']['#items']);
				for ($a=0;$a<$field_related_videos_iteration_count;$a++) {
				  $field_related_videos_iteration_value = $field_related_videos_section['field_related_videos_iteration']['#items'][$a]['value'];
				  $field_related_videos_iteration = $field_related_videos_section['field_related_videos_iteration'][$a]['entity']['field_collection_item'][$field_related_videos_iteration_value];

				  $field_rvi_video_title = (isset($field_related_videos_iteration['field_rvi_video_title'])?$field_related_videos_iteration['field_rvi_video_title']['#items'][0]['value']:'');

				  $field_rvi_video_info = (isset($field_related_videos_iteration['field_rvi_video_info'])?$field_related_videos_iteration['field_rvi_video_info']['#items'][0]['value']:'');

				  $field_rvi_video_thumbnail = (isset($field_related_videos_iteration['field_rvi_video_thumbnail'])?$field_related_videos_iteration['field_rvi_video_thumbnail']['#items'][0]['uri']:'');

				  $field_rvi_video_link_url = (isset($field_related_videos_iteration['field_rvi_video_link'])?$field_related_videos_iteration['field_rvi_video_link']['#items'][0]['url']:'');

				  $field_rvi_video_link_label = (isset($field_related_videos_iteration['field_rvi_video_link'])?$field_related_videos_iteration['field_rvi_video_link']['#items'][0]['title']:'');

				  $field_rvi_video_link_target = (isset($field_related_videos_iteration['field_rvi_video_link']['#items'][0]['attributes']['target'])?$field_related_videos_iteration['field_rvi_video_link']['#items'][0]['attributes']['target']:'_self');

				  $class = ((($a+1)%2 == 0)?'even':'odd');
				  if (strtolower($field_related_videos_position) != 'right') {
					  $related_videos_left .='
						   <div class="relatedVideos clearfix">
							<a href="'.$field_rvi_video_link_url.'" class="relatedVideosImage" target="'.$field_rvi_video_link_target.'">
							  <img alt="'.$field_rvi_video_title.'" src="'.file_create_url($field_rvi_video_thumbnail).'">
							  <div class="playButton25"></div>
							</a>
							<div class="relatedVideosText">
							  <h2>'.substr($field_rvi_video_title,0, 45).'</h2>
							  <p>'.$field_rvi_video_info.'</p>
							  <a href="'.$field_rvi_video_link_url.'" target="'.$field_rvi_video_link_target.'">'.$field_rvi_video_link_label.'</a>
							</div>
						  </div>
					  ';
				  }
				  else {
					  $related_videos_right .='
						   <div class="relatedVideos clearfix '.$class.'">
							<a href="'.$field_rvi_video_link_url.'" class="relatedVideosImage" target="'.$field_rvi_video_link_target.'">
							  <img alt="'.$field_rvi_video_title.'" src="'.file_create_url($field_rvi_video_thumbnail).'">
							  <div class="playButton25"></div>
							</a>
							<div class="relatedVideosText">
							  <h2>'.substr($field_rvi_video_title,0, 45).'</h2>
							  <p>'.$field_rvi_video_info.'</p>
							  <a href="'.$field_rvi_video_link_url.'" target="'.$field_rvi_video_link_target.'">'.$field_rvi_video_link_label.'</a>
							</div>
						  </div>
					  ';			  
				  }
				}
			}
			if (strtolower($field_related_videos_position) != 'right') {
				$related_videos_left .= '
					</section>
				</div>';
			}
			else {
				$related_videos_right .= '</div>
						</div>
					</div>';	
			}
		}
	}
  }

  /** Related Images Section **/
  $related_images_left = $related_images_right = '';  
  if (isset($node->field_related_image_section[LANGUAGE_NONE])) {
    $field_related_image_section_count = count($content['field_related_image_section']['#items']);
	for ($related_image_section = 0; $related_image_section < $field_related_image_section_count; $related_image_section++) {
		$field_related_image_section_value = $content['field_related_image_section']['#items'][$related_image_section]['value'];
		$field_related_image_section = $content['field_related_image_section'][$related_image_section]['entity']['field_collection_item'][$field_related_image_section_value];

		$field_related_image_title_1 = (isset($field_related_image_section['field_related_image_title_1'])?$field_related_image_section['field_related_image_title_1']['#items'][0]['value']:'');

		$field_related_image_title_2 = (isset($field_related_image_section['field_related_image_title_2'])?$field_related_image_section['field_related_image_title_2']['#items'][0]['value']:'');

		$field_related_image_description = (isset($field_related_image_section['field_related_image_description'])?$field_related_image_section['field_related_image_description']['#items'][0]['value']:'');

		$field_related_image_link_url = (isset($field_related_image_section['field_related_image_link'])?$field_related_image_section['field_related_image_link']['#items'][0]['url']:'');

		$field_related_image_link_label = (isset($field_related_image_section['field_related_image_link'])?$field_related_image_section['field_related_image_link']['#items'][0]['title']:'');

		$field_related_image_link_target = (isset($field_related_image_section['field_related_image_link']['#items'][0]['attributes']['target'])?$field_related_image_section['field_related_image_link']['#items'][0]['attributes']['target']:'_self');
		
		$field_related_image_position = (isset($field_related_image_section['field_related_image_position'])?$field_related_image_section['field_related_image_position']['#items'][0]['taxonomy_term']->name:'');

		if ($field_related_image_title_1 != '' || $field_related_image_title_2 != '') {
			if (strtolower($field_related_image_position) != 'right') {
				$related_images_left .= '
				<!-- Sponsors -->
				<div class="mod full clearfix mod">
					<div class="mainstageHeader">
						<h2 class="blackhead blackheadsmall">'.$field_related_image_title_1.' <strong>'.$field_related_image_title_2.'</strong></h2>
					</div>
					<div id="sponsors" class="initiativeRightBody copy">
						<div>
							'.$field_related_image_description.'
						</div>
						<section class="copy clearfix">		
				';		
			}
			else {
				$related_images_right .= '
				<div class="mod">
					<div class="mainstageHeader">
						<h2 class="blackhead blackheadsmall">'.$field_related_image_title_1.' <strong>'.$field_related_image_title_2.'</strong></h2>
					</div>
					<div class="initiativeRightBody copy">
						<div>
							'.$field_related_image_description.'
						</div>				
						<section class="copy">
				';		
			}

			if (isset($field_related_image_section['field_related_image_iteration'])) {
				$field_related_image_iteration_count = count($field_related_image_section['field_related_image_iteration']['#items']);

				for ($related_image=0;$related_image<$field_related_image_iteration_count;$related_image++) {
				  $field_related_image_iteration_value = $field_related_image_section['field_related_image_iteration']['#items'][$related_image]['value'];
				  $field_related_image_iteration = $field_related_image_section['field_related_image_iteration'][$related_image]['entity']['field_collection_item'][$field_related_image_iteration_value];

				  $field_rii_image = (isset($field_related_image_iteration['field_rii_image'])?$field_related_image_iteration['field_rii_image']['#items'][0]['uri']:'');

				  $field_rii_image_link_url = (isset($field_related_image_iteration['field_rii_image_link'])?$field_related_image_iteration['field_rii_image_link']['#items'][0]['url']:'');

				  $field_rii_image_link_label = (isset($field_related_image_iteration['field_rii_image_link'])?$field_related_image_iteration['field_rii_image_link']['#items'][0]['title']:'');

				  $field_rii_image_link_target = (isset($field_related_image_iteration['field_rii_image_link']['#items'][0]['attributes']['target'])?$field_related_image_iteration['field_rii_image_link']['#items'][0]['attributes']['target']:'_self');

				  $class = ((($related_image+1)%2 == 0)?'even':'odd');
				  if (strtolower($field_related_image_position) != 'right') {
					  $related_images_left .='
							<a target="'.$field_rii_image_link_target.'" href="'.$field_rii_image_link_url.'">
								<img src="'.file_create_url($field_rii_image).'" title="'.$field_rii_image_link_label.'" alt="'.$field_rii_image_link_label.'">
							</a>
					  ';
				  }
				  else {
					  $related_images_right .='
							<a href="'.$field_rii_image_link_url.'" target="'.$field_rii_image_link_target.'">
								<img class="featured" src="'.file_create_url($field_rii_image).'" alt="'.$field_rii_image_link_label.'" border="0" width="180" style="margin-bottom: 30px;">
							</a>
					  ';
				  }
				}
			}
			$related_image_link_tag = '';
			if ($field_related_image_link_url != '') {
				$related_image_link_tag = '<p><a href="'.$field_related_image_link_url.'" class="cta uppercase" target="'.$field_related_image_link_target.'">'.$field_related_image_link_label.'</a></p>';
			}
			if (strtolower($field_related_image_position) != 'right') {
				$related_images_left .='
						</section>
						'.$related_image_link_tag.'
					</div>
				</div>';
			}
			else {
				$related_images_right .='
						</section>
						'.$related_image_link_tag.'
					</div>
				</div>
				';		
			}
		}
	}
  }

  /** Description Section **/
  if (isset($node->field_description_section[LANGUAGE_NONE])) {
    $field_description_section_value = $content['field_description_section']['#items'][0]['value'];
    $field_description_section = $content['field_description_section'][0]['entity']['field_collection_item'][$field_description_section_value];

    $field_ds_title_1 = (isset($field_description_section['field_ds_title_1'])?$field_description_section['field_ds_title_1']['#items'][0]['value']:'');

    $field_ds_title_2 = (isset($field_description_section['field_ds_title_2'])?$field_description_section['field_ds_title_2']['#items'][0]['value']:'');

    $field_ds_body = (isset($field_description_section['field_ds_body'])?$field_description_section['field_ds_body']['#items'][0]['value']:'');

    $field_ds_link_url = (isset($field_description_section['field_ds_link'])?$field_description_section['field_ds_link']['#items'][0]['url']:'');

    $field_ds_link_label = (isset($field_description_section['field_ds_link'])?$field_description_section['field_ds_link']['#items'][0]['title']:'');

    $field_ds_link_target = (isset($field_description_section['field_ds_link']['#items'][0]['attributes']['target'])?$field_description_section['field_ds_link']['#items'][0]['attributes']['target']:'_self');

    $field_add_spread_the_word_block = (isset($field_description_section['field_add_spread_the_word_block'])?$field_description_section['field_add_spread_the_word_block']['#items'][0]['value']:'');

    $field_ds_position = (isset($field_description_section['field_ds_position'])?$field_description_section['field_ds_position']['#items'][0]['taxonomy_term']->name:'');

	$ds_link_tag = '';
	if ($field_ds_link_url != '') {
		$ds_link_tag = '<a href="'.$field_ds_link_url.'" target="'.$field_ds_link_target.'">'.$field_ds_link_label.'</a>';
	}
  }

  /** Black Box Section **/
  $field_black_box_section_value = $content['field_black_box_section']['#items'][0]['value'];
  $field_black_box_section = $content['field_black_box_section'][0]['entity']['field_collection_item'][$field_black_box_section_value];

  $field_black_box_title = (isset($field_black_box_section['field_black_box_title'])?$field_black_box_section['field_black_box_title']['#items'][0]['value']:'');
  $field_black_box_title_2 = (isset($field_black_box_section['field_black_box_title_2'])?$field_black_box_section['field_black_box_title_2']['#items'][0]['value']:'');

  $field_black_box_description = (isset($field_black_box_section['field_black_box_description'])?$field_black_box_section['field_black_box_description']['#items'][0]['value']:'');

  $field_black_box_more_link = (isset($field_black_box_section['field_black_box_more_link'])?$field_black_box_section['field_black_box_more_link']['#items'][0]['value']:'');

  $field_add_spread_the_word_block = (isset($field_black_box_section['field_add_spread_the_word_block'])?$field_black_box_section['field_add_spread_the_word_block']['#items'][0]['value']:'');
  
  /** Half Module Section **/
  $field_half_module_left = $field_half_module_right = '';
  if (isset($content['field_half_module_section'])) {
	  $field_half_module_section_count = count($content['field_half_module_section']['#items']);
	  for ($half_module=0;$half_module<$field_half_module_section_count;$half_module++) {
		$field_half_module_section_value = $content['field_half_module_section']['#items'][$half_module]['value'];
		$field_half_module_section = $content['field_half_module_section'][$half_module]['entity']['field_collection_item'][$field_half_module_section_value];
		$field_half_module_title_1 = (isset($field_half_module_section['field_half_module_title_1'])?$field_half_module_section['field_half_module_title_1']['#items'][0]['value']:'');
		$field_half_module_title_2 = (isset($field_half_module_section['field_half_module_title_2'])?$field_half_module_section['field_half_module_title_2']['#items'][0]['value']:'');
		$field_half_module_description = (isset($field_half_module_section['field_half_module_description'])?$field_half_module_section['field_half_module_description']['#items'][0]['value']:'');
		$field_half_module_link_url = (isset($field_half_module_section['field_half_module_link'])?$field_half_module_section['field_half_module_link']['#items'][0]['url']:'');
		$field_half_module_link_label = (isset($field_half_module_section['field_half_module_link'])?$field_half_module_section['field_half_module_link']['#items'][0]['title']:'');
		$field_half_module_link_target = (isset($field_half_module_section['field_half_module_link']['#items'][0]['attributes']['target'])?$field_half_module_section['field_half_module_link']['#items'][0]['attributes']['target']:'_self');
		$field_ds_position = (isset($field_half_module_section['field_ds_position'])?$field_half_module_section['field_ds_position']['#items'][0]['taxonomy_term']->name:'');
		$half_module_link_tag = '';
		if ($field_half_module_link_url != '') {
			$half_module_link_tag = '<p><a href="'.$field_half_module_link_url.'" class="uppercase" target="'.$field_half_module_link_target.'">'.$field_half_module_link_label.'</a>';
		}
		if ($field_half_module_title_1 != '' || $field_half_module_title_2 != '' || $field_half_module_description != '' || $field_half_module_link_url != '') {
		  if (strtolower($field_ds_position) != 'right') {
			$class = (($half_module%2 == 0)?'clear':'');
			$field_half_module_left .= '
				<div class="'.$class.' mod half">
					<div class="mainstageHeader">
						<h2 class="blackhead blackheadsmall">'.$field_half_module_title_1.' <strong>'.$field_half_module_title_2.'</strong></h2>
					</div>
					<section class="copy clearfix">
						'.$field_half_module_description.'
						'.$half_module_link_tag.'
						</p>
					</section>
				</div>		
			';
		  }
		  else {
			$field_half_module_right .= '
				<div class="mod">
					<div class="mainstageHeader">
						<h2 class="blackhead blackheadsmall">'.$field_half_module_title_1.' <strong>'.$field_half_module_title_2.'</strong></h2>
					</div>
					<div class="initiativeRightBody copy">
						'.$field_half_module_description.'
						'.$half_module_link_tag.'
						</p>
					</div>
				</div>		
			';	  
		  }
		}
	  }
  }
  /** Download File Section **/
  $field_file_download_left = $field_file_download_right = $file_download_tag = '';
  if (isset($content['field_file_download_section'])) {
	  $field_file_download_section_count = count($content['field_file_download_section']['#items']);
	  for ($file_download=0;$file_download<$field_file_download_section_count;$file_download++) {
		$field_file_download_section_value = $content['field_file_download_section']['#items'][$file_download]['value'];
		$field_file_download_section = $content['field_file_download_section'][$file_download]['entity']['field_collection_item'][$field_file_download_section_value];
		$field_file_download_title_1 = (isset($field_file_download_section['field_file_download_title_1'])?$field_file_download_section['field_file_download_title_1']['#items'][0]['value']:'');
		$field_file_download_title_2 = (isset($field_file_download_section['field_file_download_title_2'])?$field_file_download_section['field_file_download_title_2']['#items'][0]['value']:'');
		$field_file_download_description = (isset($field_file_download_section['field_file_download_description'])?$field_file_download_section['field_file_download_description']['#items'][0]['value']:'');
		$field_file_download_label = (isset($field_file_download_section['field_file_download_label'])?$field_file_download_section['field_file_download_label']['#items'][0]['value']:'');
		$field_file_download_file = (isset($field_file_download_section['field_file_download_file'])?$field_file_download_section['field_file_download_file']['#items'][0]['uri']:'');
		$field_ds_position = (isset($field_file_download_section['field_ds_position'])?$field_file_download_section['field_ds_position']['#items'][0]['taxonomy_term']->name:'');

		if ($field_file_download_file != '') {
			$file_download_tag .= '<p><a href="'.file_create_url($field_file_download_file).'" target="_blank" class="cta uppercase">'.$field_file_download_label.'</a></p>';
		}
		
		if ($field_file_download_title_1 != '' || $field_file_download_title_2 != '' || $field_file_download_description != '' || $field_file_download_file != '') {
		  $class = (($half_module%2 == 0)?'clear':'');
		  if (strtolower($field_ds_position) != 'right') {
			$field_file_download_left .= '
				<div class="'.$class.' download mod half">
					<div class="mainstageHeader">
						<h2 class="blackhead blackheadsmall">'.$field_file_download_title_1.' <strong>'.$field_file_download_title_2.'</strong></h2>
					</div>
					<section class="copy clearfix">
						'.$field_file_download_description.'
						'.$file_download_tag.'
					</section>
				</div>		
			';
		  }
		  else {
			$field_file_download_right .= '
				<div class="mod download">
					<div class="mainstageHeader">
						<h2 class="blackhead blackheadsmall">'.$field_file_download_title_1.' <strong>'.$field_file_download_title_2.'</strong></h2>
					</div>
					<div class="initiativeRightBody copy">
						'.$field_file_download_description.'
						'.$file_download_tag.'
					</div>
				</div>	
			';	  
		  }
		}
	  }
  }
?>
	<div class="initiativeMain layoutWide">
		<div id="colMain">
			<div class="videoFrame">
				<iframe src="http://player.theplatform.com/p/OyMl-B/oIChOKSBFJ6b/select/<?php echo $field_video_id; ?>" width="688" height="387" frameborder="0" scrolling="no"></iframe>
			</div>
			<?php if ($field_transcript_title != '' || $field_transcript_description != '') { ?>
			<div class="mod full caption clearfix">
				<h1><?php echo $field_transcript_title; ?></h1>	
				<?php if ($field_transcript_more_link != 0) { ?>
				<h2><span class="Tpane_desc" style="height:50px"><?php echo $field_transcript_description; ?></span></h2><a class="Tpane_desc_more atmore" href="javascript:;" onclick="TDesc('Tpane_desc', 'less', 50, '');">More</a><a class="Tpane_desc_less atmore" href="javascript:;" onclick="TDesc('Tpane_desc', 'more', 50, '');">Less</a>
				<?php 
				}
				else {
				?>
				<h2><?php echo $field_transcript_description; ?></h2>
				<?php } ?>
			</div>
			<?php 
			}
			if ($field_video_description != '') {
			?>
			<div class="mod-article">
				<?php echo $field_video_description; ?>
			</div>
			<?php
			}
			if (($field_ds_title_1 != '' || $field_ds_title_2 != '' || $field_ds_body != '') && strtolower($field_ds_position) != 'right') {
			?>
				<div class="mod full clear">
					<div class="mainstageHeader">
					  <h2 class="blackhead blackheadsmall"><?php echo $field_ds_title_1;?> <strong><?php echo $field_ds_title_2;?></strong></h2>
					</div>
					<section class="copy clearfix">
					  <?php echo $field_ds_body; ?>
					  <?php echo $ds_link_tag; ?>
					</section>
				</div>
			<?php
			}
			?>			
			<?php echo $field_half_module_left; ?>
			<?php echo $field_file_download_left; ?>
			<?php echo $related_videos_left; ?>
			<?php echo $related_images_left; ?>
			<?php if ($region['facebook_discussion']): ?>
				<div class="social">
					<?php print render($region['facebook_discussion']); ?>
				</div>
			<?php endif; ?>				
		</div>
		<div id="colSide">
			<?php if ($field_black_box_title != '' || $field_black_box_title_2 != '' || $field_black_box_description != '') { ?>
			<div class="mod solid">
				<h2 class="title"><?php echo $field_black_box_title; ?> <br/><small><?php echo $field_black_box_title_2; ?></small></h2>
				<?php
				if ($field_black_box_more_link != 0) {
					echo '<span class="blackpane_desc" style="height:250px">'.$field_black_box_description.'</span><a class="blackpane_desc_more amore" href="javascript:;" onclick="LeftDesc(\'blackpane_desc\', \'less\', 250, \'\');">More</a><a class="blackpane_desc_less amore" href="javascript:;" onclick="LeftDesc(\'blackpane_desc\', \'more\', 250, \'\');">Less</a>';
				}
				else {
					echo $field_black_box_description;
				}
				?>
				<?php if ($region['spread_the_word']): ?>
					<?php print render($region['spread_the_word']); ?>
				<?php endif; ?>					
			</div>
			<?php
			  }

			  echo $field_half_module_right;
			  echo $field_file_download_right;
			  echo $related_videos_right;
			  echo $related_images_right;
			?>
		</div>
		<!-- initiativeRight end -->
	</div>
	<!-- initiativeMain end -->